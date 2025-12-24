CREATE TABLE users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(50) UNIQUE,
  password VARCHAR(255),
  role ENUM('user','admin') DEFAULT 'user'
);

CREATE TABLE ordini (
  id INT AUTO_INCREMENT PRIMARY KEY,
  session_id VARCHAR(255),
  totale DECIMAL(6,2),
  data TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
