<?php

use PHPUnit\Framework\TestCase;
use MysqlPatterns\ExistsVsInExample;

class ExistsVsInExampleTest extends TestCase
{
    private ExistsVsInExample $example;

    protected function setUp(): void
    {
        $this->example = new ExistsVsInExample();
    }

    public function testGetUsersWithOrdersExistsReturnsArray()
    {
        $result = $this->example->getUsersWithOrdersExists();
        $this->assertIsArray($result);
    }

    public function testGetUsersWithOrdersInReturnsArray()
    {
        $result = $this->example->getUsersWithOrdersIn();
        $this->assertIsArray($result);
    }
}
