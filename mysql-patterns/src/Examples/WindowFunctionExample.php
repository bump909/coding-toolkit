<?php

namespace MysqlPatterns;

use PDO;

/** Window Functions	
 * 
 * Advanced analytics per group	ROW_NUMBER, RANK, DENSE_RANK, LEAD, LAG
 * 
 */
class WindowFunctionExample
{
    private PDO $pdo;

    public function __construct()
    {
        $this->pdo = Database::getConnection();
    }

    /**
     * Get the first order per user using ROW_NUMBER().
     */
    public function getFirstOrderPerUser(): array
    {
        $sql = "
            SELECT id, user_id, total_price, created_at
            FROM (
                SELECT 
                    id,
                    user_id,
                    total_price,
                    created_at,
                    ROW_NUMBER() OVER (PARTITION BY user_id ORDER BY created_at ASC) as row_num
                FROM orders
            ) t
            WHERE row_num = 1
        ";

        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
