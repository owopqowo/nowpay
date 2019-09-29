<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$member_skin_url.'/style.css">', 0);
?>

<!-- 회원가입약관 동의 시작 { -->
<div class="inner">
	<h2 class="tit">회원가입</h2>
	<p class="desc">회원가입약관 및 개인정보처리방침안내의 내용에<br>동의하셔야 회원가입 하실 수 있습니다.</p>
    <?php
    // 소셜로그인 사용시 소셜로그인 버튼
    @include_once(get_social_skin_path().'/social_register.skin.php');
    ?>

    <form  name="fregister" id="fregister" action="<?php echo $register_action_url ?>" onsubmit="return fregister_submit(this);" method="POST" autocomplete="off">

    <section id="fregister_term" class="box_r">
        <h3 class="tit_b">회원가입약관</h3>
        <fieldset class="fregister_agree">
            <input type="checkbox" name="agree" value="1" id="agree11">
            <label for="agree11"><span class="sound_only">회원가입약관의 내용에 동의합니다.</span></label>
        </fieldset>
        <div class="box"><?php echo get_text($config['cf_stipulation']) ?></div>
    </section>

    <section id="fregister_private" class="box_r">
        <h3 class="tit_b">개인정보처리방침안내</h3>
        <fieldset class="fregister_agree">
            <input type="checkbox" name="agree2" value="1" id="agree21">
            <label for="agree21"><span class="sound_only">개인정보처리방침안내의 내용에 동의합니다.</span></label>
        </fieldset>
        <div class="box"><?php echo get_text($config['cf_privacy']) ?></div>
    </section>

    <section id="fregister_chkall" class="box_r">
        <input type="checkbox" name="chk_all"  value="1"  id="chk_all">
        <label for="chk_all" class="tit_b">회원가입 약관에 모두 동의합니다</label>
    </section>

    <div class="btn_wrap">
        <a href="<?php echo G5_URL ?>" class="btn large gray">취소</a>
        <input type="submit" class="btn large navy" value="회원가입">
    </div>

    </form>

    <script>
    function fregister_submit(f)
    {
        if (!f.agree.checked) {
            alert("회원가입약관의 내용에 동의하셔야 회원가입 하실 수 있습니다.");
            f.agree.focus();
            return false;
        }

        if (!f.agree2.checked) {
            alert("개인정보처리방침안내의 내용에 동의하셔야 회원가입 하실 수 있습니다.");
            f.agree2.focus();
            return false;
        }

        return true;
    }
    
    jQuery(function($){
        // 모두선택
        $("input[name=chk_all]").click(function() {
            if ($(this).prop('checked')) {
                $("input[name^=agree]").prop('checked', true);
            } else {
                $("input[name^=agree]").prop("checked", false);
            }
        });
    });

    </script>
</div>
<!-- } 회원가입 약관 동의 끝 -->
