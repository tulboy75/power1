<?php
include_once('./_common.php');

if ($is_guest)
    alert('로그인 한 회원만 접근하실 수 있습니다.', G5_BBS_URL.'/login.php');

$mb_search_nick = addslashes($_POST['mb_search_nick']);
$rt = $_REQUEST['rt'];
if($rt == "store")
    $rt_sql = " AND mb_level = 3 ";

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

// 현재 사용자를 추천한 회원 리스트 
if($mb_search_nick)
    $sql = "select * from " . $g5['member_table'] . " where mb_recommend = '" . $member['mb_10'] . "' AND mb_nick = '" . $mb_search_nick . "' " . $rt_sql . " order by mb_no desc limit 1";
else
    $sql = "select * from " . $g5['member_table'] . " where mb_recommend = '" . $member['mb_10'] . "' " . $rt_sql . " order by mb_no desc";

$result = sql_query($sql);
$i = 0;

while($row = sql_fetch_array($result)){

    $row['mb_addr'] = $row['mb_addr1'] . " " . $row['mb_addr2'] . " " . $row['mb_addr3'] ;
    $row['mb_addr'] = cut_str($row['mb_addr'], 20);
    $member_list[$i] = $row;
    $i++;
}

$member_count = count($member_list);
if($rt == "" )
    $g5['title'] = '추천회원 가입 리스트';
else
    $g5['title'] = '가맹점 가입 리스트';
include_once('./_head.sub.php');

include_once($member_skin_path.'/member_reco_list.skin.php');

include_once('./_tail.sub.php');
?>
