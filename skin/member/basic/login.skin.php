<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$member_skin_url.'/style.css">', 0);
?>

<!-- 로그인 시작 { -->
<div class="inner">
<div id="mb_login" class="login">
    <h2 class="tit"><?php echo $g5['title'] ?></h2>
    <p class="desc">아이디와 비밀번호를 입력해 주세요.</p>


    <form name="flogin" action="<?php echo $login_action_url ?>" onsubmit="return flogin_submit(this);" method="post">
    <input type="hidden" name="url" value="<?php echo $login_url ?>">
    <div class="box_r">
    <fieldset id="login_fs">
        <legend>회원로그인</legend>
        <label for="login_id">아이디<strong class="sound_only"> 필수</strong></label>
        <input type="text" name="mb_id" id="login_id" required size="20" maxLength="20">
        <label for="login_pw">비밀번호<strong class="sound_only"> 필수</strong></label>
        <input type="password" name="mb_password" id="login_pw" required size="20" maxLength="20" >
        <div class="save">
            <input type="checkbox" id="checkbox">
            <label for="checkbox">아이디 저장</label>
        </div>
        <input type="submit" value="로그인" class="btn navy">
    </fieldset>
    </div>
    <?php
    // 소셜로그인 사용시 소셜로그인 버튼
    @include_once(get_social_skin_path().'/social_login.skin.php');
    ?>

    <aside id="login_info">
        <ul>
            <li>
                <a href="./register.php">
                    <h2><span class="purple">JOIN</span>회원가입</h2>
                    <p>회원가입을 통해 편리한 결제서비스를 이용해보세요.</p>
                </a>
            </li>
            <li>
                <a href="<?php echo G5_BBS_URL ?>/password_lost.php">
                    <h2><span class="purple">FIND</span>ID&PW 찾기</h2>
                    <p>아이디 또는 비밀번호를 잃어버리셨나요?</p>
                </a>
            </li>
        </ul>
    </aside>

    </form>


</div>

<script>
$(function(){
    $("#login_auto_login").click(function(){
        if (this.checked) {
            this.checked = confirm("자동로그인을 사용하시면 다음부터 회원아이디와 비밀번호를 입력하실 필요가 없습니다.\n\n공공장소에서는 개인정보가 유출될 수 있으니 사용을 자제하여 주십시오.\n\n자동로그인을 사용하시겠습니까?");
        }
    });
});

function flogin_submit(f)
{
    return true;
}
</script>
</div>
<!-- } 로그인 끝 -->
