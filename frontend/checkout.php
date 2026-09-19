<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Complete your Food Mate order securely with zero service fees.">
  <title>Food Mate — Checkout & Payment</title>
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
        <a href="restaurants.php" class="nav-link"><i class="bi bi-arrow-left me-1"></i> Back to Restaurants</a>
      </div>
    </div>
  </nav>

  <div class="container py-5">
    <div class="row g-4">
      <!-- Left Column: Delivery Details & Payment -->
      <div class="col-lg-7">
        <h2 class="fw-bold mb-4">Checkout (LL FR 2.5)</h2>

        <!-- Step 1: Delivery Address -->
        <div class="card-dark mb-4">
          <h5 class="fw-bold mb-3 d-flex align-items-center"><i class="bi bi-geo-alt me-2 text-danger"></i>1. Delivery Address</h5>
          <div class="mb-3">
            <label class="form-label-dark">Select Saved Address</label>
            <select class="form-select form-control-dark" id="addressSelect">
              <option value="Home">Home — 350 Elizabeth St, Melbourne VIC 3000</option>
              <option value="Work">Work — 120 Collins St, Melbourne VIC 3000</option>
              <option value="New">+ Enter New Address...</option>
            </select>
          </div>
          <div class="mb-3">
            <label class="form-label-dark">Special Delivery Instructions (Optional)</label>
            <textarea class="form-control form-control-dark" id="deliveryNotes" rows="2" placeholder="e.g. Leave at apartment lobby or call on arrival..."></textarea>
          </div>
        </div>

        <!-- Step 2: Payment Method -->
        <div class="card-dark mb-4">
          <h5 class="fw-bold mb-3 d-flex align-items-center"><i class="bi bi-credit-card me-2 text-primary"></i>2. Select Payment Method (LL FR 7)</h5>
          
          <div class="d-flex flex-column gap-2 mb-3">
            <div class="form-check border rounded p-3 bg-light">
              <input class="form-check-input" type="radio" name="paymentOption" id="payCard" value="Card" checked onclick="togglePaymentFields('card')">
              <label class="form-check-label fw-semibold d-flex justify-content-between align-items-center" for="payCard">
                <span><i class="bi bi-credit-card-2-front me-2 text-primary"></i> Credit / Debit Card</span>
                <span class="small text-muted"><i class="bi bi-shield-lock-fill text-success"></i> SSL Encrypted</span>
              </label>
            </div>
            
            <div class="form-check border rounded p-3 bg-light">
              <input class="form-check-input" type="radio" name="paymentOption" id="payCOD" value="Cash on Delivery" onclick="togglePaymentFields('cod')">
              <label class="form-check-label fw-semibold" for="payCOD">
                <i class="bi bi-cash-stack me-2 text-success"></i> Cash on Delivery (COD)
              </label>
            </div>

            <div class="form-check border rounded p-3 bg-light">
              <input class="form-check-input" type="radio" name="paymentOption" id="payPaypal" value="PayPal Online" onclick="togglePaymentFields('paypal')">
              <label class="form-check-label fw-semibold" for="payPaypal">
                <i class="bi bi-paypal me-2 text-info"></i> PayPal / Online Payment API
              </label>
            </div>
          </div>

          <!-- Card Form Container -->
          <div id="cardFormContainer" class="p-3 border rounded bg-white">
            <div class="mb-3">
              <label class="form-label-dark">Cardholder Name</label>
              <input type="text" class="form-control form-control-dark" id="cardName" value="Alex Johnson" required>
            </div>
            <div class="mb-3">
              <label class="form-label-dark">Card Number</label>
              <input type="text" class="form-control form-control-dark" id="cardNumber" value="4242 •••• •••• 4242" required>
            </div>
            <div class="row">
              <div class="col-6 mb-2">
                <label class="form-label-dark">Expiry Date</label>
                <input type="text" class="form-control form-control-dark" placeholder="MM/YY" value="08/28" required>
              </div>
              <div class="col-6 mb-2">
                <label class="form-label-dark">CVV / CVC</label>
                <input type="password" class="form-control form-control-dark" placeholder="123" value="888" required>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Right Column: Cart & Summary -->
      <div class="col-lg-5">
        <div class="card-dark sticky-top" style="top:90px;">
          <h5 class="fw-bold mb-3 d-flex justify-content-between align-items-center">
            <span>Order Summary</span>
            <span class="badge bg-secondary rounded-pill" id="cartCountBadge">0 Items</span>
          </h5>

          <!-- Itemized List -->
          <div id="checkoutCartItemsList" class="mb-3" style="max-height: 250px; overflow-y: auto;">
            <!-- Rendered dynamically -->
          </div>

          <!-- Promo Code Input -->
          <div class="input-group mb-3">
            <input type="text" class="form-control form-control-dark" placeholder="Promo / Coupon Code" id="promoInput" value="FOODMATE10">
            <button class="btn btn-outline-custom" type="button" onclick="applyPromoCode()">Apply</button>
          </div>

          <!-- Zero Service Fee Guarantee -->
          <div class="zero-fee-badge mb-3">
            <i class="bi bi-gift-fill text-success fs-4"></i>
            <div>
              <div class="fw-bold">Zero Service Fee Guarantee</div>
              <small style="font-size:0.78rem;">Food Mate does not charge customer ordering service fees!</small>
            </div>
          </div>

          <!-- Calculations -->
          <div class="border-top pt-3">
            <div class="d-flex justify-content-between mb-2">
              <span class="text-muted">Subtotal</span>
              <span class="fw-semibold" id="subtotalSpan">$0.00</span>
            </div>
            <div class="d-flex justify-content-between mb-2">
              <span class="text-muted">Service Fee</span>
              <span class="fw-bold text-success">$0.00 (Free)</span>
            </div>
            <div class="d-flex justify-content-between mb-2">
              <span class="text-muted">Delivery Fee</span>
              <span class="fw-semibold" id="deliveryFeeSpan">$2.50</span>
            </div>
            <div class="d-flex justify-content-between mb-2 text-danger" id="discountRow" style="display:none;">
              <span>Promo Discount</span>
              <span class="fw-bold" id="discountSpan">-$5.00</span>
            </div>
            <hr>
            <div class="d-flex justify-content-between mb-4 fs-5 fw-bold">
              <span>Total Amount</span>
              <span style="color:var(--primary-color)" id="totalSpan">$0.00</span>
            </div>

            <button class="btn btn-primary-custom w-100 py-3 fs-5" onclick="placeOrder()">
              <i class="bi bi-lock-fill me-2"></i> Place Order Now
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="js/app.js"></script>
  <script>
    let appliedDiscount = 0.00;

    function renderCheckoutCart() {
      let cart = getCart();
      const list = document.getElementById('checkoutCartItemsList');
      document.getElementById('cartCountBadge').textContent = `${cart.reduce((s,i)=>s+i.qty,0)} Items`;

      if (cart.length === 0) {
        // Load default mock items if cart is empty for testing
        cart = [
          { id: 101, name: "Margherita Supreme", price: 18.50, qty: 2 },
          { id: 103, name: "Garlic Focaccia", price: 9.50, qty: 1 }
        ];
        saveCart(cart);
      }

      list.innerHTML = cart.map(item => `
        <div class="d-flex justify-content-between align-items-center border-bottom py-2">
          <div>
            <div class="fw-semibold">${item.name}</div>
            <small class="text-muted">$${item.price.toFixed(2)} x ${item.qty}</small>
          </div>
          <div class="d-flex align-items-center gap-2">
            <button class="btn btn-sm btn-outline-secondary px-2" onclick="updateCartQty(${item.id}, -1); renderCheckoutCart();">-</button>
            <span class="fw-bold">${item.qty}</span>
            <button class="btn btn-sm btn-outline-secondary px-2" onclick="updateCartQty(${item.id}, 1); renderCheckoutCart();">+</button>
            <span class="fw-bold text-dark ms-2">$${(item.price * item.qty).toFixed(2)}</span>
          </div>
        </div>
      `).join('');

      calculateTotals(cart);
    }

    function calculateTotals(cart) {
      const subtotal = cart.reduce((sum, item) => sum + (item.price * item.qty), 0);
      const deliveryFee = subtotal > 0 ? 2.50 : 0.00;
      const total = Math.max(0, subtotal + deliveryFee - appliedDiscount);

      document.getElementById('subtotalSpan').textContent = `$${subtotal.toFixed(2)}`;
      document.getElementById('deliveryFeeSpan').textContent = `$${deliveryFee.toFixed(2)}`;
      document.getElementById('totalSpan').textContent = `$${total.toFixed(2)}`;
    }

    function applyPromoCode() {
      const code = document.getElementById('promoInput').value.trim().toUpperCase();
      if (code === 'FOODMATE10') {
        appliedDiscount = 5.00;
        document.getElementById('discountRow').style.display = 'flex';
        document.getElementById('discountSpan').textContent = `-$5.00`;
        showToast('Promo code applied! $5 discount added.', 'success');
      } else {
        showToast('Invalid promo code. Try "FOODMATE10"', 'warning');
      }
      renderCheckoutCart();
    }

    function togglePaymentFields(type) {
      const cardForm = document.getElementById('cardFormContainer');
      if (type === 'card') cardForm.style.display = 'block';
      else cardForm.style.display = 'none';
    }

    function placeOrder() {
      const cart = getCart();
      const newOrder = {
        id: `FM-${Math.floor(1000 + Math.random() * 9000)}`,
        date: new Date().toLocaleString(),
        restaurantName: "Luigi's Pizzeria",
        items: cart,
        subtotal: parseFloat(document.getElementById('subtotalSpan').textContent.replace('$','')),
        deliveryFee: 2.50,
        discount: appliedDiscount,
        total: parseFloat(document.getElementById('totalSpan').textContent.replace('$','')),
        status: "Preparing",
        customerName: "Alex Johnson",
        deliveryAddress: document.getElementById('addressSelect').value,
        driverName: "Michael Chang (Toyota Prius)",
        paymentMethod: document.querySelector('input[name="paymentOption"]:checked').value
      };

      const orders = JSON.parse(localStorage.getItem('fm_orders')) || [];
      orders.unshift(newOrder);
      localStorage.setItem('fm_orders', JSON.stringify(orders));
      localStorage.setItem('fm_cart', JSON.stringify([]));

      showToast('Order placed successfully! Redirecting to tracking...', 'success');
      setTimeout(() => {
        window.location.href = `track-order.php?orderId=${newOrder.id}`;
      }, 1500);
    }

    document.addEventListener('DOMContentLoaded', renderCheckoutCart);
  </script>
</body>
</html>
