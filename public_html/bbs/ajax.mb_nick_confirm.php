<?php
include_once('./_common.php');
include_once(G5_LIB_PATH.'/register.lib.php');

$mb_nick = escape_trim($_POST['mb_nick']);

if ($msg = empty_mb_nick($mb_nick)) die($msg);
if ($msg = valid_mb_nick($mb_nick)) die($msg);
if ($msg = count_mb_nick($mb_nick)) die($msg);

$sql = "select count(*) as cnt, mb_nick from " . $g5['member_table'] . " where mb_nick = '" . $mb_nick . "'";

$result = sql_fetch($sql);

if($result['cnt'] != "1")
    die("존재하지 않는 닉네임 입니다. 다시 검색해 주세요.");

if($member['mb_nick'] == $result['mb_nick'])
    die("자신에게는 코인을 전송할 수 없습니;다.")
?>
