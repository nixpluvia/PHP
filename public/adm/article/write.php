<?php
// 관리자 페이지들을 위한 공통작업
require_once $_SERVER['DOCUMENT_ROOT'] . '/../init/adm.php';

$pageTitle = "게시물 작성";
// 관리자 페이지 공통 상단
require_once $_SERVER['DOCUMENT_ROOT'] . '/../part/adm/head.php';

$boards = ArticleService::getForPrintBoards();

require_once $_SERVER['DOCUMENT_ROOT'] . '/../part/toastUiEditor.php';
?>

<script>
var ArticleWriteForm__submitDone = false;

function ArticleWriteForm__submit (form) {
    if ( ArticleWriteForm__submitDone ) {
        alert('처리중입니다.')
        return;
    }

    form.title.value = form.title.value.trim();

    if(form.title.value.length == 0 ) {
        alert('제목을 입력해주세요.');
        form.title.focus();
        return;
    }

    var editor = $(form).find('.toast-editor').data('data-toast-editor');
    body = editor.getMarkdown().trim();

    if (body == '') {
        alert('본문을 입력해주세요.');
        editor.focus();
        return;
    }

    form.body.value = body;

    form.submit();

    ArticleWriteForm__submitDone = true;
}

</script>
<form class="con table-box form1" action="doWrite.php" method="POST" onsubmit="ArticleWriteForm__submit(this); return false;">
    <input type="hidden" name="body">
    <table>
        <colgroup>
            <col width="200">
        </colgroup>
        <tbody>
            <tr>
                <th>게시판</th>
                <td>
                    <div class="form-control">
                        <select name="boardId" onchange="this.form.submit();">
                            <?php foreach ($boards as $board) { ?>
                            <option value="<?=$board['id']?>"><?=$board['name']?></option>
                            <?php } ?>
                        </select>
                    </div>
                </td>
            </tr>
            <tr>
                <th>제목</th>
                <td>
                    <div class="form-control">
                        <input type="text" name="title" placeholder="제목">
                    </div>
                </td>
            </tr>
            <tr>
                <th>본문</th>
                <td>
                    <div class="form-control">
                        <script type="text/x-template"></script>
                        <div class="toast-editor"></div>
                    </div>
                </td>
            </tr>
            <tr>
                <th>작성</th>
                <td>
                    <button type="submit" class="btn btn-primary">작성</button>
                </td>
            </tr>
        </tbody>
    </table>
</form>




<?php
// 관리자 페이지 공통 하단
require_once $_SERVER['DOCUMENT_ROOT'] . '/../part/adm/foot.php';

?>