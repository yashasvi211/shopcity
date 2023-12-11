-- Create the products table
create table product (
    id int primary key auto_increment,
    image varchar(255),
    price int,
    title varchar(255),
    seller_id bigint,
    quantity int,
    foreign key (seller_id) references seller(id)
);
-- Insert some sample data into the products table
INSERT INTO products (id, image, price, title)
VALUES (1, './assets/belt.jpg', 450, 'Belt'),
    (
        2,
        './assets/bluejacket.jpg',
        1200,
        'Blue Hoodie'
    );