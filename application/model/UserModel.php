<?php

namespace application\model;

class UserModel extends Model{
    public function getUser($arrUserInfo, $pwFlg = true) {
        $sql = " SELECT * FROM user_info WHERE u_id = :id AND u_flg = '0' ";

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

    public function updateUser($arrUserInfo) {
        $sql = 
            " Update user_info "
            ." SET "
            ."  u_pw = :u_pw "
            ."  ,u_name = :u_name "
            ." WHERE u_no = :u_no "
            ;

        $prepare = [
            "u_pw" => $arrUserInfo["pw"]
            ,"u_name" => $arrUserInfo["name"]
            ,"u_no" => $arrUserInfo["no"]
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