<?php
namespace application\controller;

class ApiController extends Controller {
    public function userGet() {
        $arrGet = $_GET;
        $arrData = ["flg" => "0"];

        // model 호출
        $this->model = $this->getModel('User');
        $result = $this->model->getUserThroughId($arrGet["id"]);
        $this->model->closeConn();
        
        // 결과 유무 체크
        if ($arrGet['id'] === "") {
            $arrData["flg"] = "1";
            $arrData["msg"] = "ID를 입력해주세요.";
        } else if (count($result) !== 0 ) {
            $arrData["flg"] = "2";
            $arrData["msg"] = "입력하신 ID가 사용중입니다.";
        } else {
            $arrData["flg"] = "3";
            $arrData["msg"] = "중복되지 않은 ID입니다.";
        }

        // 배열을 JSON으로 변경
        $json = json_encode($arrData);
        header('Content-type: application/json');
        echo $json;
        exit();
    }
}