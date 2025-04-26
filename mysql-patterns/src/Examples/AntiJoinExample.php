<?php

/**
 * Anti Join Example
 *
 * This example demonstrates the Anti Join pattern in MySQL.
 * A classic Anti-Join → "Find users who have no orders."
 * It retrieves users who have not placed any orders by using a LEFT JOIN.
 * Only select where orders.id IS NULL → meaning no matching orders exist.
 * 
 *
 * @package MysqlPatterns\Examples
 */

namespace MysqlPatterns;

use PDO;

class AntiJoinExample
{
    private PDO $pdo;

    public function __construct()
    {
        $this->pdo = Database::getConnection();
    }

    /**
     * Get users who have not placed any orders (Anti Join pattern).
     *
     * @return array
     */
    public function getUsersWithoutOrders(): array
    {
        $sql = "
            SELECT users.id, users.name
            FROM users
            LEFT JOIN orders ON users.id = orders.user_id
            WHERE orders.id IS NULL
        ";

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
