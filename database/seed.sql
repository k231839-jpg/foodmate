USE mehedih3_cpro306_g10;

-- Insert Sample Restaurants
INSERT INTO RESTAURANT (Name, Address, CuisineType, Email, PasswordHash, ImageURL) VALUES 
('Luigi''s Pizzeria', '142 Lygon Street, Carlton, Melbourne', 'Italian', 'contact@luigis.com', 'password123', 'https://images.unsplash.com/photo-1513104890138-7c749659a591?w=800&auto=format&fit=crop'),
('Smash Burger Co.', '88 Chapel Street, Prahran, Melbourne', 'American', 'hello@smashburger.com', 'password123', 'https://images.unsplash.com/photo-1568901346375-23c9450c58cd?w=800&auto=format&fit=crop'),
('Tokyo Bites', '210 Bourke Street, Melbourne CBD', 'Japanese', 'info@tokyobites.com', 'password123', 'https://images.unsplash.com/photo-1579871494447-9811cf80d66c?w=800&auto=format&fit=crop');

-- Insert Sample Menu Items for Luigi's Pizzeria (RestaurantID = 1)
INSERT INTO MENU_ITEM (RestaurantID, Name, Price, Category, ImageURL) VALUES 
(1, 'Margherita Supreme', 18.50, 'Mains', 'https://images.unsplash.com/photo-1604382354936-07c5d9983bd3?w=500&auto=format&fit=crop'),
(1, 'Truffle Mushroom Pizza', 22.00, 'Mains', 'https://images.unsplash.com/photo-1574071318508-1cdbab80d002?w=500&auto=format&fit=crop'),
(1, 'Garlic Focaccia', 9.50, 'Starters', 'https://images.unsplash.com/photo-1573140247632-f8fd74997d5c?w=500&auto=format&fit=crop'),
(1, 'Italian Sparkling Water', 4.50, 'Drinks', 'https://images.unsplash.com/photo-1551024709-8f23befc6f87?w=500&auto=format&fit=crop');

-- Insert Sample Menu Items for Smash Burger Co. (RestaurantID = 2)
INSERT INTO MENU_ITEM (RestaurantID, Name, Price, Category, ImageURL) VALUES 
(2, 'Double Cheese Smash', 16.00, 'Mains', 'https://images.unsplash.com/photo-1568901346375-23c9450c58cd?w=500&auto=format&fit=crop'),
(2, 'Loaded Truffle Fries', 8.50, 'Starters', 'https://images.unsplash.com/photo-1576107232684-1279f3908594?w=500&auto=format&fit=crop'),
(2, 'Thick Chocolate Milkshake', 7.00, 'Drinks', 'https://images.unsplash.com/photo-1572490122747-3968b75cc699?w=500&auto=format&fit=crop');

-- Insert Sample Menu Items for Tokyo Bites (RestaurantID = 3)
INSERT INTO MENU_ITEM (RestaurantID, Name, Price, Category, ImageURL) VALUES 
(3, 'Salmon Sashimi Deluxe', 24.00, 'Mains', 'https://images.unsplash.com/photo-1579871494447-9811cf80d66c?w=500&auto=format&fit=crop'),
(3, 'Tonkotsu Black Ramen', 19.50, 'Mains', 'https://images.unsplash.com/photo-1569718212165-3a8278d5f624?w=500&auto=format&fit=crop'),
(3, 'Edamame Sea Salt', 6.50, 'Starters', 'https://images.unsplash.com/photo-1546069901-ba9599a7e63c?w=500&auto=format&fit=crop');
