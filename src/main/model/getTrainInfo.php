<?php

require_once dirname(__FILE__) . '/../model/ApiConnection.php';
require_once dirname(__FILE__) . '/../config/DataConfig.php';

date_default_timezone_set('Asia/Tokyo');

class getTrainInfo
{
    private $apiConnection;

    public function __construct(\ApiConnection $apiConnection = null)
    {
        $this->apiConnection = $apiConnection ? $apiConnection : new ApiConnection();
    }

    public function getTrainInfoStatus()
    {
        $statusData = null;

        foreach ($this->apiConnection->getTrainInfo() as $item) {
            $status = $item["odpt:trainInformationStatus"];

            if (!empty($status) or $status === null) {
                $statusData[] = array("正常運転");
            } else {
                $statusData[] = array(
                    "1" => "運転見合わせ",
                    "2" => "折返し運転",
                    "3" => "ダイヤ乱れ",
                    "4" => "運転再開・ダイヤ乱れ",
                    "5" => "遅延",
                    "6" => "一部列車遅延",
                    "7" => "直通運転中止",
                    "8" => "直通運転再開",
                    "9" => "快速運転中止",
                    "10" => "快速運転再開",
                    "11" => "準急運転中止",
                    "12" => "準急運転再開",
                    "13" => "急行運転中止",
                    "14" => "急行運転再開",
                    "15" =>  "通勤急行運転中止",
                    "16" =>  "通勤急行運転再開",
                    "17" =>  "女性専用車両中止",
                    "18" => "運転再開見込",
                    "19" =>  "運転再開",
                    "20" => "運転規制",
                    "21" => "速度規制",
                    "22" => "運休",
                    "23" => "メトロさがみ運休",
                    "24" => "メトロさがみ７０号運休",
                    "25" => "メトロさがみ８０号運休",
                    "26" => "メトロホームウエイ運休",
                    "27" => "メトロホームウエイ４１号運休",
                    "28" => "メトロホームウエイ４３号運休",
                    "29" => "メトロホームウエイ７１号運休",
                    "30" => "メトロはこね運休",
                    "31" => "メトロはこね２１号運休",
                    "32" => "メトロはこね２２号運休",
                    "33" => "メトロはこね２３号運休",
                    "34" => "メトロはこね２４号運休",
                    "35" => "臨時特急ロマンスカー運休",
                    "36" => "臨時列車運休",
                    "37" => "振替輸送",
                    "38" => "バス代行",
                    "39" => "リフレッシュ工事",
                    "40" => "お知らせ",
                );
            }
        }
        return $statusData;
    }

    public function getTrainInfoData()
    {
        $trainInfoData=null;

        foreach ($this->apiConnection->getTrainInfo() as $item) {
            $operator = $item["odpt:operator"];
            $operator = str_replace('odpt.Operator:', '', $operator);

            $railway = $item["odpt:railway"];
            $railway = str_replace('odpt.Railway:TokyoMetro.', '', $railway);

            $t = new DateTime($item["dc:date"]);
            $t->setTimeZone(new DateTimeZone('Asia/Tokyo'));
            $datetime =$t->format('Y-m-d H:i');

            if (empty($item["odpt:trainInformationStatus"])) {
                $trainInfoData[] = array(
                    "id" => $item["@id"],
                    "date" => $datetime,
                    "valid" => $item["dct:valid"],
                    "operator" => $operator,
                    "railway" => $railway,
                    "timeOfOrigin" => $item["odpt:timeOfOrigin"],
                    "trainInformationText" => $item["odpt:trainInformationText"],
                );
            }
        }
        return $trainInfoData;
    }

    public function getTrainInfoStatusData()
    {
        $trainInfoData=null;

        foreach ($this->apiConnection->getTrainInfo() as $item) {
            $operator = $item["odpt:operator"];
            $operator = str_replace('odpt.Operator:', '', $operator);

            $railway = $item["odpt:railway"];
            $railway = str_replace('odpt.Railway:TokyoMetro.', '', $railway);

            $t = new DateTime($item["dc:date"]);
            $t->setTimeZone(new DateTimeZone('Asia/Tokyo'));
            $datetime = $t->format('Y-m-d H:i');

            $trainInfoData[] = array(
                "id" => $item["@id"],
                "date" => $datetime,
                "valid" => $item["dct:valid"],
                "operator" => $operator,
                "railway" => $railway,
                "timeOfOrigin" => $item["odpt:timeOfOrigin"],
                "trainInformationStatus" => $item["odpt:trainInformationStatus"],
                "trainInformationText" => $item["odpt:trainInformationText"],
            );
        }
        return $trainInfoData;
    }
}
