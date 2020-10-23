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
        </div>
        <div class = "member_code_box">
            <div  class = "title">추천인 코드</div>
            <div class = "title" style = "color : #ff3a8f"><?php echo $member_reco_code ?></div>

            </br>
            <div class = "title">추천인 코드 주소</div>
            <input type = "text" class = "member_reco_code_url_box frm_input" id = "member_code_url" value = "<?php echo G5_URL ?>/?reco=<?php echo $member_reco_code ?>" readonly>
        </div>
    </div>
    
    <div class = "member_reco_list_box">

    </div>
</div>
<!-- } 회원 비밀번호 확인 끝 -->
<script>
jQuery(function($){
    $( '#member_code_url' ).click(function() {
        $(this).select();
        document.execCommand( 'Copy' );
        alert( 'URL 이 복사 되었습니다.' );
    }
);



});
</script>
