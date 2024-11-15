<?php

namespace Web\Gym\lib;

use PDO;
use PDOException;

class Database
{

    private $host, $DB_DATABASE_WEB, $user, $password, $driver, $port;
    private $options = array(
        PDO::SQLSRV_ATTR_DIRECT_QUERY => FALSE,
        PDO::ATTR_EMULATE_PREPARES => FALSE,
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    );

    public function __construct()
    {
        $this->driver =     $_ENV['DB_DRIVER'];
        $this->port =       $_ENV['DB_PORT'];
        $this->host =       $_ENV['DB_HOST'];
        $this->DB_DATABASE_WEB = $_ENV['DB_DATABASE_WEB'];
        $this->user =       $_ENV['DB_USERNAME'];
        $this->password =   $_ENV['DB_PASSWORD'];
    }

    /**
     * conexion para la base de datos 
     */
    public function connect_cdc()
    {
        try {
            $sql = "{$this->driver}:Server={$this->host},{$this->port};Database={$this->DB_DATABASE_WEB};TrustServerCertificate=true";
            $pdo = new PDO($sql, $this->user, $this->password, $this->options);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $pdo;
        } catch (PDOException $e) {
            error_log("Error connection CDC" . $e->getMessage());
        }
    }
}
