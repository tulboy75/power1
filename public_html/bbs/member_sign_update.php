<?php
include_once('./_common.php');

if ($is_guest)
    alert('로그인 한 회원만 접근하실 수 있습니다.', G5_BBS_URL.'/login.php');


$mb_no = addslashes($_POST['mb_no']);
$member_sign = addslashes($_POST['member_sign']);

if($mb_no == "")
    alert("정상적인 접근이 아닙니다.");
/*
if ($url)
    $urlencode = urlencode($url);
else
    $urlencode = urlencode($_SERVER[REQUEST_URI]);
*/

//$url = clean_xss_tags($_GET['url']);

//소셜 로그인 한 경우
if( function_exists('social_member_comfirm_redirect') && (! $url || $url === 'register_form.php' || (function_exists('social_is_edit_page') && social_is_edit_page($url) ) ) ){    
    social_member_comfirm_redirect();
}

// 현재사용자를 추천한 사람 정보만 보여준다.
$sql = "update "  . $g5['member_table'] . " set mb_signature = '" . $member_sign . "' where mb_no = '" . $mb_no . "'";
$row = sql_query($sql);

$link = G5_BBS_URL . "/member_reco_view.php?no=" . $mb_no;
alert("서명이 완료 되었습니다.", $link);


?>
