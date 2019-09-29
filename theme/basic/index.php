<?php
define('_INDEX_', true);
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

if (G5_IS_MOBILE) {
    include_once(G5_THEME_MOBILE_PATH.'/index.php');
    return;
}

include_once(G5_THEME_PATH.'/head.php');
?>


<section class="visual">
	<div class="inner">
		<div class="box_img">
			<img src="/nowpay/img/phone.png" alt="nowpay">
		</div>
		<div class="box_txt">
			<h2 class="tit">월세.보증금<br><strong>각종 납부금 카드결제</strong></h2>
			<p class="desc">월세, 임대 보증금, 관리비 등 실생활에 유용한 카드결제대행서비스</p>
			<a href="service.php" class="btn navy">서비스신청하기</a>
		</div>
	</div>
</section>

<section class="nowpay">
	<div class="inner">
		<h2 class="tit">결제가 필요한 지금, 나우페이</h2>
		<p class="desc">‘건물주, 집주인 동의 없이’, ‘연체 및 현금 부담 없이’<br>적재적소에 다양하게 활용할 수 있는 스마트결제 시스템 나우페이</p>
		<div class="slider">
			<div>
				<div class="box">
					<h3><em class="purple">deposit</em>월세, 월세보증금</h3>
					<p>사무실, 집 월세가 걱정이신가요?<br>건물주 동의가 필요 없는 간편한 서비스입니다. </p>
				</div>
			</div>
			<div>
				<div class="box">
					<h3><em class="purple">deposit</em>월세보증금</h3>
					<p>월세 계약을 하고 싶은데 보증금이 부족하신가요? 이제 카드로 집주인 동의 없이 보증금을 결제 하실 수 있습니다.</p>
				</div>
			</div>
			<div>
				<div class="box">
					<h3><em class="purple">point</em>포인트 적립</h3>
					<p>월세 보증금 또는 월세를 신용카드로 결제 후 신용카드사에서 제공되는 포인트적립과 무이자할부 혜택을 누려보세요 </p>
				</div>
			</div>
			<div>
				<div class="box">
					<h3><em class="purple">444</em>월세, 월세보증금</h3>
					<p>사무실, 집 월세가 걱정이신가요?<br>건물주 동의가 필요 없는 간편한 서비스입니다. </p>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="service">
	<div class="inner">
		<h2 class="tit">똑똑한 자금 관리서비스 </h2>
		<p class="desc">#무이자 할부   #신용카드 포인트 적립   #24시간 이내 입금</p>
		<div class="box">
			<ul class="list_service">
				<li>
					<h3 class="purple">SPEED</h3>
					<ul class="list_dash">
						<li>PC, 스마트폰, 테블릿 등 언제 어디서든 간단하고빠르게 서비스 이용</li>
						<li>결제 후 최대 24시간 이내 즉시 처리</li>
					</ul>
				</li>
				<li>
					<h3 class="purple">SMART</h3>
					<ul class="list_dash">
						<li>신용카드만있다면 누구나 이용가능</li>
						<li>월세보증금, 임대료, 관리비 등을 연체 및 현금부담 없이 결제 정산</li>
					</ul>
				</li>
				<li>
					<h3 class="purple">SAFE</h3>
					<ul class="list_dash">
						<li>신용카드 임대료 결제 정식 승인서비스</li>
						<li>계좌번호 유효성 체크 및 보안서비스 제공 (준비중)</li>
					</ul>
				</li>
				<li>
					<h3 class="purple">SIMPLE</h3>
					<ul class="list_dash">
						<li>간단한 회원 가입 후 바로 서비스 이용 가능</li>
						<li>24시간 365일 건물주 동의 없이 내가 원할 때 사용 가능</li>
					</ul>
				</li>
			</ul>
			<img src="/nowpay/img/phone.png" alt="" class="phone">
		</div>
	</div>
</section>

<section class="news">
	<div class="inner">
		<h2 class="tit">뉴스&공지사항</h2>
		<p class="desc">‘건물주, 집주인 동의 없이’, ‘연체 및 현금</p>
		<?php echo latest('theme/basic', 'notice', 3, 24);?>
		<div class="btn_wrap"><a href="<?php echo G5_BBS_URL ?>/board.php?bo_table=notice" class="btn border">READ MORE</a></div>
	</div>
</section>


<?php
include_once(G5_THEME_PATH.'/tail.php');
?>
