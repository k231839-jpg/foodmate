<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>FoodMate — Project Presentation & Future Roadmap</title>
  <!-- Google Fonts & Bootstrap Icons -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800&family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/style.css">

  <style>
    :root {
      --slide-bg: #0F172A;
      --slide-card-bg: rgba(30, 41, 59, 0.7);
      --primary-accent: #FF6B35;
      --secondary-accent: #10B981;
      --purple-accent: #8B5CF6;
      --text-main: #F8FAFC;
      --text-muted: #94A3B8;
    }

    body {
      background-color: var(--slide-bg);
      color: var(--text-main);
      font-family: 'Plus Jakarta Sans', sans-serif;
      overflow: hidden;
      margin: 0;
      height: 100vh;
      width: 100vw;
    }

    /* Header Bar */
    .deck-header {
      position: fixed;
      top: 0;
      left: 0;
      right: 0;
      height: 60px;
      background: rgba(15, 23, 42, 0.85);
      backdrop-filter: blur(12px);
      z-index: 1000;
      border-bottom: 1px solid rgba(255, 255, 255, 0.1);
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 0 1.5rem;
    }

    .brand-title {
      font-family: 'Outfit', sans-serif;
      font-weight: 700;
      font-size: 1.25rem;
      background: linear-gradient(135deg, #FF6B35, #FF8E53);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
    }

    /* Progress Bar */
    .progress-container {
      position: fixed;
      top: 60px;
      left: 0;
      right: 0;
      height: 4px;
      background: rgba(255, 255, 255, 0.05);
      z-index: 1001;
    }

    .progress-bar-fill {
      height: 100%;
      width: 10%;
      background: linear-gradient(90deg, #FF6B35, #10B981);
      transition: width 0.4s ease-in-out;
    }

    /* Slide Container */
    .slides-wrapper {
      position: relative;
      width: 100vw;
      height: calc(100vh - 120px);
      margin-top: 64px;
      overflow: hidden;
    }

    .slide {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      padding: 2.5rem 4rem;
      opacity: 0;
      visibility: hidden;
      transform: scale(0.96) translateY(20px);
      transition: all 0.5s cubic-bezier(0.16, 1, 0.3, 1);
      display: flex;
      flex-direction: column;
      justify-content: center;
      box-sizing: border-box;
    }

    .slide.active {
      opacity: 1;
      visibility: visible;
      transform: scale(1) translateY(0);
    }

    /* Glass Slide Card */
    .slide-card {
      background: rgba(30, 41, 59, 0.65);
      backdrop-filter: blur(16px);
      border: 1px solid rgba(255, 255, 255, 0.12);
      border-radius: 20px;
      padding: 2.5rem;
      box-shadow: 0 20px 40px rgba(0, 0, 0, 0.4);
      height: 100%;
      display: flex;
      flex-direction: column;
      overflow-y: auto;
    }

    .slide-header-badge {
      display: inline-flex;
      align-items: center;
      gap: 0.5rem;
      padding: 0.35rem 0.9rem;
      border-radius: 30px;
      background: rgba(255, 107, 53, 0.15);
      border: 1px solid rgba(255, 107, 53, 0.3);
      color: var(--primary-accent);
      font-size: 0.85rem;
      font-weight: 600;
      width: fit-content;
      margin-bottom: 1rem;
    }

    .slide-title {
      font-family: 'Outfit', sans-serif;
      font-size: 2.2rem;
      font-weight: 700;
      color: #FFFFFF;
      margin-bottom: 0.5rem;
    }

    .slide-subtitle {
      color: var(--text-muted);
      font-size: 1.1rem;
      margin-bottom: 1.5rem;
    }

    /* Footer Controls */
    .deck-footer {
      position: fixed;
      bottom: 0;
      left: 0;
      right: 0;
      height: 60px;
      background: rgba(15, 23, 42, 0.85);
      backdrop-filter: blur(12px);
      z-index: 1000;
      border-top: 1px solid rgba(255, 255, 255, 0.1);
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 0 1.5rem;
    }

    .nav-btn {
      background: rgba(255, 255, 255, 0.1);
      border: 1px solid rgba(255, 255, 255, 0.15);
      color: #FFF;
      padding: 0.4rem 1.1rem;
      border-radius: 10px;
      font-weight: 600;
      font-size: 0.9rem;
      transition: all 0.2s ease;
    }

    .nav-btn:hover:not(:disabled) {
      background: var(--primary-accent);
      border-color: var(--primary-accent);
      color: #FFF;
      transform: translateY(-2px);
    }

    .nav-btn:disabled {
      opacity: 0.3;
      cursor: not-allowed;
    }

    /* Speaker Notes & Overview Modals */
    .modal-glass {
      background: rgba(15, 23, 42, 0.95);
      backdrop-filter: blur(20px);
      border: 1px solid rgba(255, 255, 255, 0.15);
      color: #FFF;
      border-radius: 20px;
    }

    .timeline-phase {
      border-left: 3px solid var(--primary-accent);
      padding-left: 1.25rem;
      position: relative;
      margin-bottom: 1.5rem;
    }

    .timeline-phase::before {
      content: '';
      position: absolute;
      left: -9px;
      top: 0;
      width: 15px;
      height: 15px;
      border-radius: 50%;
      background: var(--primary-accent);
      box-shadow: 0 0 10px var(--primary-accent);
    }

    .metric-card {
      background: rgba(255, 255, 255, 0.04);
      border: 1px solid rgba(255, 255, 255, 0.08);
      border-radius: 16px;
      padding: 1.5rem;
      text-align: center;
      transition: all 0.3s ease;
    }

    .metric-card:hover {
      border-color: var(--primary-accent);
      transform: translateY(-4px);
    }

    .metric-val {
      font-family: 'Outfit', sans-serif;
      font-size: 2.8rem;
      font-weight: 800;
      background: linear-gradient(135deg, #FF6B35, #10B981);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
    }

    .diagram-thumb {
      background: rgba(255, 255, 255, 0.05);
      border: 1px solid rgba(255, 255, 255, 0.1);
      border-radius: 12px;
      padding: 1rem;
      text-align: center;
      transition: all 0.3s ease;
      cursor: pointer;
    }

    .diagram-thumb:hover {
      border-color: var(--secondary-accent);
      background: rgba(16, 185, 129, 0.1);
    }

    /* Grid layout for overview */
    .overview-grid {
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(220px, 1fr));
      gap: 1rem;
    }

    .overview-item {
      background: rgba(30, 41, 59, 0.8);
      border: 1px solid rgba(255, 255, 255, 0.1);
      border-radius: 12px;
      padding: 1rem;
      cursor: pointer;
      transition: all 0.2s ease;
    }

    .overview-item:hover, .overview-item.active {
      border-color: var(--primary-accent);
      background: rgba(255, 107, 53, 0.15);
    }
  </style>
</head>
<body>

  <!-- Top Navigation Bar -->
  <header class="deck-header">
    <div class="d-flex align-items-center gap-3">
      <i class="bi bi-box-seam-fill text-warning fs-4"></i>
      <span class="brand-title">FoodMate Presentation Deck</span>
      <span class="badge bg-dark border border-secondary text-light px-2 py-1">Phase 1 Complete</span>
    </div>
    <div class="d-flex align-items-center gap-2">
      <button class="nav-btn" onclick="toggleOverview()" title="Slide Overview (O)"><i class="bi bi-grid-3x3-gap-fill me-1"></i> Overview</button>
      <button class="nav-btn" onclick="toggleSpeakerNotes()" title="Speaker Notes (N)"><i class="bi bi-journal-text me-1"></i> Notes</button>
      <button class="nav-btn" onclick="toggleFullScreen()" title="Fullscreen (F)"><i class="bi bi-arrows-fullscreen me-1"></i> Fullscreen</button>
      <a href="index.php" target="_blank" class="nav-btn text-decoration-none text-light ms-2"><i class="bi bi-play-circle-fill me-1 text-success"></i> Launch App</a>
    </div>
  </header>

  <!-- Progress Bar -->
  <div class="progress-container">
    <div class="progress-bar-fill" id="progressBar"></div>
  </div>

  <!-- Slides Container -->
  <main class="slides-wrapper">

    <!-- SLIDE 1: Cover -->
    <section class="slide active" id="slide-1">
      <div class="slide-card text-center justify-content-center align-items-center position-relative overflow-hidden">
        <div class="position-absolute top-50 start-50 translate-middle w-100 h-100 opacity-20 pointer-events-none" 
             style="background: radial-gradient(circle, rgba(255,107,53,0.2) 0%, rgba(15,23,42,0) 70%);"></div>

        <div class="slide-header-badge mx-auto mb-3">
          <i class="bi bi-award-fill"></i> Capstone Presentation • August 2026
        </div>

        <h1 class="display-3 fw-bold text-white mb-2" style="font-family: 'Outfit';">
          Food<span style="color: var(--primary-accent);">Mate</span>
        </h1>
        <p class="fs-4 text-muted max-w-700 mx-auto mb-4">
          Melbourne Online Food Delivery System with <strong class="text-success">$0 Customer Service Fees</strong>
        </p>

        <div class="d-flex flex-wrap justify-content-center gap-3 my-3">
          <div class="badge bg-dark border border-secondary px-3 py-2 text-start">
            <i class="bi bi-file-earmark-text text-warning me-2"></i><strong>Deliverable:</strong> SRS & Architecture
          </div>
          <div class="badge bg-dark border border-secondary px-3 py-2 text-start">
            <i class="bi bi-layers-fill text-info me-2"></i><strong>Frontend:</strong> 11 Interactive Web Pages
          </div>
          <div class="badge bg-dark border border-secondary px-3 py-2 text-start">
            <i class="bi bi-cloud-arrow-up-fill text-success me-2"></i><strong>Deployment:</strong> SFTP Automated Pipeline
          </div>
        </div>

        <div class="mt-4 pt-3 border-top border-secondary opacity-75 d-flex gap-4 fs-6 text-muted">
          <span><i class="bi bi-person-circle me-1"></i> FoodMate Engineering Team</span>
          <span><i class="bi bi-geo-alt-fill me-1 text-danger"></i> Melbourne, VIC</span>
          <span><i class="bi bi-code-slash me-1 text-primary"></i> PSR-12 & ISO/IEC 25010 Compliant</span>
        </div>
      </div>
    </section>

    <!-- SLIDE 2: Problem Statement & Value Prop -->
    <section class="slide" id="slide-2">
      <div class="slide-card">
        <div class="slide-header-badge"><i class="bi bi-lightbulb-fill"></i> Executive Context</div>
        <h2 class="slide-title">Market Problem & The FoodMate Solution</h2>
        <p class="slide-subtitle">Transforming the food delivery ecosystem for Melbourne diners and local restaurants.</p>

        <div class="row g-4 my-auto">
          <div class="col-md-6">
            <div class="p-4 rounded-4 bg-danger bg-opacity-10 border border-danger border-opacity-25 h-100">
              <h4 class="text-danger fw-bold mb-3"><i class="bi bi-x-circle-fill me-2"></i> Traditional Delivery Platforms</h4>
              <ul class="text-light opacity-90 d-flex flex-column gap-2 mb-0">
                <li><strong>Heavy Customer Surcharges:</strong> Service fees, delivery surcharges, and hidden markups.</li>
                <li><strong>High Restaurant Commissions:</strong> Up to 30% revenue cuts on small local businesses.</li>
                <li><strong>Fragmented Communication:</strong> Poor visibility between customer, restaurant, & driver.</li>
                <li><strong>Data Privacy Concerns:</strong> Unrestricted user tracking without explicit DPIA oversight.</li>
              </ul>
            </div>
          </div>

          <div class="col-md-6">
            <div class="p-4 rounded-4 bg-success bg-opacity-10 border border-success border-opacity-25 h-100">
              <h4 class="text-success fw-bold mb-3"><i class="bi bi-check-circle-fill me-2"></i> The FoodMate Innovation</h4>
              <ul class="text-light opacity-90 d-flex flex-column gap-2 mb-0">
                <li><strong>$0 Ordering Service Fee:</strong> Transparent pricing with zero hidden surcharges.</li>
                <li><strong>Fair Restaurant Partner Model:</strong> Low tier-based commission structure.</li>
                <li><strong>Unified 4-Role Ecosystem:</strong> Customer, Restaurant, Delivery Driver, & Admin.</li>
                <li><strong>Privacy by Design:</strong> Full Data Protection Impact Assessment (DPIA) integration.</li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- SLIDE 3: SRS & Compliance -->
    <section class="slide" id="slide-3">
      <div class="slide-card">
        <div class="slide-header-badge"><i class="bi bi-shield-check"></i> System Governance</div>
        <h2 class="slide-title">SRS Specification & Quality Attributes</h2>
        <p class="slide-subtitle">Formally documented in <code>Food_Mate_SRS_Report.md</code> adhering to ISO/IEC 25010 standards.</p>

        <div class="row g-4 my-auto">
          <div class="col-md-4">
            <div class="metric-card h-100 text-start">
              <i class="bi bi-speedometer2 fs-1 text-warning mb-2"></i>
              <h4 class="fw-bold text-white">Performance Target</h4>
              <p class="text-muted small">Sub-2-second average page response times & support for 500+ concurrent users with zero latency spikes.</p>
              <div class="badge bg-warning bg-opacity-20 text-warning border border-warning">ISO/IEC 25010</div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="metric-card h-100 text-start">
              <i class="bi bi-shield-lock-fill fs-1 text-success mb-2"></i>
              <h4 class="fw-bold text-white">Security & Privacy</h4>
              <p class="text-muted small">HTTPS protocol enforcement, bcrypt/Argon2 password hashing, PDO prepared statements, & DPIA anonymization.</p>
              <div class="badge bg-success bg-opacity-20 text-success border border-success">DPIA Compliant</div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="metric-card h-100 text-start">
              <i class="bi bi-code-square fs-1 text-info mb-2"></i>
              <h4 class="fw-bold text-white">Code Maintainability</h4>
              <p class="text-muted small">PSR-12 PHP backend standards, modular component architecture, and clean separation of concerns.</p>
              <div class="badge bg-info bg-opacity-20 text-info border border-info">PSR-12 Ready</div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- SLIDE 4: Architecture & Diagrams -->
    <section class="slide" id="slide-4">
      <div class="slide-card">
        <div class="slide-header-badge"><i class="bi bi-diagram-3-fill"></i> System Design</div>
        <h2 class="slide-title">UML Architecture & Data Modeling</h2>
        <p class="slide-subtitle">Complete structural and behavioral system modeling located in the <code>Diagram/</code> directory.</p>

        <div class="row g-3 my-auto">
          <div class="col-md-4">
            <div class="diagram-thumb">
              <i class="bi bi-people-fill fs-2 text-primary"></i>
              <h6 class="fw-bold text-white mt-2 mb-1">Use Case Diagram</h6>
              <p class="text-muted small mb-0">Role interactions across 4 user personas.</p>
            </div>
          </div>
          <div class="col-md-4">
            <div class="diagram-thumb">
              <i class="bi bi-arrow-down-up fs-2 text-success"></i>
              <h6 class="fw-bold text-white mt-2 mb-1">Level 0 & 1 DFD</h6>
              <p class="text-muted small mb-0">Order, payment & menu data flows.</p>
            </div>
          </div>
          <div class="col-md-4">
            <div class="diagram-thumb">
              <i class="bi bi-database-fill-check fs-2 text-warning"></i>
              <h6 class="fw-bold text-white mt-2 mb-1">Entity Relationship (ERD)</h6>
              <p class="text-muted small mb-0">11 normalized relational database entities.</p>
            </div>
          </div>
          <div class="col-md-6">
            <div class="diagram-thumb">
              <i class="bi bi-diagram-2-fill fs-2 text-info"></i>
              <h6 class="fw-bold text-white mt-2 mb-1">Class Diagram</h6>
              <p class="text-muted small mb-0">Object-oriented model hierarchy (User, Order, Menu, Payment).</p>
            </div>
          </div>
          <div class="col-md-6">
            <div class="diagram-thumb">
              <i class="bi bi-clock-history fs-2 text-purple"></i>
              <h6 class="fw-bold text-white mt-2 mb-1">Sequence Diagram</h6>
              <p class="text-muted small mb-0">End-to-end messaging lifecycle from cart checkout to delivery.</p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- SLIDE 5: Multi-Role Frontend -->
    <section class="slide" id="slide-5">
      <div class="slide-card">
        <div class="slide-header-badge"><i class="bi bi-laptop-fill"></i> Frontend Architecture</div>
        <h2 class="slide-title">11-Page Integrated Web Application Suite</h2>
        <p class="slide-subtitle">Modular HTML5, Vanilla CSS3 Glassmorphic UI, Bootstrap 5, & JavaScript ES6+ engine.</p>

        <div class="row g-3 my-auto">
          <div class="col-md-3">
            <div class="p-3 rounded-3 bg-dark border border-secondary text-start">
              <span class="badge bg-primary mb-2">Customer</span>
              <h6 class="text-white fw-bold">Customer Portal</h6>
              <p class="text-muted small mb-0"><code>index.php</code><br><code>restaurants.php</code><br><code>restaurant-detail.php</code></p>
            </div>
          </div>
          <div class="col-md-3">
            <div class="p-3 rounded-3 bg-dark border border-secondary text-start">
              <span class="badge bg-warning text-dark mb-2">Ordering</span>
              <h6 class="text-white fw-bold">Checkout & Tracking</h6>
              <p class="text-muted small mb-0"><code>checkout.php</code><br><code>track-order.php</code><br><code>dashboard.php</code></p>
            </div>
          </div>
          <div class="col-md-3">
            <div class="p-3 rounded-3 bg-dark border border-secondary text-start">
              <span class="badge bg-success mb-2">Partner</span>
              <h6 class="text-white fw-bold">Dashboards</h6>
              <p class="text-muted small mb-0"><code>restaurant-dashboard.php</code><br><code>delivery-dashboard.php</code></p>
            </div>
          </div>
          <div class="col-md-3">
            <div class="p-3 rounded-3 bg-dark border border-secondary text-start">
              <span class="badge bg-danger mb-2">Admin</span>
              <h6 class="text-white fw-bold">Platform Governance</h6>
              <p class="text-muted small mb-0"><code>admin-dashboard.php</code><br><code>login.php</code><br><code>privacy-terms.php</code></p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- SLIDE 6: Application Showcase & Demo Links -->
    <section class="slide" id="slide-6">
      <div class="slide-card">
        <div class="slide-header-badge"><i class="bi bi-play-circle-fill"></i> Live Application Showcase</div>
        <h2 class="slide-title">Interactive Portals & User Workflows</h2>
        <p class="slide-subtitle">Click any portal below to launch the live functional prototype directly in your browser.</p>

        <div class="row g-3 my-auto">
          <div class="col-md-4">
            <a href="index.php" target="_blank" class="text-decoration-none">
              <div class="p-3 rounded-4 bg-dark border border-secondary text-start h-100 hover-card">
                <i class="bi bi-shop fs-2 text-warning mb-2"></i>
                <h5 class="text-white fw-bold">Customer Portal</h5>
                <p class="text-muted small">Search restaurants, view menus, add to cart, & experience $0 fee checkout.</p>
                <span class="btn btn-sm btn-outline-warning w-100">Open Customer App <i class="bi bi-arrow-right"></i></span>
              </div>
            </a>
          </div>

          <div class="col-md-4">
            <a href="restaurant-dashboard.php" target="_blank" class="text-decoration-none">
              <div class="p-3 rounded-4 bg-dark border border-secondary text-start h-100 hover-card">
                <i class="bi bi-receipt fs-2 text-success mb-2"></i>
                <h5 class="text-white fw-bold">Restaurant Dashboard</h5>
                <p class="text-muted small">Accept incoming orders, update dish availability, & track daily sales.</p>
                <span class="btn btn-sm btn-outline-success w-100">Open Partner App <i class="bi bi-arrow-right"></i></span>
              </div>
            </a>
          </div>

          <div class="col-md-4">
            <a href="admin-dashboard.php" target="_blank" class="text-decoration-none">
              <div class="p-3 rounded-4 bg-dark border border-secondary text-start h-100 hover-card">
                <i class="bi bi-speedometer fs-2 text-danger mb-2"></i>
                <h5 class="text-white fw-bold">Admin Governance</h5>
                <p class="text-muted small">Monitor system financials, moderate reviews, & view analytics.</p>
                <span class="btn btn-sm btn-outline-danger w-100">Open Admin App <i class="bi bi-arrow-right"></i></span>
              </div>
            </a>
          </div>
        </div>
      </div>
    </section>

    <!-- SLIDE 7: Client Data Engine & Deployment -->
    <section class="slide" id="slide-7">
      <div class="slide-card">
        <div class="slide-header-badge"><i class="bi bi-cpu-fill"></i> Architecture Engine</div>
        <h2 class="slide-title">Client State Engine & Deployment Automation</h2>
        <p class="slide-subtitle">LocalStorage mock data sync in <code>app.js</code> and automated SFTP deployment via <code>deploy.py</code>.</p>

        <div class="row g-4 my-auto">
          <div class="col-md-6">
            <div class="p-4 rounded-4 bg-dark border border-secondary h-100">
              <h4 class="text-warning fw-bold mb-3"><i class="bi bi-database-fill me-2"></i> LocalStorage Data Engine (<code>app.js</code>)</h4>
              <ul class="text-light opacity-90 d-flex flex-column gap-2 mb-0">
                <li><strong>Persistent State:</strong> Mock database storing restaurants, menus, cart items, orders, & user reviews.</li>
                <li><strong>Cross-Tab Sync:</strong> Actions in Restaurant Dashboard instantly sync to Customer Order Tracking.</li>
                <li><strong>Notification Engine:</strong> Custom dynamic glassmorphic toast alert system.</li>
              </ul>
            </div>
          </div>

          <div class="col-md-6">
            <div class="p-4 rounded-4 bg-dark border border-secondary h-100">
              <h4 class="text-info fw-bold mb-3"><i class="bi bi-cloud-upload-fill me-2"></i> SFTP Deployment Script (<code>deploy.py</code>)</h4>
              <ul class="text-light opacity-90 d-flex flex-column gap-2 mb-0">
                <li><strong>Automated Pipeline:</strong> Custom Python script using <code>paramiko</code> SSH/SFTP library.</li>
                <li><strong>Production Target:</strong> Pushes frontend builds to remote server (<code>mehedihasan.au:2222</code>).</li>
                <li><strong>One-Command Release:</strong> Zero manual FTP file uploads required during deployment.</li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- SLIDE 8: Quantitative Achievements -->
    <section class="slide" id="slide-8">
      <div class="slide-card">
        <div class="slide-header-badge"><i class="bi bi-check2-circle"></i> Milestone Results</div>
        <h2 class="slide-title">Quantitative Achievements to Date</h2>
        <p class="slide-subtitle">100% of Phase 1 functional and documentation deliverables complete.</p>

        <div class="row g-4 my-auto">
          <div class="col-md-3">
            <div class="metric-card">
              <div class="metric-val">11</div>
              <div class="text-white fw-semibold">Web Pages Built</div>
              <div class="text-muted small">Fully Responsive</div>
            </div>
          </div>
          <div class="col-md-3">
            <div class="metric-card">
              <div class="metric-val">6</div>
              <div class="text-white fw-semibold">UML Diagrams</div>
              <div class="text-muted small">Complete System Spec</div>
            </div>
          </div>
          <div class="col-md-3">
            <div class="metric-card">
              <div class="metric-val">$0</div>
              <div class="text-white fw-semibold">Service Fee USP</div>
              <div class="text-muted small">Unique Advantage</div>
            </div>
          </div>
          <div class="col-md-3">
            <div class="metric-card">
              <div class="metric-val">100%</div>
              <div class="text-white fw-semibold">SRS Compliance</div>
              <div class="text-muted small">ISO/IEC 25010</div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- SLIDE 9: Future Technical Roadmap -->
    <section class="slide" id="slide-9">
      <div class="slide-card">
        <div class="slide-header-badge"><i class="bi bi-signpost-split-fill"></i> Project Roadmap</div>
        <h2 class="slide-title">Future Engineering Roadmap (Phases 2–5)</h2>
        <p class="slide-subtitle">Planned sprints for production backend migration, real-time messaging, PWA, and AI features.</p>

        <div class="my-auto">
          <div class="row g-3">
            <div class="col-md-3">
              <div class="timeline-phase">
                <span class="badge bg-primary mb-2">Phase 2 • Sprints 5–6</span>
                <h6 class="text-white fw-bold">PHP & MySQL Backend</h6>
                <p class="text-muted small mb-0">PHP RESTful API, PDO prepared statements, MySQL database migration, JWT auth & password hashing.</p>
              </div>
            </div>
            <div class="col-md-3">
              <div class="timeline-phase">
                <span class="badge bg-success mb-2">Phase 3 • Sprints 7–8</span>
                <h6 class="text-white fw-bold">WebSockets & Payments</h6>
                <p class="text-muted small mb-0">Socket.io real-time order alerts, Stripe & PayPal SDK payment gateway, Twilio SMS receipts.</p>
              </div>
            </div>
            <div class="col-md-3">
              <div class="timeline-phase">
                <span class="badge bg-warning text-dark mb-2">Phase 4 • Sprints 9–10</span>
                <h6 class="text-white fw-bold">PWA & Driver Mobile App</h6>
                <p class="text-muted small mb-0">Progressive Web App conversion, service workers, offline support, driver background GPS app.</p>
              </div>
            </div>
            <div class="col-md-3">
              <div class="timeline-phase">
                <span class="badge bg-purple text-white mb-2" style="background-color: var(--purple-accent);">Phase 5 • Sprints 11–12</span>
                <h6 class="text-white fw-bold">AI & Route Optimization</h6>
                <p class="text-muted small mb-0">Personalized AI dish recommendation engine & automated smart driver dispatch optimization.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- SLIDE 10: Conclusion & Q&A -->
    <section class="slide" id="slide-10">
      <div class="slide-card text-center justify-content-center align-items-center">
        <div class="slide-header-badge mx-auto"><i class="bi bi-check-all"></i> Wrap Up</div>
        <h2 class="slide-title display-4">Thank You!</h2>
        <p class="slide-subtitle max-w-600 mx-auto">
          FoodMate has successfully delivered a complete SRS, system architecture, and 11-page interactive web prototype. We welcome your questions and feedback.
        </p>

        <div class="d-flex gap-3 mt-3">
          <a href="index.php" target="_blank" class="btn btn-warning btn-lg fw-bold px-4"><i class="bi bi-play-circle-fill me-2"></i> Experience FoodMate App</a>
          <button onclick="currentSlideIndex=0; updateSlideDisplay();" class="btn btn-outline-light btn-lg px-4"><i class="bi bi-arrow-counterclockwise me-2"></i> Restart Slide Deck</button>
        </div>
      </div>
    </section>

  </main>

  <!-- Bottom Control Bar -->
  <footer class="deck-footer">
    <div class="d-flex align-items-center gap-2">
      <button class="nav-btn" id="prevBtn" onclick="prevSlide()"><i class="bi bi-chevron-left"></i> Previous</button>
      <button class="nav-btn" id="nextBtn" onclick="nextSlide()">Next <i class="bi bi-chevron-right"></i></button>
    </div>

    <div class="text-muted small font-monospace">
      Slide <span id="currentSlideNum" class="text-white fw-bold">1</span> of <span id="totalSlidesNum" class="text-white">10</span>
    </div>

    <div class="text-muted small">
      Press <kbd class="bg-dark text-warning border border-secondary px-2">←</kbd> <kbd class="bg-dark text-warning border border-secondary px-2">→</kbd> to navigate
    </div>
  </footer>

  <!-- Modal: Speaker Notes -->
  <div class="modal fade" id="speakerNotesModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content modal-glass">
        <div class="modal-header border-secondary">
          <h5 class="modal-title fw-bold"><i class="bi bi-journal-text text-warning me-2"></i> Speaker Presentation Script</h5>
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body text-light" id="speakerNotesBody" style="line-height: 1.7; font-size: 1.05rem;">
          <!-- Dynamic Content based on current slide -->
        </div>
      </div>
    </div>
  </div>

  <!-- Modal: Slide Overview Grid -->
  <div class="modal fade" id="overviewModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
      <div class="modal-content modal-glass">
        <div class="modal-header border-secondary">
          <h5 class="modal-title fw-bold"><i class="bi bi-grid-3x3-gap-fill text-primary me-2"></i> Slide Deck Overview</h5>
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="overview-grid" id="overviewGrid"></div>
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

  <script>
    const SPEAKER_SCRIPTS = [
      /* Slide 1 */ "Welcome everyone! FoodMate is Melbourne's zero-service-fee online food delivery system engineered to empower diners and local restaurant partners. Phase 1 deliverables are 100% complete.",
      /* Slide 2 */ "Traditional platforms extract up to 30% commission from small businesses and charge heavy service fees to consumers. FoodMate introduces a $0 service fee USP to drive adoption.",
      /* Slide 3 */ "Our Software Requirements Specification (Food_Mate_SRS_Report.md) enforces ISO/IEC 25010 standards, sub-2-second target page loads, PSR-12 readiness, and DPIA privacy compliance.",
      /* Slide 4 */ "We mapped end-to-end architecture in the Diagram/ directory, including Use Case diagrams, Level 0 & 1 DFDs, ERD database modeling with 11 entities, Class Diagrams, and Sequence Diagrams.",
      /* Slide 5 */ "We engineered an 11-page responsive web suite covering Customer browsing, Order tracking, Restaurant management, Driver logistics, and Admin governance.",
      /* Slide 6 */ "Every single page is live and interactive. Click any portal to test the Customer ordering workflow, Restaurant order queue, or Admin financial moderation.",
      /* Slide 7 */ "Client state engine app.js provides LocalStorage data persistence, toast alerts, and cross-tab sync. Custom script deploy.py provides automated SFTP releases to production.",
      /* Slide 8 */ "We achieved 100% of Phase 1 deliverables: 11 web pages, 6 UML diagrams, complete SRS documentation, zero framework bloat, and lightweight performance.",
      /* Slide 9 */ "Our future roadmap spans Phases 2 through 5: PHP/MySQL REST API migration, WebSockets live messaging, Stripe payments, mobile driver PWA, and AI dish recommendations.",
      /* Slide 10 */ "Thank you! FoodMate is ready for Phase 2 backend integration. We now invite your questions and feedback."
    ];

    let currentSlideIndex = 0;
    const slides = document.querySelectorAll('.slide');
    const totalSlides = slides.length;

    document.getElementById('totalSlidesNum').textContent = totalSlides;

    function updateSlideDisplay() {
      slides.forEach((slide, idx) => {
        if (idx === currentSlideIndex) {
          slide.classList.add('active');
        } else {
          slide.classList.remove('active');
        }
      });

      document.getElementById('currentSlideNum').textContent = currentSlideIndex + 1;
      document.getElementById('progressBar').style.width = `${((currentSlideIndex + 1) / totalSlides) * 100}%`;

      document.getElementById('prevBtn').disabled = currentSlideIndex === 0;
      document.getElementById('nextBtn').disabled = currentSlideIndex === totalSlides - 1;

      // Update speaker notes content
      document.getElementById('speakerNotesBody').innerHTML = `
        <div class="badge bg-warning text-dark mb-2">Slide ${currentSlideIndex + 1} Spoken Script</div>
        <p>${SPEAKER_SCRIPTS[currentSlideIndex]}</p>
      `;
    }

    function nextSlide() {
      if (currentSlideIndex < totalSlides - 1) {
        currentSlideIndex++;
        updateSlideDisplay();
      }
    }

    function prevSlide() {
      if (currentSlideIndex > 0) {
        currentSlideIndex--;
        updateSlideDisplay();
      }
    }

    function goToSlide(index) {
      currentSlideIndex = index;
      updateSlideDisplay();
      const overviewModal = bootstrap.Modal.getInstance(document.getElementById('overviewModal'));
      if (overviewModal) overviewModal.hide();
    }

    function toggleSpeakerNotes() {
      const modal = new bootstrap.Modal(document.getElementById('speakerNotesModal'));
      modal.show();
    }

    function toggleOverview() {
      const grid = document.getElementById('overviewGrid');
      grid.innerHTML = '';
      slides.forEach((slide, idx) => {
        const titleEl = slide.querySelector('.slide-title');
        const titleText = titleEl ? titleEl.textContent : `Slide ${idx + 1}`;
        const div = document.createElement('div');
        div.className = `overview-item ${idx === currentSlideIndex ? 'active' : ''}`;
        div.innerHTML = `
          <div class="text-warning fw-bold small">Slide ${idx + 1}</div>
          <div class="text-white fw-semibold small mt-1">${titleText}</div>
        `;
        div.onclick = () => goToSlide(idx);
        grid.appendChild(div);
      });

      const modal = new bootstrap.Modal(document.getElementById('overviewModal'));
      modal.show();
    }

    function toggleFullScreen() {
      if (!document.fullscreenElement) {
        document.documentElement.requestFullscreen().catch(err => console.log(err));
      } else {
        if (document.exitFullscreen) document.exitFullscreen();
      }
    }

    // Keyboard controls
    document.addEventListener('keydown', (e) => {
      if (e.key === 'ArrowRight' || e.key === ' ' || e.key === 'PageDown') {
        nextSlide();
      } else if (e.key === 'ArrowLeft' || e.key === 'PageUp') {
        prevSlide();
      } else if (e.key === 'Home') {
        goToSlide(0);
      } else if (e.key === 'End') {
        goToSlide(totalSlides - 1);
      } else if (e.key.toLowerCase() === 'n') {
        toggleSpeakerNotes();
      } else if (e.key.toLowerCase() === 'o') {
        toggleOverview();
      } else if (e.key.toLowerCase() === 'f') {
        toggleFullScreen();
      }
    });

    // Initialize
    updateSlideDisplay();
  </script>
</body>
</html>
