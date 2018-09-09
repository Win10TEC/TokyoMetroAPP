<?php

require_once(dirname(__FILE__) . '/main/controller/TrainController.php');

class index
{
    private $trainController;

    public function __construct(\TrainController $trainController = null)
    {
        $this->trainController = $trainController ? $trainController : new \TrainController();
    }

    public function mapUrl($server)
    {
        if (empty($server["PATH_INFO"])) {
            $this->trainController->topPage();
            exit;
        }

        //スラッシュで区切られたurlを取得します
        $analysis = explode('/', $server['PATH_INFO']);

        $call = "";

        foreach ($analysis as $value) {
            if ($value !== "") {
                $call = $value;
                break;
            }
        }

        //path
        if ($call === "train") {
            $this->trainController->getTrain();
            exit;
        } elseif ($call === "trainInfo") {
            $this->trainController->getTrainInfoList();
            exit;
        } elseif ($call === "reminder") {
            $this->trainController->getReminder();
            exit;
        }
    }
}

$class = new index();
$class->mapUrl($_SERVER);
