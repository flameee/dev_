<?php

/**
 * Created by PhpStorm.
 * User: Atlantide
 * Date: 05/04/2017
 * Time: 13:15
 */
class tools{
    public function conn(){
        $dsn = "mysql:dbname=dev_;host=localhost";
        $user = "root";
        $password="flamenco1984";
        try{
            $PDO=new PDO($dsn, $user, $password);
            $PDO->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
            $PDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        catch (PDOException $e){
            echo "Connessione fallita: <b>". $e->getMessage()."</b>";
        }
        return $PDO;
    }


    public function isVerified($username, $password){
        $PDO=$this->conn();
        $sql="SELECT * FROM users WHERE username = :username AND password = :password";
        $q=$PDO->prepare($sql);
        $q->bindParam(":username", $username, PDO::PARAM_STR);
        $q->bindParam(":password", $password, PDO::PARAM_STR);
        $q->execute();
        if($q->rowCount()==1){
            //Utente trovato
            return true;
        }
        else{
            //Utente non trovato
            return false;
        }
    }

    public function checkLogin($username, $password){
        $PDO=$this->conn();
        //$password=crypt($password,'$5$rounds=5000$ilfioreperfetto$');
        $sql="SELECT * FROM users WHERE username = :username AND password = :password";
        $q=$PDO->prepare($sql);
        $q->bindParam(":username", $username, PDO::PARAM_STR);
        $q->bindParam(":password", $password, PDO::PARAM_STR);
        $q->execute();
        $datiUtente = $q->fetch();
        if($q->rowCount()==1){
            $_SESSION["loginUserID"]=$datiUtente["id"];
            $_SESSION["loginUsername"]=$datiUtente["username"];
            $_SESSION["loginPassword"]=$datiUtente["password"];
            $_SESSION["loginLivello"]=$datiUtente["user_level"];
            return true;
        }
    }

    public function createPassword($password){
        return crypt($password,'$5$rounds=5000$ilfioreperfetto$');
    }

    public function quickStatusChange($id, $table, $status, $control_field){
        $PDO=$this->conn();
        $sql="UPDATE $table SET :control_field = :status WHERE id = :id";
        $q=$PDO->prepare($sql);
        $q->bindParam(":status", $status, PDO::PARAM_STR,255);
        $q->bindParam(":control_field", $control_field, PDO::PARAM_STR,255);

        $q->bindParam(":id", $id, PDO::PARAM_STR,255);
        $q->execute();
        return "ok";
    }
}