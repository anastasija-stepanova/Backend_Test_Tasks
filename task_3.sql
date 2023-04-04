SELECT
    u.name,
    u.phone,
    SUM(o.subtotal) AS orders_total,
    AVG(o.subtotal) AS average_sum,
    MAX(o.created) AS last_order_date
FROM orders AS o
         LEFT JOIN users AS u ON o.users_id = u.id
GROUP BY o.user_id, u.name, u.phone;
