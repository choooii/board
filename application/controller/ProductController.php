<?php
namespace application\controller;

class ProductController extends Controller {
    public function homeGet() {
        return "home"._EXTENSION_PHP;
    }
    
    public function listGet() {
        return "list"._EXTENSION_PHP;
    }

    public function detailGet() {
        return "detail"._EXTENSION_PHP;
    }
    
    public function searchGet() {
        return "search"._EXTENSION_PHP;
    }

    public function searchPost() {
        return "search"._EXTENSION_PHP;
    }

    public function cartGet() {
        return "cart"._EXTENSION_PHP;
    }

    public function printAllList() {
        $result = $this->model->getAllPro();
        $this->model->closeConn();
        if (count($result) === 0) {
            echo $errMsg = "상품 정보가 없습니다.";
            exit;
        }

        $this->echoListHTML($result);
    }

    public function printList($pro_cate_no) {
        $result = $this->model->getAllPro("pro_cate", $pro_cate_no);
        $this->model->closeConn();
        if (count($result) === 0) {
            echo $errMsg = $pro_cate."번 카테고리의 상품 정보가 없습니다.";
            exit;
        }

        $this->echoListHTML($result);
    }

    public function echoListHTML($arr_result) {
        foreach ($arr_result as $val) {
            echo 
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
            </div>';
        }
    }

    public function echoDetailInfo($pro_no) {
        $result = $this->model->getAllPro("pro_no", $pro_no);
        $this->model->closeConn();
        if (count($result[0]) === 0) {
            echo $errMsg = $pro_no."번 상품 정보가 없습니다.";
            exit;
        }

        echo
        '<img class="img-custom" src="'.$result[0]['img_path'].'"
        <br>
        <h5>'.$result[0]['pro_name'].'</h5>
        <p>'.$result[0]['pro_price'].'</p>';
    }
}
