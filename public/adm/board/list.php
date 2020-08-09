<?php

// 관리자 페이지들을 위한 공통작업
require_once $_SERVER['DOCUMENT_ROOT'] . '/../init/adm.php';

$pageTitle = "게시판 리스트";
// 관리자 페이지 공통 상단
require_once $_SERVER['DOCUMENT_ROOT'] . '/../part/adm/head.php';

$boards = ArticleService::getForPrintBoards();

?>

<div class="con table-box">
    <table>
        <colgroup>
            <col width="50">
            <col width="200">
            <col width="300">
            <col>
            <col width="300">
        </colgroup>
        <thead>
            <th>번호</th>
            <th>날짜</th>
            <th>코드</th>
            <th>이름</th>
            <th></th>
        </thead>
        <tbody>
            <?php foreach ($boards as $board) { ?>
            <tr>
                <td><?=$board['id']?></td>
                <td><?=$board['regDate']?></td>
                <td><?=$board['code']?></td>
                <td><a  href="/adm/board/modify.php?id=<?=$board['id']?>"><?=$board['name']?></a></td>
                <td class="text-align-center">
                    <a class="btn btn-success" href="/adm/board/modify.php?id=<?=$board['id']?>">수정</a>
                    <a onclick="if(confirm('정말 삭제 하시겠습니까?') == false) return false;" class="btn btn-danger" href="/adm/board/doDelete.php?id=<?=$board['id']?>">삭제</a>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
<div class="con margin-top-30">
    <a class="btn btn-primary" href="/adm/board/make.php">게시판 생성</a>
</div>




<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/../part/adm/foot.php';
?>