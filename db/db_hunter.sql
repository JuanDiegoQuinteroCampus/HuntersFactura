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

/* creamos campos  */
ALTER TABLE tb_bill MODIFY fk_n_identification INT(25) NOT NULL COMMENT 'Relacion de la tabla tb_client';

ALTER TABLE tb_bill ADD fk_id_seller INTEGER(11) NOT NULL COMMENT 'Relacion de la tabla tb_seller';
ALTER TABLE tb_bill ADD fk_id_product INT(25) NOT NULL COMMENT 'Relacion de la tabla tb_product';

ALTER Table tb_bill ADD CONSTRAINT tb_bill_tb_client_fk FOREIGN KEY(fk_n_identification) REFERENCES tb_client(n_identification);

ALTER Table tb_bill ADD CONSTRAINT tb_bill_tb_seller_fk FOREIGN KEY(fk_id_seller) REFERENCES tb_seller(id_seller);
ALTER Table tb_bill ADD CONSTRAINT tb_bill_tb_product_fk FOREIGN KEY(fk_id_product) REFERENCES tb_product(id_product);

/* insertar un dato en la tabla */
INSERT INTO tb_client(n_identification,full_name,email,adress,phone) VALUES("123456789","JuanQuintero", "juan@gmail.com","cra7","+57 362915209");

/* esto para ver todos los datos de la tabla */
SELECT * FROM tb_client;

/* esto par ver un dato o campo especifico */
SELECT email FROM tb_client;

/* para ver un dato especifico sin dar el nombre real del dato si no un alias a la columna por seguridad */
SELECT phone AS 'tutelefono' FROM tb_client;

/* consultas para dato especifico */
SELECT phone AS 'tutelefono' FROM tb_client WHERE phone=123456789;
/* ordenar alfabeticamente */
SELECT * FROM tb_client ORDER BY(full_name);
/* ordenar alfabeticamente y le da prioridad al que va de primero en este caso el email */
SELECT * FROM tb_client ORDER BY email,full_name;
/* toma tantos datos apartir de tal numero */
SELECT * from tb_client LIMIT 5 OFFSET 9; /*muestra cinco datos apartir del numero 9 */

/* Actualizacion e datos en la tabla */
UPDATE tb_client SET full_name = "Juan Diego Quintero Argüello", phone="3162915209" WHERE n_identification = 123456789;
INSERT INTO tb_bill(fk_n_identification,fk_id_seller,fk_id_product) VALUEs(1,123,1,1);


/* crear una variable en msql */
SET nombre = "fg";

SELECT @total := tb_client FROM departamentos WHERE departamento = 'Personal';


