// Food Mate — Front-End Application Logic (LL FR Implementations)

// Global Mock Database & Initializer
const DEFAULT_RESTAURANTS = [
  {
    id: 1,
    name: "Luigi's Pizzeria",
    cuisine: "Italian",
    rating: 4.8,
    deliveryTime: "20-30 min",
    deliveryFee: 2.50,
    address: "142 Lygon Street, Carlton, Melbourne",
    image: "https://images.unsplash.com/photo-1513104890138-7c749659a591?w=800&auto=format&fit=crop",
    menu: [
      { id: 101, category: "Mains", name: "Margherita Supreme", price: 18.50, image: "https://images.unsplash.com/photo-1604382354936-07c5d9983bd3?w=500&auto=format&fit=crop", desc: "Fresh mozzarella, San Marzano tomatoes, basil", available: true },
      { id: 102, category: "Mains", name: "Truffle Mushroom Pizza", price: 22.00, image: "https://images.unsplash.com/photo-1574071318508-1cdbab80d002?w=500&auto=format&fit=crop", desc: "Wild mushrooms, truffle oil, garlic cream", available: true },
      { id: 103, category: "Starters", name: "Garlic Focaccia", price: 9.50, image: "https://images.unsplash.com/photo-1573140247632-f8fd74997d5c?w=500&auto=format&fit=crop", desc: "Wood-fired with rosemary & sea salt", available: true },
      { id: 104, category: "Drinks", name: "Italian Sparkling Water", price: 4.50, image: "https://images.unsplash.com/photo-1551024709-8f23befc6f87?w=500&auto=format&fit=crop", desc: "Panna 750ml", available: true }
    ],
    reviews: [
      { id: 1, user: "Sarah M.", rating: 5, date: "2026-08-10", comment: "Best wood-fired pizza in Melbourne! Delivered hot." },
      { id: 2, user: "David K.", rating: 4, date: "2026-08-08", comment: "Delicious food, zero service fee is a great bonus." }
    ]
  },
  {
    id: 2,
    name: "Smash Burger Co.",
    cuisine: "American",
    rating: 4.6,
    deliveryTime: "15-25 min",
    deliveryFee: 3.00,
    address: "88 Chapel Street, Prahran, Melbourne",
    image: "https://images.unsplash.com/photo-1568901346375-23c9450c58cd?w=800&auto=format&fit=crop",
    menu: [
      { id: 201, category: "Mains", name: "Double Cheese Smash", price: 16.00, image: "https://images.unsplash.com/photo-1568901346375-23c9450c58cd?w=500&auto=format&fit=crop", desc: "Dual Angus patties, double cheddar, secret sauce", available: true },
      { id: 202, category: "Starters", name: "Loaded Truffle Fries", price: 8.50, image: "https://images.unsplash.com/photo-1576107232684-1279f3908594?w=500&auto=format&fit=crop", desc: "Crispy fries with parmesan & truffle aioli", available: true },
      { id: 203, category: "Drinks", name: "Thick Chocolate Milkshake", price: 7.00, image: "https://images.unsplash.com/photo-1572490122747-3968b75cc699?w=500&auto=format&fit=crop", desc: "Hand-spun gelato shake", available: true }
    ],
    reviews: [
      { id: 3, user: "Alex T.", rating: 5, date: "2026-08-12", comment: "Super juicy burgers and lightning fast delivery." }
    ]
  },
  {
    id: 3,
    name: "Tokyo Bites",
    cuisine: "Japanese",
    rating: 4.9,
    deliveryTime: "30-45 min",
    deliveryFee: 0.00,
    address: "210 Bourke Street, Melbourne CBD",
    image: "https://images.unsplash.com/photo-1579871494447-9811cf80d66c?w=800&auto=format&fit=crop",
    menu: [
      { id: 301, category: "Mains", name: "Salmon Sashimi Deluxe", price: 24.00, image: "https://images.unsplash.com/photo-1579871494447-9811cf80d66c?w=500&auto=format&fit=crop", desc: "12 pcs fresh Tasmanian Atlantic salmon", available: true },
      { id: 302, category: "Mains", name: "Tonkotsu Black Ramen", price: 19.50, image: "https://images.unsplash.com/photo-1569718212165-3a8278d5f624?w=500&auto=format&fit=crop", desc: "Rich pork broth, black garlic oil, chashu", available: true },
      { id: 303, category: "Starters", name: "Edamame Sea Salt", price: 6.50, image: "https://images.unsplash.com/photo-1546069901-ba9599a7e63c?w=500&auto=format&fit=crop", desc: "Steamed soybeans with Japanese sea salt", available: true }
    ],
    reviews: [
      { id: 4, user: "Emily C.", rating: 5, date: "2026-08-14", comment: "Freshest sashimi in town. Always consistent." }
    ]
  }
];

