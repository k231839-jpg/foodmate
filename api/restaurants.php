<?php
require_once 'config.php';
header('Content-Type: application/json');

$action = $_GET['action'] ?? 'list';

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if ($action === 'list') {
        try {
            $stmt = $pdo->query("SELECT RestaurantID, Name, CuisineType, ImageURL, Address FROM RESTAURANT");
            $restaurants = $stmt->fetchAll();
            echo json_encode(['success' => true, 'restaurants' => $restaurants]);
        } catch (PDOException $e) {
            echo json_encode(['success' => false, 'message' => 'Database error']);
        }
    } elseif ($action === 'details') {
        $id = $_GET['id'] ?? 0;
        if (!$id) {
            echo json_encode(['success' => false, 'message' => 'Restaurant ID required']);
            exit;
        }

        try {
            $stmt = $pdo->prepare("SELECT * FROM RESTAURANT WHERE RestaurantID = ?");
            $stmt->execute([$id]);
            $restaurant = $stmt->fetch();

            if ($restaurant) {
                // Fetch menu items
                $menuStmt = $pdo->prepare("SELECT * FROM MENU_ITEM WHERE RestaurantID = ?");
                $menuStmt->execute([$id]);
                $restaurant['menu'] = $menuStmt->fetchAll();
                
                echo json_encode(['success' => true, 'restaurant' => $restaurant]);
            } else {
                echo json_encode(['success' => false, 'message' => 'Restaurant not found']);
            }
        } catch (PDOException $e) {
            echo json_encode(['success' => false, 'message' => 'Database error']);
        }
    }
}
?>
