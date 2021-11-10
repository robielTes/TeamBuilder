<?php

require_once 'model/DB.php';

class State
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

    public static function make($fields = null): State
    {
        return new State($fields);
    }

    public function create(): bool
    {
        try {
            if (isset($this->slug) && isset($this->name)) {
                $lastInsertId = DB::insert('INSERT INTO `states` (slug,name) VALUES (:slug,:name)', ["slug" => $this->slug, "name" => $this->name]);
                $this->id = $lastInsertId;
                return true;
            }
        } catch (PDOException $e) {
//            echo $e->getMessage();
        }
        return false;

    }

    public static function find($id): null|State
    {
        return DB::selectOne("SELECT * FROM `states` where id = :id", ["id" => $id], State::class);
    }

    public static function all(): bool|array|null
    {
        return DB::selectMany("SELECT * FROM `states`", [], State::class);
    }

    public function save(): bool
    {
        try {
            if ($this->id != null) {
                $sql = "UPDATE `states` SET ";
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
//            echo $e->getMessage();
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
            DB::execute(' DELETE FROM `states` WHERE id = :id', ["id" => $id]);
            return true;
        } catch (\PDOException $e) {
//            echo $e->getMessage();
        }
        return false;
    }
}