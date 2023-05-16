<?php
namespace application\controller;

class UserController extends Controller {
    public function loginGet() {
        return "login"._EXTENSION_PHP;
    }

    public function registrationGet() {
        return "registration"._EXTENSION_PHP;
    }

    public function updateGet() {
        return "update"._EXTENSION_PHP;
    }

    public function loginPost() {
        $result = $this->model->getUser($_POST);
        $this->model->closeConn();
        // 유저 유무 체크
        if (count($result) === 0 ) {
            $errMsg = "입력하신 회원정보가 없습니다";
            $this->addDynamicProperty("errMsg", $errMsg);
            // 로그인 페이지 리턴
            return "login"._EXTENSION_PHP;
        }

        // session에 User ID 저장
        $_SESSION[_STR_LOGIN_ID] = $_POST["id"];

        // 리스트 페이지 리턴
        return _BASE_REDIRECT."/product/home";
    }

    // 로그아웃 메소드
    public function logoutGet() {
        session_unset();
        session_destroy();

        return _BASE_REDIRECT."/product/home";
    }

    public function registrationPost() {
        $arrPost = $_POST;
        $arrChkErr = [];
        // 유효성 체크
        // todo 유효성 체크 부분만 따로 함수로 만들어 배열로 담기
        
        // todo 영문자, 숫자 체크

        // id 유효성 체크
        if(mb_strlen($arrPost["id"]) > 12 || mb_strlen($arrPost["id"]) < 4) {
            $arrChkErr["id"] = "ID는 4글자 이상 12글자 이하로 입력해주세요.";
        }

        // PW 글자수 체크
        if (mb_strlen($arrPost["pw"]) < 8 || mb_strlen($arrPost["pw"]) > 20) {
            $arrChkErr["pw"] = "비밀번호는 8~20글자로 입력해주세요.";
        }
        
        // 비밀번호와 비밀번호 체크
        if ($arrPost["pw"] !== $arrPost["pwChk"]) {
            $arrChkErr["pwChk"] = "비밀번호와 일치하지 않습니다.";
        }
        // todo 비밀번호 영문 숫자 특수문자 체크

        // 이름 글자수 체크
        if(mb_strlen($arrPost["name"]) > 30 || mb_strlen($arrPost["name"]) === 0) {
            $arrChkErr["name"] = "이름은 30글자 이하로 입력해주세요.";
        }

        // 유효성 체크 에러일 경우
        if(!empty($arrChkErr)) {
            // 에러메시지 세팅
            $this->addDynamicProperty('arrError', $arrChkErr);
            return "registration"._EXTENSION_PHP;
        }
        
        $result = $this->model->getUser($arrPost, false);
        // 결과 유무 체크
        if (count($result) !== 0 ) {
            $errMsg = "입력하신 ID가 사용중입니다.";
            $this->addDynamicProperty("errMsg", $errMsg);
            // 회원가입 페이지 페이지 리턴
            return "registration"._EXTENSION_PHP;
        }

        // *** transaction start
        $this->model->beginTransaction();

        // user insert
        if(!$this->model->insertUser($arrPost)) {
            // 예외처리 롤백
            echo "User Regist Error";
            $this->model->rollBack();
            exit();
        };
        // 정상처리 커밋
        $this->model->commit();
        // *** transaction End

        // 로그인 페이지로 이동
        return _BASE_REDIRECT."/user/login";
    }
}
