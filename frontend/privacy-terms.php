<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Food Mate — Terms of Service, Privacy Policy, DPIA Framework & Cybersecurity Compliance.">
  <title>Food Mate — Privacy Policy & Terms of Service</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet">
</head>
<body>

  <!-- Demo Role Simulator Bar -->
  <div class="role-demo-bar text-center">
    <div class="container d-flex justify-content-between align-items-center flex-wrap">
      <span><i class="bi bi-person-badge-fill me-1" style="color:#38bdf8"></i> <strong>Role Switcher (LL FR Demo):</strong></span>
      <div class="d-flex gap-2">
        <a href="index.php"><i class="bi bi-person me-1"></i> Customer</a>
        <a href="restaurant-dashboard.php"><i class="bi bi-shop me-1"></i> Restaurant Partner</a>
        <a href="delivery-dashboard.php"><i class="bi bi-bicycle me-1"></i> Delivery Partner</a>
        <a href="admin-dashboard.php"><i class="bi bi-shield-lock me-1"></i> System Admin</a>
      </div>
    </div>
  </div>

  <!-- NAVBAR -->
  <nav class="navbar navbar-expand-lg navbar-foodmate sticky-top" id="mainNav">
    <div class="container">
      <a class="navbar-brand navbar-brand-custom" href="index.php">
        <i class="bi bi-egg-fried brand-icon"></i> Food Mate
      </a>
      <div class="d-flex align-items-center gap-3">
        <a href="index.php" class="nav-link"><i class="bi bi-arrow-left me-1"></i> Back to Home</a>
      </div>
    </div>
  </nav>

  <div class="container py-5" style="max-width: 900px;">
    <div class="card-dark p-5">
      <div class="text-center mb-5">
        <span class="badge bg-success px-3 py-2 fs-6 mb-2"><i class="bi bi-shield-check me-1"></i> Cybersecurity & Compliance</span>
        <h1 class="fw-bold">Privacy Policy & Terms of Service</h1>
        <p class="text-muted">Food Mate Online Food Delivery System — Melbourne (T2 2026 Specification)</p>
      </div>

      <!-- Section 1: Privacy Policy -->
      <section class="mb-5">
        <h3 class="fw-bold text-dark border-bottom pb-2 mb-3"><i class="bi bi-lock me-2 text-primary"></i>1. Privacy Policy & Data Security (LL NFR 5.3)</h3>
        <p class="text-secondary">Food Mate is committed to safeguarding customer and partner data. We enforce strict technical and organizational controls to protect personal information against unauthorized access, loss, or disclosure.</p>
        <ul class="text-secondary">
          <li><strong>Data Encryption:</strong> All sensitive credentials (passwords) are hashed using strong cryptographic algorithms (bcrypt/Argon2). Payment details and tokens are encrypted at rest using AES-256 standards.</li>
          <li><strong>Secure Communications:</strong> 100% of data transmitted between the client browser and Food Mate servers is secured over Transport Layer Security (TLS / HTTPS).</li>
          <li><strong>Input Sanitization & Vulnerability Mitigation:</strong> All backend PDO database queries utilize prepared statements to prevent SQL Injection (SQLi), and all rendered user inputs undergo strict HTML escaping to prevent Cross-Site Scripting (XSS).</li>
        </ul>
      </section>

      <!-- Section 2: DPIA & Compliance -->
      <section class="mb-5">
        <h3 class="fw-bold text-dark border-bottom pb-2 mb-3"><i class="bi bi-file-earmark-check me-2 text-success"></i>2. Data Protection Impact Assessment (DPIA)</h3>
        <p class="text-secondary">Per the Food Mate project specification, a comprehensive DPIA framework has been conducted to facilitate a privacy-by-design approach:</p>
        <div class="p-3 bg-light rounded border border-success mb-3">
          <h6 class="fw-bold text-success mb-1"><i class="bi bi-check-circle-fill me-1"></i> Data Anonymization Protocol</h6>
          <p class="small text-muted mb-0">When exporting analytical reports or telemetry for business intelligence, all Personally Identifiable Information (PII) such as customer names, phone numbers, and full addresses are automatically masked or anonymized.</p>
        </div>
      </section>

      <!-- Section 3: Terms of Service -->
      <section class="mb-5">
        <h3 class="fw-bold text-dark border-bottom pb-2 mb-3"><i class="bi bi-journal-text me-2 text-warning"></i>3. Terms of Service & Business Rules</h3>
        <ol class="text-secondary">
          <li><strong>Zero Customer Service Fee Policy:</strong> Food Mate does not charge customers an added service fee for placing orders on our portal.</li>
          <li><strong>Role-Based Access:</strong> Access to specific dashboard modules (Customer, Restaurant, Delivery, Admin) is strictly enforced via Role-Based Access Control (RBAC).</li>
          <li><strong>Dispute Resolution & Refunds:</strong> Order cancellations prior to driver pickup qualify for 100% immediate refund processing via our system admin oversight panel.</li>
        </ol>
      </section>

      <div class="text-center border-top pt-4">
        <a href="index.php" class="btn btn-primary-custom px-5 py-2">Return to Food Mate Homepage</a>
      </div>
    </div>
  </div>

  <!-- Footer -->
  <footer class="footer">
    <div class="container text-center">
      <p class="mb-0 text-white-50">&copy; 2026 Food Mate Project (T2 2026). All rights reserved.</p>
    </div>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="js/app.js"></script>
</body>
</html>
