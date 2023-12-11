--@block
CREATE TABLE sellers (
    id INT PRIMARY KEY,
    seller_name VARCHAR(255)
);
--@block
INSERT INTO sellers (id, seller_name)
VALUES (1, 'Raju');
--@block
CREATE TABLE seller_products (
    seller_id INT,
    product_id INT,
    PRIMARY KEY (seller_id, product_id),
    FOREIGN KEY (seller_id) REFERENCES sellers(id),
    FOREIGN KEY (product_id) REFERENCES products(id)
);
--@block
INSERT INTO seller_products (seller_id, product_id)
VALUES (1, 1),
    -- Raju sells product with id 1
    (1, 2);