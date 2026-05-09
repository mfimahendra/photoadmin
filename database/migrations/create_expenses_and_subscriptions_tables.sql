-- Create t_expenses table
CREATE TABLE IF NOT EXISTS `t_expenses` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `date` DATE NOT NULL,
  `category` VARCHAR(100) NOT NULL COMMENT 'Operating Expenses, Marketing Expenses, Cost of Services, Other Expenses',
  `detail` TEXT NOT NULL,
  `price` DECIMAL(15,2) NOT NULL DEFAULT 0.00,
  `created_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  INDEX `idx_date` (`date`),
  INDEX `idx_category` (`category`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Create t_subscriptions table
CREATE TABLE IF NOT EXISTS `t_subscriptions` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `category` VARCHAR(100) NOT NULL COMMENT 'Operating Expenses, Marketing Expenses, Cost of Services, Other Expenses',
  `description` TEXT NOT NULL,
  `valid_from` DATE NOT NULL,
  `valid_to` DATE NOT NULL,
  `price` DECIMAL(15,2) NOT NULL DEFAULT 0.00 COMMENT 'Total price for entire period',
  `remark` TEXT NULL,
  `created_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  INDEX `idx_valid_period` (`valid_from`, `valid_to`),
  INDEX `idx_category` (`category`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
