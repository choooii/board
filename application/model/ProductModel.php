<?php

namespace application\model;

class ProductModel extends Model{
    public function getAllPro() {
        $sql = 
            " SELECT * " 
            ." FROM pro_list "
            ;

        $prepare = [];
        try {
            $stmt = $this->conn->prepare($sql);
            $stmt->execute($prepare);
            $result = $stmt->fetchAll();

        } catch(Exception $e) {
            echo "ProductModel->getAllPro Error : ".$e->getMessage();
            exit();
        } finally {
            $this->closeConn();
        }
        return $result;
    }

    public function getProList($pro_cate) {
        $sql = 
            " SELECT * " 
            ." FROM pro_list "
            ." WHERE pro_cate = :pro_cate "
            ;

        $prepare = [":pro_cate"   => $pro_cate];
        try {
            $stmt = $this->conn->prepare($sql);
            $stmt->execute($prepare);
            $result = $stmt->fetchAll();

        } catch(Exception $e) {
            echo "ProductModel->getProList Error : ".$e->getMessage();
            exit();
        } finally {
            $this->closeConn();
        }
        return $result;
    }

    public function getDetail($pro_no){
        $sql = 
            " SELECT * " 
            ." FROM pro_list "
            ." WHERE pro_no = :pro_no "
            ;

        $prepare = [":pro_no"   => $pro_no];
        try {
            $stmt = $this->conn->prepare($sql);
            $stmt->execute($prepare);
            $result = $stmt->fetchAll();

        } catch(Exception $e) {
            echo "ProductModel->getDetail Error : ".$e->getMessage();
            exit();
        } finally {
            $this->closeConn();
        }
        return $result[0];
    }
}