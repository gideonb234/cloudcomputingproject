<?php

include '../error-enable.php';

use PDO;

class CloudSql
{
    private $mysqlinfo = "mysql:host=173.194.235.165;port=3306;dbname=mydb";
    private $username = "dbaccess";
    private $password = "1234567890";

    public function newConnection()
    {
        $pdo = new PDO($this->mysqlinfo, $this->username, $this->password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        return $pdo;
    }

    public function create($query, $item)
    {
        $pdo = $this->newConnection();
        $statement = $pdo->prepare($query);
        $statement->execute($item);
        return $pdo->lastInsertId();
    }

}
?>
