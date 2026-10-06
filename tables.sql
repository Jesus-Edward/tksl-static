-- 1. CATEGORIES TABLE
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `slug` varchar(100) NOT NULL,
  `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,    
  PRIMARY KEY (`id`),
  UNIQUE KEY `UX_name` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- 2. PRODUCTS TABLE
CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `slug` varchar(100) NOT NULL,
  `category_id` int(11) NOT NULL,
  `description` varchar(255) NOT NULL,
  `price` decimal(6,2) NOT NULL,
  `offer_price` decimal(6,2) NULL,
  `image` varchar(255) NOT NULL,
  `image1` varchar(255) NULL,
  `image2` varchar(255) NULL,
  `image3` varchar(255) NULL,
  `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP, 
  PRIMARY KEY (`id`),
  KEY `FK_products_category` (`category_id`),
  CONSTRAINT `FK_products_category` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- 4. USERS TABLE
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `photo` varchar(100) NULL,
  `role` ENUM('user', 'admin') NOT NULL DEFAULT 'user',
  `password` varchar(255) NOT NULL,
  `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP, 
  PRIMARY KEY (`id`),
  UNIQUE KEY `UXConstraint` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- 5. ORDERS TABLE
CREATE TABLE orders (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `user_id` INT NOT NULL,
    `name` VARCHAR(150) NOT NULL,
    `email` VARCHAR(150) NOT NULL,
    `phone` VARCHAR(30) NOT NULL,
    `company` VARCHAR(150) NULL,
    `address` TEXT NOT NULL,
    `city` TEXT NOT NULL,
    `country` TEXT NOT NULL,
    `notes` TEXT NULL,
    `status` ENUM('pending','contacted','completed','cancelled') DEFAULT 'pending',
    `total_amount` DECIMAL(10,2) NOT NULL,
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    `updated_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP, 
    KEY `FK_orders_user` (`user_id`),
    CONSTRAINT `FK_orders_user` FOREIGN KEY (`user_id`) REFERENCES `users`(`id`) ON DELETE RESTRICT ON UPDATE CASCADE
);

-- 6. ORDER_ITEMS TABLE
CREATE TABLE order_items (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `order_id` INT NOT NULL,
    `product_id` INT NOT NULL,
    `product_name` VARCHAR(255) NOT NULL,
    `price` DECIMAL(10,2) NOT NULL,
    `quantity` INT NOT NULL,
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    `updated_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP, 
    KEY `FK_order_items_order` (`order_id`),
    KEY `FK_order_items_product` (`product_id`),
    CONSTRAINT `FK_order_items_order` FOREIGN KEY (`order_id`) REFERENCES `orders`(`id`) ON DELETE CASCADE,
    CONSTRAINT `FK_order_items_product` FOREIGN KEY (`product_id`) REFERENCES `products`(`id`) ON DELETE RESTRICT
);
