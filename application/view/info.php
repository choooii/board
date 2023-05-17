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
        <form action="/user/update" method="post">
            <label for="id">ID</label>
            <span><?php echo $this->result['u_id'] ?></span>
            <br>
            <br>
            <label for="name">이름</label>
            <span><?php echo $this->result['u_name'] ?></span>
            <br>
            <br>
            <button class="btn btn-outline-dark btn-sm" type="button" onclick="location.href='/user/update';">회원 정보 수정</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>