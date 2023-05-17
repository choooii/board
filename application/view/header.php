<nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark mb-lg-5 navbar-custom" id="navbar">
    <div class="container-fluid">
        <a class="navbar-brand" href="/product/home">Home</a>
        <button class="navbar-toggler custom-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="/product/list?cate_no=1" id="cate1">상의</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/product/list?cate_no=2" id="cate2">하의</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/product/list?cate_no=3" id="cate3">신발</a>
                </li>
                <?php if(array_key_exists(_STR_LOGIN_ID, $_SESSION)) { ?>
                    <li class="nav-item">
                    <a class="nav-link" href="/user/update">마이페이지</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="/user/logout">로그아웃</a>
                    </li>
                <?php }
                else { ?>
                    <li class="nav-item">
                    <a class="nav-link" href="/user/login">로그인</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="/user/registration">회원가입</a>
                    </li>
                <?php }?>
            </ul>
            <form class="d-flex">
                <input id="search" class="form-control me-2" type="text" placeholder="Search" aria-label="Search">
                <button class="btn" type="submit">
                    <i class="bi bi-search custom-i"></i>
                </button>
            </form>
        </div>
    </div>
</nav>