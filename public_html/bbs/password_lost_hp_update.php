<?php
include_once('./_common.php');
include_once(G5_CAPTCHA_PATH.'/captcha.lib.php');

if ($is_member) {
    alert("이미 로그인중입니다.");
}


$g5['title'] = '비밀번호 변경';
include_once(G5_PATH.'/head.sub.php');

$member_id = $_POST['mb_hp'];
$member_id = addslashes($member_id);

if(!get_member($member_id)){
    alert('회원정보가 존재 하지 않습니다.');
 }


$member_password = str_replace("-", "", trim($_POST['mb_password']));
$member_password_re = str_replace("-", "",trim($_POST['mb_password_re']));

$member_password = addslashes($member_passowrd);

$sql = "update {$g5['member_table']} set mb_password = '" . get_encrypt_string($mb_password) . "'" . " where mb_id = '" . $member_id . "'";

$result = sql_query($sql);
if(!$result){
    alert('비밀번호 변경에 실패 했습니다. 다시 시도해 주세요', '/bbs/password_lost_hp.php');
}else{
    alert('비밀번호를 변경하였습니다. 로그인 페이지로 이동합니다.', '/bbs/login.php');
}

include_once(G5_PATH.'/tail.sub.php');
?>