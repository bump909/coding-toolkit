<?php

require __DIR__ . '/../../../vendor/autoload.php';

use MysqlPatterns\Examples\SubqueryExample;

$example = new SubqueryExample();
$results = $example->getUsersWithManyOrders();

print_r($results);

// run in cli: php mysql-patterns/run-subquery-example.php