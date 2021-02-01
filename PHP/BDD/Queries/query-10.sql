SELECT customers.first_name, customers.last_name, COUNT(orders.id) FROM customers
    JOIN orders ON customers.id = orders.customers_id
GROUP BY customers.id
