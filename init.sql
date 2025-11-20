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
    year INT NOT NULL,
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
INSERT INTO status (status) VALUES ('Приета'), ('Диагностика'), ('Ремонт'), ('Тестване'), ('Готова');

-- Групи
INSERT INTO service_groups (name) VALUES ('Обслужване'), ('Диагностика'), ('Климатизация'), ('Двигател'), ('Трансмисия'), ('Окачване'), ('Спирачна система');
INSERT INTO material_groups (name) VALUES ('Масла'),('Течности'), ('Филтри'),('Климатизация'), ('Двигател'), ('Трансмисия'), ('Окачване'), ('Спирачна система');

-- Услуги
INSERT INTO services (name, base_price, group_id) VALUES
('Цялостно обслужване', 220.00, 1),
('Смяна на масло на двигателя', 80.00, 1),
('Смяна на масло на скоростна кутия', 100.00, 1),
('Смяна на масло и филтри на двигателя', 120.00, 1),
('Смяна на масло и филтри на скоростна кутия', 130.00, 1),
('Смяна на спирачна течност', 60.00, 1),
('Смяна на хидравлична течност', 70.00, 1),
('Смяна на охладителна течност', 70.00, 1),
('Смяна на горивен филтър', 30.00, 1),
('Смяна на въздушен филтър', 25.00, 1),
('Смяна на филтър на купето', 25.00, 1),
('Допълване на масло', 15.00, 1),
('Допълване на охладителна течност', 15.00, 1),
('Допълване на спирачна течност', 15.00, 1),
('Допълване на AdBlue', 25.00, 1),
('Баланс на гуми', 40.00, 1),

('Диагностика с компютър', 60.00, 2),
('Пълна проверка на двигателя', 90.00, 2),
('Проверка на окачване', 50.00, 2),
('Проверка на електрическа система', 70.00, 2),
('Проверка на климатик', 50.00, 2),
('Проверка на спирачна система', 50.00, 2),
('Проверка на трансмисия', 80.00, 2),

('Почистване климатик', 50.00, 3),
('Зареждане климатик', 90.00, 3),
('Ремонт на климатик', 180.00, 3),
('Смяна компресор климатик', 250.00, 3),
('Смяна радиатор климатик', 180.00, 3),

('Смяна на ремък генератор', 80.00, 4),
('Смяна на ангренажен ремък', 250.00, 4),
('Смяна на водна помпа', 120.00, 4),
('Смяна на термостат', 90.00, 4),
('Смяна на радиатор', 180.00, 4),
('Смяна на турбо', 350.00, 4),
('Смяна на свещи', 60.00, 4),
('Смяна на ремък ГРМ', 280.00, 4),
('Смяна на инжектори', 200.00, 4),
('Смяна на бутала', 500.00, 4),
('Смяна на клапани', 450.00, 4),
('Смяна на глава на двигателя', 600.00, 4),
('Смяна на колянов вал', 700.00, 4),
('Смяна на семеринг колянов вал', 80.00, 4),
('Смяна на гарнитура глава', 200.00, 4),

('Адаптация на скоростна кутия', 120.00, 5),
('Цялостна смяна на скоростна кутия', 1200.00, 5),
('Рециклаж на скоростна кутия', 1300.00, 5),
('Смяна на соленоиди', 250.00, 5),
('Смяна на синхронизатори', 300.00, 5),
('Смяна на съединител', 350.00, 5),
('Смяна на диференциал', 400.00, 5),
('Смяна на кардан', 250.00, 5),
('Смяна на карета', 120.00, 5),

('Смяна на амортисьори', 160.00, 6),
('Смяна на пружини', 130.00, 6),
('Смяна на носачи', 150.00, 6),
('Смяна на тампони носачи', 90.00, 6),
('Смяна на биалетки', 80.00, 6),
('Смяна на стабилизираща щанга', 70.00, 6),
('Смяна на шарнири', 100.00, 6),

