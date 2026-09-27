<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Delivery Partner Driver Portal on Food Mate.">
  <title>Food Mate ΓÇö Delivery Partner Portal</title>
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
        <a href="delivery-dashboard.php" class="active"><i class="bi bi-bicycle me-1"></i> Delivery Partner</a>
        <a href="admin-dashboard.php"><i class="bi bi-shield-lock me-1"></i> System Admin</a>
      </div>
    </div>
  </div>

  <div class="dashboard-layout">
    <!-- Sidebar -->
    <div class="sidebar" id="sidebar">
      <div class="brand d-flex align-items-center gap-2">
        <i class="bi bi-bicycle text-info fs-3"></i>
        <div>
          <div>Driver Portal</div>
          <small style="font-size:0.7rem; color:#94a3b8; font-weight:normal;">Michael Chang</small>
        </div>
      </div>
      <ul class="sidebar-nav">
        <li><a href="#" class="active" onclick="showDriverSec('activeSec', this)"><i class="bi bi-geo-alt me-2"></i>Active Deliveries (LL FR 4.2)</a></li>
        <li><a href="#" onclick="showDriverSec('historySec', this)"><i class="bi bi-clock-history me-2"></i>Delivery History Log</a></li>
        <li><a href="#" onclick="showDriverSec('profileSec', this)"><i class="bi bi-person-gear me-2"></i>Driver Profile (LL FR 4.1)</a></li>
        <li class="mt-4 border-top border-secondary pt-3"><a href="index.php" class="text-danger"><i class="bi bi-box-arrow-left me-2"></i>Exit Portal</a></li>
      </ul>
    </div>

    <!-- Content -->
    <div class="dashboard-content">
      <!-- Top Bar -->
      <div class="dashboard-header">
        <div class="d-flex align-items-center gap-3">
          <button class="btn btn-dark d-lg-none" id="sidebarToggle"><i class="bi bi-list"></i></button>
          <h4 class="mb-0 fw-bold">Delivery Assignments</h4>
        </div>
        <div class="d-flex align-items-center gap-3">
          <div class="form-check form-switch mb-0">
            <input class="form-check-input" type="checkbox" id="driverOnlineSwitch" checked onchange="toggleDriverStatus(this)">
            <label class="form-check-label fw-bold text-success" for="driverOnlineSwitch" id="driverStatusLabel">Online & Ready</label>
          </div>
          <span class="badge bg-success px-3 py-2 fw-bold">Vehicle: Toyota Prius (1AB2CD)</span>
        </div>
      </div>

      <div class="p-4">
        <!-- Stat Cards -->
        <div class="row g-3 mb-4">
          <div class="col-md-3">
            <div class="stat-card">
              <div class="stat-icon primary"><i class="bi bi-bicycle"></i></div>
              <div>
                <h3 class="fw-bold mb-0">12</h3>
                <small class="text-muted">Today's Deliveries</small>
              </div>
            </div>
          </div>
          <div class="col-md-3">
            <div class="stat-card">
              <div class="stat-icon success"><i class="bi bi-cash-stack"></i></div>
              <div>
                <h3 class="fw-bold mb-0">$168.00</h3>
                <small class="text-muted">Today's Earnings</small>
              </div>
            </div>
          </div>
          <div class="col-md-3">
            <div class="stat-card">
              <div class="stat-icon warning"><i class="bi bi-star-fill"></i></div>
              <div>
                <h3 class="fw-bold mb-0">4.95</h3>
                <small class="text-muted">Driver Rating</small>
              </div>
            </div>
          </div>
          <div class="col-md-3">
            <div class="stat-card">
              <div class="stat-icon info"><i class="bi bi-lightning-fill"></i></div>
              <div>
                <h3 class="fw-bold mb-0">22 min</h3>
                <small class="text-muted">Avg Delivery Time</small>
              </div>
            </div>
          </div>
        </div>

        <!-- SECTION 1: ACTIVE DELIVERIES -->
        <div id="activeSec" class="driver-section">
          <!-- Live Delivery Card -->
          <div class="card-dark mb-4 border-start border-4 border-primary">
            <div class="d-flex justify-content-between align-items-center mb-3">
              <span class="badge bg-primary fs-6 px-3 py-2">Assigned Delivery #FM-8092</span>
              <span class="status-badge status-delivery fw-bold fs-6">Out for Delivery</span>
            </div>

            <div class="row g-3 mb-3">
              <div class="col-md-6">
                <div class="p-3 bg-light rounded">
                  <h6 class="fw-bold text-dark mb-1"><i class="bi bi-shop text-warning me-2"></i>Pickup Restaurant</h6>
                  <p class="mb-0 fw-bold">Luigi's Pizzeria</p>
                  <small class="text-muted">142 Lygon St, Carlton, Melbourne</small>
                  <div class="mt-2"><button class="btn btn-sm btn-outline-dark" onclick="showToast('GPS Route to Restaurant Opened', 'info')"><i class="bi bi-map me-1"></i> Navigate to Pickup</button></div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="p-3 bg-light rounded">
                  <h6 class="fw-bold text-dark mb-1"><i class="bi bi-house-door text-success me-2"></i>Drop-Off Customer</h6>
                  <p class="mb-0 fw-bold">Alex Johnson</p>
                  <small class="text-muted">350 Elizabeth St, Melbourne VIC 3000</small>
                  <div class="mt-2"><button class="btn btn-sm btn-outline-dark" onclick="showToast('Calling customer: +61 412 345 678', 'info')"><i class="bi bi-telephone me-1"></i> Call Customer</button></div>
                </div>
              </div>
            </div>

            <!-- Turn-by-Turn Status Update Stepper -->
            <h6 class="fw-bold mb-2">Update Delivery Status (LL FR 4.2):</h6>
            <div class="d-flex gap-2 flex-wrap">
              <button class="btn btn-primary-custom" onclick="updateDriverStep('Picked Up')"><i class="bi bi-box-seam me-1"></i> 1. Picked Up from Restaurant</button>
              <button class="btn btn-warning text-dark fw-bold" onclick="updateDriverStep('Out for Delivery')"><i class="bi bi-bicycle me-1"></i> 2. En Route to Customer</button>
              <button class="btn btn-success" onclick="updateDriverStep('Delivered')"><i class="bi bi-check-circle-fill me-1"></i> 3. Mark Delivered</button>
            </div>
          </div>

          <!-- Pending Delivery Request -->
          <div class="card-dark">
            <h5 class="fw-bold mb-3">New Assignment Requests</h5>
            <div class="p-3 border rounded bg-light d-flex justify-content-between align-items-center flex-wrap gap-2">
              <div>
                <h6 class="fw-bold mb-1">Tokyo Bites ΓåÆ 210 Bourke St</h6>
                <small class="text-muted">Est. Earnings: $14.50 ΓÇó Distance: 2.1 km</small>
              </div>
              <div class="d-flex gap-2">
                <button class="btn btn-success fw-bold" onclick="showToast('Delivery assignment accepted!', 'success')">Accept Job</button>
                <button class="btn btn-outline-danger" onclick="showToast('Job rejected.', 'warning')">Decline</button>
              </div>
            </div>
          </div>
        </div>

        <!-- SECTION 2: HISTORY -->
        <div id="historySec" class="driver-section" style="display:none;">
          <div class="card-dark">
            <h5 class="fw-bold mb-3">Completed Deliveries</h5>
            <table class="table table-custom">
              <thead>
                <tr>
                  <th>Order ID</th>
                  <th>Restaurant</th>
                  <th>Customer Address</th>
                  <th>Payout</th>
                  <th>Status</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td class="fw-bold text-primary">FM-7714</td>
                  <td>Tokyo Bites</td>
                  <td>120 Collins St, Melbourne</td>
                  <td class="fw-bold text-success">$16.00</td>
                  <td><span class="status-badge status-delivered">Delivered</span></td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>

        <!-- SECTION 3: DRIVER PROFILE -->
        <div id="profileSec" class="driver-section" style="display:none;">
          <div class="card-dark">
            <h5 class="fw-bold mb-4 border-bottom pb-2">Driver Profile Settings (LL FR 4.1)</h5>
            <form onsubmit="handleDriverProfileSave(event)" class="row g-3">
              <div class="col-md-6">
                <label class="form-label-dark">Full Name</label>
                <input type="text" class="form-control form-control-dark" value="Michael Chang" required>
              </div>
              <div class="col-md-6">
                <label class="form-label-dark">Vehicle Type & Rego</label>
                <input type="text" class="form-control form-control-dark" value="Toyota Prius - VIC 1AB2CD" required>
              </div>
              <div class="col-md-6">
                <label class="form-label-dark">Driver License #</label>
                <input type="text" class="form-control form-control-dark" value="DL-9948210" required>
              </div>
              <div class="col-md-6">
                <label class="form-label-dark">Phone Number</label>
                <input type="tel" class="form-control form-control-dark" value="+61 400 123 456" required>
              </div>
              <div class="col-12 mt-4">
                <button type="submit" class="btn btn-primary-custom"><i class="bi bi-check2-circle me-1"></i> Save Driver Profile</button>
              </div>
            </form>
          </div>
        </div>

      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="js/app.js"></script>
  <script>
    function showDriverSec(secId, navLink) {
      document.querySelectorAll('.driver-section').forEach(s => s.style.display = 'none');
      document.getElementById(secId).style.display = 'block';
      document.querySelectorAll('.sidebar-nav a').forEach(a => a.classList.remove('active'));
      navLink.classList.add('active');
    }

    function toggleDriverStatus(sw) {
      const lbl = document.getElementById('driverStatusLabel');
      if (sw.checked) {
        lbl.textContent = 'Online & Ready';
        lbl.className = 'form-check-label fw-bold text-success';
        showToast('Driver status: ONLINE for new assignments', 'success');
      } else {
        lbl.textContent = 'Offline (On Break)';
        lbl.className = 'form-check-label fw-bold text-secondary';
        showToast('Driver status: OFFLINE', 'warning');
      }
    }

    function updateDriverStep(status) {
      showToast(`Order status updated to "${status}"`, 'success');
      const orders = JSON.parse(localStorage.getItem('fm_orders')) || [];
      if (orders.length > 0) {
        orders[0].status = status;
        localStorage.setItem('fm_orders', JSON.stringify(orders));
      }
    }

    function handleDriverProfileSave(e) {
      e.preventDefault();
      showToast('Driver profile updated successfully!', 'success');
    }
  </script>
</body>
</html>
