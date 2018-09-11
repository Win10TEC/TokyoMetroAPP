<?php

require_once dirname(__FILE__) . '/../model/ApiConnection.php';
require_once dirname(__FILE__) . '/../config/DataConfig.php';

date_default_timezone_set('Asia/Tokyo');

class getStation
{
    private $apiConnection;

    public function __construct(\ApiConnection $apiConnection = null)
    {
        $this->apiConnection = $apiConnection ? $apiConnection : new ApiConnection();
    }

    public function getStationList()
    {
        $StationDate = null;
        foreach ($this->apiConnection->getStation() as $item) {
            $sameAs = $item["owl:sameAs"];
            $sameAs = str_replace('odpt.Station:', '', $sameAs);

            $operator = $item["odpt:operator"];
            $operator = str_replace('odpt.Operator:', '', $operator);

            $railway = $item["odpt:railway"];
            $railway = str_replace('odpt.Railway:', '', $railway);

            $StationDate = array(
                "date" => $item["dc:date"],
                "title" => $item["dc:title"],
                "sameAs" => $sameAs,
                "railway" => $railway,
                "operator" => $operator,
                "region" => $item["ug:region"],
                "connectingRailway" => $item["odpt:connectingRailway"],
                "facility" => $item["odpt:facility"],
                "passengerSurvey" => $item["odpt:passengerSurvey"],
                "stationCode" => $item["odpt:stationCode"],
                "exit" => $item["odpt:exit"],
            );
        }
        return $StationDate;
    }

    public function stationList()
    {
        $station = null;
        foreach ($this->apiConnection->getStation() as $item) {
            $sameAs = $item["owl:sameAs"];
            $sameAs = str_replace('odpt.Station:', '', $sameAs);

            $station[] = array(
                "title" => $item["dc:title"],
                "sameAs" => $sameAs,
            );
        }
        var_dump($station);
        return $station;
    }
}
