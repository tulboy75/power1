<?php
include_once('./_common.php');

if ($is_guest)
    alert('로그인 한 회원만 접근하실 수 있습니다.', G5_BBS_URL.'/login.php');

$mb_search_nick = $_POST['mb_search_nick'];

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

$g5['title'] = '추천코드 주소';
$member_reco_code = $member[mb_10];


include_once('./_head.sub.php');

include_once($member_skin_path.'/member_reco_code.skin.php');

include_once('./_tail.sub.php');
?>
