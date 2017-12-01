<?php
// parameters
$hubVerifyToken = 'TOKEN123456abcd';
$accessToken = "EAACJIkP3sowBAGdL1Xj7re7wv3WWqYNKgzF9d9InvCdZCLm0BeTk26ulqWytPSufx0W6zHKhRy1ZBXplaZBqJ9VqZAYeTc7tQPn8vSZC8UVXXZCtoiYwtXF1CpAlB74ryYUfpefY152g1fV9vnMUeaZC2IufdVlXQZA6k6dwWUVNTE1v03KT2m61pK5BFJrbgBFMRUazFxnzxAZDZD";

// check token at setup
if ($_REQUEST['hub_verify_token'] === $hubVerifyToken) {
  echo $_REQUEST['hub_challenge'];
  exit;
}

// handle bot's anwser
$input = json_decode(file_get_contents('php://input'), true);

$senderId = $input['entry'][0]['messaging'][0]['sender']['id'];
$messageText = $input['entry'][0]['messaging'][0]['message']['text'];
$luulog = @fopen("log.txt", "a");
fwrite($luulog, file_get_contents('php://input') . "\n");
fclose($luulog);