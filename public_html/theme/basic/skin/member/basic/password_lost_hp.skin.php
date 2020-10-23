<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$member_skin_url.'/style.css">', 0);
?>

<!-- 로그인 시작 { -->
<div id="mb_lost_pass" class="mbskin">
    <div class = "mb_title"> 
        <div class = "history_back"><i class="fa fa-chevron-left"></i></div>
        <span class = "mb_title_cont">비밀번호 변경</span>
    </div>

    <div class="mbskin_box">

        <form name="member_hp_check" action="<?php echo $action_url ?>" onsubmit="return fpassword_check_submit(this);" method="post">
        <input type="hidden" name="url" value="<?php echo $login_url ?>">
        <input type="hidden" name="token" id = "mb_token" value="<?php echo $token ?>">
        <input type = "hidden" name = "mb_hp_code_confirm" value = "0">         
        
        <fieldset id="login_fs">
            <legend>회원로그인</legend>
            <label for="member_hp" class="sound_only">회원휴대폰 번호<strong class="sound_only"> 필수</strong></label>
            <input type = "text" value = "+82" class = "frm_input frm_input_5" readonly> <input type="text" name="mb_hp" id="mb_hp" required class="frm_input frm_input_60 required" size="20" maxLength="20" placeholder="휴대폰번호를 입력해 주세요." style = "margin-left : 1%;">
            <input type = "button" id = "mb_hp_code_req" class = "frm_input_20 frm_btn_confirm" style = "font-size : 1.2em" value = "인증번호요청">

            <label for="member_hp_code" class="sound_only">인증번호를 입력해 주세요.<strong class="sound_only"> 필수</strong></label>
            <input type="text" name="mb_hp_code" id="mb_hp_code" required class="frm_input frm_input_75 required" size="20" maxLength="6" placeholder="인증번호를 입력해 주세요." style = "margin-top: 10px;" readonly>

            <input type = "button"  id = "mb_hp_code_con" class = "frm_input_20 frm_btn_confirm" style = "font-size : 1.2em; margin-top : 10px;"value = "인증번호확인">
            <span id="msg_mb_hp" class = "error_msg"></span>
           

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
function fpassword_check_submit(f)
{
    if(f.mb_hp_code_confirm.value != "1"){
        alert("휴대폰 인증 후 변경 가능합니다.");
        return false;
    }
    return true;
}

jQuery(function($){
    // 인증번호 입력시도시 에러 메세지
    $("#mb_hp_code").click(function(){
        if($("#mb_hp_code").prop("readonly")){
            $("#msg_mb_hp").text("인증번호를 요청해 주세요.");
            return;
        }
    });
    // 인증번호 요청
    $("#mb_hp_code_req").click(function(){
        $("#msg_mb_hp").text('');
        $("#mb_hp_code").attr('disabled', false);
        $("#mb_hp_code").select();     
        var msg = reg_mb_hp_code_send();

        if(msg){
            $("#msg_mb_hp").text(msg);
            $(this).select();
            $("#mb_hp_code").prop('readonly', true);            
            return;
        }
        alert('인증코드가 발송되었습니다.');
        $("#mb_hp").prop('readonly', true);
        $("#mb_hp_code").prop('readonly', false);
    });

    //인증번호 확인
    $("#mb_hp_code_con").click(function(){
        
        if($("#mb_hp_code").prop("readonly")){
            $("#msg_mb_hp").text("인증번호를 요청해 주세요.");
            return;
        }        

        var mb_hp_code = $("#mb_hp_code").val();        
        if(mb_hp_code == ""){
            $("#msg_mb_hp").text("인증번호를 입력해 주세요.");
        }
        var code_test = /^[0-9_]{6}$/;
        if(!code_test.test(mb_hp_code)){
            $("#msg_mb_hp").text("인증번호는 6자리 숫자입니다.");
        }
        //  문자코드 확인 부분
        else{

            $("#msg_mb_hp").text('');       

            var msg = reg_mb_hp_code_chk();
            if(msg){
                $("#msg_mb_hp").text(msg);
            }else{
                alert('인증에 성공하였습니다.');
                $("#mb_hp_code").attr('disabled', true);
                $("input[name=mb_hp_code_confirm").val("1");
            }
        }

    });    
});

// 인증코드 발송
var reg_mb_hp_code_send = function() {

var result = "";

$.ajax({
    type: "POST",
    url: g5_bbs_url+"/ajax.mb_hp_code.php",
    data: {
        "reg_mb_type" : "password_check",
        "reg_mb_hp": $("#mb_hp").val(),
        "reg_mb_id": "",
        "reg_mb_token" : $("#mb_token").val()
    },
    cache: false,
    async: false,
    success: function(data) {
        result = data;
    }
});

return result;
}

//  인증코드 확인
var reg_mb_hp_code_chk = function() {
    var result = "";
    $.ajax({
        type : "POST",
        url : g5_bbs_url + "/ajax.mb_hp_code_chk.php",
        data : {
            "reg_mb_hp_code" : $("#mb_hp_code").val(),
        },
        cache: false,
        async: false,
        success: function(data) {
            result = data;
        }
    });
    return result;
}
</script>
<!-- } 로그인 끝 -->
