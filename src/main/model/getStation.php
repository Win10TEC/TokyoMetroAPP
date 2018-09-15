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

            $StationDate[] = array(
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

            if (strpos($sameAs, 'TokyoMetro.Marunouchi') !== false) {
                $station[] = array(
                    "title" => $item["dc:title"],
                    "railway" => "丸ノ内線",
                    "sameAs" => $sameAs,
                );
            } elseif (strpos($sameAs, 'TokyoMetro.Ginza') !== false) {
                $station[] = array(
                    "title" => $item["dc:title"],
                    "railway" => "銀座線",
                    "sameAs" => $sameAs,
                );
            } elseif (strpos($sameAs, 'TokyoMetro.Hibiya') !== false) {
                $station[] = array(
                    "title" => $item["dc:title"],
                    "railway" => "日比谷線",
                    "sameAs" => $sameAs,
                );
            } elseif (strpos($sameAs, 'TokyoMetro.Chiyoda') !== false) {
                $station[] = array(
                    "title" => $item["dc:title"],
                    "railway" => "千代田線",
                    "sameAs" => $sameAs,
                );
            } elseif (strpos($sameAs, 'TokyoMetro.Tozai') !== false) {
                $station[] = array(
                    "title" => $item["dc:title"],
                    "railway" => "東西線",
                    "sameAs" => $sameAs,
                );
            } elseif (strpos($sameAs, 'TokyoMetro.Hanzomon') !== false) {
                $station[] = array(
                    "title" => $item["dc:title"],
                    "railway" => "半蔵門",
                    "sameAs" => $sameAs,
                );
            } elseif (strpos($sameAs, 'TokyoMetro.Namboku') !== false) {
                $station[] = array(
                    "title" => $item["dc:title"],
                    "railway" => "南北線",
                    "sameAs" => $sameAs,
                );
            } elseif (strpos($sameAs, 'TokyoMetro.Fukutoshin') !== false) {
                $station[] = array(
                    "title" => $item["dc:title"],
                    "railway" => "副都心線",
                    "sameAs" => $sameAs,
                );
            } elseif (strpos($sameAs, 'TokyoMetro.Yurakucho') !== false) {
                $station[] = array(
                    "title" => $item["dc:title"],
                    "railway" => "有楽町線",
                    "sameAs" => $sameAs,
                );
            } else {
                $station[] = array(
                    "title" => "存在しません",
                    "railway" => "存在しません",
                    "sameAs" => "存在しません",
                );
            }
        }
        $json = json_encode($station, true | JSON_UNESCAPED_UNICODE);
        return $json;
    }
}
