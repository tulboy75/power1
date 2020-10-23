<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가
add_event('register_form_update_after', 'register_update_recommend_code', 10, 2);

function register_update_recommend_code($mb_id, $w){
    global $g5; 
    if($w == ""){
        $sql = "select * from `{$g5['member_table']}` where mb_id = '" . $mb_id . "'";
        $result = sql_fetch($sql);
        $mb_10 = 100000 + $result['mb_no'];
        $sql = "update " . $g5['member_table'] . " set mb_10 = '" . $mb_10 . "' where mb_no = '" . $result['mb_no'] . "'";
        $result = sql_query($sql);
    }
}
?>