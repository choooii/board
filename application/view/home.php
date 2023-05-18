<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="/application/view/css/main.css">
    <title>Home</title>
</head>
<body>
    <?php require_once(_PATH_HEADER._EXTENSION_PHP) ?>
    <div class="container">
        <!-- 배너 -->
        <div>
            <h1>홈</h1>
        </div>
        <h3 style="color: red;"><?php echo isset($this->errMsg) ? $this->errMsg : "" ; ?></h3>
        <!-- 카드 -->
        <div class="row row-cols-xxl-4">
            <?php 
            foreach ($this->arrResult as $val) {
                echo $val;
            }
            ?>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>