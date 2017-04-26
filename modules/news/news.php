<?php

/**
 * Created by PhpStorm.
 * User: Atlantide
 * Date: 05/04/2017
 * Time: 12:58
 */
class news extends tools {
    public function listUser(){
        $conn=$this->conn();
        $username="matteo.mocera@gmail.com";
        $sql="SELECT * FROM users WHERE username = :username";
        $q=$conn->prepare($sql);
        $q->bindParam(":username", $username, PDO::PARAM_STR);
        $q->execute();
        /*while($row=$q->fetch()){
            $username=$row;
            echo $row["username"];
        }*/
        echo $q->rowCount();
    }
}