<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

if (G5_IS_MOBILE) {
    include_once(G5_THEME_MOBILE_PATH.'/tail.php');
    return;
}
?>

        </div>
    </div>
</div>

</div>
<!-- } 콘텐츠 끝 -->

<hr>
<!-- 하단 고객센터 시작 { -->

<section class="ft_service">
	<div class="inner">
		<h2>customer center</h2>
		<p><strong>1522-9709</strong>운영시간 : 평일 10시 ~ 17시</p>
		<a href="/service.php" class="btn navy">서비스 신청하기</a>
	</div>
</section>

<!-- } 하단 고객센터 끝 -->
<hr>

<!-- 하단 시작 { -->
<footer id="ft">
	<div id="ft_wr">
		<div id="ft_catch"><img src="<?php echo G5_IMG_URL; ?>/logo.png" alt="<?php echo G5_VERSION ?>"></div>
		<div id="ft_link">
			<a href="<?php echo G5_BBS_URL; ?>/content.php?co_id=provision">이용약관</a>
			<a href="<?php echo G5_BBS_URL; ?>/content.php?co_id=privacy">개인정보처리방침</a>
		</div>
		<div id="ft_copy">
			<ul class="f_info">
				<li>
					<span>사업자등록번호: 837-66-00276</span>
					<span>대표자: 최선화</span>
					<span>회사명: 1472하우스</span>
					<span>주소: 서울 구로구 가마산로 279, 202호</span>
				</li>
				<li>
					<span>고객센터: 1522-9709</span>
					<span>통신판매신고: 제2018-서울구로-1285호</span>
				</li>
			</ul>
			<small>Copyright 2019 nowpay. All Rights Reserved</small>
		</div>
	</div>
</footer>


<nav class="q_menu">
	<a href="#"><span class="sound_only">퀵메뉴 열기</span></a>
	<ul>
		<li class="service"><a href="<?php echo G5_URL ?>/service.php"><span>서비스신청</span></a></li>
		<li class="cs"><a href="<?php echo G5_BBS_URL ?>/board.php?bo_table=notice"><span>고객센터</span></a></li>
	</ul>
</nav>

<?php
if(G5_DEVICE_BUTTON_DISPLAY && !G5_IS_MOBILE) { ?>
<?php
}

if ($config['cf_analytics']) {
    echo $config['cf_analytics'];
}
?>

<!-- } 하단 끝 -->

<script>
$(function() {
    // 폰트 리사이즈 쿠키있으면 실행
    font_resize("container", get_cookie("ck_font_resize_rmv_class"), get_cookie("ck_font_resize_add_class"));
});
</script>

<?php
include_once(G5_THEME_PATH."/tail.sub.php");
?>