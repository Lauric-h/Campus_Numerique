INSERT INTO products(name, description, price, weight, picture, availability, stock)
VALUE('Avocat', 'Un truc vert qui vient du Chili', 1, 0.8, NULL, true, 50);

INSERT INTO categories(name)
VALUES('exotique');

INSERT INTO categories_products(categories_id, products_id)
VALUES(4, 15)