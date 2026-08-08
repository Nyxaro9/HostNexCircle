CREATE TABLE users (
  id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(120) NOT NULL,
  email VARCHAR(190) NOT NULL UNIQUE,
  phone VARCHAR(30) NOT NULL DEFAULT '',
  password_hash VARCHAR(255) NOT NULL,
  role ENUM('member','admin') NOT NULL DEFAULT 'member',
  membership_status ENUM('inactive','pending','active','expired','admin') NOT NULL DEFAULT 'inactive',
  membership_expires DATE NULL,
  passport_points INT NOT NULL DEFAULT 0,
  created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE events (
  id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  title VARCHAR(180) NOT NULL,
  event_date DATETIME NOT NULL,
  location VARCHAR(180) NOT NULL,
  description TEXT NOT NULL,
  created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE bookings (
  id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  user_id INT UNSIGNED NOT NULL,
  event_id INT UNSIGNED NOT NULL,
  booked_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  UNIQUE KEY unique_booking (user_id,event_id),
  CONSTRAINT fk_booking_user FOREIGN KEY(user_id) REFERENCES users(id) ON DELETE CASCADE,
  CONSTRAINT fk_booking_event FOREIGN KEY(event_id) REFERENCES events(id) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE payments (
  id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  user_id INT UNSIGNED NOT NULL,
  amount DECIMAL(10,2) NOT NULL,
  provider VARCHAR(40) NOT NULL DEFAULT 'mpesa',
  merchant_request_id VARCHAR(100) NULL,
  checkout_request_id VARCHAR(100) NULL,
  receipt_number VARCHAR(100) NULL,
  status ENUM('initiated','pending','paid','failed') NOT NULL DEFAULT 'initiated',
  raw_response TEXT NULL,
  created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  CONSTRAINT fk_payment_user FOREIGN KEY(user_id) REFERENCES users(id) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO events(title,event_date,location,description) VALUES
('Saturday Connect — Football, Games & Networking', DATE_ADD(NOW(), INTERVAL 7 DAY), 'Nairobi', 'Football, games, networking and community activities.'),
('Coding Puzzle Session', DATE_ADD(NOW(), INTERVAL 10 DAY), 'Nairobi', 'A beginner-friendly build zone session.'),
('Creative Community Day', DATE_ADD(NOW(), INTERVAL 14 DAY), 'Nairobi', 'Photography, art, podcast and music activities.');
