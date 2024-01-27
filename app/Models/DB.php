<?php
namespace App\Models;

use PDO;

class DB{
    public function pdoConnect() {
        $conn = new PDO("mysql:host=".SERVERNAME.";dbname=".DBNAME.";charset=".DBCHARSET,USERNAME,PASS);
        return $conn;
    }

    public function pdo_query($sql) {
        $conn=$this->pdoConnect();
        $stmt=$conn->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll();
    }

    public function pdo_query_one($sql) {
        $conn=$this->pdoConnect();
        $stmt=$conn->prepare($sql);
        $stmt->execute();

        return $stmt->fetch();
    }

    public function pdo_execute($sql) {
        $conn=$this->pdoConnect();
        $stmt=$conn->prepare($sql);
        $stmt->execute();

    }

    public function pdo_execute_lastInsertId($sql) {
        $conn=$this->pdoConnect();
        $stmt=$conn->prepare($sql);
        $stmt->execute();

        return $conn->lastInsertId();
    }
}

?>