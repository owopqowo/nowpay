<?php
include_once('./_common.php');

if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

include_once(G5_PATH.'/head.php');
?>

<div class="inner">
	<h2 class="tit">서비스신청</h2>
	<p class="desc">회원가입약관 및 개인정보처리방침안내</p>

	<div class="box_r">
		<h3 class="tit_b">결제 정보</h3>
		<ul class="list_credit">
			<li>
				<input type="radio" name="name" id="radio1" checked>
				<label for="radio1">
					<strong>당일입금<em class="purple">수수료 12%</em></strong>
					평일 13시 ~ 17시에<br>일괄 입금 처리됩니다.
				</label>
			</li>
			<li>
				<input type="radio" name="name" id="radio2">
				<label for="radio2">
					<strong>익일입금<em class="purple">수수료 10%</em></strong>
					익일 평일 13시 ~ 17시에<br>일괄 입금 처리됩니다.
				</label>
			</li>
			<li>
				<input type="radio" name="name" id="radio3">
				<label for="radio3">
					<strong>익익일입금<em class="purple">수수료 9%</em></strong>
					익익일 평일 13시 ~ 17시에<br>일괄 입금 처리됩니다.
				</label>
			</li>
		</ul>
		<p class="guide_credit">* 주말 및 법정공휴일은 제외한 평일에만 입금 처리되므로 유의 하시기바랍니다. </p>
		<table class="table1 table_credit table_input">
			<tbody>
				<tr class="amount">
					<th scope="row"><label for="text1">이용금액</label><em class="purple">*<span  class="sound_only">필수</span></em></th>
					<td>
						<input type="text" id="text1">
						<span>이용료 포함 <em class="purple">1,100,000</em>원이 결제 됩니다.</span>
					</td>
				</tr>
				<tr class="info">
					<th scope="row">카드정보<em class="purple">*<span  class="sound_only">필수</span></em></th>
					<td>
						<ul>
							<li>
								<label for="select1">카드사</label>
								<select name="" id="select1">
									<option value="">선택</option>
								</select>
							</li>
							<li>
								<label for="text2">카드번호</label>
								<input type="text" id="text2">
								<span>-</span>
								<input type="text">
								<span>-</span>
								<input type="text">
								<span>-</span>
								<input type="text">
							</li>
							<li>
								<label for="text3">유효기간</label>
								<input type="text" id="text3" placeholder="MM">
								<span>-</span>
								<input type="text" placeholder="YY">
							</li>
							<li>
								<label for="select2">할부기간</label>
								<select name="" id="select2">
									<option value="">선택</option>
								</select>
							</li>
						</ul>
					</td>
				</tr>
			</tbody>
		</table>
		<h3 class="tit_b">결제인 정보</h3>
		<table class="table1 table_credit table_input">
			<tbody>
				<tr>
					<th scope="row"><label for="text4">이름</label><em class="purple">*<span  class="sound_only">필수</span></em></th>
					<td>
						<input type="text" id="text4" placeholder="이름">
					</td>
				</tr>
				<tr>
					<th scope="row"><label for="text5">연락처</label><em class="purple">*<span  class="sound_only">필수</span></em></th>
					<td>
						<input type="tel" id="text5" placeholder="연락처">
					</td>
				</tr>
				<tr>
					<th scope="row"><label for="text6">이름</label><em class="purple">*<span  class="sound_only">필수</span></em></th>
					<td>
						<input type="email" id="text6" placeholder="이메일">
					</td>
				</tr>
			</tbody>
		</table>
		<h3 class="tit_b">임대인 정보</h3>
		<table class="table1 table_credit table_input">
			<tbody>
				<tr>
					<th scope="row"><label for="text7">예금주</label><em class="purple">*<span  class="sound_only">필수</span></em></th>
					<td>
						<input type="text" id="text7" placeholder="예금주">
					</td>
				</tr>
				<tr class="account">
					<th scope="row"><label for="select3">계좌번호</label><em class="purple">*<span  class="sound_only">필수</span></em></th>
					<td>
						<select name="" id="select3">
							<option value="">선택</option>
						</select>
						<input type="tel" placeholder="‘-’없이 입력">
						<button class="btn navy small">유효계좌확인</button>
						<p>카드사별 점검시간에는 서비스이용이 불가합니다.</p>
					</td>
				</tr>
				<tr class="message">
					<th scope="row"><label for="text8">입금표시내용</label><em class="purple">*<span  class="sound_only">필수</span></em></th>
					<td>
						<input type="email" id="text7">
						<span>예) 104호 월세</span>
					</td>
				</tr>
			</tbody>
		</table>

		<p class="final_guid">
			<strong><em>당일입금 12%</em> 이용료 포함 <em class="purple">1,100,000</em> 원이 최종 결제 됩니다.</strong>
			임대인에게 입금 이후에는 취소/환불이 불가합니다.
		</p>

		<div class="btn_wrap">
			<button class="btn navy large">결제요청</button>
		</div>
	</div>
</div>

<?php
include_once(G5_PATH.'/tail.php');
?>
