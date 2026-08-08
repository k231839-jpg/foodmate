/* ============================================================
   FOOD MATE — Shared Application JavaScript
   Cart, Toasts, Navigation, Data, Forms, Animations
   ============================================================ */

// ── Simulated Data ──
const RESTAURANTS = [
  {
    id: 1, name: "The Burger Joint", cuisine: "American", rating: 4.8,
    deliveryTime: "25-35 min", deliveryFee: 3.99, image: "https://images.unsplash.com/photo-1568901346375-23c9450c58cd?w=400&h=300&fit=crop",
    address: "42 Collins Street, Melbourne", hours: "10:00 AM - 10:00 PM",
    menu: [
      { id: 101, name: "Classic Smash Burger", desc: "Juicy beef patty, melted cheddar, lettuce, tomato, pickles & special sauce", price: 14.90, category: "Mains", available: true, image: "https://images.unsplash.com/photo-1568901346375-23c9450c58cd?w=200&h=200&fit=crop" },
      { id: 102, name: "Crispy Chicken Burger", desc: "Southern fried chicken, slaw, jalapeño mayo on a brioche bun", price: 15.90, category: "Mains", available: true, image: "https://images.unsplash.com/photo-1606755962773-d324e0a13086?w=200&h=200&fit=crop" },
      { id: 103, name: "Loaded Fries", desc: "Seasoned fries topped with cheese sauce, bacon bits & spring onions", price: 9.90, category: "Starters", available: true, image: "https://images.unsplash.com/photo-1573080496219-bb080dd4f877?w=200&h=200&fit=crop" },
      { id: 104, name: "Onion Rings", desc: "Beer-battered crispy onion rings with smoky chipotle dip", price: 8.50, category: "Starters", available: true, image: "https://images.unsplash.com/photo-1639024471283-03518883512d?w=200&h=200&fit=crop" },
      { id: 105, name: "Chocolate Brownie", desc: "Warm fudgy brownie with vanilla ice cream & chocolate drizzle", price: 10.90, category: "Desserts", available: true, image: "https://images.unsplash.com/photo-1606313564200-e75d5e30476c?w=200&h=200&fit=crop" },
      { id: 106, name: "Coca Cola", desc: "330ml can", price: 3.50, category: "Drinks", available: true, image: "https://images.unsplash.com/photo-1629203851122-3726ecdf080e?w=200&h=200&fit=crop" },
    ]
  },
  {
    id: 2, name: "Pasta Palace", cuisine: "Italian", rating: 4.7,
    deliveryTime: "30-40 min", deliveryFee: 4.50, image: "https://images.unsplash.com/photo-1563379926898-05f4575a45d8?w=400&h=300&fit=crop",
    address: "15 Lygon Street, Melbourne", hours: "11:00 AM - 9:30 PM",
    menu: [
      { id: 201, name: "Spaghetti Carbonara", desc: "Classic Roman pasta with guanciale, pecorino, egg & black pepper", price: 18.90, category: "Mains", available: true, image: "https://images.unsplash.com/photo-1612874742237-6526221588e3?w=200&h=200&fit=crop" },
      { id: 202, name: "Margherita Pizza", desc: "San Marzano tomatoes, fresh mozzarella, basil on a thin crust", price: 16.90, category: "Mains", available: true, image: "https://images.unsplash.com/photo-1574071318508-1cdbab80d002?w=200&h=200&fit=crop" },
      { id: 203, name: "Bruschetta", desc: "Toasted sourdough with fresh tomatoes, garlic, basil & olive oil", price: 11.50, category: "Starters", available: true, image: "https://images.unsplash.com/photo-1572695157366-5e585ab2b69f?w=200&h=200&fit=crop" },
      { id: 204, name: "Tiramisu", desc: "Classic Italian dessert with espresso-soaked ladyfingers & mascarpone", price: 12.90, category: "Desserts", available: true, image: "https://images.unsplash.com/photo-1571877227200-a0d98ea607e9?w=200&h=200&fit=crop" },
      { id: 205, name: "Limoncello Spritz", desc: "Refreshing Italian cocktail with prosecco & lemon", price: 9.50, category: "Drinks", available: false, image: "https://images.unsplash.com/photo-1513558161293-cdaf765ed514?w=200&h=200&fit=crop" },
    ]
  },
  {
    id: 3, name: "Sushi Central", cuisine: "Japanese", rating: 4.9,
    deliveryTime: "20-30 min", deliveryFee: 2.99, image: "https://images.unsplash.com/photo-1579584425555-c3ce17fd4351?w=400&h=300&fit=crop",
    address: "88 Swanston Street, Melbourne", hours: "11:30 AM - 9:00 PM",
    menu: [
      { id: 301, name: "Salmon Sashimi (8pc)", desc: "Premium fresh Atlantic salmon, thinly sliced with wasabi & ginger", price: 19.90, category: "Mains", available: true, image: "https://images.unsplash.com/photo-1579584425555-c3ce17fd4351?w=200&h=200&fit=crop" },
      { id: 302, name: "Dragon Roll", desc: "Eel, cucumber, avocado topped with tobiko and unagi sauce", price: 16.50, category: "Mains", available: true, image: "https://images.unsplash.com/photo-1617196034796-73dfa7b1fd56?w=200&h=200&fit=crop" },
      { id: 303, name: "Edamame", desc: "Steamed edamame beans with sea salt", price: 6.90, category: "Starters", available: true, image: "https://images.unsplash.com/photo-1564834744159-ff0ea41ba4b9?w=200&h=200&fit=crop" },
      { id: 304, name: "Mochi Ice Cream (3pc)", desc: "Green tea, strawberry & mango mochi ice cream", price: 8.90, category: "Desserts", available: true, image: "https://images.unsplash.com/photo-1563805042-7684c019e1cb?w=200&h=200&fit=crop" },
    ]
  },
  {
    id: 4, name: "Pizza House", cuisine: "Italian", rating: 4.6,
    deliveryTime: "25-35 min", deliveryFee: 3.50, image: "https://images.unsplash.com/photo-1565299624946-b28f40a0ae38?w=400&h=300&fit=crop",
    address: "7 Chapel Street, Melbourne", hours: "10:30 AM - 11:00 PM",
    menu: [
      { id: 401, name: "Pepperoni Pizza", desc: "Loaded with pepperoni, mozzarella & oregano on our signature dough", price: 17.90, category: "Mains", available: true, image: "https://images.unsplash.com/photo-1628840042765-356cda07504e?w=200&h=200&fit=crop" },
      { id: 402, name: "BBQ Chicken Pizza", desc: "Smoky BBQ sauce, grilled chicken, red onion, capsicum & mozzarella", price: 19.90, category: "Mains", available: true, image: "https://images.unsplash.com/photo-1565299624946-b28f40a0ae38?w=200&h=200&fit=crop" },
      { id: 403, name: "Garlic Bread", desc: "Oven-baked garlic bread with herb butter & melted cheese", price: 7.90, category: "Starters", available: true, image: "https://images.unsplash.com/photo-1619535860434-ba1d8fa12536?w=200&h=200&fit=crop" },
    ]
  },
  {
    id: 5, name: "Spice Garden", cuisine: "Indian", rating: 4.7,
    deliveryTime: "30-45 min", deliveryFee: 4.00, image: "https://images.unsplash.com/photo-1585937421612-70a008356fbe?w=400&h=300&fit=crop",
    address: "33 Smith Street, Melbourne", hours: "11:00 AM - 10:00 PM",
    menu: [
      { id: 501, name: "Butter Chicken", desc: "Tender chicken in a rich, creamy tomato-based curry with basmati rice", price: 18.90, category: "Mains", available: true, image: "https://images.unsplash.com/photo-1603894584373-5ac82b2ae398?w=200&h=200&fit=crop" },
      { id: 502, name: "Lamb Biryani", desc: "Fragrant basmati rice slow-cooked with spiced lamb, saffron & herbs", price: 21.90, category: "Mains", available: true, image: "https://images.unsplash.com/photo-1563379091339-03b21ab4a4f8?w=200&h=200&fit=crop" },
      { id: 503, name: "Samosas (4pc)", desc: "Crispy pastry filled with spiced potato & peas with mint chutney", price: 8.90, category: "Starters", available: true, image: "https://images.unsplash.com/photo-1601050690597-df0568f70950?w=200&h=200&fit=crop" },
      { id: 504, name: "Garlic Naan", desc: "Soft, fluffy naan bread with garlic butter", price: 4.50, category: "Starters", available: true, image: "https://images.unsplash.com/photo-1565557623262-b51c2513a641?w=200&h=200&fit=crop" },
      { id: 505, name: "Gulab Jamun", desc: "Soft milk dumplings in warm rose-cardamom syrup", price: 7.90, category: "Desserts", available: true, image: "https://images.unsplash.com/photo-1666190059764-f5ed8b2849df?w=200&h=200&fit=crop" },
      { id: 506, name: "Mango Lassi", desc: "Creamy yoghurt shake blended with fresh Alphonso mango", price: 6.50, category: "Drinks", available: true, image: "https://images.unsplash.com/photo-1527661591475-527312dd65f5?w=200&h=200&fit=crop" },
    ]
  },
  {
    id: 6, name: "Taco Fiesta", cuisine: "Mexican", rating: 4.5,
    deliveryTime: "20-30 min", deliveryFee: 3.00, image: "https://images.unsplash.com/photo-1565299585323-38d6b0865b47?w=400&h=300&fit=crop",
    address: "55 Brunswick Street, Melbourne", hours: "11:00 AM - 9:00 PM",
    menu: [
      { id: 601, name: "Beef Tacos (3pc)", desc: "Seasoned beef, fresh salsa, guacamole, sour cream in corn tortillas", price: 15.90, category: "Mains", available: true, image: "https://images.unsplash.com/photo-1565299585323-38d6b0865b47?w=200&h=200&fit=crop" },
      { id: 602, name: "Burrito Bowl", desc: "Grilled chicken, rice, black beans, corn, pico de gallo & jalapeños", price: 17.50, category: "Mains", available: true, image: "https://images.unsplash.com/photo-1626700051175-6818013e1d4f?w=200&h=200&fit=crop" },
      { id: 603, name: "Nachos Grande", desc: "Crispy tortilla chips loaded with cheese, beans, salsa & guac", price: 13.90, category: "Starters", available: true, image: "https://images.unsplash.com/photo-1513456852971-30c0b8199d4d?w=200&h=200&fit=crop" },
      { id: 604, name: "Churros", desc: "Cinnamon sugar churros with rich chocolate dipping sauce", price: 9.90, category: "Desserts", available: true, image: "https://images.unsplash.com/photo-1624371414361-0b5311e8ef8c?w=200&h=200&fit=crop" },
    ]
  },
];

