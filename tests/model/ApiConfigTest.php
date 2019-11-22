<?php
//$dotenv = new Dotenv\Dotenv(__DIR__ . '/..');
//$dotenv->load(__DIR__ . '~/');

$env = file_get_contents('.\.env');
$encoded_env = base64_encode($env);

echo $encoded_env;

$mtrurl= getenv('METRO_URL');
$mtrkey= getenv('METRO_TOKEN');
$slackurl= getenv('SLACK_POST_URL');
$slackkey= getenv('SLACK_TOKEN');

define("METRO_URL", $mtrurl );
define("METRO_TOKEN", $mtrkey );
define("SLACK_POST_URL", $slackurl);
define("SLACK_TOKEN", $slackkey);

