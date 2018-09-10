<?php
require_once dirname(__FILE__) . '/../model/ApiConnection.php';
require_once dirname(__FILE__) . '/../model/getTrain.php';
require_once dirname(__FILE__) . '/../model/getTrainInfo.php';
require_once dirname(__FILE__) . '/../model/getTrainTime.php';
require_once dirname(__FILE__) . '/../model/Slack.php';

class TrainController
{
    private $api;
    private $getTrainInfo;
    private $getTrainTime;
    private $getTrain;
    private $trainTime;
    private $slack;
    private $trainInfoList;
    private $trainInfoStatusList;
    private $trainInfoStatus;
    private $trainList;


    public function __construct(
        \ApiConnection $api = null,
                                \getTrain $getTrain = null,
                                \getTrainInfo $getTrainInfo = null,
                                \getTrainTime $getTrainTime = null,
                                \Slack $slack = null
    ) {
        $this->api = $api ? $api : new \ApiConnection();
        $this->getTrain = $getTrain ? $getTrain : new \getTrain();
        $this->getTrainInfo = $getTrainInfo ? $getTrainInfo : new \getTrainInfo();
        $this->getTrainTime = $getTrainTime ? $getTrainTime : new \getTrainTime();
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

    public function getTrainTime()
    {
        $this->trainTime = $this->getTrainTime->getTrainTime();
        include(dirname(__FILE__) . '/../view/trainTime.php');
    }

    public function getReminder()
    {
        $this->slack->ReminderTrainInfo($this->getTrainInfo->getTrainInfoData());
        include(dirname(__FILE__). '/../view/reminder.php');
        $this->slack->ReminderTrainInfo($this->getTrainInfo->getTrainInfoStatusData());
        include(dirname(__FILE__). '/../view/reminder.php');
    }
    //$this->trainInfoStatus = $this->getTrainInfo->getTrainInfoStatus();
}
