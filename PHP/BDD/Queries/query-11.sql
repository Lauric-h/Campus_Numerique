SELECT customers.first_name, customers.last_name, SUM(op.quantity * products.price) FROM customers
    JOIN orders ON customers.id = orders.customers_id
    JOIN orders_products op ON orders.id = op.orders_id
    JOIN products ON op.products_id = products.id
GROUP BY customers.id