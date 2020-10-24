<?php
define('_INDEX_', true);
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

if (G5_IS_MOBILE) {
    include_once(G5_THEME_MOBILE_PATH.'/index.php');
    return;
}

include_once(G5_THEME_PATH.'/head.php');

// 추천인 코드 세션 저장
if($_GET['reco']){
    set_session("reco", escape_trim($_GET['reco']));
}

?>

<?php //echo outlogin('theme/basic'); // 외부 로그인, 테마의 스킨을 사용하려면 스킨을 theme/basic 과 같이 지정 ?>
<div class = "index_img_box">
    <span class = "index_img">
        <img src = "<?php echo G5_THEME_IMG_URL ?>/main_img01.png">
    </span>
    <span class = "index_img">
        <img src = "<?php echo G5_THEME_IMG_URL ?>/main_img02.png">
    </span>    
</div>

<?php
include_once(G5_THEME_PATH.'/tail.php');
?>