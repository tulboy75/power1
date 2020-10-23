<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$member_skin_url.'/style.css">', 0);

?>

<!-- 회원 비밀번호 확인 시작 { -->
<div class="mbskin">
    <div class = "mb_title"> 
        <div class = "history_back"><i class="fa fa-chevron-left"></i></div>
        <span class = "mb_title_cont"><?php echo $g5['title'] ?></span>
    </div>
    
    <div class = "member_reco_list_box">
        <?php if($rt != "store"){ ?>        
        <div class = "member_name"><?php echo $member['mb_name'] ?> 님</div>

        <ul class = "member_profile">
            <li><img src = "<?php echo G5_THEME_IMG_URL?>/member_profile.png" width = "100px"></li>
            <li style = "text-align : left;">
                가입 총 횟수 <br/>
                <span style= "font-size : 1.7em; color : #ff3a8f;"><?php echo $member_count ?> 회</span>
            </li>
        </ul>
        <?php } ?>
        <div class = "search_field">
            <form name = "member_reco_search_form" action = "" method = "post">
            <input type = "hidden" name = "rt" value = "<?php echo $rt ?>" >
            <input type = "text" name = "mb_search_nick" class = "frm_input" placeholder = "닉네임을 검색해 주세요." value = "<?php echo $mb_search_nick ?>">
            <button type="submit" class = "mb_list_submit_btn" >
                <i class="fa fa-search fa-2x"></i>
            </button>
        </form>
        </div>
        <?php // 추천한 회원 리스트 // ?>
        <table class = "member_list_table">
            <tr>
                <th>프로필</th>
                <th style = "text-align : left;">닉네임</th>
                <th>날짜</th>
                <?php if($rt == "store"){?>
                <th>서명</th>
                <?php } ?>
            </tr>
            <?php foreach($member_list as $key => $row){ ?>
                <tr>                
            <?php if($rt == "store"){?>

                <td><img src = "<?php echo G5_THEME_IMG_URL?>/member_list_profile.png" width = "50px"></td>
                <td style = "text-align:left;">
                <a href = "<?php echo G5_BBS_URL?>/member_reco_view.php?no=<?php echo $row['mb_no'] ?>"><div>
                    <?php echo $row['mb_nick'] ?><br/>
                    <span style = "color : #999;"><?php echo ($row['mb_addr']) ?></span>
                    </div></a>
                </td>
                <td><?php echo $row['mb_open_date'] ?></td>
                <td>
                <?php if($row['mb_signature']){ ?>
                    <span class = "check_circle check_circle_over">&#10004;</span>
                <?php }else{ ?>
                    <span class = "check_circle ">&#10004;</span>
                <?php } ?>

                </td>

            <?php }else{ ?>
                <td><img src = "<?php echo G5_THEME_IMG_URL?>/member_list_profile.png" width = "50px"></td>
                <td style = "text-align:left;"><?php echo $row['mb_nick'] ?></td>
                <td><?php echo $row['mb_open_date'] ?></td>
            <?php } ?>
            </tr>            
            <?php } ?>

            <?php if($member_count == 0){ ?>
            <tr>
                <td colspan = "4"> 추천 회원이 없습니다.</td>
            </tr>            
            <?php } ?>
        </table>


    </div>
</div>

<script>
function fmemberconfirm_submit(f)
{
    document.getElementById("btn_submit").disabled = true;

    return true;
}
</script>
<!-- } 회원 비밀번호 확인 끝 -->