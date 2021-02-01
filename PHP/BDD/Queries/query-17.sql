DELETE FROM customers
WHERE customers.id NOT IN (SELECT orders.customers_id FROM orders)