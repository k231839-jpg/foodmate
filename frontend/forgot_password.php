<?php
// forgot_password.php – Page to request a password‑reset link
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Forgot Password</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body class="glass-panel">
    <h2>Forgot Your Password?</h2>
    <p>Enter the e‑mail address you used when registering. We’ll send you a link to reset your password.</p>
    <form id="requestForm">
        <div class="mb-3">
            <label for="email">E‑mail</label>
            <input type="email" name="email" id="email" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Send Reset Link</button>
    </form>
    <div id="msg" style="margin-top:1rem;"></div>

    <script>
        document.getElementById('requestForm').addEventListener('submit', async e => {
            e.preventDefault();
            const form = e.target;
            const data = new FormData(form);
            const res = await fetch('api/password_reset.php?action=request', {
                method: 'POST',
                body: data
            });
            const json = await res.json();
            const msg = document.getElementById('msg');
            msg.textContent = json.message;
            msg.style.color = json.success ? 'green' : 'red';
            if (json.success && json.reset_link) {
                // For testing we show the link directly
                const link = document.createElement('a');
                link.href = json.reset_link;
                link.textContent = 'Reset Password (test link)';
                link.target = '_blank';
                msg.appendChild(document.createElement('br'));
                msg.appendChild(link);
            }
        });
    </script>
</body>
</html>
