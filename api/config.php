<?php
$host = 'localhost'; // Usually localhost when running on the server
$db   = 'mehedih3_cpro306_g10';
$user = 'mehedih3_cpro306_g10';
$pass = 'cpro306';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
    // In production, log the error rather than echoing it directly
    die(json_encode(['error' => 'Database connection failed']));
}
?>
