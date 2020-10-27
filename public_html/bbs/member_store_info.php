<?php
include_once('./_common.php');

if ($is_guest)
    alert('로그인 한 회원만 접근하실 수 있습니다.', G5_BBS_URL.'/login.php');




$g5['title'] = '가맹점 정보 설정';

include_once('./_head.sub.php');

include_once($member_skin_path.'/member_store_info.skin.php');

include_once('./_tail.sub.php');
?>
