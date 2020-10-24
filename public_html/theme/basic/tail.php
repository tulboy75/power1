<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

if (G5_IS_MOBILE) {
    include_once(G5_THEME_MOBILE_PATH.'/tail.php');
    return;
}
?>
    
    </div>
</div>

</div>
<!-- } 콘텐츠 끝 -->

<hr>

<!-- 하단 시작 { -->
<div id="ft">

    <div id="ft_wr">
        <div class = "ft_company_info">
            회사소개  ㅣ  위치기반서비스이용약관  ㅣ  개인정보수집및이용  ㅣ 사업자정보확인 | 가맹점로그인  ㅣ  가맹점회원가입
        </div>
        <div id="ft_company" class="ft_cnt">
        	<h2>뷰티퀸</h2>
	        <p class="ft_info">
                주소  : 서울특별시 영등포구 영등포로 1, 123빌딩 11층<br>                
                대표이사 : 신태관 | 사업자등록번호 : 123-456-78945
	        	통신판매업신고번호 :  2000 - 서울영등포 - 012345<br>
				전자우편주소 : qwerty@google.com<br>
<!--                
				전화 :  02-123-4567  팩스  : 02-123-4568<br>                
                개인정보관리책임자 :  정보책임자명<br>
-->             Copyright &copy; <b>beautyqueen.</b> All rights reserved.   
            </p>
                        
	    </div>
	</div>      
        <!-- <div id="ft_catch"><img src="<?php echo G5_IMG_URL; ?>/ft_logo.png" alt="<?php echo G5_VERSION ?>"></div> -->
    
    
    <button type="button" id="top_btn" style = "border : 1px solid #d9d9d9;">
    	<i class="fa fa-arrow-up" aria-hidden="true" style = "color : #d9d9d9;"></i><span class="sound_only">상단으로</span>
    </button>
    <script>
    $(function() {
        $("#top_btn").on("click", function() {
            $("html, body").animate({scrollTop:0}, '500');
            return false;
        });
    });
    </script>
</div>

<?php
if(G5_DEVICE_BUTTON_DISPLAY && !G5_IS_MOBILE) { ?>
<?php
}

if ($config['cf_analytics']) {
    echo $config['cf_analytics'];
}
?>

<!-- } 하단 끝 -->

<script>
$(function() {
    // 폰트 리사이즈 쿠키있으면 실행
    font_resize("container", get_cookie("ck_font_resize_rmv_class"), get_cookie("ck_font_resize_add_class"));
});
</script>

<?php
include_once(G5_THEME_PATH."/tail.sub.php");
?>