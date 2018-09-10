<?php

require_once dirname(__FILE__) . '/../model/ApiConnection.php';
require_once dirname(__FILE__) . '/../config/DataConfig.php';

date_default_timezone_set('Asia/Tokyo');

class getTrain
{
    private $apiConnection;

    public function __construct(\ApiConnection $apiConnection = null)
    {
        $this->apiConnection = $apiConnection ? $apiConnection : new ApiConnection();
    }

    public function getTrainData()
    {
        $trainData=null;

        foreach ($this->apiConnection->getTrain() as $item) {
            $frequency = $item["odpt:frequency"];
            $frequency = str_replace('odpt.Frequency:', '', $frequency);

            $railway = $item["odpt:railway"];
            $railway = str_replace('odpt.Railway:TokyoMetro.', '', $railway);

            $sameas = $item["owl:sameAs"];
            $sameas = str_replace('odpt.getTrainInfo:', '', $sameas);

            $starting = $item["odpt:startingStation"];
            $starting = str_replace('odpt.Station:TokyoMetro.', '', $starting);

            $terminal = $item["odpt:terminalStation"];
            $terminal = str_replace('odpt.Station:TokyoMetro.', '', $terminal);

            $fromstation = $item["odpt:fromStation"];
            $fromstation = str_replace('odpt.Station:TokyoMetro.', '', $fromstation);

            $direction = $item["odpt:railDirection"];
            $direction = str_replace('odpt.RailDirection:', '', $direction);

            $owner = $item["odpt:trainOwner"];
            $owner = str_replace('odpt.TrainOwner:', '', $owner);

            $t1 = new DateTime($item["dc:date"]);
            $t1->setTimeZone(new DateTimeZone('Asia/Tokyo'));
            $datetime1 =$t1->format('Y-m-d H:i');

            $t2 = new DateTime($item["dct:valid"]);
            $t2->setTimeZone(new DateTimeZone('Asia/Tokyo'));
            $datetime2 =$t2->format('Y-m-d H:i');

            $trainData[] = array(
                "date" => $datetime1,
                "valid" => $datetime2,
                "frequency" => $frequency,
                "railway" => $railway,
                "sameAs" => $sameas,
                "trainNumber" => $item["odpt:trainNumber"],
                "trainType" => $item["odpt:trainType"],
                "delay" => $item["odpt:delay"],
                "startingStation" => $starting,
                "terminalStation" => $terminal,
                "fromStation" => $fromstation,
                "toStation" => $item["odpt:toStation"],
                "railDirection" => $direction,
                "trainOwner" => $owner,
            );
        }
        return $trainData;
    }
}
