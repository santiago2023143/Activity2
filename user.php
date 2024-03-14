<?php
include 'database/db.php';

class User extends Database{

    public function getAll(){

        $this->conn();
        $sql = $this->conn->query("SELECT * FROM users");
        $data = $sql->fetch_all(MYSQLI_ASSOC);
        return $data;

    }

}



?>