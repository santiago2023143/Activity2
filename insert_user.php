<?php

include './user.php';

header('Content-Type: application /json');

class InsertUser extends Database{

    public function Create($params){
        $this->conn();
        if(empty($params['first_name'])){
            return ['message' => 'FisrtName is required'];
        }
        if(empty($params['last_name'])){
            return ['message' => 'LastName is required'];
        }
        if(empty($params['email'])){
            return ['message' => 'Email is required'];
        }
        if(empty($params['password'])){
            return ['message' => 'Password is required'];
        }
        if(empty($params['token'])){
            return ['message' => 'Token is required'];
        }

        $first_name = $params['first_name'];
        $last_name = $params['last_name'];  
        $email = $params['email'];
        $password = $params['password'];
        $token = $params['token'];

        $isInserted = $this->conn->query("INSERT INTO users (first_name, last_name, email, password, token)
        VALUES ('$first_name', '$last_name', '$email', '$password', '$token')
        ");

        if($isInserted){
            return ['message' => 'User Inserted Succesfully'];

        }
    }

    public function getAll(){
        $getAll = $this->conn->query("SELECT * FROM users");

        if($getAll->num_rows > 0)
        $result = $getAll->fetch_all(MYSQLI_ASSOC);
        return $result;
    }

    public function Search($params){
        $this->conn();
        if(empty($params['email'])){
            return ['message' => 'Email is required'];
        }

        $email = $params['email'];
        $isSearch = $this->conn->query("SELECT * FROM users WHERE email = '$email'");

        if($isSearch->num_rows > 0){
            $result = $isSearch->fetch_all(MYSQLI_ASSOC);
            return $result;
        }
    }
}

?>