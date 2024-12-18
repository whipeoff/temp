CREATE DATABASE IF NOT EXISTS location_db;
USE location_db;

CREATE TABLE IF NOT EXISTS regions (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL
) 

CREATE TABLE IF NOT EXISTS cities (
    id INT AUTO_INCREMENT PRIMARY KEY,
    region_id INT NOT NULL,
    name VARCHAR(255) NOT NULL,
    FOREIGN KEY (region_id) REFERENCES regions(id) ON DELETE CASCADE
) 

INSERT INTO regions (name) VALUES 
('Москва'),
('Санкт-Петербург'),
('Новосибирская область'),
('Краснодарский край');

INSERT INTO cities (region_id, name) VALUES
(1, 'Москва'),
(1, 'Зеленоград'),
(2, 'Санкт-Петербург'),
(2, 'Петергоф'),
(3, 'Новосибирск'),
(3, 'Бердск'),
(4, 'Краснодар'),
(4, 'Сочи');
