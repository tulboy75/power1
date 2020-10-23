<?php
include_once('./_common.php');
include_once(G5_CAPTCHA_PATH.'/captcha.lib.php');

if ($is_member) {
    alert("이미 로그인중입니다.");
}

$chk_opt = $_POST['mb_hp_code_confirm'];
// if($chk_opt != "1"){
//     alert("비밀번호 변경을 위해 휴대폰 인증을 진행해 주세요", '/bbs/password_lost_hp.php');
// }

$member_hp = trim($_POST['mb_hp']);
$member_hp = str_replace("-", "", $member_hp);

$g5['title'] = '비밀번호 변경';
include_once(G5_PATH.'/head.sub.php');
$token = get_token();
set_session("ss_token", $token);
$action_url = G5_HTTPS_BBS_URL."/password_lost_hp_update.php";
include_once($member_skin_path.'/password_lost_hp2.skin.php');

include_once(G5_PATH.'/tail.sub.php');
?>