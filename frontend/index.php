<?php
if (session_status() === PHP_SESSION_NONE) { session_start(); }
$is_logged_in  = isset($_SESSION['user_id']);
$session_role  = $_SESSION['role'] ?? '';
$session_name  = htmlspecialchars($_SESSION['name'] ?? '');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Food Mate — Melbourne's premium zero-service-fee food delivery platform. Order from top local restaurants.">
  <title>Food Mate — Local Food Marketplace</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
  <link href="css/style.css?v=2.2" rel="stylesheet">
</head>
<body>

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
          <li class="nav-item"><a class="nav-link" href="restaurants.php#cuisines">Cuisines</a></li>
          <li class="nav-item"><a class="nav-link" href="restaurants.php#offers">Offers</a></li>
          <li class="nav-item"><a class="nav-link" href="track-order.php">Track Order</a></li>
          <?php if ($is_logged_in && $session_role === 'customer'): ?>
          <li class="nav-item"><a class="nav-link" href="dashboard.php">My Account</a></li>
          <?php endif; ?>
        </ul>
        <div class="d-flex align-items-center gap-4 nav-icons">
          <a href="#" class="text-dark fs-5"><i class="bi bi-search"></i></a>
          <a href="#" class="text-dark fs-5"><i class="bi bi-heart"></i></a>
          <?php if ($is_logged_in): ?>
          <a href="logout.php" class="text-dark fs-5" title="Sign Out"><i class="bi bi-box-arrow-right"></i></a>
          <?php else: ?>
          <a href="login.php" class="text-dark fs-5" title="Sign In"><i class="bi bi-person"></i></a>
          <?php endif; ?>
          <a href="checkout.php" class="text-dark fs-5 position-relative">
            <i class="bi bi-bag"></i>
            <span class="cart-count" style="position:absolute; top:-6px; right:-10px; display:none;">0</span>
          </a>
        </div>
      </div>
    </div>
  </nav>

  <!-- Hero Section -->
  <header class="hero-section">
    <div class="container">
      <div class="row align-items-center">
        <!-- Left Side: Content -->
        <div class="col-lg-6 hero-content pe-lg-5">
          <span class="badge-custom mb-3 d-inline-block">
            MELBOURNE'S LOCAL FOOD MARKETPLACE
          </span>
          <h1 class="hero-title">
            Great Food.<br>
            Local Restaurants.<br>
            <span class="highlight-terracotta">Better Deals.</span>
          </h1>
          <p class="hero-subtitle mt-4 mb-5">
            Discover Melbourne restaurants, explore delicious menus and order your favourites with $0 service fees.
          </p>
          
          <div class="glass-panel p-2 d-flex align-items-center shadow-lg mb-3" style="border-radius: 50px;">
            <i class="bi bi-geo-alt-fill text-danger fs-4 ms-3 me-2"></i>
            <input type="text" class="form-control border-0 bg-transparent fs-5" placeholder="Enter your delivery address..." id="heroAddressInput">
            <a href="restaurants.php" class="btn btn-primary-custom text-nowrap py-3 px-4 rounded-pill text-decoration-none">
               Find Food
            </a>
          </div>
          <div>
             <a href="restaurants.php" class="text-decoration-none fw-bold text-dark explore-link">Explore Restaurants <i class="bi bi-arrow-right"></i></a>
          </div>

          <div class="mt-5 d-flex gap-4 trust-indicators flex-wrap text-muted small fw-medium">
            <span><i class="bi bi-check-circle-fill text-success me-2"></i> No Hidden Fees</span>
            <span><i class="bi bi-check-circle-fill text-success me-2"></i> Verified Local Restaurants</span>
            <span><i class="bi bi-check-circle-fill text-success me-2"></i> Live Order Tracking</span>
          </div>
        </div>
        
        <!-- Right Side: Image -->
        <div class="col-lg-6 mt-5 mt-lg-0 hero-image-col text-center position-relative">
          <div class="hero-organic-shape">
             <img src="https://images.unsplash.com/photo-1546069901-ba9599a7e63c?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="Fresh local food" class="hero-img-organic shadow-lg">
          </div>
        </div>
      </div>
    </div>
  </header>

  <!-- Popular Restaurants Near You -->
  <section class="py-5 section-restaurants">
    <div class="container">
      <div class="d-flex justify-content-between align-items-end mb-4">
        <div>
          <h2 class="mb-1 section-title">Popular Restaurants Near You</h2>
        </div>
        <a href="restaurants.php" class="btn btn-outline-custom text-decoration-none">View All</a>
      </div>
      <!-- 4 columns on desktop, 2 on tablet, 1 on mobile -->
      <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4" id="indexFeaturedGrid">
        <!-- Rendered dynamically via JS -->
      </div>
    </div>
  </section>

  <!-- Explore by Cuisine -->
  <section class="py-5 bg-beige">
    <div class="container">
      <h2 class="mb-4 section-title">What's on your mind?</h2>
      <div class="cuisine-scroller d-flex gap-4 pb-3" style="overflow-x: auto; scrollbar-width: none;">
        <a href="restaurants.php?filter=pizza" class="cuisine-item text-center text-decoration-none text-dark">
          <div class="cuisine-img-wrapper mb-2">
            <img src="https://images.unsplash.com/photo-1513104890138-7c749659a591?w=150&h=150&fit=crop" alt="Pizza" class="rounded-circle shadow-sm" style="width:100px; height:100px; object-fit:cover;">
          </div>
          <span class="fw-semibold">Pizza</span>
        </a>
        <a href="restaurants.php?filter=burgers" class="cuisine-item text-center text-decoration-none text-dark">
          <div class="cuisine-img-wrapper mb-2">
            <img src="https://images.unsplash.com/photo-1568901346375-23c9450c58cd?w=150&h=150&fit=crop" alt="Burgers" class="rounded-circle shadow-sm" style="width:100px; height:100px; object-fit:cover;">
          </div>
          <span class="fw-semibold">Burgers</span>
        </a>
        <a href="restaurants.php?filter=noodles" class="cuisine-item text-center text-decoration-none text-dark">
          <div class="cuisine-img-wrapper mb-2">
            <img src="https://images.unsplash.com/photo-1585032226651-759b368d7246?w=150&h=150&fit=crop" alt="Noodles" class="rounded-circle shadow-sm" style="width:100px; height:100px; object-fit:cover;">
          </div>
          <span class="fw-semibold">Noodles</span>
        </a>
        <a href="restaurants.php?filter=indian" class="cuisine-item text-center text-decoration-none text-dark">
          <div class="cuisine-img-wrapper mb-2">
            <img src="https://images.unsplash.com/photo-1585937421612-70a008356fbe?w=150&h=150&fit=crop" alt="Indian" class="rounded-circle shadow-sm" style="width:100px; height:100px; object-fit:cover;">
          </div>
          <span class="fw-semibold">Indian</span>
        </a>
        <a href="restaurants.php?filter=japanese" class="cuisine-item text-center text-decoration-none text-dark">
          <div class="cuisine-img-wrapper mb-2">
            <img src="https://images.unsplash.com/photo-1579871494447-9811cf80d66c?w=150&h=150&fit=crop" alt="Japanese" class="rounded-circle shadow-sm" style="width:100px; height:100px; object-fit:cover;">
          </div>
          <span class="fw-semibold">Japanese</span>
        </a>
        <a href="restaurants.php?filter=healthy" class="cuisine-item text-center text-decoration-none text-dark">
          <div class="cuisine-img-wrapper mb-2">
            <img src="https://images.unsplash.com/photo-1512621776951-a57141f2eefd?w=150&h=150&fit=crop" alt="Healthy" class="rounded-circle shadow-sm" style="width:100px; height:100px; object-fit:cover;">
          </div>
          <span class="fw-semibold">Healthy</span>
        </a>
        <a href="restaurants.php?filter=desserts" class="cuisine-item text-center text-decoration-none text-dark">
          <div class="cuisine-img-wrapper mb-2">
            <img src="https://images.unsplash.com/photo-1551024601-bec78aea704b?w=150&h=150&fit=crop" alt="Desserts" class="rounded-circle shadow-sm" style="width:100px; height:100px; object-fit:cover;">
          </div>
          <span class="fw-semibold">Desserts</span>
        </a>
      </div>
    </div>
  </section>

  <!-- Popular Dishes -->
  <section class="py-5">
    <div class="container">
      <h2 class="mb-4 section-title">Popular Dishes</h2>
      <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
        <!-- Dish 1 -->
        <div class="col">
          <div class="card dish-card border-0 shadow-sm h-100 p-3" style="border-radius: var(--border-radius-md);">
            <div class="d-flex gap-3">
              <img src="https://images.unsplash.com/photo-1621996346565-e3dbc646d9a9?w=200&h=200&fit=crop" class="rounded" alt="Pasta" style="width:100px; height:100px; object-fit:cover;">
              <div class="flex-grow-1">
                <h5 class="mb-1" style="font-family:'Inter', sans-serif;">Creamy Tomato Pasta</h5>
                <p class="text-muted small mb-2">Mario's Kitchen</p>
                <div class="d-flex justify-content-between align-items-center">
                  <span class="fw-bold" style="color:var(--terracotta);">$18.90</span>
                  <button class="btn btn-sm btn-outline-custom rounded-pill px-3">+ Add</button>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- Dish 2 -->
        <div class="col">
          <div class="card dish-card border-0 shadow-sm h-100 p-3" style="border-radius: var(--border-radius-md);">
            <div class="d-flex gap-3">
              <img src="https://images.unsplash.com/photo-1568901346375-23c9450c58cd?w=200&h=200&fit=crop" class="rounded" alt="Burger" style="width:100px; height:100px; object-fit:cover;">
              <div class="flex-grow-1">
                <h5 class="mb-1" style="font-family:'Inter', sans-serif;">Double Cheeseburger</h5>
                <p class="text-muted small mb-2">Burger Joint</p>
                <div class="d-flex justify-content-between align-items-center">
                  <span class="fw-bold" style="color:var(--terracotta);">$15.50</span>
                  <button class="btn btn-sm btn-outline-custom rounded-pill px-3">+ Add</button>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- Dish 3 -->
        <div class="col">
          <div class="card dish-card border-0 shadow-sm h-100 p-3" style="border-radius: var(--border-radius-md);">
            <div class="d-flex gap-3">
              <img src="https://images.unsplash.com/photo-1553621042-f6e147245754?w=200&h=200&fit=crop" class="rounded" alt="Sushi" style="width:100px; height:100px; object-fit:cover;">
              <div class="flex-grow-1">
                <h5 class="mb-1" style="font-family:'Inter', sans-serif;">Salmon Sushi Set</h5>
                <p class="text-muted small mb-2">Sakura Japanese</p>
                <div class="d-flex justify-content-between align-items-center">
                  <span class="fw-bold" style="color:var(--terracotta);">$24.00</span>
                  <button class="btn btn-sm btn-outline-custom rounded-pill px-3">+ Add</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Offers Section -->
  <section class="py-5" style="background-color: var(--deep-green); color: white;">
    <div class="container py-4">
      <div class="text-center mb-5">
        <h2 class="text-white">Better Deals. Same Great Food.</h2>
        <p style="color: var(--beige);">Support local restaurants directly and save money on every order.</p>
      </div>
      <div class="row g-4 justify-content-center">
        <div class="col-md-4">
          <div class="card border-0 h-100 p-4 text-center offer-card" style="background: var(--terracotta); color: white; border-radius: var(--border-radius-lg);">
            <h1 class="display-4 fw-bold mb-2">20% OFF</h1>
            <h4>Your First Order</h4>
            <p class="mb-4">Use code WELCOME20 at checkout.</p>
            <a href="restaurants.php" class="btn btn-light rounded-pill fw-bold text-dark w-75 mx-auto">Claim Offer</a>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card border-0 h-100 p-4 text-center offer-card" style="background: var(--mustard); color: var(--charcoal); border-radius: var(--border-radius-lg);">
            <h1 class="display-4 fw-bold mb-2">FREE</h1>
            <h4>Delivery</h4>
            <p class="mb-4">On all orders over $30 from local partners.</p>
            <a href="restaurants.php" class="btn btn-dark rounded-pill fw-bold text-white w-75 mx-auto">Explore Menus</a>
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

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="js/app.js?v=2.2"></script>
  <script src="js/chatbot.js?v=2.2"></script>
  <script>
    function renderFeatured(list) {
      const grid = document.getElementById('indexFeaturedGrid');
      if (!grid || !list || list.length === 0) return;
      grid.innerHTML = list.slice(0, 8).map(r => `
        <div class="col">
          <a href="restaurant-detail.php?id=${r.id}" class="text-decoration-none">
            <div class="restaurant-card h-100">
              <div class="card-img-wrapper" style="border-radius: var(--border-radius-md) var(--border-radius-md) 0 0;">
                <img src="${r.image}" alt="${r.name}" loading="lazy">
                <div class="fav-btn"><i class="bi bi-heart"></i></div>
                ${r.deliveryFee === 0 ? '<div class="promo-badge position-absolute top-0 start-0 m-2 bg-success text-white px-2 py-1 rounded small fw-bold">Free Delivery</div>' : ''}
              </div>
              <div class="p-3">
                <div class="d-flex justify-content-between align-items-start mb-1">
                  <h5 class="text-dark mb-0 font-inter fw-bold">${r.name}</h5>
                  <div class="rating-box d-flex align-items-center bg-light px-2 py-1 rounded text-dark fw-bold small">
                    <i class="bi bi-star-fill text-warning me-1"></i> ${r.rating}
                  </div>
                </div>
                <p class="text-muted small mb-2">${r.cuisine}</p>
                
                <div class="d-flex align-items-center gap-3 text-muted small mt-3">
                  <span><i class="bi bi-clock me-1"></i> ${r.deliveryTime}</span>
                  <span><i class="bi bi-bicycle me-1"></i> ${r.deliveryFee === 0 ? 'Free' : '$'+r.deliveryFee.toFixed(2)}</span>
                </div>
                
                <div class="mt-3">
                  <button class="btn btn-outline-custom w-100 rounded-pill fw-bold">View Menu</button>
                </div>
              </div>
            </div>
          </a>
        </div>
      `).join('');
    }

    document.addEventListener('DOMContentLoaded', () => {
      if (typeof RESTAURANTS !== 'undefined' && RESTAURANTS.length > 0) {
        renderFeatured(RESTAURANTS);
      }
    });
    window.addEventListener('restaurantsLoaded', (e) => {
      renderFeatured(e.detail);
    });
  </script>
</body>
</html>
