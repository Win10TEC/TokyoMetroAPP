<?php

require_once dirname(__FILE__) . '/../model/ApiConnection.php';
require_once dirname(__FILE__) . '/../config/DataConfig.php';

date_default_timezone_set('Asia/Tokyo');

class getTrainTime
{
    private $apiConnection;

    public function __construct(\ApiConnection $apiConnection = null)
    {
        $this->apiConnection = $apiConnection ? $apiConnection : new ApiConnection();
    }

    public function getTrainTimeList($station)
    {
        $weekdays = null;
        $trainTime = null;

        foreach ($this->apiConnection->getTrainTime($station) as $item) {
            $t = new DateTime($item["dc:date"]);
            $t->setTimeZone(new DateTimeZone('Asia/Tokyo'));
            $datetime = $t->format('Y-m-d H:i');

            $sameAs = $item["owl:sameAs"];
            $sameAs = str_replace('odpt.StationTimetable:TokyoMetro.', '', $sameAs);

            $operator = $item["odpt:operator"];
            $operator = str_replace('odpt.Operator:', '', $operator);

            $station = $item["odpt:station"];
            $station = str_replace('odpt.Station:TokyoMetro.', '', $station);

            $railway = $item["odpt:railway"];
            $railway = str_replace('odpt.Railway:TokyoMetro.', '', $railway);

            $railDirection = $item["odpt:railDirection"];
            $railDirection = str_replace('odpt.RailDirection:TokyoMetro.', '', $railDirection);


            foreach ($item["odpt:weekdays"] as $weekday) {
                $destinationStation = $weekday["odpt:destinationStation"];
                $destinationStation = str_replace('odpt.Station:', '', $destinationStation);

                $trainType = $weekday["odpt:trainType"];
                $trainType = str_replace('odpt.TrainType:TokyoMetro.', '', $trainType);

                $weekdays = array(
                    "departureTime" => $weekday["odpt:departureTime"],
                    "destinationStation" => $destinationStation,
                    "trainType" => $trainType,
                );

                $trainTime[] = array(
                    "date" => $datetime,
                    "sameAs" => $sameAs,
                    "station" => $station,
                    "railway" => $railway,
                    "operator" => $operator,
                    "railDirection" => $railDirection,
                    "weekdays" => $weekdays,
                );
            }
        }
        return $trainTime ;
    }
}
