SELECT SUM(products.price * orders_products.quantity) FROM products
    JOIN orders_products ON products.id = orders_products.products_id
    JOIN orders ON orders.id = orders_products.orders_id
GROUP BY orders_id
HAVING SUM(products.price * orders_products.quantity) > 100 AND SUM(products.price * orders_products.quantity) < 550