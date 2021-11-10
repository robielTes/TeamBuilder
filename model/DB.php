<?php

require_once '.env.php';

class DB
{

    public static function connexion(): null|PDO
    {
        try {
            return new PDO("mysql:host=" . PDO_DSN . ";dbname=" . PDO_DB, PDO_USERNAME, PDO_PASSWORD);
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
            return null;

        }

    }

    private static function queryHandler($query, $args): bool|PDOStatement|null
    {
        $pdo = self::connexion();
        if ($pdo != null) {
            $sth = $pdo->prepare($query);
            $sth->execute($args);
            return $sth;
        }
        return null;
    }


    public static function selectMany(string $query, array $args, $class = null): bool|array|null
    {
        $sth = DB::queryHandler($query, $args);

        if ($sth !== null) {
            try {
                if ($class !== null) {
                    $row = $sth->fetchAll(PDO::FETCH_CLASS, $class);
                } else {
                    $row = $sth->fetchAll(PDO::FETCH_ASSOC);
                }
                return $row;
            } catch (PDOException $e) {
                return null;
            }
        }
        return null;
    }

    public static function selectOne(string $query, array $args, $class = null)
    {

        $sth = DB::queryHandler($query, $args);
        if ($sth !== null) {
            try {
                if ($class !== null) {
                    $row = $sth->fetchObject($class);
                } else {
                    $row = $sth->fetch(PDO::FETCH_ASSOC);
                }
                return $row !== false ? $row : null;
            } catch (PDOException $e) {
                return null;
            }
        }
        return null;

    }

    public static function insert(string $query, array $args): ?string
    {
        $pdo = self::connexion();
        if ($pdo != null) {
            $sth = $pdo->prepare($query);
            $sth->execute($args);
            return $pdo->lastInsertId();
        }
        return null;
    }

    public static function execute(string $query, array $args): null|int
    {
        $sth = DB::queryHandler($query, $args);
        if ($sth != null) {
            return $sth->rowCount();
        }
        return null;
    }

}