// Initialize Storage
if (!localStorage.getItem('fm_restaurants')) {
  localStorage.setItem('fm_restaurants', JSON.stringify(DEFAULT_RESTAURANTS));
}
if (!localStorage.getItem('fm_cart')) {
  localStorage.setItem('fm_cart', JSON.stringify([]));
}
if (!localStorage.getItem('fm_orders')) {
  localStorage.setItem('fm_orders', JSON.stringify([
    {
      id: "FM-8092",
      date: "2026-08-15 12:45",
      restaurantName: "Luigi's Pizzeria",
      items: [
        { name: "Margherita Supreme", qty: 2, price: 18.50 },
        { name: "Garlic Focaccia", qty: 1, price: 9.50 }
      ],
      subtotal: 46.50,
      deliveryFee: 2.50,
      discount: 5.00,
      total: 44.00,
      status: "Out for Delivery",
      customerName: "Alex Johnson",
      deliveryAddress: "350 Elizabeth St, Melbourne VIC 3000",
      driverName: "Michael Chang (Toyota Prius - VIC 1AB2CD)",
      paymentMethod: "Credit Card (Visa **** 4242)"
    }
  ]));
}

let RESTAURANTS = JSON.parse(localStorage.getItem('fm_restaurants'));

// Global Cart Functions
function getCart() {
  return JSON.parse(localStorage.getItem('fm_cart')) || [];
}

function saveCart(cart) {
  localStorage.setItem('fm_cart', JSON.stringify(cart));
  updateCartBadge();
}

function addToCart(restaurantId, item) {
  let cart = getCart();
  const existing = cart.find(i => i.id === item.id);
  if (existing) {
    existing.qty += 1;
  } else {
    cart.push({ ...item, restaurantId, qty: 1 });
  }
  saveCart(cart);
  showToast(`Added "${item.name}" to cart!`, 'success');
}

function updateCartQty(itemId, change) {
  let cart = getCart();
  const item = cart.find(i => i.id === itemId);
  if (item) {
    item.qty += change;
    if (item.qty <= 0) {
      cart = cart.filter(i => i.id !== itemId);
    }
  }
  saveCart(cart);
}

function updateCartBadge() {
  const cart = getCart();
  const count = cart.reduce((sum, i) => sum + i.qty, 0);
  document.querySelectorAll('.cart-count').forEach(badge => {
    badge.textContent = count;
    badge.style.display = count > 0 ? 'flex' : 'none';
  });
}

// Toast Notification System
function showToast(message, type = 'info') {
  let container = document.getElementById('toastContainer');
  if (!container) {
    container = document.createElement('div');
    container.id = 'toastContainer';
    container.style.position = 'fixed';
    container.style.bottom = '25px';
    container.style.right = '25px';
    container.style.zIndex = '9999';
    document.body.appendChild(container);
  }

  const toast = document.createElement('div');
  let iconClass = 'bi-info-circle-fill text-info';
  if (type === 'success') iconClass = 'bi-check-circle-fill text-success';
  if (type === 'warning') iconClass = 'bi-exclamation-triangle-fill text-warning';
  if (type === 'danger') iconClass = 'bi-x-circle-fill text-danger';

  toast.className = 'glass-panel p-3 mb-2 d-flex align-items-center gap-3 shadow-lg';
  toast.style.transform = 'translateY(50px)';
  toast.style.opacity = '0';
  toast.style.transition = 'all 0.3s ease';
  toast.innerHTML = `<i class="bi ${iconClass} fs-4"></i> <span class="fw-semibold text-dark">${message}</span>`;

  container.appendChild(toast);

  setTimeout(() => {
    toast.style.transform = 'translateY(0)';
    toast.style.opacity = '1';
  }, 20);

  setTimeout(() => {
    toast.style.transform = 'translateY(20px)';
    toast.style.opacity = '0';
    setTimeout(() => toast.remove(), 300);
  }, 3500);
}

// Navbar Scroll Effect
document.addEventListener('DOMContentLoaded', () => {
  updateCartBadge();
  const navbar = document.getElementById('mainNav');
  if (navbar) {
    window.addEventListener('scroll', () => {
      if (window.scrollY > 40) {
        navbar.classList.add('glass-nav', 'shadow-sm');
      } else {
        navbar.classList.remove('glass-nav', 'shadow-sm');
      }
    });
  }

  // Sidebar Toggle
  const toggleBtn = document.getElementById('sidebarToggle');
  const sidebar = document.getElementById('sidebar');
  if (toggleBtn && sidebar) {
    toggleBtn.addEventListener('click', (e) => {
      e.preventDefault();
      sidebar.classList.toggle('show');
    });
  }
});

