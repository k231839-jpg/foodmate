<?php
require_once 'config.php';
session_start();
header('Content-Type: application/json');

$action = $_GET['action'] ?? '';

// Basic auth check
if (!isset($_SESSION['user_id'])) {
    echo json_encode(['success' => false, 'message' => 'Unauthorized']);
    exit;
}

$userId = $_SESSION['user_id'];
$role = $_SESSION['role'];

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if ($action === 'list') {
        try {
            if ($role === 'customer') {
                $stmt = $pdo->prepare("SELECT * FROM `ORDER` WHERE CustomerID = ? ORDER BY OrderTime DESC");
                $stmt->execute([$userId]);
            } elseif ($role === 'restaurant') {
                $stmt = $pdo->prepare("SELECT * FROM `ORDER` WHERE RestaurantID = ? ORDER BY OrderTime DESC");
                $stmt->execute([$userId]);
            } elseif ($role === 'delivery') {
                $stmt = $pdo->prepare("SELECT * FROM `ORDER` WHERE PartnerID = ? OR PartnerID IS NULL ORDER BY OrderTime DESC");
                $stmt->execute([$userId]);
            } else {
                $stmt = $pdo->query("SELECT * FROM `ORDER` ORDER BY OrderTime DESC"); // Admin sees all
            }
            $orders = $stmt->fetchAll();
            echo json_encode(['success' => true, 'orders' => $orders]);
        } catch (PDOException $e) {
            echo json_encode(['success' => false, 'message' => 'Database error']);
        }
    }
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($action === 'create' && $role === 'customer') {
        $data = json_decode(file_get_contents("php://input"), true);
        $restaurantId = $data['restaurantId'] ?? 0;
        $items = $data['items'] ?? [];
        $total = $data['totalAmount'] ?? 0;

        if (!$restaurantId || empty($items)) {
            echo json_encode(['success' => false, 'message' => 'Invalid order data']);
            exit;
        }

        try {
            $pdo->beginTransaction();

            $stmt = $pdo->prepare("INSERT INTO `ORDER` (CustomerID, RestaurantID, TotalAmount, Status) VALUES (?, ?, ?, 'Pending')");
            $stmt->execute([$userId, $restaurantId, $total]);
            $orderId = $pdo->lastInsertId();

            $itemStmt = $pdo->prepare("INSERT INTO ORDER_ITEM (OrderID, ItemID, Quantity, Subtotal) VALUES (?, ?, ?, ?)");
            foreach ($items as $item) {
                $subtotal = $item['price'] * $item['quantity'];
                $itemStmt->execute([$orderId, $item['id'], $item['quantity'], $subtotal]);
            }

            $pdo->commit();
            echo json_encode(['success' => true, 'orderId' => $orderId, 'message' => 'Order placed successfully']);
        } catch (PDOException $e) {
            $pdo->rollBack();
            echo json_encode(['success' => false, 'message' => 'Failed to place order']);
        }
    } elseif ($action === 'updateStatus') {
        $orderId = $_POST['orderId'] ?? 0;
        $status = $_POST['status'] ?? '';
        
        if ($orderId && $status) {
            try {
                $stmt = $pdo->prepare("UPDATE `ORDER` SET Status = ? WHERE OrderID = ?");
                $stmt->execute([$status, $orderId]);
                echo json_encode(['success' => true, 'message' => 'Order status updated']);
            } catch (PDOException $e) {
                echo json_encode(['success' => false, 'message' => 'Failed to update order']);
            }
        }
    }
}
?>
