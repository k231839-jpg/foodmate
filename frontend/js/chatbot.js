/**
 * Food Mate Assistant — Premium Chatbot Widget
 * Redesigned with dark-green / terracotta theme
 */

(function () {
  // ── Inject HTML ──────────────────────────────────────────────
  const html = `
  <!-- Food Mate Chatbot Widget -->
  <button class="chatbot-toggle-btn" id="chatbotToggle" title="Chat with Food Mate Assistant">
    <i class="bi bi-chat-dots-fill"></i>
  </button>

  <div class="chatbot-widget" id="chatbotWidget">
    <div class="chatbot-header">
      <div class="bot-info">
        <div class="bot-avatar"><i class="bi bi-egg-fried"></i></div>
        <div>
          <div class="bot-name">Food Mate Assistant</div>
          <div class="bot-status">● Online — here to help</div>
        </div>
      </div>
      <button id="chatbotClose"><i class="bi bi-x-lg"></i></button>
    </div>

    <div class="chatbot-messages" id="chatbotMessages">
      <div class="chat-message bot">
        Hi! 👋 I'm your <strong>Food Mate Assistant</strong>.<br>What can I help you find today?
      </div>
    </div>

    <div class="chatbot-quick-actions" id="chatbotQuickActions">
      <button data-action="find-restaurants">🍽️ Find Restaurants</button>
      <button data-action="find-pizza">🍕 Find Pizza</button>
      <button data-action="track-order">📦 Track My Order</button>
      <button data-action="offers">🏷️ Today's Offers</button>
      <button data-action="free-delivery">🚲 Free Delivery</button>
      <button data-action="payment-help">💳 Payment Help</button>
    </div>

    <div class="chatbot-input">
      <input type="text" id="chatbotInput" placeholder="Ask me anything..." autocomplete="off">
      <button id="chatbotSend"><i class="bi bi-send-fill"></i></button>
    </div>
  </div>`;

  const container = document.createElement('div');
  container.innerHTML = html;
  document.body.appendChild(container);

  // ── Elements ─────────────────────────────────────────────────
  const toggle   = document.getElementById('chatbotToggle');
  const widget   = document.getElementById('chatbotWidget');
  const closeBtn = document.getElementById('chatbotClose');
  const messages = document.getElementById('chatbotMessages');
  const input    = document.getElementById('chatbotInput');
  const sendBtn  = document.getElementById('chatbotSend');
  const qActions = document.getElementById('chatbotQuickActions');

  // ── Toggle open / close ───────────────────────────────────────
  toggle.addEventListener('click', () => {
    widget.classList.toggle('active');
    toggle.innerHTML = widget.classList.contains('active')
      ? '<i class="bi bi-x-lg"></i>'
      : '<i class="bi bi-chat-dots-fill"></i>';
  });

  closeBtn.addEventListener('click', () => {
    widget.classList.remove('active');
    toggle.innerHTML = '<i class="bi bi-chat-dots-fill"></i>';
  });

  // ── Append message bubble ─────────────────────────────────────
  function addMessage(text, role = 'bot') {
    const div = document.createElement('div');
    div.className = `chat-message ${role}`;
    div.innerHTML = text;
    messages.appendChild(div);
    messages.scrollTop = messages.scrollHeight;
  }

  // ── Typing indicator ──────────────────────────────────────────
  function showTyping() {
    const div = document.createElement('div');
    div.className = 'chat-message bot';
    div.id = 'typingIndicator';
    div.innerHTML = '<span style="opacity:0.5">Food Mate is typing…</span>';
    messages.appendChild(div);
    messages.scrollTop = messages.scrollHeight;
  }

  function removeTyping() {
    const el = document.getElementById('typingIndicator');
    if (el) el.remove();
  }

  // ── Quick-action routing ──────────────────────────────────────
  const quickResponses = {
    'find-restaurants' : { text: 'Great! Here are all our local Melbourne restaurants:', link: 'restaurants.php', label: '🍽️ Browse Restaurants' },
    'find-pizza'       : { text: 'Craving pizza? Let\'s find the best ones near you!', link: 'restaurants.php?filter=pizza', label: '🍕 Show Pizza Places' },
    'track-order'      : { text: 'You can track your order in real-time here:', link: 'track-order.php', label: '📦 Track My Order' },
    'offers'           : { text: 'Here are today\'s exclusive Food Mate deals:', link: 'restaurants.php#offers', label: '🏷️ See Today\'s Offers' },
    'free-delivery'    : { text: 'Great news! Many local restaurants offer free delivery:', link: 'restaurants.php?filter=free-delivery', label: '🚲 Free Delivery Restaurants' },
    'payment-help'     : { text: 'We accept Cash on Delivery, Credit/Debit Card, and PayPal. All payments are secure and there\'s always <strong>$0 service fee</strong>!', link: null, label: null },
  };

  qActions.addEventListener('click', (e) => {
    const btn = e.target.closest('button');
    if (!btn) return;
    const action = btn.dataset.action;
    const res = quickResponses[action];
    if (!res) return;

    addMessage(btn.textContent, 'user');
    showTyping();

    setTimeout(() => {
      removeTyping();
      let reply = res.text;
      if (res.link) {
        reply += `<br><br><a href="${res.link}" style="display:inline-block; margin-top:6px; background:var(--terracotta); color:white; padding:6px 16px; border-radius:50px; text-decoration:none; font-size:0.82rem; font-weight:600;">${res.label}</a>`;
      }
      addMessage(reply, 'bot');
    }, 800);
  });

  // ── Send text message ─────────────────────────────────────────
  function handleSend() {
    const text = input.value.trim();
    if (!text) return;
    addMessage(text, 'user');
    input.value = '';
    showTyping();

    // Try API first, fall back to local rules
    fetch('api/chatbot.php', {
      method: 'POST',
      headers: { 'Content-Type': 'application/json' },
      body: JSON.stringify({ message: text })
    })
      .then(r => r.json())
      .then(data => {
        removeTyping();
        const botReply = data.response || data.reply || localReply(text);
        addMessage(botReply, 'bot');
      })
      .catch(() => {
        removeTyping();
        addMessage(localReply(text), 'bot');
      });
  }

  // ── Local keyword rules (fallback) ────────────────────────────
  function localReply(text) {
    const t = text.toLowerCase();

    if (/pizza/.test(t))
      return 'Looking for pizza? <br><br><a href="restaurants.php?filter=pizza" style="background:var(--terracotta);color:white;padding:6px 16px;border-radius:50px;text-decoration:none;font-size:0.82rem;font-weight:600;">🍕 Show Pizza Places</a>';

    if (/burger/.test(t))
      return 'Great choice! <br><br><a href="restaurants.php?filter=burgers" style="background:var(--terracotta);color:white;padding:6px 16px;border-radius:50px;text-decoration:none;font-size:0.82rem;font-weight:600;">🍔 Show Burger Joints</a>';

    if (/indian|curry/.test(t))
      return 'Delicious! Here are our Indian restaurants: <br><br><a href="restaurants.php?filter=indian" style="background:var(--terracotta);color:white;padding:6px 16px;border-radius:50px;text-decoration:none;font-size:0.82rem;font-weight:600;">🍛 Show Indian Restaurants</a>';

    if (/japanese|sushi/.test(t))
      return 'Sure! Browse Japanese cuisine here: <br><br><a href="restaurants.php?filter=japanese" style="background:var(--terracotta);color:white;padding:6px 16px;border-radius:50px;text-decoration:none;font-size:0.82rem;font-weight:600;">🍣 Show Japanese Places</a>';

    if (/track|order|where.*order/.test(t))
      return 'Track your order in real-time: <br><br><a href="track-order.php" style="background:var(--terracotta);color:white;padding:6px 16px;border-radius:50px;text-decoration:none;font-size:0.82rem;font-weight:600;">📦 Track My Order</a>';

    if (/fee|service|charge|cost/.test(t))
      return '🎉 Great news! Food Mate charges <strong>$0 service fees</strong> on every order — always. You pay the menu price, nothing more.';

    if (/deliver|free delivery/.test(t))
      return 'Many of our restaurant partners offer free delivery! <br><br><a href="restaurants.php?filter=free-delivery" style="background:var(--terracotta);color:white;padding:6px 16px;border-radius:50px;text-decoration:none;font-size:0.82rem;font-weight:600;">🚲 Browse Free Delivery Restaurants</a>';

    if (/deal|offer|discount|promo/.test(t))
      return 'Check out today\'s exclusive deals: <br><br><a href="restaurants.php#offers" style="background:var(--terracotta);color:white;padding:6px 16px;border-radius:50px;text-decoration:none;font-size:0.82rem;font-weight:600;">🏷️ See Today\'s Offers</a>';

    if (/pay|payment|card|paypal/.test(t))
      return 'We accept <strong>Cash on Delivery</strong>, <strong>Credit/Debit Card</strong>, and <strong>PayPal</strong>. All transactions are secure, with $0 service fees.';

    if (/hello|hi|hey|hiya/.test(t))
      return 'Hi there! 👋 I\'m your Food Mate Assistant. Ask me about restaurants, food, orders, or deals!';

    if (/restaurant|eat|food/.test(t))
      return 'Explore all Melbourne restaurants here: <br><br><a href="restaurants.php" style="background:var(--terracotta);color:white;padding:6px 16px;border-radius:50px;text-decoration:none;font-size:0.82rem;font-weight:600;">🍽️ Browse Restaurants</a>';

    return 'I\'m not sure about that one, but I can help you <a href="restaurants.php" style="color:var(--terracotta);font-weight:600;">browse restaurants</a>, <a href="track-order.php" style="color:var(--terracotta);font-weight:600;">track an order</a>, or find great <a href="restaurants.php#offers" style="color:var(--terracotta);font-weight:600;">deals</a>. Just ask! 😊';
  }

  sendBtn.addEventListener('click', handleSend);
  input.addEventListener('keydown', (e) => { if (e.key === 'Enter') handleSend(); });
})();
