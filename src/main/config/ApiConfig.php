<?php

require 'vendor/autoload.php';

$dotenv = Dotenv\Dotenv::create(__DIR__);
$dotenv->load();

$mtrurl = getenv('METRO_URL');
$mtrkey= getenv('METRO_TOKEN');
$slackurl= getenv('SLACK_POST_URL');
$slackkey= getenv('SLACK_TOKEN');

define("METRO_URL", $mtrurl );
define("METRO_TOKEN", $mtrkey );
define("SLACK_POST_URL", $slackurl);
define("SLACK_TOKEN", $slackkey);
