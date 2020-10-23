<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$member_skin_url.'/style.css">', 0);
?>

<!-- 로그인 시작 { -->
<div id="mb_login" class="mbskin">
    <div class = "mb_title"> 
        <div class = "history_back"><i class="fa fa-chevron-left"></i></div>
        <span class = "mb_title_cont">로그인</span>
    </div>

    <div class="mbskin_box">

        <ul class = "register_menu">
                <li class = "register_sub_menu <?php if($rt == ""){?> over <?php } ?>"><a href = "?rt=">일반회원</a></li>
                <li class = "register_sub_menu <?php if($rt == "store"){?> over <?php } ?>"><a href="?rt=store">가맹점회원</a></li>
        </ul>       

        <form name="flogin" action="<?php echo $login_action_url ?>" onsubmit="return flogin_submit(this);" method="post">
        <input type="hidden" name="url" value="<?php echo $login_url ?>">
        
        <fieldset id="login_fs">
            <legend>회원로그인</legend>
            <label for="login_id" class="sound_only">회원아이디<strong class="sound_only"> 필수</strong></label>
            <input type = "text" value = "+82" class = "frm_input frm_input_5" readonly> <input type="text" name="mb_id" id="login_id" required class="frm_input frm_input_90 required" size="20" maxLength="20" placeholder="휴대폰번호를 입력해 주세요.">
            <label for="login_pw" class="sound_only">비밀번호를 입력해 주세요.<strong class="sound_only"> 필수</strong></label>
            <input type="password" name="mb_password" id="login_pw" required class="frm_input required" size="20" maxLength="20" placeholder="비밀번호를 입력해 주세요">
           
            <div id="login_info">
                <div class="login_if_auto chk_box">
                    <input type="checkbox" name="auto_login" id="login_auto_login" class="selec_chk">
                    <label for="login_auto_login"> 자동로그인</label>  
                </div>
                <!-- 
                <div class="login_if_lpl">
                    <a href="<?php echo G5_BBS_URL ?>/password_lost.php" target="_blank" id="login_password_lost">정보찾기</a>  
                </div>
                -->
            </div>
            <br/><br/>
            <button type="submit" class="btn_submit">로그인</button>
            <ul class = "member_link">
                <li><a href="<?php echo G5_BBS_URL?>/password_lost_hp.php">비밀번호변경</a></li>
                <li><a href="<?php echo G5_BBS_URL?>/register_form.php">회원가입</a></li>
                <li><a href="<?php echo G5_BBS_URL?>/register_form.php?rt=store">가맹점 회원가입</a></li>
            </ul>
        </fieldset> 
        </form>
        <?php @include_once(get_social_skin_path().'/social_login.skin.php'); // 소셜로그인 사용시 소셜로그인 버튼 ?>
    </div>
</div>

<script>
jQuery(function($){
    $("#login_auto_login").click(function(){
        if (this.checked) {
            this.checked = confirm("자동로그인을 사용하시면 다음부터 회원아이디와 비밀번호를 입력하실 필요가 없습니다.\n\n공공장소에서는 개인정보가 유출될 수 있으니 사용을 자제하여 주십시오.\n\n자동로그인을 사용하시겠습니까?");
        }
    });
});

function flogin_submit(f)
{
    if( $( document.body ).triggerHandler( 'login_sumit', [f, 'flogin'] ) !== false ){
        return true;
    }
    return false;
}
</script>
<!-- } 로그인 끝 -->
