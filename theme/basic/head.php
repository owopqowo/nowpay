<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

if (G5_IS_MOBILE) {
    include_once(G5_THEME_MOBILE_PATH.'/head.php');
    return;
}

include_once(G5_THEME_PATH.'/head.sub.php');
include_once(G5_LIB_PATH.'/latest.lib.php');
include_once(G5_LIB_PATH.'/outlogin.lib.php');
include_once(G5_LIB_PATH.'/poll.lib.php');
include_once(G5_LIB_PATH.'/visit.lib.php');
include_once(G5_LIB_PATH.'/connect.lib.php');
include_once(G5_LIB_PATH.'/popular.lib.php');
?>

<!-- 상단 시작 { -->
<?php if (defined("_INDEX_")) { ?>
<header  id="hd" class="clear">
<?php }else{ ?>
<header id="hd">
<?php } ?>
    <h1 id="hd_h1"><?php echo $g5['title'] ?></h1>

    <div id="skip_to_container"><a href="#container">본문 바로가기</a></div>

    <?php
    if(defined('_INDEX_')) { // index에서만 실행
        include G5_BBS_PATH.'/newwin.inc.php'; // 팝업레이어
    }
    ?>
	<div id="hd_wrapper">
		<div id="logo">
			<a href="<?php echo G5_URL ?>"><img src="<?php echo G5_IMG_URL ?>/logo.png" alt="<?php echo $config['cf_title']; ?>"></a>
		</div>
		<nav class="gnb">
			<ul>
				<?php if ($is_member) {  ?>
				<?php if ($is_admin) {  ?>
				<li class="tnb_admin"><a href="<?php echo G5_ADMIN_URL ?>">관리자</a></li>
				<?php }  ?>
				<li><a href="<?php echo G5_BBS_URL ?>/logout.php">로그아웃</a></li>
				<li class="member"><a href="<?php echo G5_BBS_URL ?>/member_confirm.php?url=<?php echo G5_BBS_URL ?>/register_form.php">회원정보수정</a></li>
				<li><a href="<?php echo G5_URL ?>/mypage.php">마이페이지</a></li>
				<?php } else {  ?>
				<li><a href="<?php echo G5_BBS_URL ?>/login.php">로그인</a></li>
				<li><a href="<?php echo G5_BBS_URL ?>/register.php">회원가입</a></li>
				<?php }  ?>
				<li class="customer"><a href="<?php echo G5_BBS_URL ?>/board.php?bo_table=notice">고객센터</a></li>
				<li class="service"><a href="<?php echo G5_URL ?>/service.php">서비스신청</a></li>
			</ul>
		</nav>
	</div>
</header>
<!-- } 상단 끝 -->


<hr>

<!-- 콘텐츠 시작 { -->
<div id="wrapper">
    <div id="container_wr">
   
    <div id="container">
		<?php if (defined("_INDEX_")) { ?>
		<div class="main">
		<?php }else{ ?>
		<div class="sub">
		<?php } ?>

