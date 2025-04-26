<?php

namespace MysqlPatterns;

use PDO;
use PDOException;

/**
 * Database Connection Class
 *
 * This class handles the database connection using PDO.
 * It implements the Singleton pattern to ensure only one instance of the connection exists.
 *
 * @see 
 * https://www.php.net/manual/en/book.pdo.php
 * https://www.php.net/manual/en/pdo.connections.php
 * https://www.php.net/manual/en/pdo.prepare.php
 * 
 * @package MysqlPatterns
 */
class Database
{
    private static ?PDO $connection = null;

    public static function getConnection(): PDO
    {
        if (self::$connection === null) {
            $host = '127.0.0.1';
            $db   = 'your_database';
            $user = 'your_user';
            $pass = 'your_password';
            $charset = 'utf8mb4';

            $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
            $options = [
                PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES   => false,
            ];

            try {
                self::$connection = new PDO($dsn, $user, $pass, $options);
            } catch (PDOException $e) {
                throw new \RuntimeException('Database connection failed: ' . $e->getMessage(), (int) $e->getCode());
            }
        }

        return self::$connection;
    }

    public static function query(string $sql, array $params = []): array
    {
        $pdo = self::getConnection();
        $stmt = $pdo->prepare($sql);
        $stmt->execute($params);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
