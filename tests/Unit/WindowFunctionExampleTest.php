<?php

use MysqlPatterns\WindowFunctionExample;
use PHPUnit\Framework\TestCase;

class WindowFunctionExampleTest extends TestCase
{
    private WindowFunctionExample $example;

    protected function setUp(): void
    {
        $this->example = new WindowFunctionExample();
    }

    public function testGetFirstOrderPerUserReturnsArray()
    {
        $result = $this->example->getFirstOrderPerUser();
        $this->assertIsArray($result);
    }
}
