<?php

namespace application\model;

class ProductModel extends Model{
    public function getAllPro($proFlg = "", $num = 0) {
        $sql = 
            " SELECT * " 
            ." FROM pro_list "
            ;

        if($num !== 0 && $proFlg !== "") {
            $sql .= " WHERE ".$proFlg." = :".$proFlg;
        }

        $prepare = [];

        if($num !== 0) {
            $prepare[":".$proFlg] = $num;
        }

        try {
            $stmt = $this->conn->prepare($sql);
            $stmt->execute($prepare);
            $result = $stmt->fetchAll();

        } catch(Exception $e) {
            echo "ProductModel->getAllPro Error : ".$e->getMessage();
            exit();
        }
        return $result;
    }
}