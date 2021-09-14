<?php

class DB
{
    protected  $PDO;
    protected static $_instance = null;

    public function __construct($file = '.././env.ini')
    {
        $parse = parse_ini_file($file, true);

        $servername = $parse['PDO_DSN'];
        $username = $parse['PDO_USERNAME'];
        $password = $parse['PDO_PASSWORD'];
        $db = $parse['PDO_DB'];

        $this->PDO = new PDO("mysql:host=$servername;dbname=$db", $username, $password);
    }

    protected static function instance()
    {
        if(is_null(self::$_instance)){
            $class = __CLASS__;
            self::$_instance = new $class();
        }
        return self::$_instance;
    }


    public static function selectMany($query,$option)
    {
        $sth =  self::instance()->PDO->prepare($query);
        $sth->execute($option);
        return $sth->fetchAll();
    }

    public static function selectOne($query,$option)
    {
        $sth = self::instance()->PDO->prepare($query);
        $sth->execute($option);
        return $sth->fetchAll();
    }

    public static function insert($query,$option)
    {
        $sth = self::instance()->PDO->prepare($query);
        $sth->execute($option);
        $sth->fetchAll();
        return $sth->rowCount();
    }

    public static function execute($query,$option)
    {
        $sth =  self::instance()->PDO->prepare($query);
        $sth->execute($option);
        $sth->fetchAll();
        return $sth->rowCount();
    }


}