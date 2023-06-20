CREATE DATABASE db_hunter_facture_juanquintero;
USE db_hunter_facture_juanquintero;
CREATE TABLE tb_bill(
    n_bill VARCHAR(25) NOT NULL PRIMARY KEY COMMENT 'Numero de la factura unico con las combinaciones necesarias',
    bill_date DATETIME NOT NULL DEFAULT NOW() UNIQUE COMMENT 'Fecha de cuando se genero la factura'
    );
CREATE TABLE tb_client(
    n_identification VARCHAR(25) NOT NULL PRIMARY KEY COMMENT 'Numero de identificacion unico',
    full_name VARCHAR(50) NOT NULL COMMENT 'Nombre completo',
    email VARCHAR(50) NOT NULL COMMENT 'Email ',
    adress VARCHAR(50) NOT NULL COMMENT 'Dirección',
    phone VARCHAR(50) NOT NULL COMMENT 'Numero de telefono'
);
CREATE TABLE tb_product(
    id_product INT NOT NULL AUTO_INCREMENT PRIMARY KEY COMMENT 'Numero de identificacion del producto unico',
    name VARCHAR(50) NOT NULL COMMENT 'Nombre del producto',
    amount INT(100) NOT NULL COMMENT 'Cantidad de productos',
    value_product FLOAT(7) NOT NULL COMMENT 'Valor del producto'
);
DROP TABLE tb_seller;
CREATE TABLE tb_seller(
    id_seller INTEGER(11) NOT NULL AUTO_INCREMENT PRIMARY KEY COMMENT 'Numero del vendedor',
    name_seller VARCHAR(50) NOT NULL COMMENT 'Nombre del vendedor'
);
ALTER TABLE tb_bill MODIFY fk_n_identification INT(25) NOT NULL COMMENT 'Relacion de la tabla tb_client';

ALTER TABLE tb_bill ADD fk_id_seller INTEGER(11) NOT NULL COMMENT 'Relacion de la tabla tb_seller';
ALTER TABLE tb_bill ADD fk_id_product INT(25) NOT NULL COMMENT 'Relacion de la tabla tb_product';

ALTER Table tb_bill ADD CONSTRAINT tb_bill_tb_client_fk FOREIGN KEY(fk_n_identification) REFERENCES tb_client(n_identification);

ALTER Table tb_bill ADD CONSTRAINT tb_bill_tb_seller_fk FOREIGN KEY(fk_id_seller) REFERENCES tb_seller(id_seller);
ALTER Table tb_bill ADD CONSTRAINT tb_bill_tb_product_fk FOREIGN KEY(fk_id_product) REFERENCES tb_product(id_product);

SELECT * from tb_client;