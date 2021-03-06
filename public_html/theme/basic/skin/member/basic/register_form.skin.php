<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가
// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨

add_stylesheet('<link rel="stylesheet" href="'.$member_skin_url.'/style.css">', 0);
$rt = $_REQUEST['rt'];

if($is_member){
    if($member['mb_level'] == "3")
        $rt = "store";
}
$reco = get_session("reco");

?>

<!-- 회원정보 입력/수정 시작 { -->

<div class="register">
<div class = "mb_title"> 
    <div class = "history_back"><i class="fa fa-chevron-left"></i></div>
    <?php if($w =="u"){?>
    <span class = "mb_title_cont">회원정보 수정</span>
    <?php }else{ ?>
    <span class = "mb_title_cont">회원가입</span>        
    <?php  } ?>
</div>

<script src="<?php echo G5_JS_URL ?>/jquery.register_form.js"></script>
<?php if($config['cf_cert_use'] && ($config['cf_cert_ipin'] || $config['cf_cert_hp'])) { ?>
<script src="<?php echo G5_JS_URL ?>/certify.js?v=<?php echo G5_JS_VER; ?>"></script>
<?php } ?>

	<form id="fregisterform" name="fregisterform" action="<?php echo $register_action_url ?>" onsubmit="return fregisterform_submit(this);" method="post" enctype="multipart/form-data" autocomplete="off">
	<input type="hidden" name="w" value="<?php echo $w ?>">
    <input type="hidden" name="url" value="<?php echo $urlencode ?>">
    <input type = "hidden" name = "mb_hp_code_confirm" value = "">
	<input type="hidden" name="agree" value="<?php echo $agree ?>">
	<input type="hidden" name="agree2" value="<?php echo $agree2 ?>">
	<input type="hidden" name="token" id = "reg_mb_token" value="<?php echo $token ?>">    
	<input type="hidden" name="cert_type" value="<?php echo $member['mb_certify']; ?>">
    <input type="hidden" name="cert_no" value="">
    <input type="hidden" name="mb_10" value="<?php echo $member['mb_10']?>">
    <input type="hidden" name="rt" id = "rt" value="<?php echo $rt?>">    
    
	<?php if (isset($member['mb_sex'])) {  ?><input type="hidden" name="mb_sex" value="<?php echo $member['mb_sex'] ?>"><?php }  ?>
	<?php if (isset($member['mb_nick_date']) && $member['mb_nick_date'] > date("Y-m-d", G5_SERVER_TIME - ($config['cf_nick_modify'] * 86400))) { // 닉네임수정일이 지나지 않았다면  ?>
	<input type="hidden" name="mb_nick_default" value="<?php echo get_text($member['mb_nick']) ?>">
	<input type="hidden" name="mb_nick" value="<?php echo get_text($member['mb_nick']) ?>">
	<?php }  ?>

	<div id="register_form" class="form_01">   
	    <div class="register_form_inner">
            <?php if($w != "u"){?>            
            <ul class = "register_menu">
                <li class = "register_sub_menu <?php if($rt == ""){?> over <?php } ?>"><a href = "?rt=">일반회원</a></li>
                <li class = "register_sub_menu <?php if($rt == "store"){?> over <?php } ?>"><a href="?rt=store">가맹점회원</a></li>
            </ul>            
            <!-- <h2>사이트 이용정보 입력</h2> -->
            <?php } ?>
	        <ul>

            <?php if ($req_nick) {  ?>
	            <li>
	                <label for="reg_mb_nick">
	                	닉네임<strong class="sound_only">필수</strong>
	                	<button type="button" class="tooltip_icon"><i class="fa fa-question-circle-o" aria-hidden="true"></i><span class="sound_only">설명보기</span></button>
						<span class="tooltip">공백없이 한글,영문,숫자만 입력 가능 (한글2자, 영문4자 이상)<br> 닉네임을 바꾸시면 앞으로 <?php echo (int)$config['cf_nick_modify'] ?>일 이내에는 변경 할 수 없습니다.</span>
	                </label>
	                
                    <input type="hidden" name="mb_nick_default" value="<?php echo isset($member['mb_nick'])?get_text($member['mb_nick']):''; ?>">
                    <input type="text" name="mb_nick" value="<?php echo isset($member['mb_nick'])?get_text($member['mb_nick']):''; ?>" id="reg_mb_nick" required class="frm_input frm_input_75 required nospace full_input" size="10" maxlength="20" placeholder="닉네임"> <input type = "button" name = "mb_nick_chk"  value = "중복확인" class = "frm_input_20 frm_btn_confirm">
                    <span id="msg_mb_nick" class = "error_msg"></span>	                
	            </li>
            <?php }  ?>
            <li>
	            <?php if ($config['cf_use_hp'] || $config['cf_cert_hp']) {  ?>
	                <label for="reg_mb_hp">휴대폰번호<?php if ($config['cf_req_hp']) { ?><strong class="sound_only">필수</strong><?php } ?></label>
	            <?php if($w != "u"){ ?>
	                <input type = "text" value = "+82" class = "frm_input frm_input_5" style = "width : 17%; " readonly> &nbsp;<input type="text" name="mb_hp" value="<?php echo get_text($member['mb_hp']) ?>" id="reg_mb_hp" <?php echo ($config['cf_req_hp'])?"required":""; ?> class="frm_input frm_input_60  <?php echo ($config['cf_req_hp'])?"required":""; ?>" style = "width : 50%" maxlength="20" placeholder="휴대폰번호">
	                <?php if ($config['cf_cert_use'] && $config['cf_cert_hp']) { ?>
	                <input type="hidden" name="old_mb_hp" value="<?php echo get_text($member['mb_hp']) ?>">
                    <?php } ?>
                    <input type = "button" id = "mb_hp_code_req" value = "인증번호요청" class = "frm_input_20 frm_btn_confirm" style = "font-size : 1.2em">
<?php // 인증번호 코드 입력부분 ?>
                    <input type="text" name="mb_hp_code" value="" id="reg_mb_hp_code"  class="frm_input frm_input_75 required" style = "margin-top: 10px;" maxlength="6" placeholder="인증번호를 입력해 주세요." readonly >  
                    <input type = "button" value = "확인" id = "mb_hp_code_con" class = "frm_input_20 frm_btn_confirm" style = "font-size : 1.2em; margin-top : 10px;">
                    <span id="msg_mb_hp" class = "error_msg"></span>
<?php // 인증번호 코드 입력부분 끝?>                                                      
                <?php }else{  ?>
                     <input type="text" name="mb_hp" value="<?php echo get_text($member['mb_hp']) ?>" id="reg_mb_hp" <?php echo ($config['cf_req_hp'])?"required":""; ?> class="frm_input full_input <?php echo ($config['cf_req_hp'])?"required":""; ?>" maxlength="20" placeholder="휴대폰번호"  <?php echo $readonly; ?> >
                <?php }} ?>
            </li>            
            
	            <li style = "display : none;">
	                <label for="reg_mb_id">
	                	아이디<strong class="sound_only">필수</strong>
	                	<button type="button" class="tooltip_icon"><i class="fa fa-question-circle-o" aria-hidden="true"></i><span class="sound_only">설명보기</span></button>
						<span class="tooltip">영문자, 숫자, _ 만 입력 가능. 최소 3자이상 입력하세요.</span>
	                </label>
	                <input type="text" name="mb_id" value="<?php echo $member['mb_id'] ?>" id="reg_mb_id" <?php echo $readonly ?> class="frm_input full_input  <?php echo $readonly ?>" minlength="3" maxlength="20" placeholder="아이디">
	                <span id="msg_mb_id"></span>
                </li>
                
	            <li>
	                <label for="reg_mb_password">비밀번호<strong class="sound_only">필수</strong></label>
	                <input type="password" name="mb_password" id="reg_mb_password" <?php echo $required ?> class="frm_input full_input <?php echo $required ?>" minlength="3" maxlength="20" placeholder="비밀번호">
				</li>
	            <li>
	                <label for="reg_mb_password_re">비밀번호 확인<strong class="sound_only">필수</strong></label>
	                <input type="password" name="mb_password_re" id="reg_mb_password_re" <?php echo $required ?> class="frm_input full_input <?php echo $required ?>" minlength="3" maxlength="20" placeholder="비밀번호 확인">
                </li>

                <li>
      
                    <?php if($rt == "store"){?>
                    <label for="reg_mb_name">사장님 이름<strong class="sound_only">필수</strong></label>
                    <?php } else { ?>
                    <label for="reg_mb_name">이름<strong class="sound_only">필수</strong></label>
                    <?php } ?>
                    <input type="text" id="reg_mb_name" name="mb_name" value="<?php echo get_text($member['mb_name']) ?>" <?php echo $required ?> <?php echo $readonly; ?> class="frm_input full_input required <?php echo $readonly ?>" size="10" placeholder="이름">
	                <?php
	                if($config['cf_cert_use']) {
	                    if($config['cf_cert_ipin'])
	                        echo '<button type="button" id="win_ipin_cert" class="btn_frmline">아이핀 본인확인</button>'.PHP_EOL;
	                    if($config['cf_cert_hp'])
	                        echo '<button type="button" id="win_hp_cert" class="btn_frmline">휴대폰 본인확인</button>'.PHP_EOL;
	
	                    echo '<noscript>본인확인을 위해서는 자바스크립트 사용이 가능해야합니다.</noscript>'.PHP_EOL;
	                }
	                ?>
	                <?php
	                if ($config['cf_cert_use'] && $member['mb_certify']) {
	                    if($member['mb_certify'] == 'ipin')
	                        $mb_cert = '아이핀';
	                    else
	                        $mb_cert = '휴대폰';
	                ?>
	  
	                <div id="msg_certify">
	                    <strong><?php echo $mb_cert; ?> 본인확인</strong><?php if ($member['mb_adult']) { ?> 및 <strong>성인인증</strong><?php } ?> 완료
	                </div>
	                <?php } ?>
	                <?php if ($config['cf_cert_use']) { ?>
	                <button type="button" class="tooltip_icon"><i class="fa fa-question-circle-o" aria-hidden="true"></i><span class="sound_only">설명보기</span></button>
	                <span class="tooltip">아이핀 본인확인 후에는 이름이 자동 입력되고 휴대폰 본인확인 후에는 이름과 휴대폰번호가 자동 입력되어 수동으로 입력할수 없게 됩니다.</span>
	                <?php } ?>
                </li>    

                <?php //가게이름 - 가맹점 가입만 이용 ?>
                <?php if($rt == "store"){?>
	            <li>
	                <label for="reg_mb_1">가게이름</label>
	                <input type="text" name="mb_1" value="<?php echo get_text($member['mb_1']) ?>" id="reg_mb_1" class="frm_input full_input " maxlength="20" placeholder="가게이름을 입력해주세요." value = "<?php echo $member['mb_1'] ?>">
                </li>
                <?php } ?>


                <?php //가게주소 - 가맹점 가입만 이용 ?>
                <?php if($rt == "store"){?>                
	            <?php if ($config['cf_use_addr']) { ?>
	            <li>
	            	<label>가게주소</label>
					<?php if ($config['cf_req_addr']) { ?><strong class="sound_only">필수</strong><?php }  ?>
	                <label for="reg_mb_zip" class="sound_only">우편번호<?php echo $config['cf_req_addr']?'<strong class="sound_only"> 필수</strong>':''; ?></label>
	                <input type="text" name="mb_zip" value="<?php echo $member['mb_zip1'].$member['mb_zip2']; ?>" id="reg_mb_zip" <?php echo $config['cf_req_addr']?"required":""; ?> class="frm_input frm_input_75 <?php echo $config['cf_req_addr']?"required":""; ?>" size="5" maxlength="6"  placeholder="우편번호">
	                <button type="button" class="frm_input_20 frm_btn_confirm" onclick="win_zip('fregisterform', 'mb_zip', 'mb_addr1', 'mb_addr2', 'mb_addr3', 'mb_addr_jibeon');">주소 검색</button><br>
	                <input type="text" name="mb_addr1" value="<?php echo get_text($member['mb_addr1']) ?>" id="reg_mb_addr1" <?php echo $config['cf_req_addr']?"required":""; ?> class="frm_input frm_address full_input <?php echo $config['cf_req_addr']?"required":""; ?>" size="50"  placeholder="기본주소">
	                <label for="reg_mb_addr1" class="sound_only">기본주소<?php echo $config['cf_req_addr']?'<strong> 필수</strong>':''; ?></label><br>
	                <input type="text" name="mb_addr2" value="<?php echo get_text($member['mb_addr2']) ?>" id="reg_mb_addr2" class="frm_input frm_address full_input" size="50" placeholder="상세주소">
	                <label for="reg_mb_addr2" class="sound_only">상세주소</label>
	                <br>
	                <input type="text" name="mb_addr3" value="<?php echo get_text($member['mb_addr3']) ?>" id="reg_mb_addr3" class="frm_input frm_address full_input" size="50" readonly="readonly" placeholder="참고항목" style = "display : none;">
	                <label for="reg_mb_addr3" class="sound_only" style = "display : none;">참고항목</label>
	                <input type="hidden" name="mb_addr_jibeon" value="<?php echo get_text($member['mb_addr_jibeon']); ?>" >
	            </li>
                <?php }  ?>      
                <?php }  ?>      


                <?php //전화번호 // ?>
                <?php if($rt == "store"){?>                   
	            <?php if ($config['cf_use_tel']) {  ?>                
	            <li>
	                <label for="reg_mb_tel">가게전화번호<?php if ($config['cf_req_tel']) { ?><strong class="sound_only">필수</strong><?php } ?></label>
	                <input type="text" name="mb_tel" value="<?php echo get_text($member['mb_tel']) ?>" id="reg_mb_tel" <?php echo $config['cf_req_tel']?"required":""; ?> class="frm_input full_input <?php echo $config['cf_req_tel']?"required":""; ?>" maxlength="20" placeholder="전화번호">
                </li>
                <?php }  ?> 
                <?php }  ?> 

                <?php //가게이름 - 가맹점 가입만 이용 ?>
                <?php if($rt == "store"){?>   	            
	            <li>
	                <label for="reg_mb_2">사업자번호</label>
                    <input type="text" name="mb_2" value="<?php echo get_text($member['mb_2']) ?>" id="reg_mb_2" class="frm_input frm_input_75 " maxlength="20" placeholder="사업자 번호를 입력해주세요." value = "<?php echo $member[mb_2]?>">
                    <input type = "button" id = "mb_2_chk" value = "사업자번호확인" class = "frm_input_20 frm_btn_confirm" style = "font-size : 1.2em">
                    <span id="msg_mb_2"  class = "error_msg"></span>                    
                </li>   
                <?php }  ?>

                <?php //업종 - 가맹점 가입만 이용 ?>
                <?php if($rt == "store"){?>   	                    
	            <li>
	                <label for="reg_mb_3">업종</label>
                    <input type="text" name="mb_3" value="<?php echo get_text($member['mb_3']) ?>" id="reg_mb_3" class="frm_input full_input " maxlength="20" placeholder="업종을 입력해주세요." value = "<?php echo $member[mb_3]?>">
                </li>             
                <?php } ?>

	            <?php if ($w == "" && $config['cf_use_recommend']) {  ?>
	            <li>
                    <?php if($rt == "store"){?>  
                    <label for="reg_mb_ext1">영업사원코드<strong class="sound_only">필수</strong></label>
                    <?php }else{ ?>
                    <label for="reg_mb_ext1">추천인<strong class="sound_only">필수</strong></label>
                    <?php } ?>

	                <input type="text" name="mb_recommend" id="reg_mb_recommend" class="frm_input full_input" placeholder="추천인 코드를 입력해 주세요.">
	            </li>
	            <?php }  ?>
                <?php if($w != "u"){ ?>
                <li>
                    <br/><br/>
	            </li>

                <li class = "reg_mb_agree_all">
                        <input type = "checkbox" name = "chk_all" id = 'chk_all'>
                        <label for = "chk_all"> 뷰티퀸 위치정보 이용약관, 개인정보 수집및 이용에 모두 동의합니다.</label>
                </li>

                <li class = "reg_mb_agree_1">
                        <input type = "checkbox" name = "agree_chk" id = 'agree_chk'>
                        <label for = "agree_chk" style = "font-weight : normal;"> 위치기반 서비스 이용약관에 동의</label>
                        <textarea>
                            <?php echo get_text($config['cf_stipulation']) ?>
                        </textarea>                        
                </li>                
                
                <li class = "reg_mb_agree_2">
                        <input type = "checkbox" name = "agree_chk2" id = 'agree_chk2'>
                        <label for = "agree_chk2" style = "font-weight : normal;"> 개인정보 수집 및 이용에 동의</label>
                        <textarea>
                            <?php echo get_text($config['cf_privacy']) ?>
                        </textarea>
                </li>         
                <?php  } ?>
	            <li class="is_captcha_use">
                    <label>자동등록방지</label>
	                <?php echo captcha_html(); ?>
                </li>
                
	            <li class = 'btn_confirm'>
                    <button type="submit" id="btn_submit" class="btn_submit" accesskey="s"><?php echo $w==''?'가입하기':'정보수정'; ?></button>
                </li>    
                                
            </ul>
            

	    </div>
<!--	
	    <div class="tbl_frm01 tbl_wrap register_form_inner">
	        <h2>개인정보 입력</h2>
	        <ul>
	            <li>
	                <label for="reg_mb_email">E-mail<strong class="sound_only">필수</strong>
	                
	                <?php if ($config['cf_use_email_certify']) {  ?>
	                <button type="button" class="tooltip_icon"><i class="fa fa-question-circle-o" aria-hidden="true"></i><span class="sound_only">설명보기</span></button>
					<span class="tooltip">
	                    <?php if ($w=='') { echo "E-mail 로 발송된 내용을 확인한 후 인증하셔야 회원가입이 완료됩니다."; }  ?>
	                    <?php if ($w=='u') { echo "E-mail 주소를 변경하시면 다시 인증하셔야 합니다."; }  ?>
	                </span>
	                <?php } ?>
					</label>
	                <input type="hidden" name="old_email" value="<?php echo $member['mb_email'] ?>">
	                <input type="text" name="mb_email" value="<?php echo isset($member['mb_email'])?$member['mb_email']:''; ?>" id="reg_mb_email" required class="frm_input email full_input required" size="70" maxlength="100" placeholder="E-mail">
	            
	            </li>
	
	            <?php if ($config['cf_use_homepage']) {  ?>
	            <li>
	                <label for="reg_mb_homepage">홈페이지<?php if ($config['cf_req_homepage']){ ?><strong class="sound_only">필수</strong><?php } ?></label>
	                <input type="text" name="mb_homepage" value="<?php echo get_text($member['mb_homepage']) ?>" id="reg_mb_homepage" <?php echo $config['cf_req_homepage']?"required":""; ?> class="frm_input full_input <?php echo $config['cf_req_homepage']?"required":""; ?>" size="70" maxlength="255" placeholder="홈페이지">
	            </li>
	            <?php }  ?>
	

	

	        </ul>
	    </div>
-->	
<!-- 
	    <div class="tbl_frm01 tbl_wrap register_form_inner">
	        <h2>기타 개인설정</h2>
	        <ul>
	            <?php if ($config['cf_use_signature']) {  ?>
	            <li>
	                <label for="reg_mb_signature">서명<?php if ($config['cf_req_signature']){ ?><strong class="sound_only">필수</strong><?php } ?></label>
	                <textarea name="mb_signature" id="reg_mb_signature" <?php echo $config['cf_req_signature']?"required":""; ?> class="<?php echo $config['cf_req_signature']?"required":""; ?>"   placeholder="서명"><?php echo $member['mb_signature'] ?></textarea>
	            </li>
	            <?php }  ?>
	
	            <?php if ($config['cf_use_profile']) {  ?>
	            <li>
	                <label for="reg_mb_profile">자기소개</label>
	                <textarea name="mb_profile" id="reg_mb_profile" <?php echo $config['cf_req_profile']?"required":""; ?> class="<?php echo $config['cf_req_profile']?"required":""; ?>" placeholder="자기소개"><?php echo $member['mb_profile'] ?></textarea>
	            </li>
	            <?php }  ?>
	
	            <?php if ($config['cf_use_member_icon'] && $member['mb_level'] >= $config['cf_icon_level']) {  ?>
	            <li>
	                <label for="reg_mb_icon" class="frm_label">
	                	회원아이콘
	                	<button type="button" class="tooltip_icon"><i class="fa fa-question-circle-o" aria-hidden="true"></i><span class="sound_only">설명보기</span></button>
	                	<span class="tooltip">이미지 크기는 가로 <?php echo $config['cf_member_icon_width'] ?>픽셀, 세로 <?php echo $config['cf_member_icon_height'] ?>픽셀 이하로 해주세요.<br>
gif, jpg, png파일만 가능하며 용량 <?php echo number_format($config['cf_member_icon_size']) ?>바이트 이하만 등록됩니다.</span>
	                </label>
	                <input type="file" name="mb_icon" id="reg_mb_icon">
	
	                <?php if ($w == 'u' && file_exists($mb_icon_path)) {  ?>
	                <img src="<?php echo $mb_icon_url ?>" alt="회원아이콘">
	                <input type="checkbox" name="del_mb_icon" value="1" id="del_mb_icon">
	                <label for="del_mb_icon">삭제</label>
	                <?php }  ?>
	            
	            </li>
	            <?php }  ?>
	
	            <?php if ($member['mb_level'] >= $config['cf_icon_level'] && $config['cf_member_img_size'] && $config['cf_member_img_width'] && $config['cf_member_img_height']) {  ?>
	            <li class="reg_mb_img_file">
	                <label for="reg_mb_img" class="frm_label">
	                	회원이미지
	                	<button type="button" class="tooltip_icon"><i class="fa fa-question-circle-o" aria-hidden="true"></i><span class="sound_only">설명보기</span></button>
	                	<span class="tooltip">이미지 크기는 가로 <?php echo $config['cf_member_img_width'] ?>픽셀, 세로 <?php echo $config['cf_member_img_height'] ?>픽셀 이하로 해주세요.<br>
	                    gif, jpg, png파일만 가능하며 용량 <?php echo number_format($config['cf_member_img_size']) ?>바이트 이하만 등록됩니다.</span>
	                </label>
	                <input type="file" name="mb_img" id="reg_mb_img">
	
	                <?php if ($w == 'u' && file_exists($mb_img_path)) {  ?>
	                <img src="<?php echo $mb_img_url ?>" alt="회원이미지">
	                <input type="checkbox" name="del_mb_img" value="1" id="del_mb_img">
	                <label for="del_mb_img">삭제</label>
	                <?php }  ?>
	            
	            </li>
	            <?php } ?>

	            <li class="chk_box">
		        	<input type="checkbox" name="mb_mailling" value="1" id="reg_mb_mailling" <?php echo ($w=='' || $member['mb_mailling'])?'checked':''; ?> class="selec_chk">
		            <label for="reg_mb_mailling">
		            	<span></span>
		            	<b class="sound_only">메일링서비스</b>
		            </label>
		            <span class="chk_li">정보 메일을 받겠습니다.</span>
		        </li>
	
				<?php if ($config['cf_use_hp']) { ?>
		        <li class="chk_box">
		            <input type="checkbox" name="mb_sms" value="1" id="reg_mb_sms" <?php echo ($w=='' || $member['mb_sms'])?'checked':''; ?> class="selec_chk">
		        	<label for="reg_mb_sms">
		            	<span></span>
		            	<b class="sound_only">SMS 수신여부</b>
		            </label>        
		            <span class="chk_li">휴대폰 문자메세지를 받겠습니다.</span>
		        </li>
		        <?php } ?>
	
		        <?php if (isset($member['mb_open_date']) && $member['mb_open_date'] <= date("Y-m-d", G5_SERVER_TIME - ($config['cf_open_modify'] * 86400)) || empty($member['mb_open_date'])) { // 정보공개 수정일이 지났다면 수정가능 ?>
		        <li class="chk_box">
		            <input type="checkbox" name="mb_open" value="1" id="reg_mb_open" <?php echo ($w=='' || $member['mb_open'])?'checked':''; ?> class="selec_chk">
		      		<label for="reg_mb_open">
		      			<span></span>
		      			<b class="sound_only">정보공개</b>
		      		</label>      
		            <span class="chk_li">다른분들이 나의 정보를 볼 수 있도록 합니다.</span>
		            <button type="button" class="tooltip_icon"><i class="fa fa-question-circle-o" aria-hidden="true"></i><span class="sound_only">설명보기</span></button>
		            <span class="tooltip">
		                정보공개를 바꾸시면 앞으로 <?php echo (int)$config['cf_open_modify'] ?>일 이내에는 변경이 안됩니다.
		            </span>
		            <input type="hidden" name="mb_open_default" value="<?php echo $member['mb_open'] ?>"> 
		        </li>		        
		        <?php } else { ?>
	            <li>
	                정보공개
	                <input type="hidden" name="mb_open" value="<?php echo $member['mb_open'] ?>">
	                <button type="button" class="tooltip_icon"><i class="fa fa-question-circle-o" aria-hidden="true"></i><span class="sound_only">설명보기</span></button>
	                <span class="tooltip">
	                    정보공개는 수정후 <?php echo (int)$config['cf_open_modify'] ?>일 이내, <?php echo date("Y년 m월 j일", isset($member['mb_open_date']) ? strtotime("{$member['mb_open_date']} 00:00:00")+$config['cf_open_modify']*86400:G5_SERVER_TIME+$config['cf_open_modify']*86400); ?> 까지는 변경이 안됩니다.<br>
	                    이렇게 하는 이유는 잦은 정보공개 수정으로 인하여 쪽지를 보낸 후 받지 않는 경우를 막기 위해서 입니다.
	                </span>
	                
	            </li>
	            <?php }  ?>
	
	            <?php
	            //회원정보 수정인 경우 소셜 계정 출력
	            if( $w == 'u' && function_exists('social_member_provider_manage') ){
	                social_member_provider_manage();
	            }
	            ?>
	            


	        </ul>
        </div>
        
	</div>
	<div class="btn_confirm">
	    <a href="<?php echo G5_URL ?>" class="btn_close">취소</a>

    </div>
-->
	</form>
</div>
<script>
$(function() {
    var reco = "<?php echo $reco ?>";
    if(reco != ""){
        $("#reg_mb_recommend").val(reco).prop("readonly", true);
    }

    $("#reg_zip_find").css("display", "inline-block");

    <?php if($config['cf_cert_use'] && $config['cf_cert_ipin']) { ?>
    // 아이핀인증
    $("#win_ipin_cert").click(function() {
        if(!cert_confirm())
            return false;

        var url = "<?php echo G5_OKNAME_URL; ?>/ipin1.php";
        certify_win_open('kcb-ipin', url);
        return;
    });

    <?php } ?>
    <?php if($config['cf_cert_use'] && $config['cf_cert_hp']) { ?>
    // 휴대폰인증
    $("#win_hp_cert").click(function() {
        if(!cert_confirm())
            return false;

        <?php
        switch($config['cf_cert_hp']) {
            case 'kcb':
                $cert_url = G5_OKNAME_URL.'/hpcert1.php';
                $cert_type = 'kcb-hp';
                break;
            case 'kcp':
                $cert_url = G5_KCPCERT_URL.'/kcpcert_form.php';
                $cert_type = 'kcp-hp';
                break;
            case 'lg':
                $cert_url = G5_LGXPAY_URL.'/AuthOnlyReq.php';
                $cert_type = 'lg-hp';
                break;
            default:
                echo 'alert("기본환경설정에서 휴대폰 본인확인 설정을 해주십시오");';
                echo 'return false;';
                break;
        }
        ?>

        certify_win_open("<?php echo $cert_type; ?>", "<?php echo $cert_url; ?>");
        return;
    });
    <?php } ?>
});

// submit 최종 폼체크
function fregisterform_submit(f)
{
    var rt = "<?php echo $rt ?>";
    <?php if($w != "u"){ ?>
    // 동의 여부 검사
    if (!f.agree_chk.checked) {
        alert("위치기반 서비스 이용약관에 동의하셔야 회원가입 하실 수 있습니다.");
        f.agree.focus();
        return false;
    }

    if (!f.agree_chk2.checked) {
        alert("개인정보 수집 및 이용에 동의하셔야 회원가입 하실 수 있습니다.");
        f.agree2.focus();
        return false;
    }
    <?php } ?>
    <?php if($w != "u"){ ?>
    // 아이디에 전화번호 넣기 
    if(f.mb_hp.value !== ""){
        if(rt == "store")
            f.mb_id.value = "3" + f.mb_hp.value.replace(/-/g, "");
        else
            f.mb_id.value = "2" + f.mb_hp.value.replace(/-/g, "");
    }
    <?php } ?>

    // 회원아이디 검사
    // if (f.w.value == "") {
    //     var msg = reg_mb_id_check();
    //     if (msg) {
    //         alert(msg);
    //         f.mb_id.select();
    //         return false;
    //     }
    // }



    if (f.w.value == "") {
        if (f.mb_password.value.length < 3) {
            alert("비밀번호를 3글자 이상 입력하십시오.");
            f.mb_password.focus();
            return false;
        }
    }

    if (f.mb_password.value != f.mb_password_re.value) {
        alert("비밀번호가 같지 않습니다.");
        f.mb_password_re.focus();
        return false;
    }

    if (f.mb_password.value.length > 0) {
        if (f.mb_password_re.value.length < 3) {
            alert("비밀번호를 3글자 이상 입력하십시오.");
            f.mb_password_re.focus();
            return false;
        }
    }

    // 이름 검사
    if (f.w.value=="") {
        if (f.mb_name.value.length < 1) {
            alert("이름을 입력하십시오.");
            f.mb_name.focus();
            return false;
        }

        /*
        var pattern = /([^가-힣\x20])/i;
        if (pattern.test(f.mb_name.value)) {
            alert("이름은 한글로 입력하십시오.");
            f.mb_name.select();
            return false;
        }
        */
    }

    <?php if($w == '' && $config['cf_cert_use'] && $config['cf_cert_req']) { ?>
    // 본인확인 체크
    if(f.cert_no.value=="") {
        alert("회원가입을 위해서는 본인확인을 해주셔야 합니다.");
        return false;
    }
    <?php } ?>

    // 닉네임 검사
    if ((f.w.value == "") || (f.w.value == "u" && f.mb_nick.defaultValue != f.mb_nick.value)) {
        var msg = reg_mb_nick_check();
        if (msg) {
            alert(msg);
            f.reg_mb_nick.select();
            return false;
        }
    }

    // E-mail 검사
    // if ((f.w.value == "") || (f.w.value == "u" && f.mb_email.defaultValue != f.mb_email.value)) {
    //     var msg = reg_mb_email_check();
    //     if (msg) {
    //         alert(msg);
    //         f.reg_mb_email.select();
    //         return false;
    //     }
    // }

    <?php if (($config['cf_use_hp'] || $config['cf_cert_hp']) && $config['cf_req_hp']) {  ?>
    // 휴대폰번호 체크
    <?php if($w != "u"){ ?>
    var msg = reg_mb_hp_check();
    if (msg) {
        alert(msg);
        f.reg_mb_hp.select();
        return false;
    }
    <?php  } ?>
    <?php } ?>

    if (typeof f.mb_icon != "undefined") {
        if (f.mb_icon.value) {
            if (!f.mb_icon.value.toLowerCase().match(/.(gif|jpe?g|png)$/i)) {
                alert("회원아이콘이 이미지 파일이 아닙니다.");
                f.mb_icon.focus();
                return false;
            }
        }
    }

    if (typeof f.mb_img != "undefined") {
        if (f.mb_img.value) {
            if (!f.mb_img.value.toLowerCase().match(/.(gif|jpe?g|png)$/i)) {
                alert("회원이미지가 이미지 파일이 아닙니다.");
                f.mb_img.focus();
                return false;
            }
        }
    }

    if (typeof(f.mb_recommend) != "undefined" && f.mb_recommend.value) {
        if (f.mb_id.value == f.mb_recommend.value) {
            alert("본인을 추천할 수 없습니다.");
            f.mb_recommend.focus();
            return false;
        }

        var msg = reg_mb_recommend_check();
        if (msg) {
            alert(msg);
            f.mb_recommend.select();
            return false;
        }
    }

    <?php echo chk_captcha_js();  ?>

    document.getElementById("btn_submit").disabled = "disabled";

    return true;
}

jQuery(function($){

    // $("input[name=mb_name").val("제이");
    // $("input[name=mb_nick").val("제이");
    // $("input[name=mb_hp").val("01012345678");
    // $("input[name=mb_hp_code").val("12345678");
    // $("input[name=mb_password").val("12345678");
    // $("input[name=mb_password_re").val("12345678");


	//tooltip
    $(document).on("click", ".tooltip_icon", function(e){
        $(this).next(".tooltip").fadeIn(400).css("display","inline-block");
    }).on("mouseout", ".tooltip_icon", function(e){
        $(this).next(".tooltip").fadeOut();
    });

    // 모두선택
    $("input[name=chk_all]").click(function() {
        if ($(this).prop('checked')) {
            $("input[name^=agree]").prop('checked', true);
        } else {
            $("input[name^=agree]").prop("checked", false);
        }
    });
    
    $("input[name=mb_nick_chk]").click(function(){

        var mb_nick_form = $("#fregisterform input[name=mb_nick]");
        $("#msg_mb_nick").text("");
    // 닉네임 검사
        if (mb_nick_form.val() == "" ) {
            $("#msg_mb_nick").text("닉네임을 입력해 주세요.");
        }

        var msg = reg_mb_nick_check();

        if(msg){
            $("#msg_mb_nick").text(msg);
        }else{
            alert('사용가능한 닉네임 입니다. ')
            return ;

        }
        mb_nick_form.select();
    });

    // 인증번호 입력시도시 에러 메세지
    $("#reg_mb_hp_code").click(function(){
        if($("#reg_mb_hp_code").prop("readonly")){
            $("#msg_mb_hp").text("인증번호를 요청해 주세요.");
            return;
        }
    });
    // 인증번호 요청
    $("#mb_hp_code_req").click(function(){
        $("#msg_mb_hp").text('');
        $("#reg_mb_hp_code").attr('disabled', false);
        $("#reg_mb_hp_code").select();     
        var msg = reg_mb_hp_code_send();
        if(msg){
            $("#msg_mb_hp").text(msg);
            $(this).select();
            $("#reg_mb_hp_code").prop('readonly', true);            
            return;
        }
        alert('인증코드가 발송되었습니다.');
        $("#reg_mb_hp").prop('readonly', true);
        $("#reg_mb_hp_code").prop('readonly', false);
    });

    //인증번호 확인
    $("#mb_hp_code_con").click(function(){
        
        if($("#reg_mb_hp_code").prop("readonly")){
            $("#msg_mb_hp").text("인증번호를 요청해 주세요.");
            return;
        }        

        var reg_mb_hp_code = $("#reg_mb_hp_code").val();        
        if(reg_mb_hp_code == ""){
            $("#msg_mb_hp").text("인증번호를 입력해 주세요.");
        }
        var code_test = /^[0-9_]{6}$/;
        if(!code_test.test(reg_mb_hp_code)){
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
                $("#reg_mb_hp_code").attr('disabled', true);
                $("input[name=mb_hp_code_confirm").val("1");
            }
        }

    });

    $("#mb_2_chk").click(function(){
        var bsn = $("#reg_mb_2").val();
        $("#msg_mb_2").text("");      
        
        var valueMap = bsn.replace(/-/gi, '').split('').map(function(item) {
            return parseInt(item, 10);
        });

        if (valueMap.length === 10) {
            var multiply = new Array(1, 3, 7, 1, 3, 7, 1, 3, 5);
            var checkSum = 0;

            for (var i = 0; i < multiply.length; ++i) {
                checkSum += multiply[i] * valueMap[i];
            }

            checkSum += parseInt((multiply[8] * valueMap[8]) / 10, 10);
            if(Math.floor(valueMap[9]) === (10 - (checkSum % 10))){
                alert("정상적인 사업자 번호 입니다.")
                $("#reg_mb_2").prop('readonly', true);
            }else{
                $("#msg_mb_2").text('정상적인 사업자 번호를 입력해 주세요.1');
            }
            return;
        }
        $("#msg_mb_2").text('정상적인 사업자 번호를 입력해 주세요.2');
        return;
    });


    
});
</script>

<!-- } 회원정보 입력/수정 끝 -->