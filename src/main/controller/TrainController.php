<?php
require_once dirname(__FILE__) . '/../model/ApiConnection.php';
require_once dirname(__FILE__) . '/../model/getTrainInfo.php';
require_once dirname(__FILE__) . '/../model/Slack.php';

class TrainController
{
    private $api;
    private $train;
    private $slack;
    private $trainInfoList;
    private $trainInfoStatusList;
    private $trainInfoStatus;
    private $trainList;

    public function __construct(\ApiConnection $api = null, \getTrainInfo $train = null, \Slack $slack = null)
    {
        $this->api = $api ? $api : new \ApiConnection();
        $this->train = $train ? $train : new \getTrainInfo();
        $this->slack = $slack ? $slack : new \slack();
    }

    public function topPage()
    {
        include(dirname(__FILE__).'/../view/top.php');
    }

    public function getTrainInfoList()
    {
        $this->trainInfoList = $this->train->getTrainInfoData();
        //$this->trainInfoStatus = $this->train->getTrainInfoStatus();
        include(dirname(__FILE__). '/../view/trainInfo.php');
    }

    public function getTrainTime()
    {
    }

    public function getTrain()
    {
        $this->trainList = $this->train->getTrainData();
        include(dirname(__FILE__). '/../view/train.php');
    }

    public function getReminder()
    {
        $this->slack->ReminderTrainInfo($this->train->getTrainInfoData());
        include(dirname(__FILE__). '/../view/reminder.php');
    }
}
