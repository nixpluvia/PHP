<?php

$config = [];
$config['needToLogin'] = false;



// 관리자 페이지들을 위한 공통작업
require_once $_SERVER['DOCUMENT_ROOT'] . '/../init/adm.php';

$pageTitle = "로그인";
// 관리자 페이지 공통 상단
require_once $_SERVER['DOCUMENT_ROOT'] . '/../part/adm/head.php';


?>

<form class="con table-box form1" action="dologin.php" method="POST">
    <table>
        <colgroup>
            <col width="200">
        </colgroup>
        <tbody>
            <tr>
                <th>로그인 아이디</th>
                <td>
                    <div class="form-control">
                        <input name="loginId" type="text" maxlength="20" placeholder="로그인 아이디를 입력해주세요." required autofocus>
                    </div>
                </td>
            </tr>
            <tr>
                <th>로그인 아이디</th>
                <td>
                    <div class="form-control">
                        <input name="loginPw" type="text" maxlength="20" placeholder="로그인 비밀번호를 입력해주세요." required>
                    </div>
                </td>
            </tr>
            <tr>
                <th>로그인</th>
                <td>
                    <button type="submit" class="btn btn-primary">로그인</button>
                </td>
            </tr>
        </tbody>
    </table>
</form>





<?php
// 관리자 페이지 공통 하단
require_once $_SERVER['DOCUMENT_ROOT'] . '/../part/adm/foot.php';

?>