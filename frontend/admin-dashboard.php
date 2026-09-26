<?php
$required_role = 'admin';
require_once 'auth_check.php';
$adminName = $auth_name;
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Centralized Admin Dashboard on Food Mate for user management, order oversight, analytics, and moderation.">
  <title>Food Mate — System Admin Dashboard</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
  <link href="css/style.css?v=2.2" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>

  <div class="dashboard-layout">
    <!-- Sidebar -->
    <div class="sidebar" id="sidebar">
      <div class="brand d-flex align-items-center gap-2">
        <i class="bi bi-shield-lock-fill text-danger fs-3"></i>
        <div>
          <div>Admin Dashboard</div>
          <small style="font-size:0.75rem; color:#38bdf8; font-weight:600;"><i class="bi bi-person-check-fill me-1"></i> <?= $adminName ?></small>
        </div>
      </div>
      <ul class="sidebar-nav">
        <li><a href="#" class="active" onclick="showAdminSec('analyticsSec', this)"><i class="bi bi-graph-up-arrow me-2"></i>Analytics & Reports (LL FR 5.6)</a></li>
        <li><a href="#" onclick="showAdminSec('usersSec', this)"><i class="bi bi-people me-2"></i>User Directory & RBAC (LL FR 5.1)</a></li>
        <li><a href="#" onclick="showAdminSec('restaurantsSec', this)"><i class="bi bi-shop me-2"></i>Restaurant Approvals (LL FR 5.2)</a></li>
        <li><a href="#" onclick="showAdminSec('ordersSec', this)"><i class="bi bi-receipt-cutoff me-2"></i>Global Order Oversight (LL FR 5.3)</a></li>
        <li><a href="#" onclick="showAdminSec('commissionsSec', this)"><i class="bi bi-cash-coin me-2"></i>Commissions & Fees (LL FR 5.4)</a></li>
        <li><a href="#" onclick="showAdminSec('reviewsSec', this)"><i class="bi bi-chat-left-quote me-2"></i>Reviews Moderation (LL FR 5.5)</a></li>
        <li><a href="#" onclick="showAdminSec('announceSec', this)"><i class="bi bi-megaphone me-2"></i>Global Broadcast (LL FR 6.0)</a></li>
        <li class="mt-4 border-top border-secondary pt-3"><a href="logout.php?role=admin" class="text-danger fw-semibold"><i class="bi bi-box-arrow-left me-2"></i>Sign Out</a></li>
      </ul>
    </div>

    <!-- Main Content -->
    <div class="dashboard-content">
      <!-- Header -->
      <div class="dashboard-header">
        <div class="d-flex align-items-center gap-3">
          <button class="btn btn-dark d-lg-none" id="sidebarToggle"><i class="bi bi-list"></i></button>
          <h4 class="mb-0 fw-bold" id="adminHeaderTitle">Analytics & Reporting Dashboard</h4>
        </div>
        <div class="d-flex align-items-center gap-2">
          <button class="btn btn-outline-custom btn-sm" onclick="exportCSVReport()"><i class="bi bi-download me-1"></i> Export CSV Report</button>
          <span class="badge bg-success px-3 py-2 fw-bold"><i class="bi bi-check-circle me-1"></i> System Operational</span>
          <a href="logout.php?role=admin" class="btn btn-outline-danger btn-sm ms-2"><i class="bi bi-box-arrow-right me-1"></i> Sign Out</a>
        </div>
      </div>

      <div class="p-4">
        
        <!-- SECTION 1: ANALYTICS & REPORTS -->
        <div id="analyticsSec" class="admin-section">
          <!-- KPI Cards -->
          <div class="row g-3 mb-4">
            <div class="col-md-3">
              <div class="stat-card">
                <div class="stat-icon primary"><i class="bi bi-currency-dollar"></i></div>
                <div>
                  <h3 class="fw-bold mb-0">$24,850.00</h3>
                  <small class="text-muted">Monthly Gross Revenue</small>
                </div>
              </div>
            </div>
            <div class="col-md-3">
              <div class="stat-card">
                <div class="stat-icon success"><i class="bi bi-bag-check-fill"></i></div>
                <div>
                  <h3 class="fw-bold mb-0">1,280</h3>
                  <small class="text-muted">Completed Orders</small>
                </div>
              </div>
            </div>
            <div class="col-md-3">
              <div class="stat-card">
                <div class="stat-icon warning"><i class="bi bi-shop"></i></div>
                <div>
                  <h3 class="fw-bold mb-0">48</h3>
                  <small class="text-muted">Active Restaurants</small>
                </div>
              </div>
            </div>
            <div class="col-md-3">
              <div class="stat-card">
                <div class="stat-icon info"><i class="bi bi-bicycle"></i></div>
                <div>
                  <h3 class="fw-bold mb-0">94</h3>
                  <small class="text-muted">Delivery Drivers</small>
                </div>
              </div>
            </div>
          </div>

          <!-- Interactive Charts -->
          <div class="row g-4 mb-4">
            <div class="col-lg-8">
              <div class="card-dark">
                <h5 class="fw-bold mb-3">Daily & Monthly Sales Trend ($)</h5>
                <canvas id="salesChart" height="220"></canvas>
              </div>
            </div>
            <div class="col-lg-4">
              <div class="card-dark">
                <h5 class="fw-bold mb-3">Top Selling Cuisines</h5>
                <canvas id="cuisinePieChart" height="220"></canvas>
              </div>
            </div>
          </div>
        </div>

        <!-- SECTION 2: USER DIRECTORY & RBAC -->
        <div id="usersSec" class="admin-section" style="display:none;">
          <div class="card-dark">
            <div class="d-flex justify-content-between align-items-center mb-3">
              <h5 class="fw-bold mb-0">User Directory & Role Moderation (LL FR 5.1)</h5>
              <input type="text" class="form-control form-control-dark w-25" placeholder="Search user..." onkeyup="filterUserTable(this.value)">
            </div>
            <div class="table-responsive">
              <table class="table table-custom" id="userDirectoryTable">
                <thead>
                  <tr>
                    <th>User ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Classification Role</th>
                    <th>Account Status</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td class="fw-bold">USR-101</td>
                    <td>Alex Johnson</td>
                    <td>alex.johnson@example.com</td>
                    <td><span class="badge bg-primary">Customer</span></td>
                    <td><span class="status-badge status-approved">Active</span></td>
                    <td>
                      <button class="btn btn-sm btn-outline-warning" onclick="toggleUserStatus(this)">Suspend Account</button>
                      <button class="btn btn-sm btn-outline-secondary" onclick="showToast('Password reset email sent to user!', 'info')">Reset Password</button>
                    </td>
                  </tr>
                  <tr>
                    <td class="fw-bold">USR-102</td>
                    <td>Luigi's Pizzeria Admin</td>
                    <td>luigi@pizzeria.com.au</td>
                    <td><span class="badge bg-warning text-dark">Restaurant</span></td>
                    <td><span class="status-badge status-approved">Approved</span></td>
                    <td>
                      <button class="btn btn-sm btn-outline-warning" onclick="toggleUserStatus(this)">Suspend</button>
                      <button class="btn btn-sm btn-outline-secondary" onclick="showToast('Password reset email sent to user!', 'info')">Reset Password</button>
                    </td>
                  </tr>
                  <tr>
                    <td class="fw-bold">USR-103</td>
                    <td>Michael Chang</td>
                    <td>michael.driver@gmail.com</td>
                    <td><span class="badge bg-info text-dark">Delivery Partner</span></td>
                    <td><span class="status-badge status-approved">Approved</span></td>
                    <td>
                      <button class="btn btn-sm btn-outline-warning" onclick="toggleUserStatus(this)">Suspend</button>
                      <button class="btn btn-sm btn-outline-secondary" onclick="showToast('Password reset email sent to user!', 'info')">Reset Password</button>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>

        <!-- SECTION 3: RESTAURANT APPROVALS -->
        <div id="restaurantsSec" class="admin-section" style="display:none;">
          <div class="card-dark">
            <h5 class="fw-bold mb-3">Pending Restaurant Registrations (LL FR 5.2)</h5>
            <div class="table-responsive">
              <table class="table table-custom">
                <thead>
                  <tr>
                    <th>Application ID</th>
                    <th>Restaurant Name</th>
                    <th>Address</th>
                    <th>Cuisine</th>
                    <th>Registration Date</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td class="fw-bold">APP-501</td>
                    <td>Spice Symphony</td>
                    <td>45 Swanston St, Melbourne</td>
                    <td>Indian</td>
                    <td>2026-08-14</td>
                    <td>
                      <button class="btn btn-sm btn-success" onclick="approveRestaurant(this)">Approve Registration</button>
                      <button class="btn btn-sm btn-outline-danger" onclick="rejectRestaurant(this)">Reject</button>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>

        <!-- SECTION 4: GLOBAL ORDER OVERSIGHT -->
        <div id="ordersSec" class="admin-section" style="display:none;">
          <div class="card-dark">
            <h5 class="fw-bold mb-3">System-Wide Order Oversight & Dispute Resolution (LL FR 5.3)</h5>
            <div class="table-responsive">
              <table class="table table-custom">
                <thead>
                  <tr>
                    <th>Order ID</th>
                    <th>Customer</th>
                    <th>Restaurant</th>
                    <th>Amount</th>
                    <th>Payment Status</th>
                    <th>Order Status</th>
                    <th>Dispute Actions</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td class="fw-bold text-primary">FM-8092</td>
                    <td>Alex Johnson</td>
                    <td>Luigi's Pizzeria</td>
                    <td class="fw-bold">$44.00</td>
                    <td><span class="badge bg-success">Paid (Card)</span></td>
                    <td><span class="status-badge status-delivery">Out for Delivery</span></td>
                    <td>
                      <button class="btn btn-sm btn-outline-danger" onclick="triggerAdminRefund('FM-8092')"><i class="bi bi-arrow-counterclockwise"></i> Refund Order</button>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>

        <!-- SECTION 5: COMMISSIONS & FEES -->
        <div id="commissionsSec" class="admin-section" style="display:none;">
          <div class="card-dark mb-4">
            <h5 class="fw-bold mb-3">Platform Zero-Service-Fee & Commission Settings (LL FR 5.4)</h5>
            <div class="alert alert-info d-flex align-items-center gap-3">
              <i class="bi bi-info-circle-fill fs-3"></i>
              <div>
                <strong>Food Mate Value Proposition:</strong> Customers are charged $0 service fees. Restaurant partners pay a pre-agreed low commission contract (Default: 5%).
              </div>
            </div>
            <form onsubmit="handleSaveCommissions(event)" class="row g-3">
              <div class="col-md-6">
                <label class="form-label-dark">Default Restaurant Commission (%)</label>
                <input type="number" step="0.5" class="form-control form-control-dark" value="5.0" required>
              </div>
              <div class="col-md-6">
                <label class="form-label-dark">Customer Service Fee ($)</label>
                <input type="number" class="form-control form-control-dark" value="0.00" readonly disabled>
              </div>
              <div class="col-12">
                <button type="submit" class="btn btn-primary-custom">Update Platform Rules</button>
              </div>
            </form>
          </div>
        </div>

        <!-- SECTION 6: REVIEWS MODERATION -->
        <div id="reviewsSec" class="admin-section" style="display:none;">
          <div class="card-dark">
            <h5 class="fw-bold mb-3">Customer Reviews Moderation (LL FR 5.5)</h5>
            <div class="table-responsive">
              <table class="table table-custom">
                <thead>
                  <tr>
                    <th>Review ID</th>
                    <th>User</th>
                    <th>Rating</th>
                    <th>Comment Snippet</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody id="adminReviewsTableBody">
                  <tr>
                    <td class="fw-bold">REV-1</td>
                    <td>Sarah M.</td>
                    <td><span class="text-warning">★★★★★</span> (5)</td>
                    <td>"Best wood-fired pizza in Melbourne! Delivered hot."</td>
                    <td>
                      <button class="btn btn-sm btn-outline-danger" onclick="deleteReviewRow(this)"><i class="bi bi-trash"></i> Delete Inappropriate</button>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>

        <!-- SECTION 7: GLOBAL BROADCAST -->
        <div id="announceSec" class="admin-section" style="display:none;">
          <div class="card-dark">
            <h5 class="fw-bold mb-3">Broadcast Announcement / Notification (LL FR 6.0)</h5>
            <form onsubmit="handleSendBroadcast(event)">
              <div class="mb-3">
                <label class="form-label-dark">Target Audience</label>
                <select class="form-select form-control-dark">
                  <option value="all">All System Users & Partners</option>
                  <option value="customers">Customers Only</option>
                  <option value="restaurants">Restaurant Owners Only</option>
                  <option value="drivers">Delivery Drivers Only</option>
                </select>
              </div>
              <div class="mb-3">
                <label class="form-label-dark">Announcement Message</label>
                <textarea class="form-control form-control-dark" rows="3" placeholder="Enter broadcast message text..." required></textarea>
              </div>
              <button type="submit" class="btn btn-primary-custom"><i class="bi bi-megaphone me-1"></i> Send Announcement</button>
            </form>
          </div>
        </div>

      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="js/app.js?v=2.2"></script>
  <script src="js/chatbot.js?v=2.2"></script>
  <script>
    function showAdminSec(secId, navLink) {
      document.querySelectorAll('.admin-section').forEach(s => s.style.display = 'none');
      document.getElementById(secId).style.display = 'block';
      document.querySelectorAll('.sidebar-nav a').forEach(a => a.classList.remove('active'));
      navLink.classList.add('active');
    }

    function toggleUserStatus(btn) {
      const badge = btn.closest('tr').querySelector('.status-badge');
      if (badge.classList.contains('status-approved')) {
        badge.className = 'status-badge status-suspended';
        badge.textContent = 'Suspended';
        btn.textContent = 'Reactivate';
        showToast('User account suspended!', 'warning');
      } else {
        badge.className = 'status-badge status-approved';
        badge.textContent = 'Approved';
        btn.textContent = 'Suspend Account';
        showToast('User account reactivated!', 'success');
      }
    }

    function approveRestaurant(btn) {
      const tr = btn.closest('tr');
      showToast('Restaurant registration approved!', 'success');
      tr.remove();
    }

    function rejectRestaurant(btn) {
      const tr = btn.closest('tr');
      showToast('Restaurant application rejected.', 'warning');
      tr.remove();
    }

    function triggerAdminRefund(orderId) {
      showToast(`Refund of $44.00 initiated for order ${orderId}`, 'success');
    }

    function handleSaveCommissions(e) {
      e.preventDefault();
      showToast('Commission rate rules updated!', 'success');
    }

    function deleteReviewRow(btn) {
      btn.closest('tr').remove();
      showToast('Inappropriate customer review deleted.', 'info');
    }

    function handleSendBroadcast(e) {
      e.preventDefault();
      showToast('Global notification broadcasted to all users!', 'success');
    }

    function exportCSVReport() {
      const csvContent = "data:text/csv;charset=utf-8,Date,Orders,GrossRevenue,Commissions\n2026-08-15,1280,24850.00,1242.50";
      const encodedUri = encodeURI(csvContent);
      const link = document.createElement("a");
      link.setAttribute("href", encodedUri);
      link.setAttribute("download", "foodmate_sales_report_2026.csv");
      document.body.appendChild(link);
      link.click();
      link.remove();
      showToast('CSV Sales Report downloaded successfully!', 'success');
    }

    function filterUserTable(val) {
      const q = val.toLowerCase();
      document.querySelectorAll('#userDirectoryTable tbody tr').forEach(tr => {
        tr.style.display = tr.textContent.toLowerCase().includes(q) ? '' : 'none';
      });
    }

    // Chart.js Visualizations Setup
    document.addEventListener('DOMContentLoaded', () => {
      // Sales Trend Chart
      const salesCtx = document.getElementById('salesChart');
      if (salesCtx) {
        new Chart(salesCtx, {
          type: 'line',
          data: {
            labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
            datasets: [{
              label: 'Gross Sales ($)',
              data: [2800, 3200, 3100, 4100, 5200, 6400, 5850],
              borderColor: '#ff5e14',
              backgroundColor: 'rgba(255, 94, 20, 0.1)',
              fill: true,
              tension: 0.3
            }]
          },
          options: { responsive: true, plugins: { legend: { display: false } } }
        });
      }

      // Cuisine Pie Chart
      const pieCtx = document.getElementById('cuisinePieChart');
      if (pieCtx) {
        new Chart(pieCtx, {
          type: 'doughnut',
          data: {
            labels: ['Italian', 'American', 'Japanese', 'Indian', 'Mexican'],
            datasets: [{
              data: [35, 25, 20, 12, 8],
              backgroundColor: ['#ff5e14', '#ffb03a', '#38bdf8', '#10b981', '#f59e0b']
            }]
          },
          options: { responsive: true }
        });
      }
    });
  </script>
</body>
</html>
