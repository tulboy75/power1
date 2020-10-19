<?php
include_once('./_common.php');
include_once(G5_LIB_PATH.'/register.lib.php');

$mb_hp_code = $_POST['reg_mb_hp_code'];
$mb_ss_code = get_session('reg_mb_hp_code');

if($mb_hp_code == $mb_ss_code)
    die("");
else 
    die("인증코드가 일치하지 않습니다.");

?>