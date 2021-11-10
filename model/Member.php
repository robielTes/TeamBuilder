<?php

require_once 'model/DB.php';
require_once 'model/Team.php';

class Member
{

    public int $id;
    public string $name;
    public string $password;
    public int $role_id;

    public function __construct(array $args = [])
    {
        if ($args !== []) {
            $this->name = $args['name'];
            $this->password = $args['password'];
            $this->role_id = $args['role_id'];
        }
    }

    public static function make(array $fields = null): Member
    {
        return new Member($fields);
    }

    public function create(): bool
    {
        try {
            if (isset($this->name) && isset($this->password) && isset($this->role_id)) {
                $lastInsertId = DB::insert('INSERT INTO `members` (name,password,role_id) VALUES (:name,:password,:role_id )', ["name" => $this->name, "password" => $this->password, "role_id" => $this->role_id]);
                $this->id = $lastInsertId;
                return true;
            }
        } catch (PDOException $e) {
            //echo $e->getMessage();
        }
        return false;
    }

    public static function find(int $id): null|Member
    {
        return DB::selectOne("SELECT * FROM `members` WHERE id = :id", ["id" => $id], Member::class);
    }

    static public function where(string $key, $value): array
    {
        $sql = "SELECT * FROM `members` WHERE $key = :value;";
        return DB::selectMany($sql, ["value" => $value], Member::class);
    }

    public static function all(): bool|array|null
    {
        return DB::selectMany("SELECT * FROM `members`", [], Member::class);
    }

    public function save(): bool
    {
        try {
            if ($this->id != null) {
                $sql = "UPDATE `members` SET ";
                if ($this->name != null) {
                    $sql .= " `name` = :name,";
                }
                if ($this->password != null) {
                    $sql .= " `password` = :password,";
                }
                if ($this->role_id != null) {
                    $sql .= " `role_id` = :role_id,";
                }
                $sql = substr($sql, 0, -1);
                $sql .= " WHERE id = :id;";

                $res = DB::execute($sql,
                    ["id" => $this->id, "name" => $this->name, "password" => $this->password, "role_id" => $this->role_id]);
                return true;
            }
        } catch (PDOException $e) {
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
            DB::execute(' DELETE FROM `members` WHERE id = :id', ["id" => $id]);
            return true;
        } catch (PDOException $e) {
            //echo $e->getMessage();
        }
            return false;

    }

    public function teams()
    {
        return $res = DB::selectMany("SELECT `teams`.* FROM `members`
                                     INNER JOIN `team_member` ON `team_member`.member_id = `members`.id 
                                     INNER JOIN `teams` ON `teams`.id = team_member.team_id
                                     WHERE `members`.id = :id ", ["id" => $this->id]);

    }

}