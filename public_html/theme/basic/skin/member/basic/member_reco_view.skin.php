<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$member_skin_url.'/style.css">', 0);
add_javascript('<script src="'.G5_JS_URL.'/signature_pad.js"></script>', 0);
?>

<!-- 회원 비밀번호 확인 시작 { -->
<div class="mbskin">
    <div class = "mb_title"> 
        <div class = "history_back"><i class="fa fa-chevron-left"></i></div>
        <span class = "mb_title_cont"><?php echo $g5['title'] ?></span>
    </div>
    
    <div class = "member_reco_view_box">
        <ul class = "member_view_profile">
            <li><img src = "<?php echo G5_THEME_IMG_URL?>/member_view_reco.png" width = "150px"></li>
            <li class = "member_view_profile_cont">
                <span><?php echo $row['mb_1'] ?></span><br/>
                <span style = "color : #999; font-size : 0.8em;">
                 <?php echo $row['mb_addr1'] . " " . $row['mb_addr2'] ?><br/>
                 <?php echo $row['mb_tel'] ?>
                </span>
            </li>
        </ul>

        <?php // 추천한 회원 리스트 // ?>
        <div class = "view_title"> 사업자 정보</div>

        <table class = "member_view_table" cellspacing = "0" cellpadding = "0">
            <tr>
                <th>닉네임</th>
                <td><?php echo $row['mb_nick']?></td>
            </tr>
            <tr>
                <th>대표자명</th>
                <td><?php  echo $row['mb_name']?></td>
            </tr>
            <tr>
                <th>휴대폰</th>
                <td><?php  echo $row['mb_hp']?></td>
            </tr>
            <tr>
                <th>상호명</th>
                <td><?php  echo $row['mb_1']?></td>
            </tr>
            <tr>
                <th>전화번호</th>
                <td><?php  echo $row['mb_tel']?></td>
            </tr>
            <tr>
                <th>사업자주소</th>
                <td><?php  echo $row['mb_addr1'] . " " . $row['mb_addr2'] . " " . $row['mb_addr3']?></td>
            </tr>
            <tr>
                <th>사업자번호</th>
                <td><?php  echo $row['mb_2']?></td>
            </tr>
            <tr>
                <th>영업사원코드</th>
                <td><?php echo $row['mb_recommend'] ?></td>
            </tr>
        </table>

        <div class = "view_title"> 계약서 내용</div>
        <div class = "view_box">
            <textarea readonly class = "frm_input" style = "height : 200px; " id = "contract">계약서 내용입니다.계약서 내용입니다.계약서 내용입니다.계약서 내용입니다.계약서 내용입니다.계약서 내용입니다.계약서 내용입니다.계약서 내용입니다.계약서 내용입니다.계약서 내용입니다.
            </textarea>

        <div class = "view_title"> 서명</div>
        <div id = "mb_signature_pad" style = "width : 100%; height : 300px;">
            <canvas style = "border : 1px solid #ccc; width : 100%; height : 300px;"></canvas>
            <ul style = "margin-top : 10px;">
                <li><input type = "button" value = "다시그리기" class = "signature_reset_btn"></li>
                <li><input type = "button" value = "저장하기" class= "signature_save_btn"></li>
            </ul>

        </div>
        <div id = "draw" style  = "width : 100%; height : 300px;">




        </div>
    </div>
    <br/><br/><br/><br/><br/>    <br/><br/><br/><br/><br/>    <br/><br/><br/><br/><br/>
</div>
<script>
var wrapper = document.getElementById("mb_signature_pad");
var clearButton = wrapper.querySelector(".signature_reset_btn");
var saveSVGButton = wrapper.querySelector(".signature_save_btn");
var canvas = wrapper.querySelector("canvas");
var signaturePad = new SignaturePad(canvas, {
  // It's Necessary to use an opaque color when saving image as JPEG;
  // this option can be omitted if only saving as PNG or SVG
  backgroundColor: 'rgb(255, 255, 255)'
});

// Adjust canvas coordinate space taking into account pixel ratio,
// to make it look crisp on mobile devices.
// This also causes canvas to be cleared.
function resizeCanvas() {
  // When zoomed out to less than 100%, for some very strange reason,
  // some browsers report devicePixelRatio as less than 1
  // and only part of the canvas is cleared then.
  var ratio =  Math.max(window.devicePixelRatio || 1, 1);

  // This part causes the canvas to be cleared
  canvas.width = canvas.offsetWidth * ratio;
  canvas.height = canvas.offsetHeight * ratio;
  canvas.getContext("2d").scale(ratio, ratio);

  // This library does not listen for canvas changes, so after the canvas is automatically
  // cleared by the browser, SignaturePad#isEmpty might still return false, even though the
  // canvas looks empty, because the internal data of this library wasn't cleared. To make sure
  // that the state of this library is consistent with visual state of the canvas, you
  // have to clear it manually.
  signaturePad.clear();
}

// On mobile devices it might make more sense to listen to orientation change,
// rather than window resize events.
window.onresize = resizeCanvas;
resizeCanvas();

clearButton.addEventListener("click", function (event) {
  signaturePad.clear();
});

saveSVGButton.addEventListener("click", function (event) {
  if (signaturePad.isEmpty()) {
    alert("서명하신 후 저장해주세요.");
  } else {
    var dataURL = signaturePad.toDataURL('image/svg+xml');
    $("#contract").html(dataURL);
  }
});
</script>

<!-- } 회원 비밀번호 확인 끝 -->