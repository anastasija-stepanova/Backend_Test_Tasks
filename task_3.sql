/*
3. Напиши SQL-запрос
Имеем следующие таблицы:
users — контрагенты
id
name
phone
email
created — дата создания записи
orders — заказы
id
subtotal — сумма всех товарных позиций
created — дата и время поступления заказа (Y-m-d H:i:s)
city_id — город доставки
user_id

Необходимо выбрать одним запросом следующее (следует учесть, что будет включена опция only_full_group_by в MySql):
Имя контрагента
Его телефон
Сумма всех его заказов
Его средний чек
Дата последнего заказа
*/

-- Ответ:
SELECT
    u.name,
    u.phone,
    SUM(o.subtotal) AS orders_total,
    AVG(o.subtotal) AS average_sum,
    MAX(o.created) AS last_order_date
FROM orders AS o
         LEFT JOIN users AS u ON o.users_id = u.id
GROUP BY o.user_id, u.name, u.phone;
