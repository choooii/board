<?php
$httpMethod = $_SERVER["REQUEST_METHOD"];
$idVal = "";
$nameVal = "";

if ( $httpMethod === "POST" ) {
    $getPost = $_POST;

    $idVal = $getPost["id"];
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
    <title>Registration</title>
</head>
<body>
    <?php require_once(_PATH_HEADER._EXTENSION_PHP) ?>
    <div class="container">
        <h1>회원가입</h1>
        <?php if(isset($this->errMsg)) { ?>
            <div>
                <span><?php echo $this->errMsg ?></span>
            </div>
        <?php } ?>
        <form action="/user/registration" method="POST" name="registrationForm">
            <label for="id">ID</label>
            <input type="text" id="id" name="id" value="<? echo $idVal ?>">
            <button type="button" onclick="chkDuplication()" class="btn btn-outline-dark btn-sm">중복체크</button>
            <span id="errMsgId">
                <?php if(isset($this->arrError["id"])) { 
                    echo $this->arrError["id"]; 
                } ?>
            </span>
            <br>
            <br>
            <label for="pw">PW</label>
            <input type="text" id="pw" name="pw" oninput="chkPwVal();">
            <span>
                <?php if(isset($this->arrError["pw"])) { 
                    echo $this->arrError["pw"]; 
                } ?>
            </span>
            <br>
            <div id="pwChkDiv">
                <span class="pwChkSpan" id="pwChkSpan1">✔영어소문자</span>
                <span class="pwChkSpan" id="pwChkSpan2">✔숫자/특수문자</span>
                <span class="pwChkSpan" id="pwChkSpan3">✔8~20자</span>
            </div>
            <br>
            <label for="pwChk">PW 확인</label>
            <input type="text" id="pwChk" name="pwChk" oninput="chkPwDupl();">
            <span id="chk_pw_msg">
                <?php if(isset($this->arrError["pwChk"])) { 
                    echo $this->arrError["pwChk"]; 
                } ?>
            </span>
            <br>
            <br>
            <label for="name">이름</label>
            <input type="text" id="name" name="name" value="<? echo $nameVal ?>">
            <span id="errMsgName">
                <?php if(isset($this->arrError["name"])) { 
                    echo $this->arrError["name"]; 
                } ?>
            </span>
            <br>
            <br>
            <button class="btn btn-outline-dark btn-sm" type="button" onclick="joinformCheck()">회원가입</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="/application/view/js/common.js"></script>
    <script src="/application/view/js/registration.js"></script>
</body>
</html>