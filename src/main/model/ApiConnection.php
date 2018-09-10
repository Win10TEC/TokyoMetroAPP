<?php

require_once dirname(__FILE__) . '/../config/ApiConfig.php';

class ApiConnection
{
    public function getTrain()
    {
        $url = METRO_URL .'datapoints?rdf:type=odpt:getTrainInfo&'.METRO_TOKEN;

        $curl = curl_init();

        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'GET');
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HEADER, false);   // ヘッダーも出力する

        $response = curl_exec($curl);
        curl_close($curl);

        // json形式で返ってくるので、配列に変換
        $json = json_decode($response, true);

        return $json;
    }

    public function getTrainInfo()
    {
        $url = METRO_URL .'datapoints?rdf:type=odpt:TrainInformation&'.METRO_TOKEN;

        $curl = curl_init();

        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'GET');
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HEADER, false);   // ヘッダーも出力する

        $response = curl_exec($curl);
        curl_close($curl);

        // json形式で返ってくるので、配列に変換
        $json = json_decode($response, true);

        return $json;
    }

    public function getTrainTime()
    {
        $url = METRO_URL .'datapoints?rdf:type=odpt:StationTimetable&'.METRO_TOKEN;

        $curl = curl_init();

        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'GET');
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HEADER, false);   // ヘッダーも出力する

        $response = curl_exec($curl);
        curl_close($curl);

        // json形式で返ってくるので、配列に変換
        $json = json_decode($response, true);

        return $json;
    }
}
