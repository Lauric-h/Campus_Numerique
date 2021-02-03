SELECT products.name, products.stock, op.quantity from orders
    JOIN orders_products op ON orders.id = op.orders_id
    JOIN products ON op.products_id = products_id
WHERE products.stock < op.quantity