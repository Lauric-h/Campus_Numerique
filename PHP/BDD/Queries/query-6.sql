SELECT orders_id, SUM(products.price * orders_products.quantity) FROM products
    JOIN orders_products ON products.id = orders_products.products_id
GROUP BY orders_products.orders_id