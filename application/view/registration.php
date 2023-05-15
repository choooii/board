<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="/application/view/css/main.css">
    <title>Registration</title>
</head>
<body>
    <?php require_once(_PATH_HEADER._EXTENSION_PHP) ?>
    <div class="container">
        <h1>회원가입</h1>
        <form action="/user/registration" method="post">
            <label for="id">ID</label>
            <input type="text" id="id" name="id">
            <br>
            <br>
            <label for="pw">PW</label>
            <input type="text" id="pw" name="pw">
            <button type="submit">회원가입</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>