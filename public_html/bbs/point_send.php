<?php
include_once('./_common.php');

if ($is_guest)
    alert('로그인 한 회원만 접근하실 수 있습니다.', G5_BBS_URL.'/login.php');

$g5['title'] = "코인전송";

$sql = "select mb_id from " . $g5['member_table'] . " where mb_nick = '" . $s_nick . "'";
$row = sql_fetch($sql);


$s_id = $row['mb_id'];


if($s_id != ""){
    $qstr .= "&mb_search_nick=".$s_nick;
    $sql_common = " from {$g5['point_table']} where mb_id = '".escape_trim($member['mb_id'])."' AND po_rel_id = '". $s_id . "' ";
}else{
    $sql_common = " from {$g5['point_table']} where mb_id = '".escape_trim($member['mb_id'])."' ";
}


$sql_order = " order by po_id desc ";

$sql = " select count(*) as cnt {$sql_common} ";
$row = sql_fetch($sql);
$po_count = $row['cnt'];

$rows = $config['cf_page_rows'];
$total_page  = ceil($po_count / $rows);  // 전체 페이지 계산


if ($page < 1) { $page = 1; } // 페이지가 없으면 첫 페이지 (1 페이지)
$from_record = ($page - 1) * $rows; // 시작 열을 구함


//  포인트 정보 불러오기
$sum_point1 = $sum_point2 = $sum_point3 = 0;
$sql = " select *
{$sql_common}
{$sql_order}
limit {$from_record}, {$rows} ";

$result = sql_query($sql);
for ($i=0; $row=sql_fetch_array($result); $i++) {
    $po_list[$i] = $row;
    $sql = "select mb_nick from " . $g5['member_table'] . " where mb_id = '" . $row['po_rel_id'] . "'";
    $mb_row = sql_fetch($sql);
    $po_list[$i]['mb_nick'] = $mb_row['mb_nick'];
}

include_once('./_head.sub.php');

include_once($member_skin_path.'/point_send.skin.php');

include_once('./_tail.sub.php');
?>