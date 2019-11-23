<?php
require_once dirname(__FILE__) . '/../model/ApiConnection.php';
require_once dirname(__FILE__) . '/../model/getTrain.php';
require_once dirname(__FILE__) . '/../model/getTrainInfo.php';
require_once dirname(__FILE__) . '/../model/getTrainTime.php';
require_once dirname(__FILE__) . '/../model/getStation.php';
require_once dirname(__FILE__) . '/../model/Slack.php';

class TrainController
{
    private $api;
    private $getTrainInfo;
    private $getTrainTimeList;
    private $trainTimeList;
    private $getStation;
    private $getTrain;
    private $slack;
    private $trainInfoList;
    private $trainInfoStatusList;
    private $trainInfoStatus;
    private $trainList;
    private $stationList;


    public function __construct(
        \ApiConnection $api = null,
        \getTrain $getTrain = null,
        \getTrainInfo $getTrainInfo = null,
        \getTrainTime $getTrainTimeList = null,
        \getStation $getStation = null,
        \Slack $slack = null
    ) {
        $this->api = $api ? $api : new \ApiConnection();
        $this->getTrain = $getTrain ? $getTrain : new \getTrain();
        $this->getTrainInfo = $getTrainInfo ? $getTrainInfo : new \getTrainInfo();
        $this->getTrainTimeList = $getTrainTimeList ? $getTrainTimeList : new \getTrainTime();
        $this->getStation = $getStation ? $getStation : new \getStation();
        $this->slack = $slack ? $slack : new \slack();
    }

    public function topPage()
    {
        include(dirname(__FILE__).'/../view/top.php');
    }

    public function getTrain()
    {
        $this->trainList = $this->getTrain->getTrainData();
        include(dirname(__FILE__). '/../view/train.php');
    }

    public function getTrainInfoList()
    {
        $this->trainInfoList = $this->getTrainInfo->getTrainInfoData();
        $this->trainInfoStatusList = $this->getTrainInfo->getTrainInfoStatusData();
        include(dirname(__FILE__). '/../view/trainInfo.php');
    }

    public function getTrainTime($get)
    {
        $station = null;

        $this->stationList = $this->getStation->stationList();
        if (!empty($get)) {
            $str =implode($get);
            $this->getTrainTimeList->getTrainTimeList($str);
            $this->trainTimeList = $this->getTrainTimeList->timeTablesWeekday($str);
            include(dirname(__FILE__) . '/../view/trainTime.php');
        } else {
            $this->getTrainTimeList = array();
            include(dirname(__FILE__) . '/../view/trainTime.php');
        }
    }

    public function getReminder()
    {
        $this->slack->ReminderTrainInfo($this->getTrainInfo->getTrainInfoData());
        $this->slack->ReminderTrainInfo($this->getTrainInfo->getTrainInfoStatusData());
        include(dirname(__FILE__). '/../view/reminder.php');
    }
    //$this->trainInfoStatus = $this->getTrainInfo->getTrainInfoStatus();
}
