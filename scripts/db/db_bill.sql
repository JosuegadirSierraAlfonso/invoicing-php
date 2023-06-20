CREATE DATABASE db_hunter_facture_GadirSierra;

USE db_hunter_facture_GadirSierra;
CREATE TABLE tb_bill(
    n_bill VARCHAR(25) NOT NULL PRIMARY KEY COMMENT 'num de la factura ',
    bill_date DATETIME NOT NULL DEFAULT NOW() UNIQUE COMMENT 'fecha'
);

CREATE TABLE tb_client(
    Identification int(25) NOT NULL PRIMARY KEY COMMENT 'num de identificacion del cliente ',
    Full_Name VARCHAR(50) NOT NULL COMMENT 'Nombre completo del cliente',
    Email VARCHAR(30) NOT NULL COMMENT 'Email del cliente',
    Address VARCHAR (50) NOT NULL COMMENT 'Direccion del cliente',
    Phone INT(25) NOT NULL COMMENT 'Numero de telefono del cliente'
);

CREATE TABLE tb_product(
    id_product int(25) NOT NULL PRIMARY KEY COMMENT 'num del producto ',
    name_product VARCHAR(50) NOT NULL COMMENT 'Nombre del producto',
    amount INT(3) NOT NULL COMMENT 'Cantidad de productos',
    value_product FLOAT(6) NOT NULL COMMENT 'Valor del producto'
);



CREATE TABLE tb_seller(
    id_seller INT(25) NOT NULL AUTO_INCREMENT PRIMARY KEY COMMENT 'ID del vendedor',
    seller_name VARCHAR(50) NOT NULL COMMENT 'nombre del vendedor'
);

ALTER TABLE tb_bill MODIFY fk_Identification INT(25) NOT NULL COMMENT'Relation of the table tb_client';

ALTER TABLE tb_bill ADD fk_id_seller INTEGER(11) NOT NULL COMMENT'Relation of the table tb_seller';

ALTER TABLE tb_bill ADD fk_id_product INT(25) NOT NULL COMMENT'Relation of the table tb_product';


ALTER TABLE tb_bill ADD CONSTRAINT tb_bill_tb_client_fk FOREIGN KEY(fk_Identification) REFERENCES tb_client(Identification);

ALTER TABLE tb_bill ADD CONSTRAINT tb_bill_tb_seller_fk FOREIGN KEY(fk_id_seller) REFERENCES tb_seller(id_seller);

ALTER TABLE tb_bill ADD CONSTRAINT tb_bill_tb_product_fk FOREIGN KEY(fk_id_product) REFERENCES tb_product(id_product);

INSERT INTO tb_client(Identification,Full_Name,Email,Address,Phone) VALUES(13345678,"Gadez Sierra","gad@gmail.com","calle80","+57317304");

SELECT Full_Name AS 'names' FROM tb_client;
INSERT INTO tb_bill(n_bill,fk_Identification,fk_id_seller,fk_id_product) VALUES(1,123,1,1);

SELECT * FROM tb_client ORDER BY (full_name) DESC LIMIT 2 OFFSET 12;
SELECT AVG(identificacion) FROM tb_client;


SELECT  COUNT(*) INTO @AAA FROM tb_client;
SELECT @AAA;

SET @mi_variable = 10;

SELECT @mi_variable;

