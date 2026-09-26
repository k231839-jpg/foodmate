<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Sign in or create your Food Mate account to start ordering delicious food.">
  <title>Food Mate — Sign In / Register</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
  <link href="css/style.css?v=2.2" rel="stylesheet">
</head>
<body>

  <div class="auth-page">
    <!-- Left: Image Side -->
    <div class="auth-image-side">
      <img src="https://images.unsplash.com/photo-1504674900247-0877df9cc836?w=900&h=1200&fit=crop" alt="Delicious food spread">
      <div class="overlay"></div>
      <div style="position:absolute; bottom:3rem; left:3rem; right:3rem; z-index:2;">
        <span class="badge bg-warning text-dark mb-2 px-3 py-2 fw-semibold">Zero Service Fees</span>
        <h2 style="font-weight:800; font-size:2.2rem; margin-bottom:0.5rem;">Discover Melbourne's Best Food</h2>
        <p style="color:rgba(255,255,255,0.8); font-size:1rem;">Join Food Mate to browse local restaurants, track orders live, or manage your restaurant & delivery operations.</p>
      </div>
    </div>

    <!-- Right: Form Side -->
    <div class="auth-form-side">
      <div class="auth-form-container">
        <!-- Brand -->
        <div class="brand-logo text-center mb-4">
          <a href="index.php" class="navbar-brand-custom justify-content-center text-white" style="font-size:2rem;">
            <i class="bi bi-egg-fried" style="color:var(--primary-color)"></i> Food <span>Mate</span>
          </a>
        </div>

        <!-- Mode Toggle Tabs -->
        <div class="d-flex bg-dark rounded-pill p-1 mb-4 border border-secondary">
          <button class="btn w-50 rounded-pill text-white fw-bold py-2" id="tabSignInBtn" onclick="switchAuthTab('signin')" style="background:var(--primary-color)">Sign In</button>
          <button class="btn w-50 rounded-pill text-secondary fw-bold py-2" id="tabRegisterBtn" onclick="switchAuthTab('register')">Register</button>
        </div>

        <!-- Sign In Card -->
        <div class="auth-card" id="loginCard">
          <h2>Welcome Back</h2>
          <p class="text-secondary small mb-4">Select your role to sign into your Food Mate portal</p>
          <form id="loginForm" onsubmit="handleLogin(event)">
            <div class="mb-3">
              <label class="form-label-dark text-white">Login Role:</label>
              <select class="form-select form-control-dark bg-dark text-white border-secondary" id="loginRole">
                <option value="customer">Customer (Order & Track)</option>
                <option value="restaurant">Restaurant Partner (Manage Menu & Orders)</option>
                <option value="delivery">Delivery Partner (Manage Assignments)</option>
                <option value="admin">System Administrator (Global Oversight)</option>
              </select>
            </div>
            <div class="mb-3">
              <label class="form-label-dark text-white">Email Address</label>
              <input type="email" class="form-control form-control-dark bg-dark text-white border-secondary" placeholder="user@foodmate.com.au" id="loginEmail" required>
            </div>
            <div class="mb-3">
              <div class="d-flex justify-content-between align-items-center">
                <label class="form-label-dark text-white">Password</label>
                <a href="#" class="small text-info text-decoration-none" data-bs-toggle="modal" data-bs-target="#forgotPasswordModal">Forgot Password?</a>
              </div>
              <input type="password" class="form-control form-control-dark bg-dark text-white border-secondary" placeholder="••••••••" id="loginPassword" required>
            </div>
            <div class="form-check mb-4">
              <input class="form-check-input bg-dark border-secondary" type="checkbox" id="rememberMe" checked>
              <label class="form-check-label small text-secondary" for="rememberMe">Remember login details</label>
            </div>
            <button type="submit" class="btn btn-primary-custom w-100 py-2 fs-6">
              <i class="bi bi-box-arrow-in-right me-2"></i>Sign In to Account
            </button>
          </form>

          <div class="divider-text">or sign in with</div>

          <div class="social-login">
            <button class="btn"><i class="bi bi-google text-danger me-1"></i> Google</button>
            <button class="btn"><i class="bi bi-facebook text-primary me-1"></i> Facebook</button>
          </div>
        </div>

        <!-- Register Card (hidden initially) -->
        <div class="auth-card" id="registerCard" style="display:none;">
          <h2>Create Account</h2>
          <p class="text-secondary small mb-3">Choose your user classification to register</p>
          <form id="registerForm" onsubmit="handleRegister(event)">
            <div class="mb-3">
              <label class="form-label-dark text-white">I am registering as a:</label>
              <div class="role-selector">
                <div class="role-option">
                  <input type="radio" name="userRole" id="roleCustomer" value="customer" checked>
                  <label for="roleCustomer"><i class="bi bi-person me-1"></i>Customer</label>
                </div>
                <div class="role-option">
                  <input type="radio" name="userRole" id="roleRestaurant" value="restaurant">
                  <label for="roleRestaurant"><i class="bi bi-shop me-1"></i>Restaurant</label>
                </div>
                <div class="role-option">
                  <input type="radio" name="userRole" id="roleDelivery" value="delivery">
                  <label for="roleDelivery"><i class="bi bi-bicycle me-1"></i>Delivery</label>
                </div>
                <div class="role-option">
                  <input type="radio" name="userRole" id="roleAdmin" value="admin">
                  <label for="roleAdmin"><i class="bi bi-shield-lock me-1"></i>Admin</label>
                </div>
              </div>
            </div>
            <div class="mb-2">
              <input type="text" class="form-control form-control-dark bg-dark text-white border-secondary" placeholder="Full Name / Business Name" id="regName" required>
            </div>
            <div class="mb-2">
              <input type="email" class="form-control form-control-dark bg-dark text-white border-secondary" placeholder="Email address" id="regEmail" required>
            </div>
            <div class="mb-2">
              <input type="tel" class="form-control form-control-dark bg-dark text-white border-secondary" placeholder="Phone number" id="regPhone" required>
            </div>
            <div class="mb-3">
              <input type="password" class="form-control form-control-dark bg-dark text-white border-secondary" placeholder="Create password (min 6 chars)" id="regPassword" required minlength="6">
            </div>
            <div class="form-check mb-3">
              <input class="form-check-input bg-dark border-secondary" type="checkbox" id="agreeTerms" required>
              <label class="form-check-label small text-secondary" for="agreeTerms">
                I agree to the <a href="privacy-terms.php" class="text-info">Terms of Service</a> & <a href="privacy-terms.php" class="text-info">Privacy Policy</a>
              </label>
            </div>
            <button type="submit" class="btn btn-primary-custom w-100 py-2">
              <i class="bi bi-person-plus me-2"></i>Complete Registration
            </button>
          </form>
        </div>

      </div>
    </div>
  </div>

  <!-- Password Reset Modal -->
  <div class="modal fade" id="forgotPasswordModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content bg-dark text-white border-secondary">
        <div class="modal-header border-secondary">
          <h5 class="modal-title"><i class="bi bi-key me-2 text-warning"></i>Reset Password (LL FR 1.3)</h5>
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          <p class="text-secondary small">Enter your registered email address. We will send you a secure 6-digit verification code to reset your password.</p>
          <div class="mb-3">
            <label class="form-label text-white">Registered Email</label>
            <input type="email" class="form-control bg-secondary text-white border-secondary" id="resetEmailInput" placeholder="user@foodmate.com.au">
          </div>
        </div>
        <div class="modal-footer border-secondary">
          <button type="button" class="btn btn-outline-light" data-bs-dismiss="modal">Cancel</button>
          <button type="button" class="btn btn-primary-custom" onclick="sendPasswordReset()">Send Reset Link</button>
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="js/app.js?v=2.2"></script>
  <script>
    function switchAuthTab(mode) {
      const loginCard = document.getElementById('loginCard');
      const registerCard = document.getElementById('registerCard');
      const tabSignInBtn = document.getElementById('tabSignInBtn');
      const tabRegisterBtn = document.getElementById('tabRegisterBtn');

      if (mode === 'register') {
        loginCard.style.display = 'none';
        registerCard.style.display = 'block';
        tabSignInBtn.style.background = 'transparent';
        tabSignInBtn.classList.replace('text-white', 'text-secondary');
        tabRegisterBtn.style.background = 'var(--primary-color)';
        tabRegisterBtn.classList.replace('text-secondary', 'text-white');
      } else {
        loginCard.style.display = 'block';
        registerCard.style.display = 'none';
        tabRegisterBtn.style.background = 'transparent';
        tabRegisterBtn.classList.replace('text-white', 'text-secondary');
        tabSignInBtn.style.background = 'var(--primary-color)';
        tabSignInBtn.classList.replace('text-secondary', 'text-white');
      }
    }

    async function handleLogin(e) {
      e.preventDefault();
      const role     = document.getElementById('loginRole').value;
      const email    = document.getElementById('loginEmail').value;
      const password = document.getElementById('loginPassword').value;

      const btn = e.target.querySelector('button[type="submit"]');
      btn.disabled = true;
      btn.innerHTML = '<span class="spinner-border spinner-border-sm me-2"></span>Signing in...';

      try {
        const formData = new FormData();
        formData.append('role', role);
        formData.append('email', email);
        formData.append('password', password);

        const res  = await fetch('api/auth.php?action=login', { method: 'POST', body: formData });
        const data = await res.json();

        if (data.success) {
          showToast(`Logged in successfully as ${role.toUpperCase()}!`, 'success');
          setTimeout(() => { window.location.href = data.redirect; }, 800);
        } else {
          showToast(data.message || 'Invalid credentials. Please try again.', 'error');
          btn.disabled = false;
          btn.innerHTML = '<i class="bi bi-box-arrow-in-right me-2"></i>Sign In to Account';
        }
      } catch (err) {
        showToast('Connection error. Please try again.', 'error');
        btn.disabled = false;
        btn.innerHTML = '<i class="bi bi-box-arrow-in-right me-2"></i>Sign In to Account';
      }
    }

    async function handleRegister(e) {
      e.preventDefault();
      const role     = document.querySelector('input[name="userRole"]:checked').value;
      const name     = document.getElementById('regName').value;
      const email    = document.getElementById('regEmail').value;
      const password = document.getElementById('regPassword').value;

      const btn = e.target.querySelector('button[type="submit"]');
      btn.disabled = true;
      btn.innerHTML = '<span class="spinner-border spinner-border-sm me-2"></span>Creating account...';

      try {
        const formData = new FormData();
        formData.append('role', role);
        formData.append('name', name);
        formData.append('email', email);
        formData.append('password', password);

        const res  = await fetch('api/auth.php?action=register', { method: 'POST', body: formData });
        const data = await res.json();

        if (data.success) {
          showToast('Account created! Please sign in.', 'success');
          setTimeout(() => switchAuthTab('signin'), 1200);
        } else {
          showToast(data.message || 'Registration failed.', 'error');
        }
      } catch (err) {
        showToast('Connection error. Please try again.', 'error');
      } finally {
        btn.disabled = false;
        btn.innerHTML = '<i class="bi bi-person-plus me-2"></i>Complete Registration';
      }
    }

    function sendPasswordReset() {
      const email = document.getElementById('resetEmailInput').value;
      if (!email) {
        showToast('Please enter your email address!', 'warning');
        return;
      }
      const modalEl = document.getElementById('forgotPasswordModal');
      const modal = bootstrap.Modal.getInstance(modalEl);
      if (modal) modal.hide();
      showToast(`Verification code sent to ${email}! Check your inbox.`, 'success');
    }
  </script>
</body>
</html>
