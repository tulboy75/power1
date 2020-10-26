var reg_mb_id_check = function() {
    var result = "";
    $.ajax({
        type: "POST",
        url: g5_bbs_url+"/ajax.mb_id.php",
        data: {
            "reg_mb_id": encodeURIComponent($("#reg_mb_id").val())
        },
        cache: false,
        async: false,
        success: function(data) {
            result = data;
        }
    });
    return result;
}


// 추천인 검사
var reg_mb_recommend_check = function() {
    var result = "";
    $.ajax({
        type: "POST",
        url: g5_bbs_url+"/ajax.mb_recommend.php",
        data: {
            "reg_mb_recommend": encodeURIComponent($("#reg_mb_recommend").val())
        },
        cache: false,
        async: false,
        success: function(data) {
            result = data;
        }
    });
    return result;
}


var reg_mb_nick_check = function() {
    var result = "";
    $.ajax({
        type: "POST",
        url: g5_bbs_url+"/ajax.mb_nick.php",
        data: {
            "reg_mb_nick": ($("#reg_mb_nick").val()),
            "reg_mb_id": encodeURIComponent($("#reg_mb_id").val())
        },
        cache: false,
        async: false,
        success: function(data) {
            result = data;
        }
    });
    return result;
}


var reg_mb_email_check = function() {
    var result = "";
    $.ajax({
        type: "POST",
        url: g5_bbs_url+"/ajax.mb_email.php",
        data: {
            "reg_mb_email": $("#reg_mb_email").val(),
            "reg_mb_id": encodeURIComponent($("#reg_mb_id").val())
        },
        cache: false,
        async: false,
        success: function(data) {
            result = data;
        }
    });
    return result;
}


var reg_mb_hp_check = function() {
    var result = "";
    var mb_level = "";
    if($("#rt").val() == "store")
        mb_level = "3";
    else 
        mb_level = "2";

    $.ajax({
        type: "POST",
        url: g5_bbs_url+"/ajax.mb_hp.php",
        data: {
            "reg_mb_hp": $("#reg_mb_hp").val(),
            "reg_mb_id": encodeURIComponent($("#reg_mb_id").val()),
            "reg_mb_level"   : mb_level
        },
        cache: false,
        async: false,
        success: function(data) {
            result = data;
        }
    });
    return result;
}

// 인증코드 발송
var reg_mb_hp_code_send = function() {
    var result = "";
    var mb_level = "";
    if($("#rt").val() == "store")
        mb_level = "3";
    else 
        mb_level = "2";
    $.ajax({
        type: "POST",
        url: g5_bbs_url+"/ajax.mb_hp_code.php",
        data: {
            "reg_mb_hp": $("#reg_mb_hp").val(),
            "reg_mb_id": encodeURIComponent($("#reg_mb_id").val()),
            "reg_mb_level" : mb_level,
            "reg_mb_token" : $("#reg_mb_token").val()
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
            "reg_mb_hp_code" : $("#reg_mb_hp_code").val(),
        },
        cache: false,
        async: false,
        success: function(data) {
            result = data;
        }
    });
    return result;
}