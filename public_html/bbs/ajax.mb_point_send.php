<?php
include_once('./_common.php');
include_once(G5_LIB_PATH.'/register.lib.php');

$mb_nick = escape_trim($_POST['mb_nick']);
$mb_point = escape_trim($_POST['mb_point']);
$content = $member['mb_nick'] . "님께서 코인을 전송하였습니다.";

if ($msg = empty_mb_nick($mb_nick)) die($msg);
if ($msg = valid_mb_nick($mb_nick)) die($msg);
if ($msg = count_mb_nick($mb_nick)) die($msg);
if (!is_numeric($mb_point)) die("숫자만 입력해 주세요.");

// 보낸사람 -> 자신 아이디
$mb_rel_id = $member['mb_id'];

// mb_nick -> mb_id 구하기
$sql = "select mb_id from " . $g5['member_table'] . " where mb_nick = '" . $mb_nick . "'";
$row = sql_fetch($sql);
$mb_id = $row['mb_id'];

if($mb_id == "")
    die("존재하지 않는 아이디 입니다.");

// 포인트 입력
$result = insert_point($mb_id, $mb_point, $content, '', $mb_rel_id , '', 0);
if($result != "1")
    die("코인전송에 실패 하였습니다.");
?>
