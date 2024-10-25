CREATE DATABASE sari_sari_store;

USE sari_sari_store;

CREATE TABLE items (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    category ENUM('Food', 'Beverage', 'Household', 'Personal Care') NOT NULL,
    price DECIMAL(10, 2) NOT NULL,
    quantity INT NOT NULL
);