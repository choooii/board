<?php

namespace application\model;

class ProductModel extends Model{
    public function getPro($colName = "", $num = 0) {
        $sql = 
            " SELECT * " 
            ." FROM pro_list "
            ;

        if($num !== 0 && $colName !== "") {
            $sql .= " WHERE ".$colName." = :colName";
        }

        $prepare = [];

        if($num !== 0 && $colName !== "") {
            $prepare["colName"] = $num;
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

    public function getProSearchInfo($searchWord) {
        $sql = 
        " SELECT * " 
        ." FROM pro_list "
        ." WHERE pro_name LIKE :pro_name "
        ;

        $prepare = [
            "pro_name" => "%".$searchWord."%"
        ];

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