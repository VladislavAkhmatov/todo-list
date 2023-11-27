<?php
abstract class Config
{

    const HOST = "127.0.0.1";
    const DB_NAME = "auth";
    const DB_USERNAME = "root";
    const DB_PASSWORD = "root";
    protected $db;
    function __construct()
    {
        try {
            $this->db = new PDO("mysql:host=" . self::HOST . ";dbname=" . self::DB_NAME, self::DB_USERNAME, self::DB_PASSWORD);
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Ошибка: " . $e->getMessage();
        }
    }
}
?>