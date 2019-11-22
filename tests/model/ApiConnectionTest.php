<?php
require_once dirname(__DIR__) . '/../src/main/model/ApiConnection.php';

use PHPUnit\Framework\TestCase;

class ApiConnectionTest extends TestCase
{
    public function testGetTrain()
    {
        $apiClass = new ApiConnection();
        $expect = count($apiClass->getTrain());
        $this->assertSame($expect, count($apiClass->getTrain()));
    }

    public function testGetTrainInfo()
    {
        $expect = 9;
        $apiClass = new ApiConnection();
        $this->assertSame($expect, count($apiClass->getTrainInfo()));
    }
}
