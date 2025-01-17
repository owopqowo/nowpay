<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$qa_skin_url.'/style.css">', 0);
?>

<section id="bo_w">
	<div class="inner">
	<h2 class="tit">고객센터</h2>
	<ul class="tab_menu">
		<li><a href="<?php echo G5_BBS_URL ?>/board.php?bo_table=notice">공지사항</a></li>
		<li><a href="<?php echo G5_BBS_URL ?>/faq.php">자주하는 질문</a></li>
		<li class="on"><a href="<?php echo G5_BBS_URL ?>/qawrite.php">고객문의</a></li>
	</ul>

	<div class="box_r">
	<h3 class="tit_b">고객문의</h3>
    <!-- 게시물 작성/수정 시작 { -->
    <form name="fwrite" id="fwrite" action="<?php echo $action_url ?>" onsubmit="return fwrite_submit(this);" method="post" enctype="multipart/form-data" autocomplete="off">
    <input type="hidden" name="w" value="<?php echo $w ?>">
    <input type="hidden" name="qa_id" value="<?php echo $qa_id ?>">
    <input type="hidden" name="sca" value="<?php echo $sca ?>">
    <input type="hidden" name="stx" value="<?php echo $stx ?>">
    <input type="hidden" name="page" value="<?php echo $page ?>">
	<input type="hidden" name="qa_category" value="질문" />
    <?php
    $option = '';
    $option_hidden = '';
    $option = '';

    if ($is_dhtml_editor) {
        $option_hidden .= '<input type="hidden" name="qa_html" value="1">';
    } else {
        $option .= "\n".'<input type="checkbox" id="qa_html" name="qa_html" onclick="html_auto_br(this);" value="'.$html_value.'" '.$html_checked.'>'."\n".'<label for="qa_html">html</label>';
    }

    echo $option_hidden;
    ?>

    <div class="form_01">
		<table class="table1 table_input">
			<tbody>
				<tr>
					<th><label for="qa_subject">제목<em class="purple">*<span class="sound_only">필수</span></em></label></th>
					<td><input type="text" name="qa_subject" value="<?php echo get_text($write['qa_subject']); ?>" id="qa_subject" required size="50" maxlength="255" style="width:100%"></td>
				</tr>
				<tr>
					<th><label for="text1">이름<em class="purple">*<span class="sound_only">필수</span></em></label></th>
					<td><input type="text" id="text1" placeholder="이름"></td>
				</tr>
				<?php if ($is_hp) { ?>
				<tr>
					<th><label for="qa_hp">연락처<em class="purple">*<span class="sound_only">필수</span></em></label></th>
					<td>
						<input type="tel" name="qa_hp" value="<?php echo get_text($write['qa_hp']); ?>" id="qa_hp" <?php echo $req_hp; ?> size="30" placeholder="‘-’없이 입력">
						<?php if($qaconfig['qa_use_sms']) { ?>
						<input type="checkbox" name="qa_sms_recv" id="qa_sms_recv" value="1" <?php if($write['qa_sms_recv']) echo 'checked="checked"'; ?>> <label for="qa_sms_recv" class="frm_info">답변등록 SMS알림 수신</label>
						<?php } ?>
					</td>
				</tr>
				<?php } ?>
				<?php if ($is_email) { ?>
				<tr>
					<th> <label for="qa_email">이메일<em class="purple">*<span class="sound_only">필수</span></em></label></th>
					<td>
						<input type="email" name="qa_email" value="<?php echo get_text($write['qa_email']); ?>" id="qa_email" <?php echo $req_email; ?> size="50" maxlength="100">
						<!-- <input type="checkbox" name="qa_email_recv" id="qa_email_recv" value="1" <?php if($write['qa_email_recv']) echo 'checked="checked"'; ?>>
						<label for="qa_email_recv" class="frm_info">답변받기</label> -->
					</td>
				</tr>
				<?php } ?>
				<tr>
					<th><label for="qa_content">문의내용<em class="purple">*<span class="sound_only">필수</span></em></label></th>
					<td><div class="qa_content_wrap <?php echo $is_dhtml_editor ? $config['cf_editor'] : ''; ?>"><?php echo $editor_html; // 에디터 사용시는 에디터로, 아니면 textarea 로 노출 ?></div></td>
				</tr>
				<tr>
					<th><label for="bf_file_1">파일첨부<span class="sound_only"> #1</span></label></th>
					<td>
						<input type="file" name="bf_file[1]" id="bf_file_1" title="파일첨부 1 :  용량 <?php echo $upload_max_filesize; ?> 이하만 업로드 가능" class="frm_file">
						<?php if($w == 'u' && $write['qa_file1']) { ?>
						<input type="checkbox" id="bf_file_del1" name="bf_file_del[1]" value="1"> <label for="bf_file_del1"><?php echo $write['qa_source1']; ?> 파일 삭제</label>
						<?php } ?>
					</td>
				</tr>
				<tr>
					<th><label for="bf_file_2">파일첨부<span class="sound_only"> #2</span></label></th>
					<td>
						<input type="file" name="bf_file[2]" id="bf_file_2" title="파일첨부 2 :  용량 <?php echo $upload_max_filesize; ?> 이하만 업로드 가능" class="frm_file">
						<?php if($w == 'u' && $write['qa_file2']) { ?>
						<input type="checkbox" id="bf_file_del2" name="bf_file_del[2]" value="1"> <label for="bf_file_del2"><?php echo $write['qa_source2']; ?> 파일 삭제</label>
						<?php } ?>
					</td>
				</tr>
			</tbody>
		</table>
    </div>

    <div class="btn_wrap">
        <button type="submit" value="작성완료" id="btn_submit" accesskey="s" class="btn navy">글쓰기</button>
    </div>
    </form>

    <script>
    function html_auto_br(obj)
    {
        if (obj.checked) {
            result = confirm("자동 줄바꿈을 하시겠습니까?\n\n자동 줄바꿈은 게시물 내용중 줄바뀐 곳을<br>태그로 변환하는 기능입니다.");
            if (result)
                obj.value = "2";
            else
                obj.value = "1";
        }
        else
            obj.value = "";
    }

    function fwrite_submit(f)
    {
        <?php echo $editor_js; // 에디터 사용시 자바스크립트에서 내용을 폼필드로 넣어주며 내용이 입력되었는지 검사함   ?>

        var subject = "";
        var content = "";
        $.ajax({
            url: g5_bbs_url+"/ajax.filter.php",
            type: "POST",
            data: {
                "subject": f.qa_subject.value,
                "content": f.qa_content.value
            },
            dataType: "json",
            async: false,
            cache: false,
            success: function(data, textStatus) {
                subject = data.subject;
                content = data.content;
            }
        });

        if (subject) {
            alert("제목에 금지단어('"+subject+"')가 포함되어있습니다");
            f.qa_subject.focus();
            return false;
        }

        if (content) {
            alert("내용에 금지단어('"+content+"')가 포함되어있습니다");
            if (typeof(ed_qa_content) != "undefined")
                ed_qa_content.returnFalse();
            else
                f.qa_content.focus();
            return false;
        }

        <?php if ($is_hp) { ?>
        var hp = f.qa_hp.value.replace(/[0-9\-]/g, "");
        if(hp.length > 0) {
            alert("휴대폰번호는 숫자, - 으로만 입력해 주십시오.");
            return false;
        }
        <?php } ?>

        document.getElementById("btn_submit").disabled = "disabled";

        return true;
    }
    </script>
	</div>
	</div>
</section>
<!-- } 게시물 작성/수정 끝 -->