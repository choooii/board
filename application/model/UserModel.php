<?php

namespace application\model;

class UserModel extends Model{
    public function getUser($arrUserInfo, $pwFlg = true) {
        $sql = " SELECT * FROM user_info WHERE u_id = :id";

        if($pwFlg) {
            $sql .= " AND u_pw = :pw ";
        }

        $prepare = [
            ":id"   => $arrUserInfo["id"]
        ];

        if($pwFlg) {
            $prepare[":pw"] = $arrUserInfo["pw"];
        }

        try {
            $stmt = $this->conn->prepare($sql);
            $stmt->execute($prepare);
            $result = $stmt->fetchAll();
        } catch(Exception $e) {
            echo "UserModel->getUser Error : ".$e->getMessage();
            exit();
        }
        return $result;
    }

    // insert user
    public function insertUser($arrUserInfo) {
        $sql = 
            " INSERT INTO user_info( "
            ." u_id "
            ." ,u_pw "
            ." ,u_name "
            ." ) "
            ." VALUES( "
            ."  :u_id "
            ."  ,:u_pw "
            ."  ,:u_name "
            ." ) "
            ;

        $prepare = [
            "u_id" => $arrUserInfo["id"]
            ,"u_pw" => $arrUserInfo["pw"]
            ,"u_name" => $arrUserInfo["name"]
        ];

        try {
            $stmt = $this->conn->prepare($sql);
            $result = $stmt->execute($prepare);
            return $result;
        } catch(Exception $e) {
            return false;
        }
    } 
}