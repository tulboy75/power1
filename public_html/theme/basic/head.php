<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

if (G5_IS_MOBILE) {
    include_once(G5_THEME_MOBILE_PATH.'/head.php');
    return;
}

include_once(G5_THEME_PATH.'/head.sub.php');
include_once(G5_LIB_PATH.'/latest.lib.php');
include_once(G5_LIB_PATH.'/outlogin.lib.php');
include_once(G5_LIB_PATH.'/poll.lib.php');
include_once(G5_LIB_PATH.'/visit.lib.php');
include_once(G5_LIB_PATH.'/connect.lib.php');
include_once(G5_LIB_PATH.'/popular.lib.php');
?>

<!-- 상단 시작 { -->
<div id="hd" >
    <h1 id="hd_h1"><?php echo $g5['title'] ?></h1>
    <div id="skip_to_container"><a href="#container">본문 바로가기</a></div>

    <?php
    if(defined('_INDEX_')) { // index에서만 실행
        include G5_BBS_PATH.'/newwin.inc.php'; // 팝업레이어
    }
    ?>

    <div id="hd_wrapper">
        <div class = "menu_btn">
            <a href="javascript:" id = "gnb_btn" class="btn_gnb mobile_only" title="모바일 메뉴 열기/닫기">
                <i class="fa fa-bars" aria-hidden="true"></i>
            </a>   
        </div>
        <div id="logo">
            <a href="<?php echo G5_URL ?>"><img src="<?php echo G5_THEME_IMG_URL ?>/bq_logo.png" alt="<?php echo $config['cf_title']; ?>"></a>
        </div>

        <div class="menu_panel left">
            <!-- 눌렀을경우 메뉴가 나타나고, 사라지는 부분 -->
            <a class="gnb_btn" title="menu"><span>X</span></a>            
            <!-- 메뉴의 내용부분 -->
            <div class="mo-menu-title">
                    <a href="<?php echo G5_URL ?>"><img src="<?php echo G5_THEME_IMG_URL ?>/bq_logo.png" alt="<?php echo $config['cf_title']; ?>" style = "width : 30%;"></a>                    
            </div>
            <ul>
                <li class="menu-label"><a href="#">사업개요</a></li>
                <li class="menu-label"><a href="#">입지환경</a></li>
                <li class="sub-menu"><a href="#">개발계획</a></li>
                <li class="menu-label"><a href="#">분양안내</a></li>
                <li class="sub-menu"><a href="#">분양일정</a></li>
                <li class="sub-menu"><a href="#">분양가격</a></li>
                <li class="sub-menu"><a href="#">분양혜택</a></li>
            </ul>
        </div>
    </div>
    <div class="panel-overlay"></div>    

</div>
<!-- } 상단 끝 -->


<hr>

<!-- 콘텐츠 시작 { -->
<div id="wrapper">
    <div id="container_wr">
   
    <div id="container">
        <?php if (!defined("_INDEX_")) { ?>
            <div id="container_title">
                <span class = "back_btn"> < </span>
                <span title="<?php echo get_text($g5['title']); ?>"><?php echo get_head_title($g5['title']); ?></span>
            </div>
        <?php } ?>
        