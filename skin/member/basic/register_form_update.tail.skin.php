<?php
// 2019-09-26 회원데이터 동기화
if (function_exists('member_synchronization')) {
	member_synchronization(($w == '' ? 'create':'update'), $mb_id);
}