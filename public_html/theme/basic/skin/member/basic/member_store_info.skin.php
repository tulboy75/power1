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
    <div class = "member_reco_view_box">
        <form name = "store_info" action = "<?php echo G5_BBS_URL ?>/member_store_info.php" method = "POST" enctype="multipart/form-data">
        <input type = "file" name = "store_pic[]" id = "store_pic" multiple style = "display : none;">
        <input type = "hidden" name = "m_info_update" value = "1">
        <div class = "view_title"> 사진등록</div>
        <ul class = "file_upload_list" id = "file_upload_list">
            <li id = "add_file" style = "line-height : 70px;"><i class="fa fa-plus"></i></li>
        </ul>
        <ul class = "store_img_box">
        <?php foreach($mb_6 as $key => $val){ ?>
            <li>
                <img src = "<?php echo $val?>">
            </li>
            <?php } ?>                         
        </ul>       
        <div class = "view_title"> 영업시간</div> 
        <div style = "text-align : left;">       
        <input type = "text" name = "mb_4_1" class = "frm_input" style = "width : 40%;text-align : center;" value = "<?php echo $mb_4[0]?>"> <span style = "font-size : 2em;">~</span> <input type = "text" name = "mb_4_2" value = "<?php echo $mb_4[1]?>" class = "frm_input" style = "width : 40%; text-align : center;"> 
        </div>

        <div class = "view_title"> 내용</div>   
        <textarea name = "mb_5"><?php echo $mb_5 ?></textarea>
        <br/>
        <input type="submit" value="확인" id="btn_submit" class="btn_submit"> 
        <br/><br/><br/><br/><br/><br/>
        </form>
    </div>

</div>

 


<script>
$("#add_file").click(function(){
    $("#store_pic").trigger("click");
});

$("#store_pic").on("change",handleImgFileSelect);

var self_files = [];

function handleImgFileSelect(e) {
 
 // 이미지 정보들을 초기화
 sel_files = [];
 $(".img_file").remove();

 var files = e.target.files;
 var filesArr = Array.prototype.slice.call(files);
 if(filesArr.length > 5){
    alert("파일은 5개까지 업로드 가능합니다.");
    return;
 }


 var index = 0;
 filesArr.forEach(function(f) {
     if(!f.type.match("image.*")) {
         alert("확장자는 이미지 확장자만 가능합니다.");
         return;
     }

     sel_files.push(f);

     var reader = new FileReader();
     reader.onload = function(e) {
         var html = "<li class = 'img_file'><img src =\"" + e.target.result + "\" width = '100%'></li>" ;
         $("#file_upload_list").append(html);
         index++;

     }
     reader.readAsDataURL(f);
     
 });
}

</script>
<!-- } 회원 비밀번호 확인 끝 -->