<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="/application/view/css/main.css">
    <title>My Page</title>
</head>
<body>
    <?php
    require_once(_PATH_HEADER._EXTENSION_PHP)
    ?>
    <div class="container">
        <h1>마이페이지</h1>
        <form action="/user/info" method="post" id="userInfoForm">
            <label for="id">ID</label>
            <input type="text" id="id" name="id" class="custom-id" readonly value="<?php echo $_SESSION['u_id'] ?>">
            <br>
            <br>
            <label for="name">이름</label>
            <input type="text" id="name" name="name" class="custom-id" readonly value="<?php echo $this->httpMethod === "GET" ? $this->result['u_name'] : $this->nameVal ?>">
            <br>
            <br>
            <button class="btn btn-outline-dark btn-sm" type="button" onclick="getPwChkBtn()">회원 정보 수정</button>
            <br>
            <br>
        </form>
        <br>
        <span><?php echo $this->httpMethod === "GET" ? "" : $this->errMsg ?></span>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="/application/view/js/common.js"></script>
</body>
</html>