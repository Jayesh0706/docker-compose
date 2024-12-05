CREATE DATABASE IF NOT EXISTS mydb;

USE mydb;

CREATE TABLE IF NOT EXISTS shopping_list (
    id INT AUTO_INCREMENT PRIMARY KEY,
    item_name VARCHAR(255),
    quantity INT
);

-- Insert a sample item
INSERT INTO shopping_list (item_name, quantity) VALUES ('Apple', 2);
