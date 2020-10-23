<?php
include_once('./_common.php');

if ($is_guest)
    alert('로그인 한 회원만 접근하실 수 있습니다.', G5_BBS_URL.'/login.php');


$no = addslashes($_REQUEST['no']);

$recommend_code = $member['mb_10'];


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
$sql = "select * from "  . $g5['member_table'] . " where mb_no = '" . $no . "'";
$row = sql_fetch($sql);

if($row['mb_recommend'] != $recommend_code){
    alert('허용된 사용자가 아닙니다. 다시 시도해 주세요.');
}

$g5['title'] = '가맹점 정보';

include_once('./_head.sub.php');

include_once($member_skin_path.'/member_reco_view.skin.php');

include_once('./_tail.sub.php');
?>
