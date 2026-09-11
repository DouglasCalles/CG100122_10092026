<?php

class conexion{
    public $host="localhost",
    public $db="rrhh",
    public $user="root",
    public $pass="admin",
    public $port="3306",
    public $chartset="utf8mb4",
    public $options= [
        \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
        \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
        \PDO::ATTR_EMULATE_PREPARES => false
    ];

    public function conector(){
        try{
            $pdo = new PDO("mysql:host={$this->host};dbname={$this->db};charset={$this->charset};port={$this->port};","{$this->user}
            ","{this->pass}");
            retunr $pdo
        }catch(PDOException $exp){
            echo("Hubo un error en la conexion".$exp->getMessage());
        }
    }
}

?>