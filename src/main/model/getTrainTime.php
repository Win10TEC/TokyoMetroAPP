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

    public function getTrainTime()
    {
        $item = null;
        foreach ($this->apiConnection->getTrainTime() as $item) {
            $weekday = array(array($item["odpt:weekdays"])
            );

            var_dump($weekday);

            $trainTime = array(
               "date" => $item["dc:date"],
               "sameAs" => $item["owl:sameAs"],
               "station" => $item["odpt:station"],
               "railway" => $item["odpt:railway"],
               "operator" => $item["odpt:operator"],
               "railDirection" => $item["odpt:railDirection"],
//               "" => $item[""],
//               "" => $item[""],
//               "" => $item[""],

           );
        }

        return $item;
    }
}
