<?php
    $httpMethod = $_SERVER["REQUEST_METHOD"];

    if ( $httpMethod === "POST" ) {
        $getPost = $_POST;

        $idVal = $getPost["id"];
        $pwVal = $getPost["pw"];
        $nameVal = $getPost["name"];
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
    <title>회원정보 수정</title>
</head>
<body>
    <?php
    require_once(_PATH_HEADER._EXTENSION_PHP)
    ?>
    <div class="container">
        <h1>회원정보 수정</h1>
        <form method="post">
            <label for="id">ID</label>
            <input class="custom-id" type="text " id="id" name="id" readonly value="<?php echo $_SESSION['u_id'] ?>">
            <br>
            <br>
            <label for="pw">PW</label>
            <input type="text" id="pw" name="pw">
            <span>
                <?php if(isset($this->arrError["pw"])) { 
                    echo $this->arrError["pw"];
                    }
                    if(isset($this->errMsg)) {
                        echo $this->errMsg;
                    }
                ?>
            </span>
            <br>
            <br>
            <label for="pw">PW 확인</label>
            <input type="text" id="pwChk" name="pwChk" placeholder="회원탈퇴시에는 필요 없음">
            <span>
                <?php if(isset($this->arrError["pwChk"])) { 
                    echo $this->arrError["pwChk"]; 
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
            <button class="btn btn-outline-dark btn-sm" type="submit" onclick="javascript: form.action='/user/update'">정보 수정</button>
            <button class="btn btn-outline-dark btn-sm" type="submit" onclick="javascript: form.action='/user/out'">회원 탈퇴</button>
        </form>
        <br>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>