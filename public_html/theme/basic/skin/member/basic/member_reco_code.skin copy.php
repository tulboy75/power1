<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$member_skin_url.'/style.css">', 0);

?>

<!-- 회원 비밀번호 확인 시작 { -->
<div class="mbskin">
    <div class = "mb_title"> 
        <div class = "history_back"><i class="fa fa-chevron-left"></i></div>
        <span class = "mb_title_cont">자신의 추천인 주소</span>

        <div>
            추천인 코드 <br/>
            <?php echo $member_reco_code ?>

            </br>
            추천인 코드 주소
            <?php echo G5_URL?>/?reco=<?php echo $member_reco_code?>



        </div>
    </div>
    
    <div class = "member_reco_list_box">

    </div>
</div>
<!-- } 회원 비밀번호 확인 끝 -->