<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$member_skin_url.'/style.css">', 0);
?>

<!-- 회원정보 입력/수정 시작 { -->
<div class="inner">
<script src="<?php echo G5_JS_URL ?>/jquery.register_form.js"></script>
<?php if($config['cf_cert_use'] && ($config['cf_cert_ipin'] || $config['cf_cert_hp'])) { ?>
<script src="<?php echo G5_JS_URL ?>/certify.js?v=<?php echo G5_JS_VER; ?>"></script>
<?php } ?>

<form id="fregisterform" name="fregisterform" action="<?php echo $register_action_url ?>" onsubmit="return fregisterform_submit(this);" method="post" enctype="multipart/form-data" autocomplete="off">
<input type="hidden" name="w" value="<?php echo $w ?>">
<input type="hidden" name="url" value="<?php echo $urlencode ?>">
<input type="hidden" name="agree" value="<?php echo $agree ?>">
<input type="hidden" name="agree2" value="<?php echo $agree2 ?>">
<input type="hidden" name="cert_type" value="<?php echo $member['mb_certify']; ?>">
<input type="hidden" name="cert_no" value="">
<?php if (isset($member['mb_sex'])) {  ?><input type="hidden" name="mb_sex" value="<?php echo $member['mb_sex'] ?>"><?php }  ?>
<?php if (isset($member['mb_nick_date']) && $member['mb_nick_date'] > date("Y-m-d", G5_SERVER_TIME - ($config['cf_nick_modify'] * 86400))) { // 닉네임수정일이 지나지 않았다면  ?>
<input type="hidden" name="mb_nick_default" value="<?php echo get_text($member['mb_nick']) ?>">
<input type="hidden" name="mb_nick" value="<?php echo get_text($member['mb_nick']) ?>">
<?php }  ?>
 <div id="register_form"  class="form">
	<?php if ($w == "") {  ?>
	<h2 class="tit">회원가입</h2>
	<p class="desc"> 회원가입약관 및 개인정보처리방침안내의 내용에<br>동의하셔야 회원가입 하실 수 있습니다.</p>
	<?php }else{  ?>
	<h2 class="tit">마이페이지</h2>
	<ul class="tab_menu">
		<li class="on"><a href="<?php echo G5_BBS_URL ?>/member_confirm.php?url=<?php echo G5_BBS_URL ?>/register_form.php">회원정보수정</a></li>
		<li><a href="<?php echo G5_URL ?>/mypage.php">결제내역</a></li>
	</ul>
	<?php }  ?>
 	<div class="box_r">
		<h3 class="tit_b">가입정보입력</h3>
		<table class="table1 table_join table_input">
			<tbody>
				<tr class="id">
					<th scope="row"><label for="reg_mb_id">아이디<em class="purple">*<span class="sound_only">필수</span></em></label></th>
					<td>
						<input type="text" name="mb_id" value="<?php echo $member['mb_id'] ?>" id="reg_mb_id" <?php echo $required ?> <?php echo $readonly ?> minlength="3" maxlength="20" placeholder="user id">
						<button class="btn small navy">중복확인</button>
						<span id="msg_mb_id"></span>
					</td>
				</tr>
				<tr class="pw">
					<th scope="row"><label for="reg_mb_password" >비밀번호<em class="purple">*<span class="sound_only">필수</span></em></label></th>
					<td>
						<input type="password" name="mb_password" id="reg_mb_password" <?php echo $required ?> minlength="3" maxlength="20" placeholder="비밀번호">
						<span>영문 숫자 포함 6~12자리입니다.</span>
					</td>
				</tr>
				<tr>
					<th scope="row"><label for="reg_mb_password_re">비밀번호 확인<em class="purple">*<span class="sound_only">필수</span></em></label></th>
					<td>
						<input type="password" name="mb_password_re" id="reg_mb_password_re" <?php echo $required ?> minlength="3" maxlength="20" placeholder="비밀번호 확인">
					</td>
				</tr>
				<tr>
					<th scope="row"><label for="reg_mb_name">이름<em class="purple">*<span class="sound_only">필수</span></em></label></th>
					<td>
						<input type="text" id="reg_mb_name" name="mb_name" value="<?php echo get_text($member['mb_name']) ?>" <?php echo $required ?> <?php echo $readonly; ?> size="10" placeholder="이름">
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
						<span class="frm_info">아이핀 본인확인 후에는 이름이 자동 입력되고 휴대폰 본인확인 후에는 이름과 휴대폰번호가 자동 입력되어 수동으로 입력할수 없게 됩니다.</span>
						<?php } ?>
					</td>
				</tr>
				<tr class="birth">
					<th scope="row"><strong>생년월일<em class="purple">*<span class="sound_only">필수</span></em></strong></th>
					<td>
						<select name="" id="select1">
							<option value="">선택</option>
						</select>
						<label for="select1">년</label>
						<select name="" id="select2">
							<option value="">선택</option>
						</select>
						<label for="select2">월</label>
						<select name="" id="select3">
							<option value="">선택</option>
						</select>
						<label for="select3">일</label>
					</td>
				</tr>
				<?php if ($config['cf_use_hp'] || $config['cf_cert_hp']) {  ?>
				<tr>
					<th><label for="reg_mb_hp" >연락처<em class="purple">*<span class="sound_only">필수</span></em></label></th>
					<td>
						<input type="text" name="mb_hp" value="<?php echo get_text($member['mb_hp']) ?>" id="reg_mb_hp" <?php echo ($config['cf_req_hp'])?"required":""; ?> maxlength="20" placeholder="‘-’없이 입력">
						<?php if ($config['cf_cert_use'] && $config['cf_cert_hp']) { ?>
						<input type="hidden" name="old_mb_hp" value="<?php echo get_text($member['mb_hp']) ?>">
						<?php } ?>
						<input type="checkbox" name="mb_sms" value="1" id="reg_mb_sms" <?php echo ($w=='' || $member['mb_sms'])?'checked':''; ?>>
						<label for="reg_mb_sms" class="frm_label">SMS수신</label>
					</td>
				</tr>
				<?php }  ?>
				<tr>
					<th><label for="reg_mb_email">이메일<em class="purple">*<span class="sound_only">필수</span></em></label></th>
					<td>
						<?php if ($config['cf_use_email_certify']) {  ?>
						<span class="frm_info">
							<?php if ($w=='') { echo "E-mail 로 발송된 내용을 확인한 후 인증하셔야 회원가입이 완료됩니다."; }  ?>
							<?php if ($w=='u') { echo "E-mail 주소를 변경하시면 다시 인증하셔야 합니다."; }  ?>
						</span>
						<?php }  ?>
						<input type="hidden" name="old_email" value="<?php echo $member['mb_email'] ?>">
						<input type="email" name="mb_email" value="<?php echo isset($member['mb_email'])?$member['mb_email']:''; ?>" id="reg_mb_email" required size="70" maxlength="100">
						<input type="checkbox" name="mb_mailling" value="1" id="reg_mb_mailling" <?php echo ($w=='' || $member['mb_mailling'])?'checked':''; ?>>
						<label for="reg_mb_mailling" class="frm_label">메일수신 허용</label>
					</td>
				</tr>
			</tbody>
		</table>
    <div class="tbl_frm01 tbl_wrap">
        <ul>
            <?php if ($config['cf_use_homepage']) {  ?>
            <li>
                <label for="reg_mb_homepage" class="sound_only">홈페이지<?php if ($config['cf_req_homepage']){ ?><strong>필수</strong><?php } ?></label>
                <input type="text" name="mb_homepage" value="<?php echo get_text($member['mb_homepage']) ?>" id="reg_mb_homepage" <?php echo $config['cf_req_homepage']?"required":""; ?> class="frm_input full_input <?php echo $config['cf_req_homepage']?"required":""; ?>" size="70" maxlength="255" placeholder="홈페이지">
            </li>
            <?php }  ?>
            <?php if ($config['cf_use_tel']) {  ?>
            <li>
                <label for="reg_mb_tel" class="sound_only">전화번호<?php if ($config['cf_req_tel']) { ?><strong>필수</strong><?php } ?></label>
                <input type="text" name="mb_tel" value="<?php echo get_text($member['mb_tel']) ?>" id="reg_mb_tel" <?php echo $config['cf_req_tel']?"required":""; ?> class="frm_input half_input <?php echo $config['cf_req_tel']?"required":""; ?>" maxlength="20" placeholder="전화번호">
            </li>
            <?php }  ?>
            <?php if ($config['cf_use_addr']) { ?>
            <li>
                <?php if ($config['cf_req_addr']) { ?><strong class="sound_only">필수</strong><?php }  ?>
                <label for="reg_mb_zip" class="sound_only">우편번호<?php echo $config['cf_req_addr']?'<strong class="sound_only"> 필수</strong>':''; ?></label>
                <input type="text" name="mb_zip" value="<?php echo $member['mb_zip1'].$member['mb_zip2']; ?>" id="reg_mb_zip" <?php echo $config['cf_req_addr']?"required":""; ?> class="frm_input <?php echo $config['cf_req_addr']?"required":""; ?>" size="5" maxlength="6"  placeholder="우편번호">
                <button type="button" class="btn_frmline" onclick="win_zip('fregisterform', 'mb_zip', 'mb_addr1', 'mb_addr2', 'mb_addr3', 'mb_addr_jibeon');">주소 검색</button><br>
                <input type="text" name="mb_addr1" value="<?php echo get_text($member['mb_addr1']) ?>" id="reg_mb_addr1" <?php echo $config['cf_req_addr']?"required":""; ?> class="frm_input frm_address full_input <?php echo $config['cf_req_addr']?"required":""; ?>" size="50"  placeholder="기본주소">
                <label for="reg_mb_addr1" class="sound_only">기본주소<?php echo $config['cf_req_addr']?'<strong> 필수</strong>':''; ?></label><br>
                <input type="text" name="mb_addr2" value="<?php echo get_text($member['mb_addr2']) ?>" id="reg_mb_addr2" class="frm_input frm_address full_input" size="50"  placeholder="상세주소">
                <label for="reg_mb_addr2" class="sound_only">상세주소</label>
                <br>
                <input type="text" name="mb_addr3" value="<?php echo get_text($member['mb_addr3']) ?>" id="reg_mb_addr3" class="frm_input frm_address full_input" size="50" readonly="readonly"  placeholder="참고항목">
                <label for="reg_mb_addr3" class="sound_only">참고항목</label>
                <input type="hidden" name="mb_addr_jibeon" value="<?php echo get_text($member['mb_addr_jibeon']); ?>">
            </li>
            <?php }  ?>
        </ul>
    </div>

	<div class="btn_wrap">
		<a href="<?php echo G5_URL ?>" class="btn large gray"><?php echo $w==''?'이전으로':'취소'; ?></a>
		<input type="submit" value="<?php echo $w==''?'회원가입':'정보수정'; ?>" id="btn_submit" class="btn large navy" accesskey="s">
	</div>

	</div>

</div>

</form>

    <script>
    $(function() {
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
        // 회원아이디 검사
        if (f.w.value == "") {
            var msg = reg_mb_id_check();
            if (msg) {
                alert(msg);
                f.mb_id.select();
                return false;
            }
        }

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
        if ((f.w.value == "") || (f.w.value == "u" && f.mb_email.defaultValue != f.mb_email.value)) {
            var msg = reg_mb_email_check();
            if (msg) {
                alert(msg);
                f.reg_mb_email.select();
                return false;
            }
        }

        <?php if (($config['cf_use_hp'] || $config['cf_cert_hp']) && $config['cf_req_hp']) {  ?>
        // 휴대폰번호 체크
        var msg = reg_mb_hp_check();
        if (msg) {
            alert(msg);
            f.reg_mb_hp.select();
            return false;
        }
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
    </script>
</div>
<!-- } 회원정보 입력/수정 끝 -->
