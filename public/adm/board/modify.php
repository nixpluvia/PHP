<?php
// 관리자 페이지들을 위한 공통작업
require_once $_SERVER['DOCUMENT_ROOT'] . '/../init/adm.php';

$pageTitle = "게시판 수정";
// 관리자 페이지 공통 상단
require_once $_SERVER['DOCUMENT_ROOT'] . '/../part/adm/head.php';

$board = ArticleService::getBoardById($_REQUEST['id']);
?>

<form class="con table-box form1" action="doModify.php" method="POST">
    <input type="hidden" name="id" value="<?=$board['id']?>">
    <table>
        <colgroup>
            <col width="200">
        </colgroup>
        <tbody>
            <tr>
                <th>게시판 이름</th>
                <td>
                    <div class="form-control">
                        <input name="name" type="text" maxlength="20" placeholder="게시판 이름을 입력해주세요" required autofocus value="<?=$board['name']?>">
                    </div>
                </td>
            </tr>
            <tr>
                <th>게시판 코드</th>
                <td>
                    <div class="form-control">
                        <input name="code" type="text" maxlength="20" placeholder="게시판 코드를 입력해주세요" required value="<?=$board['code']?>">
                    </div>
                </td>
            </tr>
            <tr>
                <th>수정</th>
                <td>
                    <button type="submit" class="btn btn-success">수정</button>
                </td>
            </tr>
        </tbody>
    </table>
</form>




<?php
// 관리자 페이지 공통 하단
require_once $_SERVER['DOCUMENT_ROOT'] . '/../part/adm/foot.php';

?>