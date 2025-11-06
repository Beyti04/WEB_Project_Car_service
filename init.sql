/* 1. Създаване на базата данни */
CREATE DATABASE IF NOT EXISTS car_service_db CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE car_service_db;

/* 2. Lookup Таблици (без зависимости) */

CREATE TABLE role (
    id INT AUTO_INCREMENT PRIMARY KEY,
    role_name VARCHAR(30) NOT NULL UNIQUE
);

CREATE TABLE status (
    id INT AUTO_INCREMENT PRIMARY KEY,
    status VARCHAR(30) NOT NULL UNIQUE
);

CREATE TABLE car_brand (
    id INT AUTO_INCREMENT PRIMARY KEY,
    brand_name VARCHAR(30) NOT NULL UNIQUE
);

CREATE TABLE service_groups (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(30) NOT NULL
);

CREATE TABLE material_groups (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(30) NOT NULL
);

/* 3. Основни таблици (Ниво 1 зависимости) */

CREATE TABLE employees (
    id INT AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(20) NOT NULL,
    last_name VARCHAR(20) NOT NULL,
    role_id INT NOT NULL,
    email VARCHAR(30) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL, /* Поправено от VARCHAR(30) */
    FOREIGN KEY (role_id) REFERENCES role(id)
);

CREATE TABLE clients (
    id INT AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(20) NOT NULL,
    last_name VARCHAR(20) NOT NULL,
    phone_number VARCHAR(10) NOT NULL UNIQUE,
    email VARCHAR(30) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL /* Поправено от VARCHAR(30) */
);

CREATE TABLE car_model (
    id INT AUTO_INCREMENT PRIMARY KEY,
    brand_id INT NOT NULL,
    model_name VARCHAR(30) NOT NULL,
    FOREIGN KEY (brand_id) REFERENCES car_brand(id)
);

CREATE TABLE services (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(30) NOT NULL,
    base_price DECIMAL(10, 2) NOT NULL, /* Поправено от bigint */
    group_id INT NOT NULL,
    FOREIGN KEY (group_id) REFERENCES service_groups(id)
);

CREATE TABLE materials (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(30) NOT NULL,
    stock INT NOT NULL DEFAULT 0,
    unit_price DECIMAL(10, 2) NOT NULL, /* Поправено от bigint */
    group_id INT NOT NULL,
    FOREIGN KEY (group_id) REFERENCES material_groups(id)
);

/* 4. Таблици с релации (Ниво 2 зависимости) */

CREATE TABLE car (
    id INT AUTO_INCREMENT PRIMARY KEY,
    model_id INT NOT NULL,
    vin VARCHAR(17) NOT NULL UNIQUE,
    owner INT NOT NULL,
    FOREIGN KEY (model_id) REFERENCES car_model(id),
    FOREIGN KEY (owner) REFERENCES clients(id)
);

CREATE TABLE orders (
    id INT AUTO_INCREMENT PRIMARY KEY,
    car_id INT NOT NULL,
    status_id INT NOT NULL,
    opened_at DATE NOT NULL,
    closed_at DATE,
    employee_id INT NOT NULL,
    full_price DECIMAL(10, 2), /* Поправено от money */
    FOREIGN KEY (car_id) REFERENCES car(id),
    FOREIGN KEY (status_id) REFERENCES status(id),
    FOREIGN KEY (employee_id) REFERENCES employees(id)
);

/* 5. Pivot / Junction Таблици (Свързващи) */

CREATE TABLE order_service (
    id INT AUTO_INCREMENT PRIMARY KEY,
    order_id INT NOT NULL, /* Поправено: Направено NOT NULL */
    service_id INT NOT NULL,
    quantity INT NOT NULL DEFAULT 1,
    price DECIMAL(10, 2) NOT NULL, /* Поправено от bigint */
    FOREIGN KEY (order_id) REFERENCES orders(id),
    FOREIGN KEY (service_id) REFERENCES services(id)
);

CREATE TABLE order_materials (
    id INT AUTO_INCREMENT PRIMARY KEY,
    order_id INT NOT NULL, /* КРИТИЧНА ПОПРАВКА: Тази колона липсваше */
    material_id INT NOT NULL,
    quantity INT NOT NULL,
    price DECIMAL(10, 2) NOT NULL, /* Поправено от bigint */
    FOREIGN KEY (order_id) REFERENCES orders(id), /* КРИТИЧНА ПОПРАВКА: Тази връзка липсваше */
    FOREIGN KEY (material_id) REFERENCES materials(id)
);

CREATE TABLE payments (
    id INT AUTO_INCREMENT PRIMARY KEY,
    order_id INT NOT NULL,
    paid_on DATE,
    amount DECIMAL(10, 2) NOT NULL, /* Поправено от bigint */
    FOREIGN KEY (order_id) REFERENCES orders(id)
);

CREATE TABLE audit_logs (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT, -- Може да е employee или client, затова е nullable
    action VARCHAR(100),
    entity VARCHAR(100),
    entity_id VARCHAR(100),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

/* ЗАБЕЛЕЖКА: Таблицата 'full_order_listing' от DDL-а е с много
   проблематичен дизайн (1-към-1 връзка към 'orders' и
   към 'order_materials' И 'order_service').
   Това я прави почти неизползваема.
   Създавам я, както е по DDL, но не я препоръчвам.
*/
CREATE TABLE full_order_listing (
    id INT NOT NULL, -- Това е ID-то на поръчката
    materials_order_id INT NOT NULL,
    service_order_id INT NOT NULL,
    PRIMARY KEY (id, materials_order_id, service_order_id),
    FOREIGN KEY (id) REFERENCES orders(id),
    FOREIGN KEY (materials_order_id) REFERENCES order_materials(id),
    FOREIGN KEY (service_order_id) REFERENCES order_service(id)
);


/* 6. Начални данни (Seed Data) */

-- Роли
INSERT INTO role (role_name) VALUES ('Admin'), ('Specialist');

-- Статуси на поръчки
INSERT INTO status (status) VALUES ('Нова'), ('Диагностика'), ('Ремонт'), ('Тестване'), ('Готова');

-- Групи
INSERT INTO service_groups (name) VALUES ('Двигател'), ('Окачване'), ('Диагностика');
INSERT INTO material_groups (name) VALUES ('Масла'), ('Филтри'), ('Спирачна система');

-- Услуги
INSERT INTO services (name, base_price, group_id) VALUES
('Смяна на масло', 50.00, 1),
('Пълна диагностика', 80.00, 3),
('Смяна предни накладки', 60.00, 3);

-- Материали
INSERT INTO materials (name, stock, unit_price, group_id) VALUES
('Масло 5W-40 (1L)', 100, 25.00, 1),
('Маслен филтър', 50, 15.00, 2),
('Предни накладки (комплект)', 20, 120.00, 3);
