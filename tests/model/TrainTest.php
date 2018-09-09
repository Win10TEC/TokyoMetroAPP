<?php

require_once dirname(__DIR__) . '/../src/main/model/Train.php';

use PHPUnit\Framework\TestCase;

class TrainTest extends TestCase
{
    private $trainData;
    private $class;

    public function setup()
    {
        $this->class = new Train();

        $this->trainData[] = array(
            "date" => "2018-09-02T19:55:21+09:00",
            "valid" =>  "2018-09-02T19:55:51+09:00",
            "frequency" => 30,
            "railway" =>  "odpt.Railway:TokyoMetro.Marunouchi",
            "sameAs" =>  "odpt.Train:TokyoMetro.Marunouchi.A1943",
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

    public function testGetTrainData()
    {
        $this->setup();
        $expect = count($this->class->getTrainData());
        $this->assertSame($expect, count($this->class->getTrainData()));
    }

    public function testGetTrainInfoData()
    {
        $this->setup();
        $expect = count($this->class->getTrainInfoData());
        $this->assertSame($expect, count($this->class->getTrainInfoData()));
    }
}
