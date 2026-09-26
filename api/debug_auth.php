<?php
// TEMPORARY DEBUG SCRIPT - DELETE AFTER USE
require_once 'config.php';

$tables = [
    'ADMIN'            => ['id' => 'AdminID',      'label' => 'Admin'],
    'RESTAURANT'       => ['id' => 'RestaurantID', 'label' => 'Restaurant'],
    'DELIVERY_PARTNER' => ['id' => 'PartnerID',    'label' => 'Delivery'],
    'CUSTOMER'         => ['id' => 'CustomerID',   'label' => 'Customer'],
];

header('Content-Type: text/plain');

foreach ($tables as $table => $meta) {
    echo "=== {$meta['label']} ({$table}) ===\n";

    // Show columns
    try {
        $cols = $pdo->query("DESCRIBE `$table`")->fetchAll(PDO::FETCH_ASSOC);
        echo "Columns: " . implode(', ', array_column($cols, 'Field')) . "\n";
    } catch (Exception $e) {
        echo "ERROR describing table: " . $e->getMessage() . "\n";
        continue;
    }

    // Show rows (hide real passwords)
    try {
        $rows = $pdo->query("SELECT * FROM `$table` LIMIT 5")->fetchAll(PDO::FETCH_ASSOC);
        foreach ($rows as $row) {
            foreach ($row as $k => $v) {
                if (stripos($k, 'password') !== false) {
                    $row[$k] = substr($v, 0, 7) . '... (len=' . strlen($v) . ')';
                }
            }
            echo "  Row: " . json_encode($row) . "\n";
        }
    } catch (Exception $e) {
        echo "ERROR fetching rows: " . $e->getMessage() . "\n";
    }

    // Test password_verify for a known test password
    $testPasswords = ['admin123', 'restaurant123', 'driver123', 'customer123', 'password123', 'cpro306'];
    try {
        $rows = $pdo->query("SELECT * FROM `$table` LIMIT 3")->fetchAll(PDO::FETCH_ASSOC);
        foreach ($rows as $row) {
            $hashField = null;
            foreach (array_keys($row) as $k) {
                if (stripos($k, 'password') !== false) { $hashField = $k; break; }
            }
            if ($hashField) {
                echo "  Testing passwords against hash for first user:\n";
                foreach ($testPasswords as $tp) {
                    $ok = password_verify($tp, $row[$hashField]) ? 'YES' : 'no';
                    echo "    '$tp' => $ok\n";
                }
                // Also check if it's plaintext match
                foreach ($testPasswords as $tp) {
                    if ($tp === $row[$hashField]) echo "    PLAINTEXT MATCH: '$tp'\n";
                }
            }
            break; // just first row
        }
    } catch (Exception $e) {
        echo "  ERROR testing passwords: " . $e->getMessage() . "\n";
    }

    echo "\n";
}
?>
