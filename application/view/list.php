<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List</title>
</head>
<body>
    List File!!!
    <button id="logout" onclick="redirectLogout()">Log Out</button>

    <script>
        //todo : js 파일 따로 분리
        function redirectLogout() {
            location.href = "/user/logout";
        }
    </script>
</body>
</html>