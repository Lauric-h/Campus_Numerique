SELECT first_name, SUM(products.price * orders_products.quantity) FROM products
    JOIN orders_products ON products.id = orders_products.products_id
    JOIN orders ON orders.id = orders_products.orders_id
    JOIN customers c on orders.customers_id = c.id
WHERE first_name = 'Charlize';