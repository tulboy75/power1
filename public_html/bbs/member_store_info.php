<?php
include_once('./_common.php');
include_once(G5_LIB_PATH.'/thumbnail.lib.php');

if ($is_guest)
    alert('로그인 한 회원만 접근하실 수 있습니다.', G5_BBS_URL.'/login.php');


$g5['title'] = '가맹점 정보 설정';


// 사진업로드

$mb_dir = G5_DATA_PATH.'/member/'.substr($member['mb_id'],0,2);
$mb_url = G5_DATA_URL.'/member/'.substr($member['mb_id'],0,2);
$image_regex = "/(\.(gif|jpe?g|png))$/i";
foreach($_FILES['store_pic']['name'] as $key => $val){
    $mb_icon_img = mktime() . rand(0, 100000) . $_FILES['store_pic']['name'][$key];
    if (isset($_FILES['store_pic']['name'][$key]) && is_uploaded_file($_FILES['store_pic']['tmp_name'][$key])) {
        if (preg_match($image_regex, $_FILES['store_pic']['name'][$key])) {
            if ($_FILES['store_pic']['size'][$key] <= "124000000") {
                @mkdir($mb_dir, G5_DIR_PERMISSION);
                @chmod($mb_dir, G5_DIR_PERMISSION);
                $dest_path = $mb_dir.'/'.$mb_icon_img;
                move_uploaded_file($_FILES['store_pic']['tmp_name'][$key], $dest_path);
                chmod($dest_path, G5_FILE_PERMISSION);
                $size = @getimagesize($dest_path);
                if($size[0] > 640){

                     $thumb = null;
                    if($size[2] === 2 || $size[2] === 3) {
                        //jpg 또는 png 파일 적용
                        $thumb = thumbnail($mb_icon_img, $mb_dir, $mb_dir, 640, 640, true, true);
                        if($thumb) {
                            @unlink($dest_path);
                            rename($mb_dir.'/'.$thumb, $dest_path);
                        }
                    }
                    if(!$thumb ){
                        // 아이콘의 폭 또는 높이가 설정값 보다 크다면 이미 업로드 된 아이콘 삭제
                        @unlink($dest_path);
                    }
                }
            }   
        }else{
            alert("이미지파일만 업로드 가능합니다.");
        }

    }
    $store_pic[$key] = $mb_url.'/'.$mb_icon_img;
}

// 회원정보 업로드
if($m_info_update == "1"){
    $mb_4 = escape_trim($_POST['mb_4_1']) . "//" . escape_trim($_POST['mb_4_2']);
    $mb_5 = escape_trim($_POST['mb_5']);
    $sql = "update " . $g5['member_table'] . " set mb_4 = '" . $mb_4 . "' , mb_5 = '" . $mb_5 . "' ";
    if($store_pic){
        $mb_6 = implode("--//--", $store_pic);
        $sql .= " , mb_6='" . $mb_6 . "'";
    }
    $sql .= " where mb_id = '" . $member['mb_id'] . "'";
    $result = sql_query($sql);
}

$member = get_member($_SESSION['ss_mb_id']);
$mb_4 = explode("//", $member['mb_4']);
$mb_5 = $member[mb_5];
$mb_6 = explode("--//--", $member['mb_6']);


include_once('./_head.sub.php');

include_once($member_skin_path.'/member_store_info.skin.php');

include_once('./_tail.sub.php');
?>
