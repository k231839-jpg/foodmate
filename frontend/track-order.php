<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Track your Food Mate delivery in real-time with live progress and driver map simulation.">
  <title>Food Mate — Live Order Tracking</title>
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
      <div class="d-flex align-items-center gap-3">
        <a href="dashboard.php" class="nav-link"><i class="bi bi-clock-history me-1"></i> Order History</a>
      </div>
    </div>
  </nav>

  <div class="container py-5">
    <!-- Header -->
    <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-2">
      <div>
        <h2 class="fw-bold mb-1">Live Order Tracking (LL FR 2.6)</h2>
        <p class="text-muted mb-0">Order ID: <strong style="color:var(--primary-color)" id="trackOrderId">FM-8092</strong> • Placed on <span id="trackOrderDate">Today 12:45 PM</span></p>
      </div>
      <div class="d-flex gap-2">
        <button class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#cancelOrderModal"><i class="bi bi-x-circle me-1"></i> Cancel / Refund</button>
      </div>
    </div>

    <div class="row g-4">
      <!-- Left: Tracking Stepper & Driver Map -->
      <div class="col-lg-8">
        <!-- Interactive Driver Map Canvas -->
        <div class="driver-map-container mb-4">
          <div class="map-grid-bg"></div>
          <div class="map-route-line"></div>
          <div class="map-pin restaurant">
            <i class="bi bi-shop"></i>
            <span class="badge bg-dark mt-1">Luigi's Pizzeria</span>
          </div>
          <div class="map-pin customer">
            <i class="bi bi-house-door-fill"></i>
            <span class="badge bg-success mt-1">Your Delivery Address</span>
          </div>
          <div class="map-pin driver" id="driverMapPin">
            <i class="bi bi-bicycle"></i>
            <span class="badge bg-info text-dark mt-1">Michael (Driver)</span>
          </div>
        </div>

        <!-- Tracking Progress Stepper -->
        <div class="card-dark">
          <h5 class="fw-bold mb-4 d-flex justify-content-between align-items-center">
            <span>Delivery Progress</span>
            <span class="badge bg-primary px-3 py-2 fs-6" id="statusBadgeHeader">Out for Delivery</span>
          </h5>

          <div class="tracking-timeline">
            <div class="tracking-step completed" id="step1">
              <div class="tracking-icon"><i class="bi bi-check-lg"></i></div>
              <div>
                <h6 class="fw-bold mb-1">1. Order Placed & Confirmed</h6>
                <p class="text-muted small mb-0">Restaurant received customer specifications and payment confirmation.</p>
              </div>
            </div>
            <div class="tracking-step completed" id="step2">
              <div class="tracking-icon"><i class="bi bi-egg-fried"></i></div>
              <div>
                <h6 class="fw-bold mb-1">2. Food Preparation</h6>
                <p class="text-muted small mb-0">Chef is preparing your dishes using fresh ingredients.</p>
              </div>
            </div>
            <div class="tracking-step active" id="step3">
              <div class="tracking-icon"><i class="bi bi-bicycle"></i></div>
              <div>
                <h6 class="fw-bold mb-1">3. Out for Delivery</h6>
                <p class="text-muted small mb-0">Driver has picked up the food order and is en route to your address.</p>
              </div>
            </div>
            <div class="tracking-step" id="step4">
              <div class="tracking-icon"><i class="bi bi-house-check-fill"></i></div>
              <div>
                <h6 class="fw-bold mb-1">4. Delivered to Doorstep</h6>
                <p class="text-muted small mb-0">Driver hands over food. Order completed.</p>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Right: Driver Details & Itemized Receipt -->
      <div class="col-lg-4">
        <!-- Driver Info Card -->
        <div class="card-dark mb-4">
          <h6 class="fw-bold mb-3"><i class="bi bi-person-badge me-2 text-primary"></i>Assigned Delivery Partner</h6>
          <div class="d-flex align-items-center gap-3 mb-3">
            <div class="stat-icon primary" style="width:50px; height:50px;"><i class="bi bi-person-fill fs-3"></i></div>
            <div>
              <h6 class="fw-bold mb-0" id="driverNameText">Michael Chang</h6>
              <small class="text-muted">Toyota Prius • VIC 1AB2CD</small>
            </div>
          </div>
          <button class="btn btn-outline-custom w-100" onclick="showToast('Driver contacted: +61 400 123 456', 'info')">
            <i class="bi bi-telephone-fill me-1"></i> Call / SMS Driver
          </button>
        </div>

        <!-- Order Receipt Card -->
        <div class="card-dark">
          <h6 class="fw-bold mb-3 border-bottom pb-2">Itemized Order Receipt</h6>
          <div class="mb-3" id="receiptItemsList">
            <!-- Rendered via JS -->
          </div>
          <div class="border-top pt-2">
            <div class="d-flex justify-content-between small mb-1">
              <span class="text-muted">Subtotal</span>
              <span id="subtotalText">$46.50</span>
            </div>
            <div class="d-flex justify-content-between small mb-1">
              <span class="text-muted">Service Fee</span>
              <span class="text-success font-weight-bold">$0.00 (Free)</span>
            </div>
            <div class="d-flex justify-content-between small mb-1">
              <span class="text-muted">Delivery Fee</span>
              <span id="deliveryText">$2.50</span>
            </div>
            <div class="d-flex justify-content-between small mb-1 text-danger" id="discountReceiptRow">
              <span>Promo Discount</span>
              <span id="discountText">-$5.00</span>
            </div>
            <hr>
            <div class="d-flex justify-content-between fw-bold fs-5">
              <span>Total Paid</span>
              <span style="color:var(--primary-color)" id="totalText">$44.00</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Cancel / Refund Request Modal -->
  <div class="modal fade" id="cancelOrderModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title text-danger"><i class="bi bi-exclamation-octagon-fill me-2"></i>Cancel Order & Request Refund</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          <p class="small text-muted">Per Food Mate Policy (LL FR 7), cancellations made prior to driver pickup qualify for an instant 100% refund.</p>
          <div class="mb-3">
            <label class="form-label-dark">Reason for Cancellation</label>
            <select class="form-select form-control-dark" id="cancelReason">
              <option value="Long ETA">Estimated delivery time too long</option>
              <option value="Ordered by mistake">Ordered items by mistake</option>
              <option value="Address error">Wrong delivery address entered</option>
            </select>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-danger" onclick="executeOrderCancel()">Confirm Cancellation</button>
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="js/app.js?v=2.2"></script>
  <script>
    function loadOrderTracking() {
      const orders = JSON.parse(localStorage.getItem('fm_orders')) || [];
      const order = orders[0]; // Active order

      if (order) {
        document.getElementById('trackOrderId').textContent = order.id;
        document.getElementById('trackOrderDate').textContent = order.date;
        document.getElementById('statusBadgeHeader').textContent = order.status;

        document.getElementById('subtotalText').textContent = `$${order.subtotal.toFixed(2)}`;
        document.getElementById('deliveryText').textContent = `$${order.deliveryFee.toFixed(2)}`;
        document.getElementById('discountText').textContent = `-$${order.discount.toFixed(2)}`;
        document.getElementById('totalText').textContent = `$${order.total.toFixed(2)}`;

        const list = document.getElementById('receiptItemsList');
        list.innerHTML = order.items.map(i => `
          <div class="d-flex justify-content-between small mb-1">
            <span>${i.name} x${i.qty}</span>
            <span class="fw-semibold">$${(i.price * i.qty).toFixed(2)}</span>
          </div>
        `).join('');
      }

      // Simulate Driver Pin Movement
      let pin = document.getElementById('driverMapPin');
      let left = 48;
      setInterval(() => {
        left = left >= 70 ? 40 : left + 2;
        pin.style.left = `${left}%`;
      }, 2500);
    }

    function executeOrderCancel() {
      const modalEl = document.getElementById('cancelOrderModal');
      const modal = bootstrap.Modal.getInstance(modalEl);
      if (modal) modal.hide();

      showToast('Order FM-8092 cancelled. Instant refund of $44.00 processed to card.', 'success');
      document.getElementById('statusBadgeHeader').textContent = 'Cancelled (Refunded)';
      document.getElementById('statusBadgeHeader').className = 'badge bg-danger px-3 py-2 fs-6';
    }

    document.addEventListener('DOMContentLoaded', loadOrderTracking);
  </script>
</body>
</html>
