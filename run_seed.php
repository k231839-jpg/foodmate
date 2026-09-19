<?php
require_once 'api/config.php';

$seedFile = __DIR__ . '/database/seed.sql';
if (!file_exists($seedFile)) {
    echo json_encode(['success' => false, 'message' => 'Seed file not found']);
    exit;
}

$sql = file_get_contents($seedFile);
// Remove comments and split by semicolon
$statements = array_filter(array_map('trim', explode(';', $sql)));
$pdo->beginTransaction();
try {
    foreach ($statements as $stmt) {
        if ($stmt) {
            $pdo->exec($stmt);
        }
    }
    $pdo->commit();
    echo json_encode(['success' => true, 'message' => 'Database seeded successfully']);
} catch (Exception $e) {
    $pdo->rollBack();
    echo json_encode(['success' => false, 'message' => $e->getMessage()]);
}
?>
