<?php
namespace application\controller;

class ProductController extends Controller {
    public function homeGet() {
        $result = $this->model->getPro();
        $this->model->closeConn();

        if (count($result) === 0) {
            $errMsg = "상품 정보가 없습니다.";
            $this->addDynamicProperty('errMsg', $errMsg);
            return "home"._EXTENSION_PHP;
        }

        $arrResult = $this->echoListHTML($result);
        $this->addDynamicProperty('arrResult', $arrResult);
        return "home"._EXTENSION_PHP;
    }

    public function listGet() {
        $getResult = $_GET;

        $result = $this->model->getPro("pro_cate", $getResult['cate_no']);
        $this->model->closeConn();

        if (count($result) === 0) {
            $errMsg = "카테고리 정보가 없습니다.";
            $this->addDynamicProperty('errMsg', $errMsg);
            return "list"._EXTENSION_PHP;
        }

        $arrResult = $this->echoListHTML($result);
        $this->addDynamicProperty('arrResult', $arrResult);
        return "list"._EXTENSION_PHP;
    }
    
    public function detailGet() {
        $getResult = $_GET;
        $pro_no = $getResult['pro_no'];

        $result = $this->model->getPro("pro_no", $pro_no);
        $this->model->closeConn();
        if (empty($result[0])) {
            $errMsg = $pro_no."번 상품 정보가 없습니다.";
            $this->addDynamicProperty('errMsg', $errMsg);
            return "detail"._EXTENSION_PHP;
        }

        $resultHTML = 
        '<img class="img-custom" src="'.$result[0]['img_path'].'"
        <br>
        <h5>'.$result[0]['pro_name'].'</h5>
        <p>'.$result[0]['pro_price'].'</p>';

        $this->addDynamicProperty('resultHTML', $resultHTML);
        return "detail"._EXTENSION_PHP;
    }

    public function searchPost() {
        $arrPost = $_POST;
        $this->addDynamicProperty('searchWord', $arrPost['search']);

        $result = $this->model->getProSearchInfo($arrPost['search']);
        $this->model->closeConn();

        if (count($result) === 0) {
            $errMsg = "상품 정보가 없습니다.";
            $this->addDynamicProperty('errMsg', $errMsg);
            return "search"._EXTENSION_PHP;
        }

        $arrResult = $this->echoListHTML($result);
        $this->addDynamicProperty('arrResult', $arrResult);

        return "search"._EXTENSION_PHP;
    }

    public function cartGet() {
        return "cart"._EXTENSION_PHP;
    }

    public function echoListHTML($arrResult) {
        $arrHTMLResult = [];
        foreach ($arrResult as $val) {
            array_push($arrHTMLResult, 
            '<div class="col d-flex justify-content-center pt-3 pb-3">
                    <div class="card" style="width: 18rem;">
                    <img src="'.$val['img_path'].'" class="card-img-top">
                    <div class="card-body text-center">
                        <a href="/product/detail?pro_no='.$val['pro_no'].'">
                            <h5 class="card-title">'.$val['pro_name'].'</h5>
                        </a>
                        <p class="card-text">'.$val['pro_price'].'</p>
                    </div>
                </div>
            </div>');
        }

    return $arrHTMLResult;
    }
}
