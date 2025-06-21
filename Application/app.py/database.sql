CREATE DATABASE barcode_db;
USE barcode_db;

CREATE TABLE products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    code VARCHAR(50) UNIQUE,
    name VARCHAR(255),
    brand VARCHAR(255),
    price DECIMAL(5,2)
);

INSERT INTO products (code, name, brand, price) VALUES
('5201234567890', 'Γάλα Πλήρες 1L', 'ΔΕΛΤΑ', 1.20),
('040584028', 'Μπισκότα Πτι-Μπερ', 'Παπαδοπούλου Α.Ε.', 1.50);
