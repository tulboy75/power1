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
        <form name = "member_reco_search_form" action = "" method = "post">
        <input type = "hidden" name = "rt" value = "<?php echo $rt ?>" >
        <input type = "text" name = "mb_search_nick" class = "frm_input" placeholder = "닉네임을 검색해 주세요." value = "<?php echo $s_nick ?>">
        <button type="submit" class = "mb_list_submit_btn" >
            <i class="fa fa-search fa-2x"></i>
        </button>
        </form>
    </div>
    <table class = "member_list_table">
        <tr>
            <th style = "width : 50px;">프로필</th>
            <th>개수</th>            
            <th style = "text-align : left;">닉네임</th>
            <th>날짜</th>
        </tr>
        <?php foreach($po_list as $key => $row){ ?>
        <tr>                
            <td><img src = "<?php echo G5_THEME_IMG_URL?>/member_list_profile.png" width = "50px"></td>
            <td style = "color : #ff3a8f"><?php echo number_format($row['po_point']); ?></td>
            <td style = "text-align:left;"><?php echo $row['mb_nick'] ?></td>
            <td><?php echo substr($row['po_datetime'], 0 ,10); ?></td>
        </tr>            
        <?php } ?>

        <?php if($po_count == 0){ ?>
        <tr>
            <td colspan = "4"> 받은내역이 없습니다.</td>
        </tr>            
        <?php } ?>
    </table>
    <div style = "text-align : center;"><?php echo get_paging(G5_IS_MOBILE ? $config['cf_mobile_pages'] : $config['cf_write_pages'], $page, $total_page, $_SERVER['SCRIPT_NAME'].'?'.$qstr.'&amp;page='); ?></div>

    <br/><br/><br/><br/><br/><br/>

</div>