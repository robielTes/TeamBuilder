<?php

require_once 'model/DB.php';

class Role
{

    public int $id;
    public string $slug;
    public string $name;

    public function __construct(array $args = [])
    {
        if ($args !== []) {
            $this->slug = $args['slug'];
            $this->name = $args['name'];
        }
    }

    public static function make(array $fields = null): Role
    {
        return new Role($fields);
    }

    public function create(): bool
    {
        try {
            if (isset($this->slug) && isset($this->name)) {
                $lastInsertId = DB::insert('INSERT INTO `roles` (slug,name) VALUES (:slug,:name)', ["slug" => $this->slug, "name" => $this->name]);
                $this->id = $lastInsertId;
                return true;
            }
        } catch (PDOException $e) {
            //echo $e->getMessage();
        }
        return false;
    }

    public static function find($id): null|Role
    {
        return DB::selectOne("SELECT * FROM `roles` where id = :id", ["id" => $id], Role::class);
    }

    public static function all(): bool|array|null
    {
        return DB::selectMany("SELECT * FROM `roles`", [], Role::class);
    }

    public function save(): bool
    {
        try {
            if ($this->id != null) {
                $sql = "UPDATE `roles` SET ";
                if ($this->slug != null) {
                    $sql .= " `slug` = :slug,";
                }
                if ($this->name != null) {
                    $sql .= " `name` = :name,";
                }
                $sql = substr($sql, 0, -1);
                $sql .= " WHERE id = :id;";

                $res = DB::execute($sql,
                    ["id" => $this->id, "slug" => $this->slug, "name" => $this->name]);
                return true;
            }
        } catch (\PDOException $e) {
            //echo $e->getMessage();
        }
        return false;
    }

    public function delete(): bool
    {
        return self::destroy($this->id);
    }

    public static function destroy($id): bool
    {
        try {
            DB::execute(' DELETE FROM `roles` WHERE id = :id', ["id" => $id]);
            return true;
        } catch (\PDOException $e) {
//            echo $e->getMessage();
        }
        return false;
    }
}