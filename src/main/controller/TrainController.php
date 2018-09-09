<?php
require_once dirname(__FILE__) . '/../model/Train.php';
require_once dirname(__FILE__) . '/../model/Slack.php';

class TrainController
{
    private $train;
    private $slack;
    private $trainInfoList;
    private $trainList;

    public function __construct(\Train $train = null, \Slack $slack = null)
    {
        $this->train = $train ? $train : new \Train();
        $this->slack = $slack ? $slack : new \slack();
    }

    public function topPage()
    {
        include(dirname(__FILE__).'/../view/top.php');
    }

    public function getTrainInfoList()
    {
        $this->trainInfoList = $this->train->getTrainInfoData();
        include(dirname(__FILE__). '/../view/trainInfo.php');
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
