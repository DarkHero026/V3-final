CREATE DATABASE finalV;

USE finalV;

CREATE TABLE worker(
    id INT NOT NULL AUTO_INCREMENT,
    user_id VARCHAR(255),
    user_pwd VARCHAR(255),
    user_email VARCHAR(255) UNIQUE,
    PRIMARY KEY(id)
);

CREATE TABLE admin_site(
    id INT NOT NULL AUTO_INCREMENT,
    user_id VARCHAR(255),
    user_pwd VARCHAR(255),
    user_email VARCHAR(255) UNIQUE,
    PRIMARY KEY(id)
);

CREATE TABLE blog(
    id INT NOT NULL AUTO_INCREMENT,
    title VARCHAR(255),
    text_body TEXT,
    autor VARCHAR(255),
    date_created TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY(id)
);

CREATE TABLE cart(
    id INT NOT NULL AUTO_INCREMENT,
    product_name VARCHAR(255) NOT NULL,
    product_price DECIMAL(7, 2),
    product_image LONGBLOB NOT NULL,
    PRIMARY KEY(id)
);

CREATE TABLE klant_r(
    id INT NOT NULL AUTO_INCREMENT,
    check_in DATE NOT NULL,
    check_out DATE NOT NULL,
    naam VARCHAR(255) NOT NULL,
    adres VARCHAR(255) NOT NULL,
    plaats VARCHAR(255) NOT NULL,
    postcode VARCHAR(255) NOT NULL,
    telefoon VARCHAR(255) NOT NULL,
    PRIMARY KEY(id)
);

CREATE TABLE klant_history(
    id INT NOT NULL AUTO_INCREMENT,
    naam_klant VARCHAR(255) NOT NULL,
    telefoon_klant VARCHAR(255) NOT NULL,
    check_in_klant DATE NOT NULL,
    check_out_klant DATE NOT NULL,
    PRIMARY KEY(id)
);