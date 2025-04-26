-- Example 1: Basic INNER JOIN between two tables
SELECT users.id, users.name, orders.order_date, orders.total_amount
FROM users
    INNER JOIN orders ON users.id = orders.user_id
WHERE
    users.status = 'active';

-- Explanation:
-- This query fetches all active users and their orders.
-- INNER JOIN ensures only users with matching orders are included.

-- Example 2: INNER JOIN with multiple conditions
SELECT employees.name, departments.department_name
FROM employees
    INNER JOIN departments ON employees.department_id = departments.id
WHERE
    departments.active = 1;

-- Explanation:
-- Fetch employee names and their department names,
-- but only where the department is marked active.

-- Example 3: INNER JOIN across three tables
SELECT
    customers.name AS customer_name,
    orders.id AS order_id,
    products.name AS product_name,
    order_items.quantity
FROM
    customers
    INNER JOIN orders ON customers.id = orders.customer_id
    INNER JOIN order_items ON orders.id = order_items.order_id
    INNER JOIN products ON order_items.product_id = products.id
WHERE
    customers.country = 'UK';

-- Explanation:
-- Join customers to their orders, orders to order_items, and order_items to products.
-- This gives a detailed breakdown of what each UK customer ordered.

-- Example 4: INNER JOIN with aggregate function
SELECT users.name, COUNT(orders.id) AS total_orders
FROM users
    INNER JOIN orders ON users.id = orders.user_id
GROUP BY
    users.id
ORDER BY total_orders DESC;

-- Explanation:
-- List all users and the number of orders they've placed.
-- Useful to find your most active customers.

-- Example 5: INNER JOIN using aliases
SELECT u.name AS user_name, p.title AS post_title
FROM users AS u
    INNER JOIN posts AS p ON u.id = p.user_id
WHERE
    p.published = 1;

-- Explanation:
-- Shortened table names for better readability using aliases.
-- Fetch users and their published post titles.

-- Example 6: INNER JOIN + Subquery
SELECT users.name, recent_orders.order_date, recent_orders.total_amount
FROM users
    INNER JOIN (
        SELECT
            id, user_id, order_date, total_amount
        FROM orders
        WHERE
            order_date >= CURDATE() - INTERVAL 30 DAY
    ) AS recent_orders ON users.id = recent_orders.user_id;

-- Explanation:
-- Subquery selects only recent orders (last 30 days).
-- Main query joins users to only those recent orders.

-- Example 7: INNER JOIN on a JSON column (MySQL 5.7+)
SELECT users.name, addresses.details ->> '$.city' AS city
FROM users
    INNER JOIN addresses ON users.id = addresses.user_id
WHERE
    JSON_EXTRACT(
        addresses.details,
        '$.country'
    ) = 'UK';

-- Explanation:
-- Joining users to addresses stored in JSON.
-- Filters by country field inside the JSON blob.

-- Example 8: INNER JOIN with COALESCE for fallback matching
SELECT students.name, COALESCE(teachers.name, 'Unassigned') AS teacher_name
FROM students
    LEFT JOIN teachers ON students.teacher_id = teachers.id
WHERE
    students.active = 1;

-- Explanation:
-- Use LEFT JOIN + COALESCE if sometimes the related record might be missing.
-- Fallback to "Unassigned" if no matching teacher.

-- Example 9: INNER JOIN to detect missing records (anti-join logic)
SELECT u.name
FROM users u
    INNER JOIN orders o ON u.id = o.user_id
WHERE
    o.status = 'pending'
    AND NOT EXISTS (
        SELECT 1
        FROM payments p
        WHERE
            p.order_id = o.id
    );

-- Explanation:
-- Find users who have pending orders but no payment yet (anti-join with NOT EXISTS).

-- Example 10: INNER JOIN with GROUP BY and HAVING
SELECT customers.name, SUM(order_items.quantity) AS total_items_ordered
FROM
    customers
    INNER JOIN orders ON customers.id = orders.customer_id
    INNER JOIN order_items ON orders.id = order_items.order_id
GROUP BY
    customers.id
HAVING
    total_items_ordered > 50
ORDER BY total_items_ordered DESC;

-- Explanation:
-- Find customers who ordered more than 50 items in total.
-- GROUP BY + HAVING is very common in report-style queries.