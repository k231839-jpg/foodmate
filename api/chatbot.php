<?php
header('Content-Type: application/json');

// Get the raw POST data
$inputJSON = file_get_contents('php://input');
$input = json_decode($inputJSON, TRUE);

$message = isset($input['message']) ? strtolower(trim($input['message'])) : '';
$response = "I'm sorry, I didn't understand that. You can ask me about ordering, delivery fees, or tracking your order.";

if (empty($message)) {
    echo json_encode(['response' => "How can I help you today?"]);
    exit;
}

// Rule-based logic (ordered by specificity)
if (strpos($message, 'track') !== false || strpos($message, 'status') !== false || strpos($message, 'where') !== false) {
    $response = "Track your order in real-time! <br><br><a href='track-order.php' style='background:var(--terracotta,#d9534f);color:white;padding:6px 16px;border-radius:50px;text-decoration:none;font-size:0.82rem;font-weight:600;'>📦 Track My Order</a>";
} elseif (strpos($message, 'hello') !== false || strpos($message, 'hi') !== false || strpos($message, 'hey') !== false) {
    $response = "Hi there! 👋 I'm your Food Mate Assistant. How can I assist you with your meal today?";
} elseif (strpos($message, 'fee') !== false || strpos($message, 'cost') !== false || strpos($message, 'charge') !== false) {
    $response = "🎉 Great news! At Food Mate, we charge a <strong>$0 service fee</strong> on every order — you only pay the menu price!";
} elseif (strpos($message, 'pizza') !== false) {
    $response = "Looking for fresh wood-fired pizza? <br><br><a href='restaurants.php?filter=italian' style='background:var(--terracotta,#d9534f);color:white;padding:6px 16px;border-radius:50px;text-decoration:none;font-size:0.82rem;font-weight:600;'>🍕 Show Pizza Places</a>";
} elseif (strpos($message, 'burger') !== false) {
    $response = "Craving juicy burgers? <br><br><a href='restaurants.php?filter=american' style='background:var(--terracotta,#d9534f);color:white;padding:6px 16px;border-radius:50px;text-decoration:none;font-size:0.82rem;font-weight:600;'>🍔 Show Burger Joints</a>";
} elseif (strpos($message, 'sushi') !== false || strpos($message, 'japanese') !== false) {
    $response = "Fresh sushi and ramen waiting for you: <br><br><a href='restaurants.php?filter=japanese' style='background:var(--terracotta,#d9534f);color:white;padding:6px 16px;border-radius:50px;text-decoration:none;font-size:0.82rem;font-weight:600;'>🍣 Show Japanese Places</a>";
} elseif (strpos($message, 'indian') !== false || strpos($message, 'curry') !== false) {
    $response = "Explore rich, aromatic curries: <br><br><a href='restaurants.php?filter=indian' style='background:var(--terracotta,#d9534f);color:white;padding:6px 16px;border-radius:50px;text-decoration:none;font-size:0.82rem;font-weight:600;'>🍛 Show Indian Restaurants</a>";
} elseif (strpos($message, 'free delivery') !== false || strpos($message, 'delivery') !== false) {
    $response = "Many of our partner restaurants offer free delivery! <br><br><a href='restaurants.php?filter=free-delivery' style='background:var(--terracotta,#d9534f);color:white;padding:6px 16px;border-radius:50px;text-decoration:none;font-size:0.82rem;font-weight:600;'>🚲 Free Delivery Places</a>";
} elseif (strpos($message, 'offer') !== false || strpos($message, 'deal') !== false || strpos($message, 'discount') !== false || strpos($message, 'promo') !== false) {
    $response = "Use promo code <strong>FOODMATE10</strong> at checkout for $5 off your order!";
} elseif (strpos($message, 'order') !== false) {
    $response = "To place an order, browse our restaurants, add delicious dishes to your cart, and proceed to checkout!";
} elseif (strpos($message, 'restaurant') !== false || strpos($message, 'food') !== false || strpos($message, 'eat') !== false) {
    $response = "Explore top local restaurants across Melbourne: <br><br><a href='restaurants.php' style='background:var(--terracotta,#d9534f);color:white;padding:6px 16px;border-radius:50px;text-decoration:none;font-size:0.82rem;font-weight:600;'>🍽️ Browse Restaurants</a>";
} elseif (strpos($message, 'pay') !== false || strpos($message, 'card') !== false || strpos($message, 'paypal') !== false || strpos($message, 'cod') !== false) {
    $response = "We accept Cash on Delivery, Credit/Debit Card, and PayPal — all with $0 service fees.";
} elseif (strpos($message, 'contact') !== false || strpos($message, 'support') !== false || strpos($message, 'help') !== false) {
    $response = "You can contact our friendly support team anytime at support@foodmate.com.au.";
}

echo json_encode([
    'response' => $response,
    'reply'    => $response
]);
?>
