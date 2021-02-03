SELECT products.name, products.price, orders_products.quantity FROM products
    JOIN orders_products ON products.id = orders_products.products_id
WHERE orders_id = 1;