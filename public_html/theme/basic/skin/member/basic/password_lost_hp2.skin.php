<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$member_skin_url.'/style.css">', 0);
$rt = escape_trim($_REQUEST['rt']);
?>

<!-- 로그인 시작 { -->
<div id="mb_lost_pass" class="mbskin">
    <div class = "mb_title"> 
        <div class = "history_back"><i class="fa fa-chevron-left"></i></div>
        <span class = "mb_title_cont">비밀번호 변경</span>
    </div>

    <div class="mbskin_box">

        <form name="member_hp_check2" action="<?php echo $action_url ?>" onsubmit="return fpassword_check2_submit(this);" method="post">
        <input type="hidden" name="url" value="<?php echo $login_url ?>">
        <input type="hidden" name="token" id = "mb_token" value="<?php echo $token ?>">
        <input type = "hidden" name = "mb_hp" value = "<?php echo $member_hp ?>">
        <input type = "hidden" name = "rt" value = "<?php echo $rt ?>">
    
        
        <fieldset id="login_fs">
            <legend>회원로그인</legend>
            <label for="mb_password" class="sound_only">비밀번호<strong class="sound_only"> 필수</strong></label>
            <input type="password" name="mb_password" id="mb_password" required class="frm_input required" size="20" maxLength="20" placeholder="비밀번호를 입력해 주세요.">


            <label for="mb_password_re" class="sound_only">비밀번호확인<strong class="sound_only"> 필수</strong></label>
            <input type="password" name="mb_password_re" id="mb_password_re" required class="frm_input required" size="20" maxLength="20" placeholder="비밀번호를 한번더 입력해 주세요." style = "margin-top: 10px;">
            <span id="msg_mb_pass" class = "error_msg"></span>
           

            <br/><br/>
            <button type="submit" class="btn_submit">비밀번호 변경하기</button>
            <ul class = "member_link">
                <li><a href="<?php echo G5_BBS_URL?>/password_lost_hp.php">비밀번호변경</a></li>
                <li><a href="<?php echo G5_BBS_URL?>/register_form.php">회원가입</a></li>
                <li><a href="<?php echo G5_BBS_URL?>/register_form.php?rt=store">가맹점 회원가입</a></li>
            </ul>
        </fieldset> 
        </form>

    </div>
</div>

<script>
function fpassword_check2_submit(f)
{
    var mb_pass1 = f.mb_password.value;
    var mb_pass2 = f.mb_password_re.value;
    if(mb_pass1 == "" || mb_pass2 == ""){
        alert("비밀번호를 입력해 주세요");
        return false;
    }else if (f.mb_password.value != f.mb_password_re.value) {
        alert("비밀번호가 같지 않습니다.");
        f.mb_password_re.focus();
        return false;
    }else if (f.mb_password_re.value.length < 3) {
        alert("비밀번호를 3글자 이상 입력하십시오.");
        f.mb_password_re.focus();
        return false;
    }
}

jQuery(function($){

});

</script>
<!-- } 로그인 끝 -->
