<?php
include_once('./_common.php');
include_once(G5_LIB_PATH.'/register.lib.php');

$mb_id   = trim($_POST['reg_mb_id']);
$mb_hp   = trim($_POST['reg_mb_hp']);
$mb_level = trim($_POST['reg_mb_level']);
$mb_token = trim($_POST['reg_mb_token']);

$mb_hp = str_replace("-", "", $mb_hp);

$chk_type = trim($_POST['reg_mb_type']);

if ($msg = valid_mb_hp($mb_hp)) die($msg);

if($chk_type == "password_check"){
    if(!exist_mb_hp($mb_hp, $mb_id, $mb_level))
        $msg = "가입하지 않은 회원입니다.";
}else{
    $msg = exist_mb_hp($mb_hp, $mb_id, $mb_level);
}

if($msg)    
    die($msg);

$apiKey = 'NCSIKUDVBCI7GTFE';
$apiSecret = '0Y1IF4LXBTIVJWII6TZ2TYQS37YTX78L';
// 보내는 사람 번호
$phone = "01032824750";


if ($msg = send_mb_hp($mb_hp, $phone, $mb_token, $apiKey, $apiSecret)) die($msg);

?>