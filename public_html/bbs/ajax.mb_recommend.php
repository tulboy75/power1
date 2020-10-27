<?php
include_once("./_common.php");
include_once(G5_LIB_PATH."/register.lib.php");

$mb_recommend = trim($_POST["reg_mb_recommend"]);

$sql = "select * from " . $g5['member_table'] . " where mb_10 = '" . $mb_recommend . "'";
$result = sql_fetch($sql);
$cnt = count($result);

if ($cnt == 0) {
    die("입력하신 추천인은 존재하지 않는 코드 입니다.");
}
?>