const SAMPLE_ORDERS = [
  { id: "FM-20241", restaurant: "The Burger Joint", date: "07 Aug 2026", total: 38.70, status: "Delivered", items: ["Classic Smash Burger x2", "Loaded Fries x1"] },
  { id: "FM-20240", restaurant: "Sushi Central", date: "05 Aug 2026", total: 46.30, status: "Delivered", items: ["Salmon Sashimi x1", "Dragon Roll x1", "Edamame x1"] },
  { id: "FM-20239", restaurant: "Spice Garden", date: "03 Aug 2026", total: 52.80, status: "Delivered", items: ["Butter Chicken x1", "Lamb Biryani x1", "Garlic Naan x2"] },
  { id: "FM-20238", restaurant: "Pasta Palace", date: "01 Aug 2026", total: 30.40, status: "Cancelled", items: ["Spaghetti Carbonara x1", "Bruschetta x1"] },
  { id: "FM-20237", restaurant: "Pizza House", date: "28 Jul 2026", total: 25.80, status: "Delivered", items: ["Pepperoni Pizza x1", "Garlic Bread x1"] },
];

// ── Cart Management (localStorage) ──
const Cart = {
  KEY: 'foodmate_cart',

  getItems() {
    try {
      return JSON.parse(localStorage.getItem(this.KEY)) || [];
    } catch { return []; }
  },

  saveItems(items) {
    localStorage.setItem(this.KEY, JSON.stringify(items));
    this.updateUI();
  },

  addItem(item) {
    const items = this.getItems();
    const existing = items.find(i => i.id === item.id);
    if (existing) {
      existing.qty += 1;
    } else {
      items.push({ ...item, qty: 1 });
    }
    this.saveItems(items);
    showToast(`${item.name} added to cart`, 'success');
  },

  removeItem(itemId) {
    let items = this.getItems().filter(i => i.id !== itemId);
    this.saveItems(items);
  },

  updateQty(itemId, qty) {
    let items = this.getItems();
    const item = items.find(i => i.id === itemId);
    if (item) {
      item.qty = Math.max(1, qty);
    }
    this.saveItems(items);
  },

  getTotal() {
    return this.getItems().reduce((sum, item) => sum + (item.price * item.qty), 0);
  },

  getCount() {
    return this.getItems().reduce((sum, item) => sum + item.qty, 0);
  },

  clear() {
    localStorage.removeItem(this.KEY);
    this.updateUI();
  },

  updateUI() {
    // Update all cart count badges on the page
    document.querySelectorAll('.cart-count').forEach(el => {
      const count = this.getCount();
      el.textContent = count;
      el.style.display = count > 0 ? 'flex' : 'none';
    });
    // Update cart total displays
    document.querySelectorAll('.cart-total-display').forEach(el => {
      el.textContent = `$${this.getTotal().toFixed(2)}`;
    });
  }
};


