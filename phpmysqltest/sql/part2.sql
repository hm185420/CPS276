CREATE TABLE customer (
 cust_id int NOT NULL AUTO_INCREMENT,
 cust_firstname char(50) NULL,
 cust_lastname char(50) NULL,
 cust_address char(50) NULL,
 cust_city char(50) NULL,
 cust_state char(50) NULL,
 cust_zip char(50) NULL,
 cust_phone char(50) NULL,
 cust_email char(255) NULL,
 cust_password char(50) NULL,
 PRIMARY KEY (cust_id)
) ENGINE = InnoDB;

CREATE TABLE prodgroup (
 prodgroup_id int NOT NULL,
 prodgroup_groupname char NOT NULL,
 imagefolder char NOT NULL,
 PRIMARY KEY (prodgroup_id)
) ENGINE = InnoDB;

CREATE TABLE products (
 product_id int NOT NULL AUTO_INCREMENT,
 product_groupid int NOT NULL,
 product_productname char NOT NULL,
 product_productrice decimal(8,2) NOT NULL,
 product_image NOT NULL,
 PRIMARY KEY (product_id),
) ENGINE = InnoDB;

CREATE TABLE orders (
 order_id int NOT NULL AUTO_INCREMENT,
 order_timestamp int NOT NULL,
 order_customerid int NOT NULL,
 PRIMARY KEY (order_id),
) ENGINE = InnoDB;

CREATE TABLE orders_info (
 order_id int NOT NULL AUTO_INCREMENT,
 order_orderid int NOT NULL,
 order_productid int NOT NULL,
 order_amount decimal(8,2) NOT NULL,
 PRIMARY KEY (order_id, order_orderid),
) ENGINE = InnoDB;


