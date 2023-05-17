<?php

namespace application\model;

class ProductModel extends Model{
    public function getPro($proFlg = "", $num = 0) {
        $sql = 
            " SELECT * " 
            ." FROM pro_list "
            ;

        if($num !== 0 && $proFlg !== "") {
            $sql .= " WHERE ".$proFlg." = :".$proFlg;
        }

        $prepare = [];

        if($num !== 0 && $proFlg !== "") {
            $prepare[":".$proFlg] = $num;
        }

        try {
            $stmt = $this->conn->prepare($sql);
            $stmt->execute($prepare);
            $result = $stmt->fetchAll();

        } catch(Exception $e) {
            echo "ProductModel->getPro Error : ".$e->getMessage();
            exit();
        }
        return $result;
    }
}