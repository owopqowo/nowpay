<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$member_skin_url.'/style.css">', 0);
?>

<!-- 회원정보 찾기 시작 { -->
<div class="inner">
    <h2 class="tit">회원정보 찾기</h2>
<div id="find_info" class="new_win">
    <div class="box_r">
        <form name="fpasswordlost" action="<?php echo $action_url ?>" onsubmit="return fpasswordlost_submit(this);" method="post" autocomplete="off">
        <fieldset id="info_fs">
            <label for="mb_email">이메일 주소<strong class="sound_only">필수</strong></label>
            <input type="email" name="mb_email" id="mb_email" required size="30">
            <p>
                회원가입 시 등록하신 이메일 주소를 입력해 주세요.<br>
                해당 이메일로 아이디와 비밀번호 정보를 보내드립니다.
            </p>
        </fieldset>
        <div class="btn_wrap">
            <input type="submit" value="확인" class="btn navy">
        </div>
    </div>
    </form>
</div>
</div>
<script>
function fpasswordlost_submit(f)
{
    <?php echo chk_captcha_js();  ?>

    return true;
}

$(function() {
    var sw = screen.width;
    var sh = screen.height;
    var cw = document.body.clientWidth;
    var ch = document.body.clientHeight;
    var top  = sh / 2 - ch / 2 - 100;
    var left = sw / 2 - cw / 2;
    moveTo(left, top);
});
</script>
<!-- } 회원정보 찾기 끝 -->
