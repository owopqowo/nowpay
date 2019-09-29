<?php
include_once('./_common.php');

if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

include_once(G5_PATH.'/head.php');
?>

<div class="inner">
	<h2 class="tit">마이페이지</h2>
	<ul class="tab_menu">
		<li><a href="<?php echo G5_BBS_URL ?>/member_confirm.php?url=<?php echo G5_BBS_URL ?>/register_form.php">회원정보수정</a></li>
		<li class="on"><a href="<?php echo G5_URL ?>/mypage.php">결제내역</a></li>
	</ul>

	<ul class="paysearch">
		<li>
			<a href="#" class="top">
				<span><strong>2019-09-30</strong></span>
				<span class="purple">익익일입금</span>
				<span>입금대기중</span>
			</a>
			<div class="bottom">
				<dl>
					<dt>카드정보</dt>
					<dd>
						<span>신한 1234-1234-4123-1234</span>
						<span>유효기간 : 09/30</span>
						<span>할부 : 3개월</span>
					</dd>
					<dt>임대인정보</dt>
					<dd>
						<span>신한은행 2345456857898</span>
						<span>예금주 : 홍길동</span>
						<span>입금표시내용 : 월세</span>
					</dd>
					<dt>신청금액</dt>
					<dd>
						<strong class="big">54,500원</strong>
						<span>50,000원 + 이용료 : 4,500원 <strong>(익익일입금9%)</strong></span>
					</dd>
				</dl>
			</div>
		</li>
	</ul>
</div>

<?php
include_once(G5_PATH.'/tail.php');
?>
