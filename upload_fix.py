import paramiko
import io

host = 'mehedihasan.au'
port = 2222
username = 'mehedih3_cpro306_g10'
password = 'cpro306'

# PHP script to check AND fix all passwords
fix_script = """<?php
require_once __DIR__ . '/../api/config.php';
header('Content-Type: text/plain');

$accounts = [
    ['table' => 'ADMIN',            'idField' => 'AdminID',      'email' => 'admin@foodmate.com.au',            'newpass' => 'admin123'],
    ['table' => 'RESTAURANT',       'idField' => 'RestaurantID', 'email' => 'luigi@luigispizzeria.com.au',      'newpass' => 'restaurant123'],
    ['table' => 'DELIVERY_PARTNER', 'idField' => 'PartnerID',    'email' => 'michael.chang@foodmate.com.au',    'newpass' => 'driver123'],
    ['table' => 'CUSTOMER',         'idField' => 'CustomerID',   'email' => 'alex.johnson@example.com',         'newpass' => 'customer123'],
];

foreach ($accounts as $acc) {
    $table   = $acc['table'];
    $idField = $acc['idField'];
    $email   = $acc['email'];
    $newpass = $acc['newpass'];

    // Check columns
    try {
        $cols = $pdo->query("DESCRIBE `$table`")->fetchAll(PDO::FETCH_COLUMN, 0);
        echo "=== $table ===\\n";
        echo "Columns: " . implode(', ', $cols) . "\\n";
    } catch (Exception $e) {
        echo "ERROR describing $table: " . $e->getMessage() . "\\n\\n";
        continue;
    }

    // Find the user
    $stmt = $pdo->prepare("SELECT * FROM `$table` WHERE Email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch();

    if (!$user) {
        echo "User NOT FOUND: $email\\n";
        echo "Attempting to INSERT user...\\n";
        $newHash = password_hash($newpass, PASSWORD_DEFAULT);
        
        // Basic insert, we might need a Name column depending on table
        $name = '';
        if ($table === 'ADMIN') $name = 'Admin User';
        if ($table === 'RESTAURANT') $name = 'Luigi Pizzeria';
        if ($table === 'DELIVERY_PARTNER') $name = 'Michael Chang';
        if ($table === 'CUSTOMER') $name = 'Alex Johnson';
        
        try {
            $insert = $pdo->prepare("INSERT INTO `$table` (Name, Email, PasswordHash) VALUES (?, ?, ?)");
            $insert->execute([$name, $email, $newHash]);
            echo "Successfully INSERTED $email\\n\\n";
        } catch (Exception $e) {
            echo "INSERT FAILED: " . $e->getMessage() . "\\n\\n";
        }
        continue;
    }

    echo "Found user: " . $user['Name'] . " <$email>\\n";
    $hashField = isset($user['PasswordHash']) ? 'PasswordHash' : 'Password';
    $currentHash = $user[$hashField] ?? '';
    echo "Current hash prefix: " . substr($currentHash, 0, 20) . " (len=" . strlen($currentHash) . ")\\n";

    // Test if newpass already works
    if (password_verify($newpass, $currentHash)) {
        echo "Password '$newpass' ALREADY WORKS - no update needed\\n";
    } else {
        // Reset it
        $newHash = password_hash($newpass, PASSWORD_DEFAULT);
        $upd = $pdo->prepare("UPDATE `$table` SET `$hashField` = ? WHERE Email = ?");
        $upd->execute([$newHash, $email]);
        echo "Password RESET to '$newpass' (hash: " . substr($newHash, 0, 20) . "...)\\n";
    }
    echo "\\n";
}
echo "Done.\\n";
?>
"""

transport = paramiko.Transport((host, port))
transport.connect(username=username, password=password)
sftp = paramiko.SFTPClient.from_transport(transport)

# Upload to current directory
with sftp.open('./fix_passwords.php', 'w') as f:
    f.write(fix_script.encode())

print("Uploaded fix_passwords.php to public_html/")
sftp.close()
transport.close()