// ── Toast Notification System ──
function showToast(message, type = 'info') {
  let container = document.querySelector('.toast-container-custom');
  if (!container) {
    container = document.createElement('div');
    container.className = 'toast-container-custom';
    document.body.appendChild(container);
  }

  const icons = { success: 'bi-check-circle-fill', error: 'bi-x-circle-fill', info: 'bi-info-circle-fill' };
  const toast = document.createElement('div');
  toast.className = `toast-custom ${type}`;
  toast.innerHTML = `
    <i class="bi ${icons[type] || icons.info}" style="font-size:1.15rem; color: var(--${type === 'error' ? 'danger' : type === 'success' ? 'success' : 'info'})"></i>
    <span style="flex:1; font-size:0.88rem">${message}</span>
    <button onclick="this.parentElement.remove()" style="background:none; border:none; color:var(--text-muted); cursor:pointer; padding:0"><i class="bi bi-x"></i></button>
  `;
  container.appendChild(toast);
  setTimeout(() => toast.remove(), 4000);
}


// ── Navbar Scroll Effect ──
function initNavbar() {
  const navbar = document.querySelector('.navbar-foodmate');
  if (!navbar) return;
  window.addEventListener('scroll', () => {
    navbar.classList.toggle('scrolled', window.scrollY > 50);
  });
}


