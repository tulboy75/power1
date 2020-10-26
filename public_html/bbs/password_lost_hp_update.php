<?php
include_once('./_common.php');
include_once(G5_CAPTCHA_PATH.'/captcha.lib.php');

if ($is_member) {
    alert("이미 로그인중입니다.");
}

$g5['title'] = '비밀번호 변경';
include_once(G5_PATH.'/head.sub.php');

$rt = $_POST['rt'];
$mb_hp = hyphen_hp_number($_POST['mb_hp']);
$mb_level = ($rt == "store") ? "3" : "2";

$sql = "select count(*) as cnt, mb_no from " . $g5['member_table'] . " where mb_hp = '" . $mb_hp . "' AND mb_level = '" . $mb_level . "'";

$row = sql_fetch($sql);

if($row['cnt'] != "1"){
    alert("회원정보가 존재하지 않습니다.");
}

$mb_no = $row['mb_no'];

$mb_password = trim($_POST['mb_password']);
$mb_password_re = trim($_POST['mb_password_re']);

$sql = "update {$g5['member_table']} set mb_password = '" . get_encrypt_string($mb_password) . "'" . " where mb_no = '" . $mb_no . "'";


$result = sql_query($sql);
if(!$result){
    alert('비밀번호 변경에 실패 했습니다. 다시 시도해 주세요', '/bbs/password_lost_hp.php');
}else{
    alert('비밀번호를 변경하였습니다. 로그인 페이지로 이동합니다.', '/bbs/login.php');
}

include_once(G5_PATH.'/tail.sub.php');
?>