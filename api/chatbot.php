<?php
require_once 'config.php';
session_start();

header('Content-Type: application/json');

$inputJSON = file_get_contents('php://input');
$input = json_decode($inputJSON, TRUE);

$message = isset($input['message']) ? trim($input['message']) : '';

if (empty($message)) {
    echo json_encode(['response' => "How can I help you today?"]);
    exit;
}

$apiKey = getenv('OPENAI_API_KEY');
if (!$apiKey) {
    echo json_encode(['response' => "Sorry, the AI is currently offline (API key not configured)."]);
    exit;
}

// 1. Fetch real restaurant and menu data
try {
    $restStmt = $pdo->query("SELECT RestaurantID, Name, CuisineType, DeliveryFeeAmount FROM RESTAURANT WHERE Status = 'Active'");
    $restaurants = $restStmt->fetchAll(PDO::FETCH_ASSOC);

    $menuStmt = $pdo->query("SELECT * FROM MENU_ITEM");
    $menuItems = $menuStmt->fetchAll(PDO::FETCH_ASSOC);
    
    // Group menu items by restaurant for the AI context
    $dbData = [];
    foreach ($restaurants as $r) {
        $r['menu'] = array_filter($menuItems, function($m) use ($r) {
            return $m['RestaurantID'] == $r['RestaurantID'];
        });
        // reindex array
        $r['menu'] = array_values($r['menu']);
        $dbData[] = $r;
    }
} catch (Exception $e) {
    echo json_encode(['response' => "Sorry, I cannot access the database right now."]);
    exit;
}

// 2. Prepare conversation context
if (!isset($_SESSION['chat_history'])) {
    $_SESSION['chat_history'] = [];
}

$systemPrompt = "You are Food Mate Assistant, a helpful AI food ordering assistant.
You help users find restaurants and menu items from the Food Mate database.
Only recommend items and restaurants that exist in the provided database data. Never invent items, prices, or restaurants.
When a user asks for recommendations, mention the restaurant name, item name, and price.
If a user wants to order or add something to their cart, or if you are highly recommending a specific item, you MUST include an HTML button in your response to allow them to add it to their cart.
To let the user add an item to their cart, output an HTML button exactly like this (replace with real data):
<br><button onclick='addToCart(RESTAURANT_ID, {\"id\": ITEM_ID, \"name\": \"ITEM_NAME\", \"price\": ITEM_PRICE, \"image\": \"ITEM_IMAGE_URL\"})' style='background:var(--terracotta,#d9534f);color:white;padding:6px 16px;border-radius:50px;text-decoration:none;font-size:0.82rem;font-weight:600;border:none;margin-top:5px;cursor:pointer;'>Add ITEM_NAME to Cart</button><br>
Note: For the JSON object inside addToCart, make sure to escape single quotes properly or use valid syntax. The safest is passing it as a well-formed JSON object string if needed, but standard JS object syntax inside double-quoted onclick works: onclick='addToCart(1, {\"id\": 101, \"name\": \"Pizza\", \"price\": 18.5, \"image\": \"\"})'.
Format your response in HTML to look good in a chat interface. Use <br>, <strong>, etc. Keep responses concise and friendly.
Here is the real database data you must use:
" . json_encode($dbData);

$messages = [
    ['role' => 'system', 'content' => $systemPrompt]
];

// Append history (last 10 messages to save tokens)
$history = array_slice($_SESSION['chat_history'], -10);
foreach ($history as $msg) {
    $messages[] = $msg;
}

$messages[] = ['role' => 'user', 'content' => $message];

// 3. Call OpenAI API
$ch = curl_init('https://api.openai.com/v1/chat/completions');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    'Content-Type: application/json',
    'Authorization: Bearer ' . $apiKey
]);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode([
    'model' => 'gpt-4o-mini',
    'messages' => $messages,
    'temperature' => 0.7,
    'max_tokens' => 500
]));

$responseJson = curl_exec($ch);
$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);

if ($httpCode !== 200 || !$responseJson) {
    echo json_encode(['response' => "I'm having trouble connecting to my AI brain right now. Please try again later."]);
    exit;
}

$responseData = json_decode($responseJson, true);
$aiReply = $responseData['choices'][0]['message']['content'] ?? "Sorry, I couldn't generate a response.";

// 4. Update history
$_SESSION['chat_history'][] = ['role' => 'user', 'content' => $message];
$_SESSION['chat_history'][] = ['role' => 'assistant', 'content' => $aiReply];

echo json_encode([
    'response' => $aiReply,
    'reply'    => $aiReply
]);
?>