('Смяна на спирачни накладки', 120.00, 7),
('Смяна на спирачни дискове', 160.00, 7),
('Смяна на спирачни апарати', 220.00, 7),
('Смяна на спирачна помпа', 180.00, 7),
('Смяна на ABS модул', 300.00, 7);

-- Материали
INSERT INTO materials (name, stock, unit_price, group_id) VALUES
('Масло 0W-20 (1L)', 100, 32.00, 1),
('Масло 0W-30 (1L)', 100, 30.00, 1),
('Масло 5W-30 (1L)', 100, 28.00, 1),
('Масло 5W-40 (1L)', 100, 26.00, 1),
('Масло 10W-40 (1L)', 100, 22.00, 1),
('Масло 0W-20 (5L)', 100, 145.00, 1),
('Масло 0W-30 (5L)', 100, 135.00, 1),
('Масло 5W-30 (5L)', 100, 130.00, 1),
('Масло 5W-40 (5L)', 100, 120.00, 1),
('Масло 10W-40 (5L)', 100, 100.00, 1),

('Спирачна течност (1L)', 80, 18.00, 2),
('Спирачна течност (5L)', 80, 80.00, 2),
('Хидравлична течност (1L)', 80, 22.00, 2),
('Хидравлична течност (5L)', 80, 95.00, 2),
('AdBlue (1L)', 90, 4.00, 2),
('AdBlue (5L)', 90, 18.00, 2),
('Охладителна течност (1L)', 80, 14.00, 2),
('Охладителна течност (5L)', 80, 65.00, 2),

('Филтър масло на двигателя', 50, 15.00, 3),
('Филтър масло на скоростна кутия', 50, 25.00, 3),
('Филтър въздух', 50, 18.00, 3),
('Филтър купе', 50, 15.00, 3),
('Филтър гориво', 50, 25.00, 3),

('Почистващ агент за климатик', 70, 15.00, 4),
('Фреон климатик (1L)', 60, 45.00, 4),
('Компресор климатик', 20, 350.00, 4),
('Радиатор климатик', 30, 200.00, 4),

('Ремък генератор', 40, 40.00, 5),
('Ангренажен ремък', 40, 90.00, 5),
('Водна помпа', 40, 65.00, 5),
('Термостат', 40, 45.00, 5),
('Радиатор', 30, 160.00, 5),
('Турбо', 20, 600.00, 5),
('Свещи (комплект)', 50, 60.00, 5),

('Скоростна кутия (автоматична)', 10, 2500.00, 6),
('Скоростна кутия (ръчна)', 15, 1400.00, 6),
('Соленоиди', 25, 150.00, 6),
('Синхронизатори (комплект)', 20, 280.00, 6),
('Съединител (комплект)', 30, 320.00, 6),
('Диференциал', 15, 700.00, 6),
('Кардан', 20, 350.00, 6),
('Карета', 30, 90.00, 6),

('Пружини (предни)', 40, 110.00, 7),
('Пружини (задни)', 40, 95.00, 7),
('Амортисьори (предни)', 50, 150.00, 7),
('Амортисьори (задни)', 50, 130.00, 7),
('Носачи (предни)', 60, 160.00, 7),
('Носачи (задни)', 60, 140.00, 7),
('Тампони носачи', 70, 45.00, 7),
('Биалетки', 80, 35.00, 7),
('Стабилизираща щанга', 70, 55.00, 7),
('Шарнири', 60, 50.00, 7),

('Спирачни накладки (предни)', 60, 90.00, 7),
('Спирачни накладки (задни)', 60, 80.00, 7),
('Спирачни дискове (предни)', 50, 150.00, 7),
('Спирачни дискове (задни)', 50, 130.00, 7),
('Спирачни апарати (предни)', 40, 220.00, 7),
('Спирачни апарати (задни)', 40, 200.00, 7),
('Спирачна помпа', 30, 250.00, 7),
('ABS модул', 20, 450.00, 7);
