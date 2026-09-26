<?php
// reset_password.php – Page to actually set a new password using the token
$token = $_GET['token'] ?? '';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Reset Password</title>
    <link rel="stylesheet" href="css/style.css?v=2.2">
</head>
<body class="glass-panel">
    <h2>Reset Your Password</h2>
    <?php if (!$token): ?>
        <p class="text-danger">Invalid or missing reset token.</p>
    <?php else: ?>
        <form id="resetForm">
            <input type="hidden" name="token" value="<?=htmlspecialchars($token)?>">
            <div class="mb-3">
                <label for="password">New Password</label>
                <input type="password" name="password" id="password" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Change Password</button>
        </form>
        <div id="msg" style="margin-top:1rem;"></div>
        <script>
            document.getElementById('resetForm').addEventListener('submit', async e => {
                e.preventDefault();
                const form = e.target;
                const data = new FormData(form);
                const res = await fetch('api/password_reset.php?action=reset', {
                    method: 'POST',
                    body: data
                });
                const json = await res.json();
                const msg = document.getElementById('msg');
                msg.textContent = json.message;
                msg.style.color = json.success ? 'green' : 'red';
                if (json.success) {
                    form.reset();
                }
            });
        </script>
    <?php endif; ?>
</body>
</html>