// ── Active Page Highlighting ──
function setActivePage() {
  const currentPage = window.location.pathname.split('/').pop() || 'index.html';
  document.querySelectorAll('.navbar-foodmate .nav-link').forEach(link => {
    const href = link.getAttribute('href');
    if (href === currentPage || (currentPage === '' && href === 'index.html')) {
      link.classList.add('active');
    }
  });
}


// ── Scroll Reveal Animation ──
function initScrollReveal() {
  const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        entry.target.classList.add('animate-fadeInUp');
        observer.unobserve(entry.target);
      }
    });
  }, { threshold: 0.1 });

  document.querySelectorAll('.reveal').forEach(el => {
    el.style.opacity = '0';
    observer.observe(el);
  });
}


// ── Counter Animation (for dashboard stats) ──
function animateCounters() {
  document.querySelectorAll('[data-count]').forEach(el => {
    const target = parseInt(el.dataset.count);
    const duration = 1500;
    const step = target / (duration / 16);
    let current = 0;
    const timer = setInterval(() => {
      current += step;
      if (current >= target) {
        el.textContent = target.toLocaleString();
        clearInterval(timer);
      } else {
        el.textContent = Math.floor(current).toLocaleString();
      }
    }, 16);
  });
}


// ── Form Validation ──
function validateForm(formEl) {
  let isValid = true;
  formEl.querySelectorAll('[required]').forEach(input => {
    const value = input.value.trim();
    const errorEl = input.parentElement.querySelector('.invalid-feedback') || input.nextElementSibling;

    if (!value) {
      input.classList.add('is-invalid');
      isValid = false;
    } else if (input.type === 'email' && !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(value)) {
      input.classList.add('is-invalid');
      isValid = false;
    } else {
      input.classList.remove('is-invalid');
    }
  });
  return isValid;
}


// ── Password Toggle ──
function initPasswordToggles() {
  document.querySelectorAll('.password-toggle .toggle-btn').forEach(btn => {
    btn.addEventListener('click', () => {
      const input = btn.parentElement.querySelector('input');
      const icon = btn.querySelector('i');
      if (input.type === 'password') {
        input.type = 'text';
        icon.className = 'bi bi-eye-slash';
      } else {
        input.type = 'password';
        icon.className = 'bi bi-eye';
      }
    });
  });
}


