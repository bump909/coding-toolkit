<?php

namespace MysqlPatterns\Examples;

use MysqlPatterns\Database;
use PDO;

/**
 * Subquery Example
 *
 * This example demonstrates the Subquery pattern in MySQL.
 * A classic subquery → "Find users who have made more than 3 orders."
 * It retrieves users who have made more than 3 orders using a subquery.
 *
 * @see https://dev.mysql.com/doc/refman/8.0/en/subqueries.html
 * @see https://www.mysqltutorial.org/mysql-subquery/
 *
 * @package MysqlPatterns\Examples
 */
class SubqueryExample
{
    protected PDO $pdo;

    public function __construct()
    {
        $this->pdo = Database::getConnection();
    }

    /**
     * Get users who have made more than 3 orders (using subquery).
     */
    public function getUsersWithManyOrders(): array
    {
        $sql = "
            SELECT u.id, u.name
            FROM users u
            WHERE (
                SELECT COUNT(*)
                FROM orders o
                WHERE o.user_id = u.id
            ) > 3
        ";

        $stmt = $this->pdo->query($sql);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
