<?php

require_once dirname(__DIR__) . '/../src/main/model/getTrainInfo.php';
require_once dirname(__DIR__) . '/../src/main/model/getTrain.php';

use PHPUnit\Framework\TestCase;

class TrainTest extends TestCase
{
    private $trainData;

    public function setup()
    {
        $this->trainData[] = array(
            "date" => "2018-09-02T19:55:21+09:00",
            "valid" =>  "2018-09-02T19:55:51+09:00",
            "frequency" => 30,
            "railway" =>  "odpt.Railway:TokyoMetro.Marunouchi",
            "sameAs" =>  "odpt.getTrainInfo:TokyoMetro.Marunouchi.A1943",
            "trainNumber" =>  "A1943",
            "trainType" =>  "odpt.TrainType:TokyoMetro.Local",
            "delay" => 0,
            "startingStation" =>  "odpt.Station:TokyoMetro.Marunouchi.Ikebukuro",
            "terminalStation" =>  "odpt.Station:TokyoMetro.Marunouchi.Shinjuku",
            "fromStation" =>  "odpt.Station:TokyoMetro.Marunouchi.Ikebukuro",
            "toStation" => null,
            "railDirection" =>  "odpt.RailDirection:TokyoMetro.Ogikubo",
            "trainOwner" =>  "odpt.TrainOwner:TokyoMetro",
        );
    }

//    public function testGetTrainData()
//    {
//        $class = new getTrain();
//        $this->setup();
//        $expect = count($class->getTrainData());
//        $this->assertSame($expect, count($class->getTrainData()));
//    }

    public function testGetTrainInfoData()
    {

        $class = new getTrainInfo();
        $this->setup();
        $expect = count($class->getTrainInfoData());
        $this->assertSame($expect, count($class->getTrainInfoData()));
    }
}