// ── Sidebar Toggle (Mobile) ──
function initSidebar() {
  const toggleBtn = document.querySelector('.sidebar-toggle');
  const sidebar = document.querySelector('.sidebar');
  const overlay = document.querySelector('.sidebar-overlay');

  if (toggleBtn && sidebar) {
    toggleBtn.addEventListener('click', () => {
      sidebar.classList.toggle('open');
      if (overlay) overlay.classList.toggle('show');
    });
    if (overlay) {
      overlay.addEventListener('click', () => {
        sidebar.classList.remove('open');
        overlay.classList.remove('show');
      });
    }
  }
}


// ── Restaurant Favorite Toggle ──
function initFavorites() {
  document.querySelectorAll('.fav-btn').forEach(btn => {
    btn.addEventListener('click', (e) => {
      e.stopPropagation();
      e.preventDefault();
      btn.classList.toggle('active');
      const icon = btn.querySelector('i');
      if (btn.classList.contains('active')) {
        icon.className = 'bi bi-heart-fill';
        showToast('Added to favorites', 'success');
      } else {
        icon.className = 'bi bi-heart';
        showToast('Removed from favorites', 'info');
      }
    });
  });
}


// ── Filter Pills ──
function initFilterPills() {
  document.querySelectorAll('.filter-pills').forEach(container => {
    const pills = container.querySelectorAll('.filter-pill');
    pills.forEach(pill => {
      pill.addEventListener('click', () => {
        pills.forEach(p => p.classList.remove('active'));
        pill.classList.add('active');
        const filter = pill.dataset.filter;
        filterItems(filter);
      });
    });
  });
}

function filterItems(filter) {
  const cards = document.querySelectorAll('[data-cuisine]');
  cards.forEach(card => {
    if (filter === 'all' || card.dataset.cuisine.toLowerCase() === filter.toLowerCase()) {
      card.style.display = '';
      card.style.animation = 'fadeInUp 0.4s ease forwards';
    } else {
      card.style.display = 'none';
    }
  });
}


// ── Menu Tabs ──
function initMenuTabs() {
  const tabs = document.querySelectorAll('.menu-tabs .tab');
  tabs.forEach(tab => {
    tab.addEventListener('click', () => {
      tabs.forEach(t => t.classList.remove('active'));
      tab.classList.add('active');
      const category = tab.dataset.category;
      document.querySelectorAll('.menu-category-section').forEach(section => {
        if (category === 'all' || section.dataset.category === category) {
          section.style.display = '';
        } else {
          section.style.display = 'none';
        }
      });
    });
  });
}


// ── Get Restaurant by ID (from URL params) ──
function getRestaurantFromURL() {
  const params = new URLSearchParams(window.location.search);
  const id = parseInt(params.get('id'));
  return RESTAURANTS.find(r => r.id === id) || RESTAURANTS[0];
}


// ── Render Stars ──
function renderStars(rating) {
  const full = Math.floor(rating);
  const half = rating % 1 >= 0.5 ? 1 : 0;
  const empty = 5 - full - half;
  let html = '';
  for (let i = 0; i < full; i++) html += '<i class="bi bi-star-fill"></i>';
  if (half) html += '<i class="bi bi-star-half"></i>';
  for (let i = 0; i < empty; i++) html += '<i class="bi bi-star"></i>';
  return html;
}


// ── Format Currency ──
function formatPrice(price) {
  return `$${price.toFixed(2)}`;
}


// ── Init on DOM Ready ──
document.addEventListener('DOMContentLoaded', () => {
  initNavbar();
  setActivePage();
  initScrollReveal();
  initPasswordToggles();
  initSidebar();
  initFavorites();
  initFilterPills();
  initMenuTabs();
  Cart.updateUI();

  // Animate counters if on dashboard
  if (document.querySelector('[data-count]')) {
    const observer = new IntersectionObserver((entries) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          animateCounters();
          observer.disconnect();
        }
      });
    });
    const firstCounter = document.querySelector('[data-count]');
    if (firstCounter) observer.observe(firstCounter);
  }
});
