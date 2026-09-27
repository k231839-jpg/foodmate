<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Food Mate ΓÇö Melbourne's premium zero-service-fee food delivery platform. Order from top local restaurants.">
  <title>Food Mate ΓÇö Zero Service Fee Food Delivery</title>
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
        <a href="index.php" class="active"><i class="bi bi-person me-1"></i> Customer</a>
        <a href="restaurant-dashboard.php"><i class="bi bi-shop me-1"></i> Restaurant Partner</a>
        <a href="delivery-dashboard.php"><i class="bi bi-bicycle me-1"></i> Delivery Partner</a>
        <a href="admin-dashboard.php"><i class="bi bi-shield-lock me-1"></i> System Admin</a>
      </div>
    </div>
  </div>

  <!-- Announcement Bar -->
  <div class="announcement-bar">
    <i class="bi bi-gift-fill me-2"></i> Save money on every order with <strong>$0 Service Fees</strong> & exclusive local deals!
  </div>

  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-foodmate sticky-top" id="mainNav">
    <div class="container">
      <a class="navbar-brand navbar-brand-custom" href="index.php">
        <i class="bi bi-egg-fried"></i> Food Mate
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarContent">
        <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
          <li class="nav-item"><a class="nav-link active" href="index.php">Home</a></li>
          <li class="nav-item"><a class="nav-link" href="restaurants.php">Restaurants</a></li>
          <li class="nav-item"><a class="nav-link" href="track-order.php">Track Order</a></li>
          <li class="nav-item"><a class="nav-link" href="dashboard.php">My Account</a></li>
        </ul>
        <div class="d-flex align-items-center gap-3">
          <a href="login.php" class="btn btn-signin">Sign In</a>
          <a href="checkout.php" class="btn btn-primary-custom text-decoration-none position-relative">
            <i class="bi bi-cart3 me-1"></i> Cart
            <span class="cart-count" style="position:absolute; top:-6px; right:-6px; display:none;">0</span>
          </a>
        </div>
      </div>
    </div>
  </nav>

  <!-- Hero Section -->
  <header class="hero-section text-center">
    <div class="container">
      <div class="row align-items-center justify-content-center">
        <div class="col-lg-9">
          <span class="badge rounded-pill bg-warning text-dark px-3 py-2 fw-semibold mb-3">
            <i class="bi bi-stars me-1"></i> Melbourne's Favorite Food Network
          </span>
          <h1 class="hero-title">Your favorite food, <span>delivered fast with $0 service fees.</span></h1>
          <p class="hero-subtitle">Support local restaurants directly. Same meal, same restaurant, better deal.</p>
          
          <div class="glass-panel p-3 d-flex align-items-center mx-auto shadow-lg" style="max-width: 650px; border-radius: 50px;">
            <i class="bi bi-geo-alt-fill text-danger fs-4 ms-2 me-3"></i>
            <input type="text" class="form-control border-0 bg-transparent fs-5" placeholder="Enter your delivery address in Melbourne..." id="heroAddressInput">
            <a href="restaurants.php" class="btn-primary-custom text-decoration-none ms-2 text-nowrap py-3 px-4" style="border-radius: 40px;">
              <i class="bi bi-search me-1"></i> Find Food
            </a>
          </div>

          <div class="mt-4 d-flex justify-content-center gap-4 text-muted small fw-medium flex-wrap">
            <span><i class="bi bi-check-circle-fill text-success me-1"></i> No Hidden Fees</span>
            <span><i class="bi bi-check-circle-fill text-success me-1"></i> Verified Local Chefs</span>
            <span><i class="bi bi-check-circle-fill text-success me-1"></i> Live Order Tracking</span>
          </div>
        </div>
      </div>
    </div>
  </header>

  <!-- Categories -->
  <section class="py-5">
    <div class="container">
      <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="mb-0">Browse by Category</h3>
        <a href="restaurants.php" class="text-decoration-none fw-bold" style="color: var(--primary-color)">All Cuisines <i class="bi bi-arrow-right"></i></a>
      </div>
      <div class="d-flex flex-wrap gap-3">
        <a href="restaurants.php?filter=all" class="filter-pill active text-decoration-none"><i class="bi bi-star-fill text-warning me-1"></i> All Top Rated</a>
        <a href="restaurants.php?filter=italian" class="filter-pill text-decoration-none">≡ƒìò Italian & Pizza</a>
        <a href="restaurants.php?filter=american" class="filter-pill text-decoration-none">≡ƒìö Gourmet Burgers</a>
        <a href="restaurants.php?filter=japanese" class="filter-pill text-decoration-none">≡ƒìú Japanese & Sushi</a>
        <a href="restaurants.php?filter=indian" class="filter-pill text-decoration-none">≡ƒì¢ Indian Curry</a>
        <a href="restaurants.php?filter=mexican" class="filter-pill text-decoration-none">≡ƒî« Mexican Tacos</a>
      </div>
    </div>
  </section>

  <!-- Featured Restaurants -->
  <section class="py-5 bg-white">
    <div class="container">
      <div class="d-flex justify-content-between align-items-end mb-4">
        <div>
          <h2 class="mb-1">Featured Local Restaurants</h2>
          <p class="text-muted mb-0">Commission-free partners offering exclusive discounts</p>
        </div>
        <a href="restaurants.php" class="btn btn-outline-custom text-decoration-none">View All Restaurants</a>
      </div>
      <div class="row g-4" id="indexFeaturedGrid">
        <!-- Rendered dynamically -->
      </div>
    </div>
  </section>

  <!-- Value Proposition / How It Works -->
  <section class="py-5 bg-light text-center">
    <div class="container py-4">
      <h2 class="mb-2">How Food Mate Works</h2>
      <p class="text-muted mb-5">Simple 3-step ordering process designed to save you money</p>

      <div class="row g-4">
        <div class="col-md-4">
          <div class="card-dark h-100 p-4">
            <div class="stat-icon primary mx-auto mb-3" style="width: 70px; height: 70px; font-size: 1.8rem;"><i class="bi bi-search"></i></div>
            <h4>1. Browse & Choose</h4>
            <p class="text-muted mb-0">Explore hundreds of local menus without inflated menu prices or service fees.</p>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card-dark h-100 p-4">
            <div class="stat-icon warning mx-auto mb-3" style="width: 70px; height: 70px; font-size: 1.8rem;"><i class="bi bi-cart-check"></i></div>
            <h4>2. Secure Checkout</h4>
            <p class="text-muted mb-0">Pay seamlessly with Cash on Delivery, Card, or PayPal. Apply promo codes for instant savings.</p>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card-dark h-100 p-4">
            <div class="stat-icon success mx-auto mb-3" style="width: 70px; height: 70px; font-size: 1.8rem;"><i class="bi bi-bicycle"></i></div>
            <h4>3. Track Real-Time</h4>
            <p class="text-muted mb-0">Follow your delivery step-by-step from kitchen preparation to your door.</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Footer -->
  <footer class="footer">
    <div class="container">
      <div class="row g-4">
        <div class="col-md-4">
          <a class="footer-brand" href="index.php"><i class="bi bi-egg-fried"></i> Food Mate</a>
          <p class="text-white-50 small">Melbourne's premier online food delivery network connecting local restaurants directly with customers without high commissions or hidden service fees.</p>
        </div>
        <div class="col-md-3">
          <h6 class="fw-bold text-white mb-3">Quick Links</h6>
          <ul class="footer-links">
            <li><a href="restaurants.php">Browse Restaurants</a></li>
            <li><a href="track-order.php">Track Order Status</a></li>
            <li><a href="login.php">Sign In / Register</a></li>
            <li><a href="privacy-terms.php">Privacy Policy & Terms</a></li>
          </ul>
        </div>
        <div class="col-md-3">
          <h6 class="fw-bold text-white mb-3">Partner Portals</h6>
          <ul class="footer-links">
            <li><a href="restaurant-dashboard.php">Restaurant Dashboard</a></li>
            <li><a href="delivery-dashboard.php">Delivery Driver Portal</a></li>
            <li><a href="admin-dashboard.php">System Admin Dashboard</a></li>
          </ul>
        </div>
        <div class="col-md-2">
          <h6 class="fw-bold text-white mb-3">Contact Support</h6>
          <p class="text-white-50 small mb-1"><i class="bi bi-envelope me-1"></i> support@foodmate.com.au</p>
          <p class="text-white-50 small"><i class="bi bi-geo-alt me-1"></i> Melbourne, VIC 3000</p>
        </div>
      </div>
      <div class="footer-bottom text-center">
        <p class="mb-0">&copy; 2026 Food Mate Project (T2 2026). All rights reserved.</p>
      </div>
    </div>
  </footer>

  <!-- Floating Cart -->
  <div class="cart-floating">
    <a href="checkout.php">
      <button class="cart-btn" title="View Cart">
        <i class="bi bi-cart3"></i>
        <span class="cart-count" style="display:none;">0</span>
      </button>
    </a>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="js/app.js"></script>
  <script>
    document.addEventListener('DOMContentLoaded', () => {
      const grid = document.getElementById('indexFeaturedGrid');
      if (grid && typeof RESTAURANTS !== 'undefined') {
        grid.innerHTML = RESTAURANTS.map(r => `
          <div class="col-md-4">
            <a href="restaurant-detail.php?id=${r.id}" class="text-decoration-none">
              <div class="restaurant-card">
                <div class="card-img-wrapper">
                  <img src="${r.image}" alt="${r.name}">
                  <div class="rating-badge"><i class="bi bi-star-fill"></i> ${r.rating}</div>
                  <div class="delivery-time"><i class="bi bi-clock me-1"></i>${r.deliveryTime}</div>
                </div>
                <div class="p-3">
                  <h5 class="text-dark mb-1">${r.name}</h5>
                  <p class="text-muted mb-1" style="font-size:0.88rem;">${r.cuisine} ΓÇó $${r.deliveryFee.toFixed(2)} delivery</p>
                  <small style="color:var(--text-muted)"><i class="bi bi-geo-alt me-1"></i>${r.address}</small>
                </div>
              </div>
            </a>
          </div>
        `).join('');
      }
    });
  </script>
</body>
</html>

