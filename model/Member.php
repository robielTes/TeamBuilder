<?php

require_once 'model/DB.php';

class Member
{

    public $id;
    public $name;
    private $password;
    public $role_id;

    public function __construct($id, $name, $password, $role_id)
    {
        $this->id = $id;
        $this->name = $name;
        $this->password = $password;
        $this->role_id = $role_id;
    }

    static public function make($fields) : Member
    {
       if (is_array($fields)){
            $res = DB::selectMany("SELECT id FROM `members` order by id desc limit 1", []);
           return new Member($res[0]->id,$fields['name'], $fields['password'], $fields['role_id']);
        }

        return new Member($fields->id,$fields->name, $fields->password, $fields->role_id);
    }

    public function create() :bool
    {
        try {
            if (isset($this->name) && isset($this->password) && isset($this->role_id)) {
                DB::insert('INSERT INTO `members` (name,password,role_id) VALUES (:name,:password,:role_id )', ["name" => $this->name, "password" => $this->password, "role_id" => $this->role_id]);
                return true;
            }
        } catch (PDOException $e){
           // echo $e->getMessage();
            return false;
        }
    }

    static public function find($id): null|Member
    {
        $select = DB::selectOne("SELECT * FROM `members` WHERE id = :id", ["id" => $id]);
        if($select != null){
            return self::make($select);
        }
        return null;
    }


    static public function where($key, $value):array
    {
        $sql = "SELECT * FROM `members` WHERE $key = :value;";
        return DB::selectMany($sql, ["value" => $value]);
    }


    static public function all():array
    {
        return $res = DB::selectMany("SELECT * FROM `members`", []);
    }

    public function save():bool
    {
        try {
            if($this->id != null){
                $sql = "UPDATE `members` SET ";
                if($this->name != null){
                    $sql .= " `name` = :name,";
                }
                if($this->password!= null){
                    $sql .= " `password` = :password,";
                }
                if($this->role_id  != null){
                    $sql .= " `role_id` = :role_id,";
                }
                $sql = substr($sql,0,-1);
                $sql .= " WHERE id = :id;";

                 $res = DB::execute( $sql,
                    ["id" => $this->id, "name" => $this->name, "password" => $this->password, "role_id" => $this->role_id]);
                return true;
            }
        } catch (\PDOException $e) {
            //echo $e->getMessage();
            return false;
        }
    }

    public function delete(): bool
    {

        return self::destroy($this->id);
    }

    static public function destroy($id): bool
    {
        try {
             DB::execute(' DELETE FROM `members` WHERE id = :id', ["id" => $id]);
            return true;
        } catch (\PDOException $e) {
            //echo $e->getMessage();
            return false;
        }

    }

    public function teams()
    {

    }


}