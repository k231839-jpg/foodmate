-- ============================================================
-- Food Mate — Seed Data: Restaurants & Menu Items
-- Run this in phpMyAdmin on: mehedih3_cpro306_g10
-- ============================================================

USE mehedih3_cpro306_g10;

-- ============================================================
-- RESTAURANTS (passwords are hashed 'password123')
-- ============================================================
INSERT INTO RESTAURANT (Name, Address, CuisineType, Email, PasswordHash, ImageURL) VALUES
('Luigi\'s Pizzeria',        '142 Lygon Street, Carlton, Melbourne VIC 3053',    'Italian',   'luigi@foodmate.com',    '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'https://images.unsplash.com/photo-1513104890138-7c749659a591?w=800&auto=format&fit=crop'),
('Smash Burger Co.',         '88 Chapel Street, Prahran, Melbourne VIC 3181',    'American',  'smash@foodmate.com',    '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'https://images.unsplash.com/photo-1568901346375-23c9450c58cd?w=800&auto=format&fit=crop'),
('Tokyo Bites',              '210 Bourke Street, Melbourne CBD VIC 3000',        'Japanese',  'tokyo@foodmate.com',    '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'https://images.unsplash.com/photo-1579871494447-9811cf80d66c?w=800&auto=format&fit=crop'),
('Spice Garden',             '45 Swanston Street, Melbourne CBD VIC 3000',       'Indian',    'spice@foodmate.com',    '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'https://images.unsplash.com/photo-1585937421612-70a008356fbe?w=800&auto=format&fit=crop'),
('Golden Dragon',            '22 Little Bourke Street, Chinatown VIC 3000',      'Chinese',   'golden@foodmate.com',   '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'https://images.unsplash.com/photo-1563245372-f21724e3856d?w=800&auto=format&fit=crop'),
('El Rancho Tacos',          '76 Brunswick Street, Fitzroy VIC 3065',            'Mexican',   'elrancho@foodmate.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'https://images.unsplash.com/photo-1565299585323-38d6b0865b47?w=800&auto=format&fit=crop'),
('Siam Kitchen',             '19 Hardware Lane, Melbourne VIC 3000',             'Thai',      'siam@foodmate.com',     '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'https://images.unsplash.com/photo-1562565652-a0d8f0c59eb4?w=800&auto=format&fit=crop'),
('The Green Bowl',           '33 Smith Street, Collingwood VIC 3066',            'Healthy',   'greenbowl@foodmate.com','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'https://images.unsplash.com/photo-1512621776951-a57141f2eefd?w=800&auto=format&fit=crop'),
('Himalayan Curry House',    '5 Errol Street, North Melbourne VIC 3051',         'Nepalese',  'himalayan@foodmate.com','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'https://images.unsplash.com/photo-1585937421612-70a008356fbe?w=800&auto=format&fit=crop'),
('Seoul Food',               '101 Flinders Lane, Melbourne VIC 3000',            'Korean',    'seoul@foodmate.com',    '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'https://images.unsplash.com/photo-1590301157890-4810ed352733?w=800&auto=format&fit=crop'),
('Mama Mia Pasta',           '60 Toorak Road, South Yarra VIC 3141',             'Italian',   'mamam@foodmate.com',    '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'https://images.unsplash.com/photo-1621996346565-e3dbc646d9a9?w=800&auto=format&fit=crop'),
('Pho Saigon',               '38 Victoria Street, Richmond VIC 3121',            'Vietnamese','pho@foodmate.com',      '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'https://images.unsplash.com/photo-1583224994559-a9dc81b40d44?w=800&auto=format&fit=crop');

-- ============================================================
-- MENU ITEMS — Luigi's Pizzeria (ID 1)
-- ============================================================
INSERT INTO MENU_ITEM (RestaurantID, Name, Price, Category, ImageURL) VALUES
(1, 'Margherita Supreme',      18.50, 'Pizza',    'https://images.unsplash.com/photo-1604382354936-07c5d9983bd3?w=500&auto=format&fit=crop'),
(1, 'Truffle Mushroom Pizza',  22.00, 'Pizza',    'https://images.unsplash.com/photo-1574071318508-1cdbab80d002?w=500&auto=format&fit=crop'),
(1, 'BBQ Chicken Pizza',       21.00, 'Pizza',    'https://images.unsplash.com/photo-1565299624946-b28f40a0ae38?w=500&auto=format&fit=crop'),
(1, 'Spaghetti Carbonara',     19.50, 'Pasta',    'https://images.unsplash.com/photo-1612874742237-6526221588e3?w=500&auto=format&fit=crop'),
(1, 'Penne Arrabbiata',        17.00, 'Pasta',    'https://images.unsplash.com/photo-1621996346565-e3dbc646d9a9?w=500&auto=format&fit=crop'),
(1, 'Garlic Focaccia',          9.50, 'Starters', 'https://images.unsplash.com/photo-1573140247632-f8fd74997d5c?w=500&auto=format&fit=crop'),
(1, 'Bruschetta al Pomodoro',   8.00, 'Starters', 'https://images.unsplash.com/photo-1572695157366-5e585ab2b69f?w=500&auto=format&fit=crop'),
(1, 'Tiramisu',                10.00, 'Desserts', 'https://images.unsplash.com/photo-1571877227200-a0d98ea607e9?w=500&auto=format&fit=crop'),
(1, 'Panna Cotta',              9.00, 'Desserts', 'https://images.unsplash.com/photo-1488477181946-6428a0291777?w=500&auto=format&fit=crop'),
(1, 'Italian Sparkling Water',  4.50, 'Drinks',   'https://images.unsplash.com/photo-1551024709-8f23befc6f87?w=500&auto=format&fit=crop'),
(1, 'House Red Wine',           8.00, 'Drinks',   'https://images.unsplash.com/photo-1510812431401-41d2bd2722f3?w=500&auto=format&fit=crop');

-- ============================================================
-- MENU ITEMS — Smash Burger Co. (ID 2)
-- ============================================================
INSERT INTO MENU_ITEM (RestaurantID, Name, Price, Category, ImageURL) VALUES
(2, 'Double Cheese Smash',     16.00, 'Burgers',  'https://images.unsplash.com/photo-1568901346375-23c9450c58cd?w=500&auto=format&fit=crop'),
(2, 'Bacon Avocado Smash',     18.00, 'Burgers',  'https://images.unsplash.com/photo-1553979459-d2229ba7433b?w=500&auto=format&fit=crop'),
(2, 'Crispy Chicken Smash',    15.50, 'Burgers',  'https://images.unsplash.com/photo-1606755962773-d324e0a13086?w=500&auto=format&fit=crop'),
(2, 'Vegan Black Bean Burger', 15.00, 'Burgers',  'https://images.unsplash.com/photo-1547592166-23ac45744acd?w=500&auto=format&fit=crop'),
(2, 'Loaded Truffle Fries',     8.50, 'Sides',    'https://images.unsplash.com/photo-1576107232684-1279f3908594?w=500&auto=format&fit=crop'),
(2, 'Onion Rings',              6.00, 'Sides',    'https://images.unsplash.com/photo-1639024471283-03518883512d?w=500&auto=format&fit=crop'),
(2, 'Coleslaw',                 4.50, 'Sides',    'https://images.unsplash.com/photo-1612258999684-a9be5f1bec49?w=500&auto=format&fit=crop'),
(2, 'Thick Chocolate Milkshake',7.00, 'Drinks',   'https://images.unsplash.com/photo-1572490122747-3968b75cc699?w=500&auto=format&fit=crop'),
(2, 'Vanilla Milkshake',        6.50, 'Drinks',   'https://images.unsplash.com/photo-1568901346375-23c9450c58cd?w=500&auto=format&fit=crop'),
(2, 'Soft Drink Can',           3.00, 'Drinks',   'https://images.unsplash.com/photo-1622483767028-3f66f32aef97?w=500&auto=format&fit=crop');

-- ============================================================
-- MENU ITEMS — Tokyo Bites (ID 3)
-- ============================================================
INSERT INTO MENU_ITEM (RestaurantID, Name, Price, Category, ImageURL) VALUES
(3, 'Salmon Sashimi (12 pcs)',  24.00, 'Sashimi',  'https://images.unsplash.com/photo-1579871494447-9811cf80d66c?w=500&auto=format&fit=crop'),
(3, 'Tuna Sashimi (8 pcs)',     20.00, 'Sashimi',  'https://images.unsplash.com/photo-1553621042-f6e147245754?w=500&auto=format&fit=crop'),
(3, 'Rainbow Roll (8 pcs)',     22.00, 'Sushi',    'https://images.unsplash.com/photo-1617196034183-421b4040ed20?w=500&auto=format&fit=crop'),
(3, 'Dragon Roll (8 pcs)',      21.00, 'Sushi',    'https://images.unsplash.com/photo-1611143669185-af224c5e3252?w=500&auto=format&fit=crop'),
(3, 'Tonkotsu Black Ramen',     19.50, 'Ramen',    'https://images.unsplash.com/photo-1569718212165-3a8278d5f624?w=500&auto=format&fit=crop'),
(3, 'Spicy Miso Ramen',         18.50, 'Ramen',    'https://images.unsplash.com/photo-1569050467447-ce54b3bbc37d?w=500&auto=format&fit=crop'),
(3, 'Chicken Katsu Don',        17.00, 'Mains',    'https://images.unsplash.com/photo-1569718212165-3a8278d5f624?w=500&auto=format&fit=crop'),
(3, 'Edamame Sea Salt',          6.50, 'Starters', 'https://images.unsplash.com/photo-1546069901-ba9599a7e63c?w=500&auto=format&fit=crop'),
(3, 'Gyoza (6 pcs)',             9.00, 'Starters', 'https://images.unsplash.com/photo-1625938144755-652e08e359b7?w=500&auto=format&fit=crop'),
(3, 'Mochi Ice Cream (3 pcs)',   8.00, 'Desserts', 'https://images.unsplash.com/photo-1563805042-7684c019e1cb?w=500&auto=format&fit=crop'),
(3, 'Matcha Latte',              5.50, 'Drinks',   'https://images.unsplash.com/photo-1536256263959-770b48d82b0a?w=500&auto=format&fit=crop');

-- ============================================================
-- MENU ITEMS — Spice Garden / Indian (ID 4)
-- ============================================================
INSERT INTO MENU_ITEM (RestaurantID, Name, Price, Category, ImageURL) VALUES
(4, 'Butter Chicken',          19.00, 'Mains',    'https://images.unsplash.com/photo-1603894584373-5ac82b2ae398?w=500&auto=format&fit=crop'),
(4, 'Lamb Rogan Josh',         22.00, 'Mains',    'https://images.unsplash.com/photo-1585937421612-70a008356fbe?w=500&auto=format&fit=crop'),
(4, 'Palak Paneer',            17.00, 'Mains',    'https://images.unsplash.com/photo-1631452180519-c014fe946bc7?w=500&auto=format&fit=crop'),
(4, 'Chana Masala',            16.00, 'Mains',    'https://images.unsplash.com/photo-1546833999-b9f581a1996d?w=500&auto=format&fit=crop'),
(4, 'Garlic Naan',              4.00, 'Breads',   'https://images.unsplash.com/photo-1565557623262-b51c2513a641?w=500&auto=format&fit=crop'),
(4, 'Peshwari Naan',            4.50, 'Breads',   'https://images.unsplash.com/photo-1565557623262-b51c2513a641?w=500&auto=format&fit=crop'),
(4, 'Basmati Steamed Rice',     3.50, 'Breads',   'https://images.unsplash.com/photo-1516684732162-798a0062be99?w=500&auto=format&fit=crop'),
(4, 'Samosa (2 pcs)',           6.00, 'Starters', 'https://images.unsplash.com/photo-1601050690597-df0568f70950?w=500&auto=format&fit=crop'),
(4, 'Onion Bhaji',              7.00, 'Starters', 'https://images.unsplash.com/photo-1601050690597-df0568f70950?w=500&auto=format&fit=crop'),
(4, 'Mango Lassi',              5.50, 'Drinks',   'https://images.unsplash.com/photo-1527661591475-527312dd65f5?w=500&auto=format&fit=crop'),
(4, 'Masala Chai',              4.00, 'Drinks',   'https://images.unsplash.com/photo-1571091718767-18b5b1457add?w=500&auto=format&fit=crop'),
(4, 'Gulab Jamun (4 pcs)',       7.50, 'Desserts', 'https://images.unsplash.com/photo-1601050690597-df0568f70950?w=500&auto=format&fit=crop');

-- ============================================================
-- MENU ITEMS — Golden Dragon / Chinese (ID 5)
-- ============================================================
INSERT INTO MENU_ITEM (RestaurantID, Name, Price, Category, ImageURL) VALUES
(5, 'Dim Sum Basket (8 pcs)',   14.00, 'Dim Sum',  'https://images.unsplash.com/photo-1563245372-f21724e3856d?w=500&auto=format&fit=crop'),
(5, 'BBQ Pork Buns (4 pcs)',    10.00, 'Dim Sum',  'https://images.unsplash.com/photo-1563245372-f21724e3856d?w=500&auto=format&fit=crop'),
(5, 'Peking Duck (half)',       38.00, 'Mains',    'https://images.unsplash.com/photo-1525755662778-989d0524087e?w=500&auto=format&fit=crop'),
(5, 'Kung Pao Chicken',        18.00, 'Mains',    'https://images.unsplash.com/photo-1525755662778-989d0524087e?w=500&auto=format&fit=crop'),
(5, 'Sweet & Sour Pork',       17.50, 'Mains',    'https://images.unsplash.com/photo-1525755662778-989d0524087e?w=500&auto=format&fit=crop'),
(5, 'Mapo Tofu',               15.00, 'Mains',    'https://images.unsplash.com/photo-1516684732162-798a0062be99?w=500&auto=format&fit=crop'),
(5, 'Fried Rice',               9.00, 'Sides',    'https://images.unsplash.com/photo-1516684732162-798a0062be99?w=500&auto=format&fit=crop'),
(5, 'Prawn Spring Rolls (4)',    8.50, 'Starters', 'https://images.unsplash.com/photo-1563245372-f21724e3856d?w=500&auto=format&fit=crop'),
(5, 'Jasmine Tea (pot)',         5.00, 'Drinks',   'https://images.unsplash.com/photo-1556679343-c7306c1976bc?w=500&auto=format&fit=crop');

-- ============================================================
-- MENU ITEMS — El Rancho Tacos / Mexican (ID 6)
-- ============================================================
INSERT INTO MENU_ITEM (RestaurantID, Name, Price, Category, ImageURL) VALUES
(6, 'Beef Birria Taco (3)',    16.00, 'Tacos',    'https://images.unsplash.com/photo-1565299585323-38d6b0865b47?w=500&auto=format&fit=crop'),
(6, 'Chicken Tinga Taco (3)', 14.00, 'Tacos',    'https://images.unsplash.com/photo-1565299585323-38d6b0865b47?w=500&auto=format&fit=crop'),
(6, 'Fish Taco (3)',          15.00, 'Tacos',    'https://images.unsplash.com/photo-1565299585323-38d6b0865b47?w=500&auto=format&fit=crop'),
(6, 'Loaded Nachos',          14.00, 'Starters', 'https://images.unsplash.com/photo-1582169505937-b9992bd01ed9?w=500&auto=format&fit=crop'),
(6, 'Guacamole & Chips',       8.00, 'Starters', 'https://images.unsplash.com/photo-1541014741259-de529411b96a?w=500&auto=format&fit=crop'),
(6, 'Chicken Burrito',        17.00, 'Mains',    'https://images.unsplash.com/photo-1626700051175-6818013e1d4f?w=500&auto=format&fit=crop'),
(6, 'Beef Burrito Bowl',      16.50, 'Mains',    'https://images.unsplash.com/photo-1546069901-ba9599a7e63c?w=500&auto=format&fit=crop'),
(6, 'Churros with Dulce',      8.00, 'Desserts', 'https://images.unsplash.com/photo-1587248720327-8eb72564be1e?w=500&auto=format&fit=crop'),
(6, 'Agua Fresca',             5.00, 'Drinks',   'https://images.unsplash.com/photo-1556679343-c7306c1976bc?w=500&auto=format&fit=crop'),
(6, 'Mexican Lager',           6.00, 'Drinks',   'https://images.unsplash.com/photo-1608270586620-248524c67de9?w=500&auto=format&fit=crop');

-- ============================================================
-- MENU ITEMS — Siam Kitchen / Thai (ID 7)
-- ============================================================
INSERT INTO MENU_ITEM (RestaurantID, Name, Price, Category, ImageURL) VALUES
(7, 'Pad Thai (Chicken)',      18.00, 'Noodles',  'https://images.unsplash.com/photo-1562565652-a0d8f0c59eb4?w=500&auto=format&fit=crop'),
(7, 'Pad See Ew',              17.00, 'Noodles',  'https://images.unsplash.com/photo-1562565652-a0d8f0c59eb4?w=500&auto=format&fit=crop'),
(7, 'Green Curry Chicken',     19.00, 'Mains',    'https://images.unsplash.com/photo-1548943487-a2e4e43b4853?w=500&auto=format&fit=crop'),
(7, 'Massaman Beef Curry',     21.00, 'Mains',    'https://images.unsplash.com/photo-1548943487-a2e4e43b4853?w=500&auto=format&fit=crop'),
(7, 'Tom Yum Soup',            14.00, 'Soups',    'https://images.unsplash.com/photo-1547592166-23ac45744acd?w=500&auto=format&fit=crop'),
(7, 'Satay Skewers (4)',       12.00, 'Starters', 'https://images.unsplash.com/photo-1529563021893-cc83c992d75d?w=500&auto=format&fit=crop'),
(7, 'Spring Rolls (4 pcs)',     8.00, 'Starters', 'https://images.unsplash.com/photo-1563245372-f21724e3856d?w=500&auto=format&fit=crop'),
(7, 'Mango Sticky Rice',        9.00, 'Desserts', 'https://images.unsplash.com/photo-1488477181946-6428a0291777?w=500&auto=format&fit=crop'),
(7, 'Thai Iced Tea',            5.00, 'Drinks',   'https://images.unsplash.com/photo-1556679343-c7306c1976bc?w=500&auto=format&fit=crop');

-- ============================================================
-- MENU ITEMS — The Green Bowl / Healthy (ID 8)
-- ============================================================
INSERT INTO MENU_ITEM (RestaurantID, Name, Price, Category, ImageURL) VALUES
(8, 'Acai Power Bowl',         17.00, 'Bowls',    'https://images.unsplash.com/photo-1512621776951-a57141f2eefd?w=500&auto=format&fit=crop'),
(8, 'Buddha Bowl',             16.00, 'Bowls',    'https://images.unsplash.com/photo-1512621776951-a57141f2eefd?w=500&auto=format&fit=crop'),
(8, 'Quinoa Salmon Bowl',      22.00, 'Bowls',    'https://images.unsplash.com/photo-1546069901-ba9599a7e63c?w=500&auto=format&fit=crop'),
(8, 'Grilled Chicken Salad',   18.00, 'Salads',   'https://images.unsplash.com/photo-1512621776951-a57141f2eefd?w=500&auto=format&fit=crop'),
(8, 'Kale Caesar Salad',       15.00, 'Salads',   'https://images.unsplash.com/photo-1546793665-c74683f339c1?w=500&auto=format&fit=crop'),
(8, 'Avocado Toast',           13.00, 'Light',    'https://images.unsplash.com/photo-1588137378633-dea1336ce1e2?w=500&auto=format&fit=crop'),
(8, 'Green Smoothie',           9.00, 'Drinks',   'https://images.unsplash.com/photo-1505252585461-04db1eb84625?w=500&auto=format&fit=crop'),
(8, 'Cold Press Juice',         8.00, 'Drinks',   'https://images.unsplash.com/photo-1613478223719-2ab802602423?w=500&auto=format&fit=crop');

-- ============================================================
-- MENU ITEMS — Himalayan Curry House / Nepalese (ID 9)
-- ============================================================
INSERT INTO MENU_ITEM (RestaurantID, Name, Price, Category, ImageURL) VALUES
(9, 'Chicken Momo (10 pcs)',   16.00, 'Momos',    'https://images.unsplash.com/photo-1563245372-f21724e3856d?w=500&auto=format&fit=crop'),
(9, 'Veg Momo (10 pcs)',       13.00, 'Momos',    'https://images.unsplash.com/photo-1563245372-f21724e3856d?w=500&auto=format&fit=crop'),
(9, 'Lamb Dal Bhat',           22.00, 'Mains',    'https://images.unsplash.com/photo-1585937421612-70a008356fbe?w=500&auto=format&fit=crop'),
(9, 'Chicken Thukpa Noodles',  17.00, 'Noodles',  'https://images.unsplash.com/photo-1562565652-a0d8f0c59eb4?w=500&auto=format&fit=crop'),
(9, 'Sekuwa Grilled Meat',     24.00, 'Mains',    'https://images.unsplash.com/photo-1529563021893-cc83c992d75d?w=500&auto=format&fit=crop'),
(9, 'Masala Chai',              4.00, 'Drinks',   'https://images.unsplash.com/photo-1571091718767-18b5b1457add?w=500&auto=format&fit=crop');

-- ============================================================
-- MENU ITEMS — Seoul Food / Korean (ID 10)
-- ============================================================
INSERT INTO MENU_ITEM (RestaurantID, Name, Price, Category, ImageURL) VALUES
(10, 'Korean BBQ Beef Set',    32.00, 'BBQ',       'https://images.unsplash.com/photo-1590301157890-4810ed352733?w=500&auto=format&fit=crop'),
(10, 'Bibimbap',               18.00, 'Mains',     'https://images.unsplash.com/photo-1590301157890-4810ed352733?w=500&auto=format&fit=crop'),
(10, 'Kimchi Fried Rice',      16.00, 'Mains',     'https://images.unsplash.com/photo-1567050267330-8e8e0a40541d?w=500&auto=format&fit=crop'),
(10, 'Japchae Noodles',        17.00, 'Noodles',   'https://images.unsplash.com/photo-1562565652-a0d8f0c59eb4?w=500&auto=format&fit=crop'),
(10, 'Tteokbokki',             14.00, 'Starters',  'https://images.unsplash.com/photo-1563245372-f21724e3856d?w=500&auto=format&fit=crop'),
(10, 'Korean Fried Chicken',   20.00, 'Mains',     'https://images.unsplash.com/photo-1568901346375-23c9450c58cd?w=500&auto=format&fit=crop'),
(10, 'Bingsu (Mango)',         12.00, 'Desserts',  'https://images.unsplash.com/photo-1563805042-7684c019e1cb?w=500&auto=format&fit=crop'),
(10, 'Banana Milk',             4.50, 'Drinks',    'https://images.unsplash.com/photo-1572490122747-3968b75cc699?w=500&auto=format&fit=crop');

-- ============================================================
-- MENU ITEMS — Mama Mia Pasta / Italian (ID 11)
-- ============================================================
INSERT INTO MENU_ITEM (RestaurantID, Name, Price, Category, ImageURL) VALUES
(11, 'Creamy Tomato Pasta',    18.90, 'Pasta',    'https://images.unsplash.com/photo-1621996346565-e3dbc646d9a9?w=500&auto=format&fit=crop'),
(11, 'Lobster Linguine',       36.00, 'Pasta',    'https://images.unsplash.com/photo-1555949258-eb67b1ef0ceb?w=500&auto=format&fit=crop'),
(11, 'Cacio e Pepe',           20.00, 'Pasta',    'https://images.unsplash.com/photo-1612874742237-6526221588e3?w=500&auto=format&fit=crop'),
(11, 'Risotto ai Funghi',      24.00, 'Risotto',  'https://images.unsplash.com/photo-1476124369491-e7addf5db371?w=500&auto=format&fit=crop'),
(11, 'Seafood Risotto',        28.00, 'Risotto',  'https://images.unsplash.com/photo-1476124369491-e7addf5db371?w=500&auto=format&fit=crop'),
(11, 'Caprese Salad',          13.00, 'Starters', 'https://images.unsplash.com/photo-1592417817098-8fd3d9eb14a5?w=500&auto=format&fit=crop'),
(11, 'Cannoli Siciliani',       9.00, 'Desserts', 'https://images.unsplash.com/photo-1488477181946-6428a0291777?w=500&auto=format&fit=crop'),
(11, 'Espresso',                4.00, 'Drinks',   'https://images.unsplash.com/photo-1510707577719-ae7c14805e3a?w=500&auto=format&fit=crop');

-- ============================================================
-- MENU ITEMS — Pho Saigon / Vietnamese (ID 12)
-- ============================================================
INSERT INTO MENU_ITEM (RestaurantID, Name, Price, Category, ImageURL) VALUES
(12, 'Pho Bo (Beef)',          17.00, 'Pho',      'https://images.unsplash.com/photo-1583224994559-a9dc81b40d44?w=500&auto=format&fit=crop'),
(12, 'Pho Ga (Chicken)',       15.00, 'Pho',      'https://images.unsplash.com/photo-1583224994559-a9dc81b40d44?w=500&auto=format&fit=crop'),
(12, 'Banh Mi Thit',           10.00, 'Banh Mi',  'https://images.unsplash.com/photo-1558981408-db0ecd8a1ee4?w=500&auto=format&fit=crop'),
(12, 'Banh Mi Dac Biet',       12.00, 'Banh Mi',  'https://images.unsplash.com/photo-1558981408-db0ecd8a1ee4?w=500&auto=format&fit=crop'),
(12, 'Fresh Spring Rolls (4)', 11.00, 'Starters', 'https://images.unsplash.com/photo-1563245372-f21724e3856d?w=500&auto=format&fit=crop'),
(12, 'Bun Bo Hue',             18.00, 'Noodles',  'https://images.unsplash.com/photo-1562565652-a0d8f0c59eb4?w=500&auto=format&fit=crop'),
(12, 'Che Thai Dessert',        8.00, 'Desserts', 'https://images.unsplash.com/photo-1488477181946-6428a0291777?w=500&auto=format&fit=crop'),
(12, 'Vietnamese Iced Coffee',  5.50, 'Drinks',   'https://images.unsplash.com/photo-1510707577719-ae7c14805e3a?w=500&auto=format&fit=crop'),
(12, 'Sugarcane Juice',         4.50, 'Drinks',   'https://images.unsplash.com/photo-1613478223719-2ab802602423?w=500&auto=format&fit=crop');

-- ============================================================
-- SAMPLE COUPONS
-- ============================================================
INSERT INTO COUPON (Code, DiscountType, DiscountValue, ExpiryDate, IsActive) VALUES
('WELCOME20',  'percentage', 20.00, '2027-12-31 23:59:59', TRUE),
('FREEDEL',    'percentage', 100.00,'2027-12-31 23:59:59', TRUE),
('SAVE5',      'fixed',       5.00, '2027-06-30 23:59:59', TRUE),
('LUNCH15',    'percentage', 15.00, '2027-12-31 23:59:59', TRUE);

-- ============================================================
-- SAMPLE ADMIN USER (password: admin123)
-- ============================================================
INSERT INTO ADMIN (Name, Email, PasswordHash) VALUES
('Food Mate Admin', 'admin@foodmate.com.au', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi')
ON DUPLICATE KEY UPDATE Name = VALUES(Name);
