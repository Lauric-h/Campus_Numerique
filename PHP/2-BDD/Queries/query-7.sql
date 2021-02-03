SELECT SUM(products.price * orders_products.quantity)FROM products
    JOIN orders_products ON products.id = orders_products.products_id
    JOIN orders ON orders.id = orders_products.orders_id
WHERE date LIKE '%2021-01-28%'