<?php
/**
 * auth_check.php
 * Reusable authentication guard. Include this at the top of any protected page.
 *
 * Usage:
 *   $required_role = 'admin';   // 'admin' | 'restaurant' | 'delivery' | 'customer'
 *   require_once 'auth_check.php';
 *
 * After inclusion, the following variables are available:
 *   $auth_user_id   – session user ID
 *   $auth_role      – session role string
 *   $auth_name      – session display name (HTML-escaped)
 */

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Determine which role is required (caller must set $required_role before including)
if (!isset($required_role)) {
    $required_role = 'customer'; // safest default
}

// Check login state
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php?role=' . urlencode($required_role) . '&error=auth_required');
    exit;
}

// Check role match
if ($_SESSION['role'] !== $required_role) {
    // Redirect to the correct portal for their actual role, not a blank page
    $role_pages = [
        'admin'      => 'admin-dashboard.php',
        'restaurant' => 'restaurant-dashboard.php',
        'delivery'   => 'delivery-dashboard.php',
        'customer'   => 'dashboard.php',
    ];
    $actual_role = $_SESSION['role'] ?? 'customer';
    $redirect    = $role_pages[$actual_role] ?? 'index.php';
    header('Location: ' . $redirect . '?error=wrong_portal');
    exit;
}

// Expose clean variables to the including page
$auth_user_id = $_SESSION['user_id'];
$auth_role    = $_SESSION['role'];
$auth_name    = htmlspecialchars($_SESSION['name'] ?? 'User');
?>
