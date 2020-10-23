<?php
include_once('./_common.php');
include_once(G5_CAPTCHA_PATH.'/captcha.lib.php');

if ($is_member) {
    alert("이미 로그인중입니다.");
}

$g5['title'] = '비밀번호 찾기';
include_once(G5_PATH.'/head.sub.php');
$token = get_token();
set_session("ss_token", $token);
$action_url = G5_HTTPS_BBS_URL."/password_lost_hp2.php";
include_once($member_skin_path.'/password_lost_hp.skin.php');

include_once(G5_PATH.'/tail.sub.php');
?>