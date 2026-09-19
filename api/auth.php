<?php
require_once 'config.php';
session_start();

header('Content-Type: application/json');

$action = $_GET['action'] ?? '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($action === 'login') {
        $email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';
        $role = $_POST['role'] ?? 'customer'; // customer, restaurant, delivery, admin

        if (!$email || !$password) {
            echo json_encode(['success' => false, 'message' => 'Email and password required']);
            exit;
        }

        $table = '';
        $idField = '';
        switch ($role) {
            case 'admin':
                $table = 'ADMIN';
                $idField = 'AdminID';
                break;
            case 'restaurant':
                $table = 'RESTAURANT';
                $idField = 'RestaurantID';
                break;
            case 'delivery':
                $table = 'DELIVERY_PARTNER';
                $idField = 'PartnerID';
                break;
            default:
                $table = 'CUSTOMER';
                $idField = 'CustomerID';
        }

        $stmt = $pdo->prepare("SELECT * FROM `$table` WHERE Email = ?");
        $stmt->execute([$email]);
        $user = $stmt->fetch();

        // Note: For simplicity in development, we are accepting plain text passwords if hash check fails
        // In production, always use password_hash and password_verify
        if ($user && (password_verify($password, $user['PasswordHash']) || $password === $user['PasswordHash'])) {
            $_SESSION['user_id'] = $user[$idField];
            $_SESSION['role'] = $role;
            $_SESSION['name'] = $user['Name'];
            
            echo json_encode(['success' => true, 'redirect' => getRedirectUrl($role)]);
        } else {
            echo json_encode(['success' => false, 'message' => 'Invalid email or password']);
        }
    } elseif ($action === 'register') {
        $name = $_POST['name'] ?? '';
        $email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';
        $role = $_POST['role'] ?? 'customer'; // customer, restaurant, delivery
        
        if (!$name || !$email || !$password) {
            echo json_encode(['success' => false, 'message' => 'Name, email, and password required']);
            exit;
        }

        $table = '';
        switch ($role) {
            case 'restaurant': $table = 'RESTAURANT'; break;
            case 'delivery': $table = 'DELIVERY_PARTNER'; break;
            default: $table = 'CUSTOMER';
        }

        // Check if email exists
        $stmt = $pdo->prepare("SELECT Email FROM `$table` WHERE Email = ?");
        $stmt->execute([$email]);
        if ($stmt->fetch()) {
            echo json_encode(['success' => false, 'message' => 'Email already registered']);
            exit;
        }

        // Insert new user
        $hash = password_hash($password, PASSWORD_DEFAULT);
        try {
            $insert = $pdo->prepare("INSERT INTO `$table` (Name, Email, PasswordHash) VALUES (?, ?, ?)");
            $insert->execute([$name, $email, $hash]);
            echo json_encode(['success' => true, 'message' => 'Registration successful, please log in.']);
        } catch (Exception $e) {
            echo json_encode(['success' => false, 'message' => 'Registration failed.']);
        }
    }
} elseif ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if ($action === 'check') {
        if (isset($_SESSION['user_id'])) {
            echo json_encode([
                'logged_in' => true,
                'user' => [
                    'id' => $_SESSION['user_id'],
                    'name' => $_SESSION['name'],
                    'role' => $_SESSION['role']
                ]
            ]);
        } else {
            echo json_encode(['logged_in' => false]);
        }
    } elseif ($action === 'logout') {
        session_destroy();
        echo json_encode(['success' => true]);
    }
}

function getRedirectUrl($role) {
    switch ($role) {
        case 'admin': return 'admin-dashboard.php';
        case 'restaurant': return 'restaurant-dashboard.php';
        case 'delivery': return 'delivery-dashboard.php';
        default: return 'dashboard.php';
    }
}
?>
