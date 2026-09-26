<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Browse and search hundreds of restaurants on Food Mate. Filter by cuisine, rating, and more.">
  <title>Food Mate — Browse Restaurants</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
  <link href="css/style.css?v=2.2" rel="stylesheet">
</head>
<body>

  <!-- NAVBAR -->
  <nav class="navbar navbar-expand-lg navbar-foodmate sticky-top" id="mainNav">
    <div class="container">
      <a class="navbar-brand navbar-brand-custom" href="index.php">
        <i class="bi bi-egg-fried brand-icon"></i> Food Mate
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarContent">
        <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
          <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
          <li class="nav-item"><a class="nav-link active" href="restaurants.php">Restaurants</a></li>
          <li class="nav-item"><a class="nav-link" href="restaurants.php#cuisines">Cuisines</a></li>
          <li class="nav-item"><a class="nav-link" href="restaurants.php#offers">Offers</a></li>
          <li class="nav-item"><a class="nav-link" href="track-order.php">Track Order</a></li>
          <li class="nav-item"><a class="nav-link" href="dashboard.php">My Account</a></li>
        </ul>
        <div class="d-flex align-items-center gap-4 nav-icons">
          <a href="#" class="text-dark fs-5" onclick="document.getElementById('navSearch').focus(); return false;"><i class="bi bi-search"></i></a>
          <a href="#" class="text-dark fs-5"><i class="bi bi-heart"></i></a>
          <a href="login.php" class="text-dark fs-5"><i class="bi bi-person"></i></a>
          <a href="checkout.php" class="text-dark fs-5 position-relative">
            <i class="bi bi-bag"></i>
            <span class="cart-count" style="position:absolute; top:-6px; right:-10px; display:none;">0</span>
          </a>
        </div>
      </div>
    </div>
  </nav>

  <div class="container py-4">
    <!-- Page Header -->
    <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-2">
      <div>
        <h1 class="section-title fw-bold mb-1" style="font-size:2.2rem;">Restaurants Near You</h1>
        <p class="text-muted mb-0">Browse top local dining spots in Melbourne with <strong style="color:var(--primary-green);">$0 Service Fees</strong></p>
      </div>
      <div class="zero-fee-badge">
        <i class="bi bi-shield-check fs-5"></i>
        <span>No Commission Markups • Guaranteed Best Prices</span>
      </div>
    </div>

    <!-- Cuisine Filter Pills -->
    <div class="filter-pills" id="cuisineFilters">
      <button class="filter-pill active" data-filter="all">🍽️ All Cuisines</button>
      <button class="filter-pill" data-filter="american">🍔 Burgers</button>
      <button class="filter-pill" data-filter="italian">🍕 Italian & Pizza</button>
      <button class="filter-pill" data-filter="japanese">🍣 Japanese</button>
      <button class="filter-pill" data-filter="indian">🍛 Indian</button>
      <button class="filter-pill" data-filter="mexican">🌮 Mexican</button>
      <button class="filter-pill" data-filter="chinese">🥢 Chinese</button>
      <button class="filter-pill" data-filter="healthy">🥗 Healthy</button>
    </div>

    <div class="row">
      <!-- Sidebar Filters -->
      <div class="col-lg-3 mb-4">
        <div class="card-dark sticky-top" style="top: 100px;">
          <h6 class="fw-bold mb-3 d-flex align-items-center"><i class="bi bi-funnel me-2" style="color:var(--primary-color)"></i>Filter Options (LL FR 2.2)</h6>

          <!-- Sort -->
          <div class="mb-3">
            <label class="form-label-dark">Sort By</label>
            <select class="form-select form-control-dark" id="sortSelect" onchange="sortRestaurants(this.value)">
              <option value="rating">Top Rated</option>
              <option value="deliveryTime">Fastest Delivery</option>
              <option value="priceLow">Price: Low to High</option>
              <option value="priceHigh">Price: High to Low</option>
            </select>
          </div>

          <!-- Rating -->
          <div class="mb-3">
            <label class="form-label-dark">Minimum Rating</label>
            <div class="d-flex flex-column gap-2">
              <div class="form-check">
                <input class="form-check-input" type="radio" name="ratingFilter" id="ratingAll" value="0" checked onchange="applyFilters()">
                <label class="form-check-label small" for="ratingAll" style="color:var(--text-dark)">All Ratings</label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="ratingFilter" id="rating4" value="4" onchange="applyFilters()">
                <label class="form-check-label small" for="rating4" style="color:var(--text-dark)"><i class="bi bi-star-fill text-warning me-1"></i> 4.0+</label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="ratingFilter" id="rating45" value="4.5" onchange="applyFilters()">
                <label class="form-check-label small" for="rating45" style="color:var(--text-dark)"><i class="bi bi-star-fill text-warning me-1"></i> 4.5+</label>
              </div>
            </div>
          </div>

          <!-- Delivery Fee Slider -->
          <div class="mb-3">
            <label class="form-label-dark">Max Delivery Fee</label>
            <input type="range" class="form-range" id="deliveryFeeRange" min="0" max="10" step="0.5" value="10" oninput="document.getElementById('feeLabel').textContent = '$' + this.value; applyFilters();">
            <div class="d-flex justify-content-between">
              <small style="color:var(--text-muted)">Free ($0)</small>
              <small style="color:var(--primary-color)" class="fw-bold" id="feeLabel">$10.00</small>
            </div>
          </div>

          <!-- Dietary Options -->
          <div class="mb-0">
            <label class="form-label-dark">Dietary Badges</label>
            <div class="d-flex flex-column gap-2">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" id="filterVegan" onchange="applyFilters()">
                <label class="form-check-label small" for="filterVegan" style="color:var(--text-dark)">🥬 Vegan Friendly</label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" id="filterGF" onchange="applyFilters()">
                <label class="form-check-label small" for="filterGF" style="color:var(--text-dark)">🌾 Gluten-Free</label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" id="filterHalal" onchange="applyFilters()">
                <label class="form-check-label small" for="filterHalal" style="color:var(--text-dark)">🕌 Halal Certified</label>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Restaurant Grid -->
      <div class="col-lg-9">
        <div class="d-flex justify-content-between align-items-center mb-3">
          <span style="color:var(--text-muted); font-size:0.9rem;" id="resultCount">Showing 3 restaurants</span>
        </div>
        <div class="row g-4" id="restaurantGrid">
          <!-- Filled dynamically -->
        </div>
      </div>
    </div>
  </div>

  <!-- Floating Cart Button -->
  <div class="cart-floating">
    <a href="checkout.php">
      <button class="cart-btn" title="View Cart">
        <i class="bi bi-cart3"></i>
        <span class="cart-count" style="display:none;">0</span>
      </button>
    </a>
  </div>

  <!-- Footer -->
  <footer class="footer mt-5">
    <div class="container">
      <div class="row g-4">
        <div class="col-md-4">
          <a class="footer-brand" href="index.php"><i class="bi bi-egg-fried"></i> Food Mate</a>
          <p class="text-white-50 small">Melbourne's zero service fee delivery portal. Connecting local restaurants directly with customers.</p>
        </div>
        <div class="col-md-3">
          <h6 class="fw-bold text-white mb-3">Quick Navigation</h6>
          <ul class="footer-links">
            <li><a href="restaurants.php">Browse Restaurants</a></li>
            <li><a href="track-order.php">Track Active Orders</a></li>
            <li><a href="login.php">Sign In / Register</a></li>
            <li><a href="privacy-terms.php">Privacy & Terms</a></li>
          </ul>
        </div>
        <div class="col-md-3">
          <h6 class="fw-bold text-white mb-3">System Dashboards</h6>
          <ul class="footer-links">
            <li><a href="restaurant-dashboard.php">Restaurant Dashboard</a></li>
            <li><a href="delivery-dashboard.php">Delivery Partner Portal</a></li>
            <li><a href="admin-dashboard.php">Admin Dashboard</a></li>
          </ul>
        </div>
        <div class="col-md-2">
          <h6 class="fw-bold text-white mb-3">Support</h6>
          <p class="text-white-50 small mb-0"><i class="bi bi-envelope me-1"></i> support@foodmate.com.au</p>
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
    let currentCuisine = 'all';

    function initFavorites() {
      document.querySelectorAll('.fav-btn').forEach(btn => {
        btn.onclick = (e) => {
          e.preventDefault();
          const icon = btn.querySelector('i');
          if (icon.classList.contains('bi-heart')) {
            icon.classList.replace('bi-heart', 'bi-heart-fill');
            showToast('Saved to your favorite restaurants!', 'success');
          } else {
            icon.classList.replace('bi-heart-fill', 'bi-heart');
            showToast('Removed from favorites.');
          }
        };
      });
    }

    function renderRestaurants(restaurants) {
      const grid = document.getElementById('restaurantGrid');
      grid.innerHTML = '';
      document.getElementById('resultCount').textContent = `Showing ${restaurants.length} restaurant${restaurants.length !== 1 ? 's' : ''}`;

      if (restaurants.length === 0) {
        grid.innerHTML = `<div class="col-12 text-center py-5"><i class="bi bi-search fs-1 text-muted"></i><h4 class="mt-3">No restaurants match your filters</h4><p class="text-muted">Try adjusting your rating or cuisine selection.</p></div>`;
        return;
      }

      restaurants.forEach((r) => {
        grid.innerHTML += `
          <div class="col-md-6 col-xl-4" data-cuisine="${r.cuisine}">
            <a href="restaurant-detail.php?id=${r.id}" class="text-decoration-none">
              <div class="restaurant-card h-100">
                <div class="card-img-wrapper">
                  <img src="${r.image}" alt="${r.name}" loading="lazy">
                  <button class="fav-btn" title="Add to favorites"><i class="bi bi-heart"></i></button>
                  ${r.deliveryFee === 0 ? '<span class="position-absolute top-0 end-0 m-2 badge rounded-pill" style="background:var(--primary-green);font-size:0.75rem;">Free Delivery</span>' : ''}
                </div>
                <div class="p-3">
                  <div class="d-flex justify-content-between align-items-start mb-1">
                    <h5 class="text-dark mb-0 fw-bold" style="font-family:'Inter',sans-serif;font-size:1rem;">${r.name}</h5>
                    <div class="rating-box d-flex align-items-center px-2 py-1 rounded" style="background:var(--beige);font-size:0.82rem;white-space:nowrap;">
                      <i class="bi bi-star-fill text-warning me-1"></i> ${r.rating}
                    </div>
                  </div>
                  <p class="mb-2"><span class="cuisine-tag">${r.cuisine}</span></p>
                  <div class="d-flex align-items-center gap-3 text-muted small">
                    <span><i class="bi bi-clock me-1"></i>${r.deliveryTime}</span>
                    <span><i class="bi bi-bicycle me-1"></i>${r.deliveryFee === 0 ? 'Free' : '$'+r.deliveryFee.toFixed(2)}</span>
                  </div>
                  <div class="mt-3">
                    <button class="btn btn-outline-custom w-100 rounded-pill" style="font-size:0.88rem;">View Menu</button>
                  </div>
                </div>
              </div>
            </a>
          </div>`;
      });
      initFavorites();
    }

    function searchRestaurants(query) {
      const q = query.toLowerCase();
      let filtered = RESTAURANTS.filter(r =>
        r.name.toLowerCase().includes(q) ||
        r.cuisine.toLowerCase().includes(q) ||
        r.menu.some(m => m.name.toLowerCase().includes(q))
      );
      renderRestaurants(filtered);
    }

    function sortRestaurants(sortBy) {
      let sorted = [...RESTAURANTS];
      if (sortBy === 'rating') sorted.sort((a,b) => b.rating - a.rating);
      else if (sortBy === 'deliveryTime') sorted.sort((a,b) => parseInt(a.deliveryTime) - parseInt(b.deliveryTime));
      else if (sortBy === 'priceLow') sorted.sort((a,b) => a.deliveryFee - b.deliveryFee);
      else if (sortBy === 'priceHigh') sorted.sort((a,b) => b.deliveryFee - a.deliveryFee);
      renderRestaurants(sorted);
    }

    function applyFilters() {
      const minRating = parseFloat(document.querySelector('input[name="ratingFilter"]:checked').value);
      const maxFee = parseFloat(document.getElementById('deliveryFeeRange').value);

      let filtered = RESTAURANTS.filter(r => {
        if (r.rating < minRating) return false;
        if (r.deliveryFee > maxFee) return false;
        if (currentCuisine !== 'all' && r.cuisine.toLowerCase() !== currentCuisine) return false;
        return true;
      });
      renderRestaurants(filtered);
    }

    // Cuisine filter pills
    document.querySelectorAll('#cuisineFilters .filter-pill').forEach(pill => {
      pill.addEventListener('click', () => {
        document.querySelectorAll('#cuisineFilters .filter-pill').forEach(p => p.classList.remove('active'));
        pill.classList.add('active');
        currentCuisine = pill.dataset.filter;
        applyFilters();
      });
    });

    document.addEventListener('DOMContentLoaded', () => renderRestaurants(RESTAURANTS));
    window.addEventListener('restaurantsLoaded', (e) => renderRestaurants(e.detail));
  </script>
</body>
</html>

