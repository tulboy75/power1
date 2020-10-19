<?php
include_once('./_common.php');
include_once(G5_LIB_PATH.'/register.lib.php');

$mb_id   = trim($_POST['reg_mb_id']);
$mb_hp   = trim($_POST['reg_mb_hp']);

if ($msg = valid_mb_hp($mb_hp)) die($msg);
if ($msg = exist_mb_hp($mb_hp, $mb_id)) die($msg);

$mb_token = trim($_POST['reg_mb_token']);

$apiKey = 'NCSIKUDVBCI7GTFE';
$apiSecret = '0Y1IF4LXBTIVJWII6TZ2TYQS37YTX78L';
// 보내는 사람 번호
$phone = "01032824750";


if ($msg = send_mb_hp($mb_hp, $phone, $mb_token, $apiKey, $apiSecret)) die($msg);

?>