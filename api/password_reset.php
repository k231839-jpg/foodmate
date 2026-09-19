<?php
require_once 'config.php';
header('Content-Type: application/json');
$action = $_GET['action'] ?? '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($action === 'request') {
        $email = $_POST['email'] ?? '';
        if (!$email) {
            echo json_encode(['success' => false, 'message' => 'Email required']);
            exit;
        }
        // Generate token
        $token = bin2hex(random_bytes(16));
        $expires = date('Y-m-d H:i:s', strtotime('+1 hour'));
        // Insert token
        $stmt = $pdo->prepare("INSERT INTO PASSWORD_RESET (Email, Token, ExpiresAt) VALUES (?, ?, ?)");
        $stmt->execute([$email, $token, $expires]);
        // TODO: Send email (placeholder)
        $resetLink = "http://mehedihasan.au/kent/cpro306/g10/reset_password.php?token=" . $token;
        // For now just return link for debugging
        echo json_encode(['success' => true, 'message' => 'Reset link generated', 'reset_link' => $resetLink]);
        exit;
    } elseif ($action === 'reset') {
        $token = $_POST['token'] ?? '';
        $newPassword = $_POST['password'] ?? '';
        if (!$token || !$newPassword) {
            echo json_encode(['success' => false, 'message' => 'Token and new password required']);
            exit;
        }
        // Find token
        $stmt = $pdo->prepare("SELECT * FROM PASSWORD_RESET WHERE Token = ? AND Used = 0 AND ExpiresAt > NOW()");
        $stmt->execute([$token]);
        $row = $stmt->fetch();
        if (!$row) {
            echo json_encode(['success' => false, 'message' => 'Invalid or expired token']);
            exit;
        }
        $email = $row['Email'];
        $hash = password_hash($newPassword, PASSWORD_DEFAULT);
        // Update password in possible tables
        $tables = ['CUSTOMER', 'RESTAURANT', 'DELIVERY_PARTNER', 'ADMIN'];
        foreach ($tables as $table) {
            $update = $pdo->prepare("UPDATE `$table` SET PasswordHash = ? WHERE Email = ?");
            $update->execute([$hash, $email]);
        }
        // Mark token used
        $pdo->prepare("UPDATE PASSWORD_RESET SET Used = 1 WHERE Token = ?")->execute([$token]);
        echo json_encode(['success' => true, 'message' => 'Password has been reset']);
        exit;
    }
}
// If not POST or unknown action
echo json_encode(['success' => false, 'message' => 'Invalid request']);
?>
