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
            var_dump($item);
        }

        return $item;
    }
}
