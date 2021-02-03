SELECT * FROM customers
    JOIN orders ON customers.id = orders.customers_id
WHERE orders.date LIKE '%2021-01-28%';