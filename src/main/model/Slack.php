<?php

require_once dirname(__FILE__) . '/../config/ApiConfig.php';

class Slack
{
    public function slackApp($message)
    {
        $url = SLACK_POST_URL ."token=". SLACK_TOKEN ."&channel=%23tokyometro_trainInfo&username=TokyoMetroTrainInfo&text=${message}&as_user=false";

        $flag =true;

        $curl = curl_init();

        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'GET');
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HEADER, false);   // ヘッダーも出力する

        $response = curl_exec($curl);
        curl_close($curl);

        $json = mb_convert_encoding($response, 'UTF-8', 'ASCII,JIS,UTF-8,EUC-JP,SJIS-WIN');

        // json形式で返ってくるので、配列に変換
        $json = json_decode($json, true);

        if ($json["ok"] === false) {
            $flag = false;
        }
        return $flag;
    }

    public function ReminderTrainInfo($infoData)
    {
        $info=null;

        foreach ($infoData as $infoDatum) {
            $railway = $infoDatum["railway"];
            $trainInformationText = $infoDatum["trainInformationText"];

            if ($railway === "Marunouchi") {
                $info = array(
                    "railway" => "丸ノ内線",
                    "trainInformationText" => $trainInformationText,
                );
                $this->ReminderMessage($info);
            } elseif ($railway === "Hanzomon") {
                $info = array(
                    "railway" => "半蔵門線",
                    "trainInformationText" => $trainInformationText,
                );
                $this->ReminderMessage($info);
            } elseif ($railway === "Hibiya") {
                $info = array(
                    "railway" => "日比谷線",
                    "trainInformationText" => $trainInformationText,
                );
                $this->ReminderMessage($info);
            } elseif ($railway === "Chiyoda") {
                $info = array(
                    "railway" => "千代田線",
                    "trainInformationText" => $trainInformationText,
                );
                $this->ReminderMessage($info);
            } elseif ($railway === "Ginza") {
                $info = array(
                    "railway" => "銀座線",
                    "trainInformationText" => $trainInformationText,
                );
                $this->ReminderMessage($info);
            } elseif ($railway === "Tozai") {
                $info = array(
                    "railway" => "東西線",
                    "trainInformationText" => $trainInformationText,
                );
                $this->ReminderMessage($info);
            } elseif ($railway === "Namboku") {
                $info = array(
                    "railway" => "南北線",
                    "trainInformationText" => $trainInformationText,
                );
                $this->ReminderMessage($info);
            } elseif ($railway === "Fukutoshin") {
                $info = array(
                    "railway" => "副都心線",
                    "trainInformationText" => $trainInformationText,
                );
                $this->ReminderMessage($info);
            } else {
                $info = array(
                    "railway" => "有楽町線",
                    "trainInformationText" => $trainInformationText,
                );
                $this->ReminderMessage($info);
            }
        }
    }

    public function ReminderMessage($info)
    {
        $message = "```";
        $message .= "現在の運行状況\n";
        $message .= "${info["railway"]}\n";
        $message .= "${info["trainInformationText"]}\n";
        $message .= "``` \n";

        $message = urlencode($message);
        $this->slackApp($message);
    }
}
