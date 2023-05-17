<?php
    $httpMethod = $_SERVER["REQUEST_METHOD"];
    $pwVal = "";
    $nameVal = "";

    if ( $httpMethod === "POST" ) {
        $getPost = $_POST;

        $idVal = $getPost["id"];
        $pwVal = $getPost["pw"];
        $nameVal = $getPost["name"];
        $noVal = $getPost["no"];
}
?>
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
        <h1>회원정보 수정</h1>
        <form action="/user/update" method="post">
            <label for="id">ID</label>
            <input class="custom-id" type="text " id="id" name="id" readonly value="<?php echo $httpMethod === 'POST' ? $idVal : $this->result['u_id'] ?>">
            <br>
            <br>
            <label for="pw">PW</label>
            <input type="text" id="pw" name="pw">
            <span>
                <?php if(isset($this->arrError["pw"])) { 
                    echo $this->arrError["pw"]; 
                } ?>
            </span>
            <br>
            <br>
            <label for="name">이름</label>
            <input type="text" id="name" name="name" value="<?php echo $httpMethod === 'POST' ? $nameVal : $this->result['u_name'] ?>">
            <span>
                <?php if(isset($this->arrError["name"])) { 
                    echo $this->arrError["name"]; 
                } ?>
            </span>
            <br>
            <br>
            <input type="hidden" name="no" value="<?php echo $httpMethod === 'POST' ? $noVal : $this->result['u_no'] ?>">
            <button class="btn btn-outline-dark btn-sm" type="submit">정보 수정</button>
            <button class="btn btn-outline-dark btn-sm">회원 탈퇴</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>