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
        $getSession['id'] = $_SESSION['u_id'];
        $result = $this->echoUserInfo($getSession);

        $this->addDynamicProperty('result', $result);
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

    public function valChk($arr) {
        $arrChk = [];
        // todo 영문자, 숫자 체크

        // id 유효성 체크
        if(array_key_exists("id", $arr)){
            if(mb_strlen($arr["id"]) > 12 || mb_strlen($arr["id"]) < 4) {
                $arrChk["id"] = "ID는 4글자 이상 12글자 이하로 입력해주세요.";
            }
        }

        // PW 글자수 체크
        if(array_key_exists("pw", $arr)){
            if (mb_strlen($arr["pw"]) < 8 || mb_strlen($arr["pw"]) > 20) {
                $arrChk["pw"] = "비밀번호는 8~20글자로 입력해주세요.";
            }
        }

        // 비밀번호와 비밀번호 체크
        if(array_key_exists("pwChk", $arr)){
            if ($arr["pw"] !== $arr["pwChk"]) {
                $arrChk["pwChk"] = "비밀번호와 일치하지 않습니다.";
            }
        }
        
        // todo 비밀번호 영문 숫자 특수문자 체크

        // 이름 글자수 체크
        if(array_key_exists("name", $arr)){
            if(mb_strlen($arr["name"]) > 30 || mb_strlen($arr["name"]) === 0) {
                $arrChk["name"] = "이름은 30글자 이하로 입력해주세요.";
            }
        }

        return $arrChk;
    }

    public function registrationPost() {
        $arrPost = $_POST;
        $arrChkErr = [];
        // 유효성 체크
        $arrChkErr = $this->valChk($arrPost);
        if(!empty($arrChkErr)) {
            $this->addDynamicProperty('arrError', $arrChkErr);
            return "registration"._EXTENSION_PHP;
        }
        
        $result = $this->model->getUser($arrPost, false);
        // 중복 결과 유무 체크
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
    
    public function updatePost() {
        $arrPost = $_POST;
        $arrChkErr = [];

        // 유효성 체크
        $arrChkErr = $this->valChk($arrPost);
        if(!empty($arrChkErr)) {
            $this->addDynamicProperty('arrError', $arrChkErr);
            return "update"._EXTENSION_PHP;
        }

        // *** transaction start
        $this->model->beginTransaction();

        // user insert
        if(!$this->model->updateUser($arrPost)) {
            // 예외처리 롤백
            echo "User Update Error";
            $this->model->rollBack();
            exit();
        };
        // 정상처리 커밋
        $this->model->commit();
        // *** transaction End

        // 업데이트 페이지 리다이렉트
        return _BASE_REDIRECT."/user/update";
    }

    public function echoUserInfo($getSession) {
        $result = $this->model->getUser($getSession, false);
        $this->model->closeConn();

        if (count($result) === 0) {
            echo $errMsg = $getSession['id']." 회원이 없습니다.";
            exit;
        }

        return $result[0];
    }

}
