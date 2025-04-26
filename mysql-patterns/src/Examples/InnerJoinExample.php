<?php

namespace MysqlPatterns\Examples;

use MysqlPatterns\Database;

/**
 * Inner Join Example
 *
 * This example demonstrates the Inner Join pattern in MySQL.
 * A classic Inner Join → "Find users who have placed orders."
 * It retrieves users who have placed orders by joining the users and orders tables.
 *
 * @see https://dev.mysql.com/doc/refman/8.0/en/join.html
 * @see https://www.mysqltutorial.org/mysql-join/inner-join-in-mysql/
 * 
 * @package MysqlPatterns\Examples
 */
class InnerJoinExample
{
    public function getUsersWithOrders()
    {
        $db = new Database();

        $sql = "
            SELECT users.name, orders.order_date
            FROM users
            INNER JOIN orders ON users.id = orders.user_id
            WHERE orders.status = 'completed'
            ORDER BY orders.order_date DESC
        ";

        return $db->query($sql);
    }
}
