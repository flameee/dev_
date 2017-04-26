<?php

/**
 * Created by PhpStorm.
 * User: Atlantide
 * Date: 06/04/2017
 * Time: 10:09
 */
class users extends tools {

    /*public function listUsers($order_by = "id", $order_method = "ASC"){

        $PDO=$this->conn();
        $q=$PDO->query("SELECT * FROM users WHERE user_level!='666' ORDER BY $order_by $order_method ");
        if($q->rowCount()>0){
            while($row=$q->fetch(PDO::FETCH_ASSOC)){
                $id=$row["id"];
                $username=$row["username"];
                $nome=$row["nome"];
                $cognome=$row["cognome"];
                $user_status=($row["user_status"]==0?"times": "check");
                echo "
                <tr class=''>
                    <th scope='row' class='text-center'>$id</th>
                    <td class='text-center'>$username</td>
                    <td class='text-center'>$nome $cognome</td>
                    <td class='text-center fs-18'><a href='http://localhost/dev/users/details/$id'><i class='fa fa-search' aria-hidden='true'></i> </a> </td>
                    <td class='text-center fs-18'><a><i class='fa fa-$user_status' aria-hidden='true'></i> </a> </td>
                </tr>
                ";
            }
        }
        else{
            return "empty";
        }

    }*/

    public function userDetails($id){
        if($id){
            $PDO=$this->conn();
            $sql="SELECT * FROM users WHERE id = :id";
            $q=$PDO->prepare($sql);
            $q->bindParam(":id", $id, PDO::PARAM_INT);
            $q->execute();
            $user_details="";
            while($row=$q->fetch()){
                $username=$row["username"];
                $password=md5($row["password"]);
                $nome=$row["nome"];
                $cognome=$row["cognome"];
                $email=$row["email"];
                $last_access=$row["last_access"];
                $user_level=$row["user_level"];
                $user_status=$row["user_status"];
                $user_details=array(
                    "nome" => $nome,
                    "cognome" => $cognome,
                    "email" => $email,
                    "username" => $username,
                    "password" => $password,
                    "last_access" => $last_access,
                    "user_level" => $user_level,
                    "user_status" => $user_status
                );
            }
            return $user_details;
        }
        else
            return false;
    }

    public function userUpdate($id){
        $nome=$_POST["nome"];
        $cognome=$_POST["cognome"];
        $email=$_POST["email"];
        $username=$_POST["username"];
        $password=$_POST["password"];
        $user_level=$_POST["user-level"];
        if(isset($_POST["user-status"]))
            $user_status=1;
        else
            $user_status=0;

        $PDO=$this->conn();

        if($password!=""){
            $password=crypt($password,'$5$rounds=5000$ilfioreperfetto$');
            $sql="UPDATE users SET nome = :nome, cognome = :cognome, email = :email, username = :username, password = :password, user_level = :user_level, user_status = :user_status WHERE id = :id";
            $q=$PDO->prepare($sql);
            $q->bindParam(":password", $password, PDO::PARAM_STR,255);
        }
        else{
            $sql="UPDATE users SET nome = :nome, cognome = :cognome, email = :email, username = :username, user_level = :user_level, user_status = :user_status WHERE id = :id";
            $q=$PDO->prepare($sql);
        }
        $q->bindParam(":nome", $nome, PDO::PARAM_STR);
        $q->bindParam(":cognome", $cognome, PDO::PARAM_STR);
        $q->bindParam(":email", $email, PDO::PARAM_STR);
        $q->bindParam(":username", $username, PDO::PARAM_STR);
        $q->bindParam(":user_level", $user_level, PDO::PARAM_INT);
        $q->bindParam(":user_status", $user_status, PDO::PARAM_INT);
        $q->bindParam(":id", $id, PDO::PARAM_INT);
        $q->execute();
        if($q->rowCount()==1)
            return true;
        else
            return false;
    }

    public function userAdd(){
        $username=$_POST["username"];
        $password=$this->createPassword($_POST["password"]);
        $nome=$_POST["nome"];
        $cognome=$_POST["cognome"];
        $email=$_POST["email"];
        $last_access=date("Y-m-d H:i:s");
        $user_level=$_POST["user-level"];
        if(isset($_POST["user-status"]))
            $user_status=1;
        else
            $user_status=0;

        $PDO=$this->conn();

        $stmt=$PDO->prepare("INSERT INTO users (username, password, nome, cognome, email, last_access, user_level, user_status) VALUES(:username, :password, :nome, :cognome, :email, :last_access, :user_level, :user_status)");
        $stmt->execute(array(
            "username"=>$username,
            "password"=>$password,
            "nome"=>$nome,
            "cognome"=>$cognome,
            "email"=>$email,
            "last_access"=>$last_access,
            "user_level"=>$user_level,
            "user_status"=>$user_status
        ));
        return $PDO->lastInsertId();
    }


    public function userDelete($id){
        $PDO=$this->conn();
        if($id!="all"){
            $stmt=$PDO->exec("DELETE FROM users WHERE id = $id");
        }
        else{
            $stmt=$PDO->exec("DELETE FROM users WHERE user_level < '666'");
        }
        if($stmt===0){
            return false;
        }
        else{
            return true;
        }
    }
}