<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$member_skin_url.'/style.css">', 0);
?>
<div class="mbskin">
    <div class = "mb_title"> 
        <div class = "history_back"><i class="fa fa-chevron-left"></i></div>
        <span class = "mb_title_cont"><?php echo $g5['title'] ?></span>
    </div>


    <div class = "member_reco_list_box" style = "margin-top : 30px;">
        <ul class = "member_profile">
            <li><img src = "<?php echo G5_THEME_IMG_URL?>/member_profile.png" width = "100px"></li>
            <li style = "text-align : left;">
                보유 블링블링 <br/>
                <span style= "font-size : 1.7em; color : #ff3a8f;"><?php echo number_format($member['mb_point']); ?> 개</span>
            </li>
        </ul>
    </div>        
    <div class = "search_field">
    <form name = "mb_search_nick_form" id = "mb_search_nick_form" action = "" method = "post">
        <input type = "text" name = "mb_search_nick" id = "mb_search_nick" class = "frm_input " placeholder = "닉네임을 검색해 주세요." value = "<?php echo $s_nick ?>" required>
        <button type="submit" class = "mb_list_submit_btn" >
         <i class="fa fa-search fa-2x"></i>
        </button>
        <span id="msg_search_nick" class = "error_msg"></span>        
    </form>
    </div>
    <div class = "point_send_form_box">
    <form name = "member_point_send_form" id = "member_point_send_form" action = "" method = "post">
        <table style = "width : 100%; ">
            <tr>
                <th>상대방 닉네임</th>
                <td><input type = "text" name = "mb_send_nick" id = "mb_send_nick" class = "frm_input" placeholder = "닉네임을 검색해 주세요." value = "<?php echo $s_nick ?>" readonly></td>
            </tr>
            <tr>
                <th>보낼개수</th>
                <td><input type = "number" name = "mb_send_point" id = "mb_send_point" class = "frm_input" placeholder = "보낼개수를 숫자만 입력해 주세요." value = "<?php echo $s_nick ?>"></td>
            </tr>
            <tr>
                <td colspan = "2"><input type = "submit" class = "btn_submit" value = "전송하기" style = "font-size : 1.8em;margin-top: 20px;"></td>
            </tr>            
        </table> 
            
    </form>

    </div>

    <br/><br/><br/><br/><br/><br/>
</div>
<script>
jQuery(function($){

}
</script>