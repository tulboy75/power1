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
            <div class = "gnb_close_btn"><a class="gnb_btn" title="menu"><i class="fa fa-times"></i></a></div>
            <!-- 메뉴의 내용부분 -->
            <div class="mo-menu-title">
                    <a href="<?php echo G5_URL ?>"><img src="<?php echo G5_THEME_IMG_URL ?>/bq_logo.png" alt="<?php echo $config['cf_title']; ?>" style = "width : 30%;"></a>                    
            </div>
            <div>
            <ul class="gnb_member_menu">
                <?php if($is_member){ ?>
                <li class="gnb_member"><a href="<?php echo G5_BBS_URL ?>/member_confirm.php?url=<?php echo G5_BBS_URL ?>/register_form.php">정보수정</a></li>
                <li class="gnb_member over"><a href="<?php echo G5_BBS_URL?>/logout.php">로그아웃</a></li>
                <?php }else{ ?>
                <li class="gnb_member"><a href="<?php echo G5_BBS_URL?>/login.php">로그인</a></li>
                <li class="gnb_member over"><a href="<?php echo G5_BBS_URL?>/register_form.php">회원가입</a></li>                
                <?php } ?>
            </ul>
            <hr style = "width: 90%; display : inline-block; border-top : 1px solid #d9d9d9; margin-top : 20px;">
            </div>

            <ul>
                <li class="menu-label"><a href="<?php echo G5_BBS_URL?>/member_reco_list.php"><img src = "<?php echo G5_THEME_IMG_URL ?>/menu_list_icon01.png"> <span class = 'gnb_menu_list_title'>&nbsp;추천회원가입리스트</span></a></li>
                <li class="menu-label"><a href="<?php echo G5_BBS_URL?>/member_reco_code.php"><img src = "<?php echo G5_THEME_IMG_URL ?>/menu_list_icon02.png"> <span class = 'gnb_menu_list_title'>&nbsp;추천코드 주소</span></a></li>
                <li class="menu-label"><a href="#"><img src = "<?php echo G5_THEME_IMG_URL ?>/menu_list_icon03.png"> <span class = 'gnb_menu_list_title'>&nbsp;코인내역</span></a></li>
                <li class="menu-label"><a href="#"><img src = "<?php echo G5_THEME_IMG_URL ?>/menu_list_icon04.png"> <span class = 'gnb_menu_list_title'>&nbsp;회원정보수정</span></a></li>
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

        