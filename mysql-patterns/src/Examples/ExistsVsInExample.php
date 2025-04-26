<?php

namespace MysqlPatterns;

use PDO;

/**
 * Exists vs IN Example
 *
 * This example demonstrates the difference between EXISTS and IN in MySQL.
 * It retrieves users who have orders using both EXISTS and IN.
 *
 * @see https://dev.mysql.com/doc/refman/8.0/en/exists.html
 * @see https://dev.mysql.com/doc/refman/8.0/en/in.html
 *
 * @package MysqlPatterns\Examples
 */
class ExistsVsInExample
{
    private PDO $pdo;

    public function __construct()
    {
        $this->pdo = Database::getConnection();
    }

    /**
     * Using EXISTS: Get users who have orders.
     */
    public function getUsersWithOrdersExists(): array
    {
        $sql = "
            SELECT id, name
            FROM users u
            WHERE EXISTS (
                SELECT 1
                FROM orders o
                WHERE o.user_id = u.id
            )
        ";

        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Using IN: Get users who have orders.
     */
    public function getUsersWithOrdersIn(): array
    {
        $sql = "
            SELECT id, name
            FROM users
            WHERE id IN (
                SELECT user_id
                FROM orders
            )
        ";

        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
