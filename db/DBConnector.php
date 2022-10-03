<?php
class DBConnector
{
    private static ?DBConnector $instance = null;
    private static $config;
    private static ?PDO $connection;

    public static function GetInstance(): DBConnector 
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    private function __construct()
    {
        self::$config = require __DIR__. '/../conf/config.php';
        self::$connection = self::CreateConnection(self::$config);
    }

    public function GetConnection(): PDO
    {
        if (!self::$connection) {
            self::$connection = self::CreateConnection(self::$config);
        }
        return self::$connection;
    }

    private static function CreateConnection($config): PDO {
        $dsn = 'mysql:dbname='.$config['db_name']
                .';host='.$config['db_host'];

        $pdo = new PDO($dsn, $config['db_user'], $config['db_pass']);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        return $pdo;
    }
}