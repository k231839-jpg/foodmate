<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Food Mate ΓÇö Melbourne's premium zero-service-fee food delivery platform. Order from top local restaurants.">
  <title>Food Mate ΓÇö Zero Service Fee Food Delivery</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
  <link href="css/style.css?v=1.2" rel="stylesheet">
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
  <header class="hero-section text-start position-relative overflow-hidden">
    <div class="container position-relative" style="z-index: 2;">
      <div class="row align-items-center">
        <div class="col-lg-7 col-md-9">
          <span class="badge rounded-pill bg-warning text-dark px-3 py-2 fw-semibold mb-3 mt-4" style="animation: fadeIn 1s ease-out;">
            <i class="bi bi-stars me-1"></i> Melbourne's Favorite Food Network
          </span>
          <h1 class="hero-title" style="animation: fadeIn 1.2s ease-out;">Delicious Food<br><span class="highlight">Delivered</span> to You</h1>
          <p class="hero-subtitle mb-4" style="animation: fadeIn 1.3s ease-out; max-width: 500px; font-size: 1.15rem;">Discover amazing local restaurants, delicious meals and exclusive deals — with zero service fees.</p>
          
          <div class="bg-white p-2 d-flex align-items-center shadow-lg mb-4 position-relative" style="max-width: 600px; border-radius: 50px; animation: fadeIn 1.4s ease-out; z-index: 5;">
            <i class="bi bi-geo-alt text-muted fs-5 ms-3 me-2"></i>
            <input type="text" class="form-control border-0 bg-transparent shadow-none fs-5 py-2" placeholder="Enter your delivery address" id="heroAddressInput">
            <a href="restaurants.php" class="btn-primary-custom text-decoration-none ms-2 text-nowrap py-3 px-5 d-flex align-items-center" style="border-radius: 40px; font-weight: 600; font-size: 1.1rem; background: var(--primary-color);">
              Find Food <i class="bi bi-arrow-right ms-2"></i>
            </a>
          </div>

          <div class="mt-4 d-flex justify-content-start gap-4 text-white small fw-semibold flex-wrap" style="animation: fadeIn 1.6s ease-out; margin-bottom: 80px;">
            <div class="d-flex align-items-center">
              <div class="bg-transparent border border-warning text-warning rounded-circle d-flex align-items-center justify-content-center me-2" style="width: 32px; height: 32px;"><i class="bi bi-currency-dollar"></i></div>
              <div class="lh-sm">Zero<br><span class="text-white-50 fw-normal">service fees</span></div>
            </div>
            <div class="d-flex align-items-center">
              <div class="bg-transparent border border-warning text-warning rounded-circle d-flex align-items-center justify-content-center me-2" style="width: 32px; height: 32px;"><i class="bi bi-shop"></i></div>
              <div class="lh-sm">Local<br><span class="text-white-50 fw-normal">restaurants</span></div>
            </div>
            <div class="d-flex align-items-center">
              <div class="bg-transparent border border-warning text-warning rounded-circle d-flex align-items-center justify-content-center me-2" style="width: 32px; height: 32px;"><i class="bi bi-tags"></i></div>
              <div class="lh-sm">Exclusive<br><span class="text-white-50 fw-normal">deals</span></div>
            </div>
            <div class="d-flex align-items-center">
              <div class="bg-transparent border border-warning text-warning rounded-circle d-flex align-items-center justify-content-center me-2" style="width: 32px; height: 32px;"><i class="bi bi-bicycle"></i></div>
              <div class="lh-sm">Fast<br><span class="text-white-50 fw-normal">delivery</span></div>
            </div>
          </div>
        </div>
        <div class="col-lg-5 position-relative d-none d-lg-block">
          <!-- Hero Image -->
          <img src="img/hero_burger.jpg" alt="Hero Burger" class="img-fluid" style="transform: scale(1.6) translateX(15%); animation: fadeInRight 1.5s ease-out; pointer-events: none; mix-blend-mode: normal; -webkit-mask-image: radial-gradient(circle, black 60%, transparent 80%); mask-image: radial-gradient(circle, black 60%, transparent 80%);">
        </div>
      </div>
    </div>
  </header>

  <!-- Categories -->
  <section class="categories-section position-relative" style="margin-top: -60px; z-index: 10;">
    <div class="container">
      <div class="bg-white rounded-pill shadow-lg p-3 px-4 d-flex justify-content-between align-items-center category-scroll" style="overflow-x: auto; white-space: nowrap;">
        
        <a href="restaurants.php?filter=burgers" class="category-item text-center text-decoration-none active">
          <div class="cat-img-wrapper rounded-circle mx-auto mb-2 overflow-hidden" style="width: 70px; height: 70px; border: 2px solid transparent;">
            <img src="https://images.unsplash.com/photo-1568901346375-23c9450c58cd?auto=format&fit=crop&w=150&q=80" alt="Burgers" class="w-100 h-100 object-fit-cover">
          </div>
          <span class="fw-bold text-dark small">Burgers</span>
        </a>

        <a href="restaurants.php?filter=pizza" class="category-item text-center text-decoration-none">
          <div class="cat-img-wrapper rounded-circle mx-auto mb-2 overflow-hidden" style="width: 70px; height: 70px;">
            <img src="https://images.unsplash.com/photo-1513104890138-7c749659a591?auto=format&fit=crop&w=150&q=80" alt="Pizza" class="w-100 h-100 object-fit-cover">
          </div>
          <span class="fw-bold text-dark small">Pizza</span>
        </a>

        <a href="restaurants.php?filter=asian" class="category-item text-center text-decoration-none">
          <div class="cat-img-wrapper rounded-circle mx-auto mb-2 overflow-hidden" style="width: 70px; height: 70px;">
            <img src="https://images.unsplash.com/photo-1540189549336-e6e99c3679fe?auto=format&fit=crop&w=150&q=80" alt="Asian" class="w-100 h-100 object-fit-cover">
          </div>
          <span class="fw-bold text-dark small">Asian</span>
        </a>

        <a href="restaurants.php?filter=indian" class="category-item text-center text-decoration-none">
          <div class="cat-img-wrapper rounded-circle mx-auto mb-2 overflow-hidden" style="width: 70px; height: 70px;">
            <img src="https://images.unsplash.com/photo-1585937421612-70a008356fbe?auto=format&fit=crop&w=150&q=80" alt="Indian" class="w-100 h-100 object-fit-cover">
          </div>
          <span class="fw-bold text-dark small">Indian</span>
        </a>

        <a href="restaurants.php?filter=healthy" class="category-item text-center text-decoration-none">
          <div class="cat-img-wrapper rounded-circle mx-auto mb-2 overflow-hidden" style="width: 70px; height: 70px;">
            <img src="https://images.unsplash.com/photo-1512621776951-a57141f2eefd?auto=format&fit=crop&w=150&q=80" alt="Healthy" class="w-100 h-100 object-fit-cover">
          </div>
          <span class="fw-bold text-dark small">Healthy</span>
        </a>

        <a href="restaurants.php?filter=desserts" class="category-item text-center text-decoration-none">
          <div class="cat-img-wrapper rounded-circle mx-auto mb-2 overflow-hidden" style="width: 70px; height: 70px;">
            <img src="https://images.unsplash.com/photo-1551024601-bec78aea704b?auto=format&fit=crop&w=150&q=80" alt="Desserts" class="w-100 h-100 object-fit-cover">
          </div>
          <span class="fw-bold text-dark small">Desserts</span>
        </a>
        
        <a href="restaurants.php?filter=breakfast" class="category-item text-center text-decoration-none">
          <div class="cat-img-wrapper rounded-circle mx-auto mb-2 overflow-hidden" style="width: 70px; height: 70px;">
            <img src="https://images.unsplash.com/photo-1533089859705-ba39266ad815?auto=format&fit=crop&w=150&q=80" alt="Breakfast" class="w-100 h-100 object-fit-cover">
          </div>
          <span class="fw-bold text-dark small">Breakfast</span>
        </a>
        
        <a href="restaurants.php" class="category-item text-center text-decoration-none">
          <div class="cat-img-wrapper rounded-circle mx-auto mb-2 overflow-hidden bg-light d-flex align-items-center justify-content-center" style="width: 70px; height: 70px; border: 1px solid #e2e8f0;">
            <i class="bi bi-three-dots fs-3 text-muted"></i>
          </div>
          <span class="fw-bold text-dark small">More</span>
        </a>

      </div>
    </div>
  </section>
  
  <style>
    .category-scroll::-webkit-scrollbar { display: none; }
    .category-item { transition: transform 0.3s ease; padding: 10px 15px; border-radius: 20px; text-decoration: none; display: inline-block;}
    .category-item:hover { transform: translateY(-3px); }
    .category-item.active { background-color: var(--primary-color); }
    .category-item.active .text-dark { color: white !important; }
    .category-item.active .cat-img-wrapper { border-color: white !important; }
    .object-fit-cover { object-fit: cover; }
    
    .promo-banner {
      background: linear-gradient(135deg, #FF1A1A 0%, #FF682D 100%);
      border-radius: 24px;
      overflow: hidden;
      position: relative;
    }
    .promo-content { position: relative; z-index: 2; padding: 40px; }
    .promo-img {
      position: absolute;
      right: -5%;
      top: 50%;
      transform: translateY(-50%);
      height: 140%;
      object-fit: contain;
      z-index: 1;
      pointer-events: none;
    }
  </style>

  <!-- Promotional Banner -->
  <section class="py-4 mt-2">
    <div class="container">
      <div class="row g-4">
        <div class="col-lg-8">
          <div class="promo-banner shadow-lg text-white h-100 d-flex align-items-center" style="min-height: 220px;">
            <img src="https://images.unsplash.com/photo-1604382354936-07c5d9983bd3?auto=format&fit=crop&w=800&q=80" alt="Pizza" class="promo-img" style="border-radius: 50%;">
            <div class="promo-content w-100">
              <span class="badge bg-warning text-dark px-3 py-2 rounded-pill fw-bold mb-2 shadow-sm" style="font-size: 0.9rem;">New here?</span>
              <h2 class="display-5 fw-bold mb-1" style="text-shadow: 0 2px 10px rgba(0,0,0,0.2);">Get <span class="text-warning">50% OFF</span></h2>
              <p class="fs-5 mb-3 fw-medium">on your first order</p>
              <div class="bg-white rounded-pill d-inline-flex align-items-center overflow-hidden shadow-sm p-1 ps-3">
                <span class="text-muted small fw-bold me-2">Use code</span>
                <span class="fw-bold fs-5 text-dark me-3">FOODMATE50</span>
                <button class="btn btn-light rounded-circle border p-2" onclick="navigator.clipboard.writeText('FOODMATE50'); alert('Code copied!')" title="Copy Code">
                  <i class="bi bi-files"></i>
                </button>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="bg-white rounded-4 shadow-sm p-4 h-100 border d-flex flex-column justify-content-center gap-4">
            <div class="d-flex align-items-center gap-3">
              <div class="bg-success text-white rounded-circle d-flex align-items-center justify-content-center" style="width: 48px; height: 48px;"><i class="bi bi-truck fs-4"></i></div>
              <div class="lh-sm"><span class="fw-bold text-dark fs-5">Free delivery</span><br><span class="text-muted small">on selected restaurants</span></div>
            </div>
            <div class="d-flex align-items-center gap-3">
              <div class="bg-success text-white rounded-circle d-flex align-items-center justify-content-center" style="width: 48px; height: 48px;"><i class="bi bi-currency-dollar fs-4"></i></div>
              <div class="lh-sm"><span class="fw-bold text-dark fs-5">Zero service fees</span><br><span class="text-muted small">Always.</span></div>
            </div>
            <div class="d-flex align-items-center gap-3">
              <div class="bg-success text-white rounded-circle d-flex align-items-center justify-content-center" style="width: 48px; height: 48px;"><i class="bi bi-gift fs-4"></i></div>
              <div class="lh-sm"><span class="fw-bold text-dark fs-5">Exclusive deals</span><br><span class="text-muted small">Every week.</span></div>
            </div>
          </div>
        </div>
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
        grid.innerHTML = RESTAURANTS.slice(0, 4).map(r => `
          <div class="col-md-6 col-lg-3">
            <a href="restaurant-detail.php?id=${r.id}" class="text-decoration-none">
              <div class="restaurant-card bg-white border-0 shadow-sm rounded-4 overflow-hidden h-100 position-relative transition-all">
                <div class="position-relative" style="height: 160px;">
                  <img src="${r.image}" alt="${r.name}" class="w-100 h-100 object-fit-cover">
                  <div class="position-absolute top-0 end-0 p-2">
                    <button class="btn btn-light btn-sm rounded-circle shadow-sm" style="width: 32px; height: 32px; padding: 0;"><i class="bi bi-heart fs-6"></i></button>
                  </div>
                  <div class="position-absolute bottom-0 start-0 p-2">
                    <div class="bg-white rounded-pill px-2 py-1 shadow-sm d-inline-flex align-items-center" style="font-size: 0.8rem; font-weight: 700;">
                      <i class="bi bi-star-fill text-warning me-1"></i> ${r.rating} <span class="text-muted fw-normal ms-1">(${Math.floor(Math.random() * 400 + 100)})</span>
                    </div>
                  </div>
                </div>
                <div class="p-3 pb-2">
                  <h5 class="text-dark fw-bold mb-1">${r.name}</h5>
                  <p class="text-muted mb-2 small">${r.cuisine.replace(',', ' • ')}</p>
                  <div class="d-flex align-items-center text-muted small fw-medium mb-3">
                    <span class="d-flex align-items-center me-3"><i class="bi bi-clock me-1 fs-6"></i> ${r.deliveryTime}</span>
                    <span class="d-flex align-items-center"><i class="bi bi-bicycle me-1 fs-6"></i> $${r.deliveryFee.toFixed(2)} delivery</span>
                  </div>
                  <div class="rounded-3 px-2 py-1 small fw-bold d-inline-flex align-items-center" style="background-color: ${r.id % 2 === 0 ? '#FFE5E5' : '#E5F5E5'}; color: ${r.id % 2 === 0 ? '#D32F2F' : '#2E7D32'};">
                    <i class="bi bi-tag-fill me-1"></i> ${r.id % 2 === 0 ? '20% OFF selected items' : 'Free delivery over $30'}
                  </div>
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

