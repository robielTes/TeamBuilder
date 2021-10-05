<?php

require 'Model.php';
require 'model/DB.php';

class Member extends Model
{
    public $id;
    public $name;
    public $password;
    public $role_id;

    /**
     * @param $id
     * @param $name
     * @param $password
     * @param $role_id
     */
    public function __construct($id, $name, $password, $role_id)
    {
        $this->id = $id;
        $this->name = $name;
        $this->password = $password;
        $this->role_id = $role_id;
    }


    static public function make(array $fields):Member
    {
        return new Role($fields['slug'],$fields['password'],$fields['role_id']);
    }

    public function create(): bool
    {
        if(isset($this->name )&& isset($this->password) && isset($this->role_id)){
                $res = DB::insert('INSERT INTO members (name,passwprd,role_id) VALUES (:name,:password,:role_id )', ["name" => $this->name, "password" => $this->password,"role_id" =>$this->role_id]);
                $this->id = $res;
                return isset($this->id);
        }
        return false;
    }

    static public function find($id)
    {
        return  $res = DB::selectOne("SELECT * FROM members where id = :id", ["id" => $id]);
    }

    static public function all(): array
    {
        return $res = DB::selectMany("SELECT * FROM members", []);
    }

    public function save(): bool
    {
        //!
        return $res = DB::execute("UPDATE members set name = :name WHERE id = :id", ["id" => $this->id, "name" => $this->name]);
    }

    public function delete(): bool
    {
        if(isset($this->name )|| isset($this->password) || isset($this->role_id) || isset($this->id)){
            unset($this->name);
            unset($this->password);
            unset($this->role_id);
            unset($this->id);

        }
        return true;
    }

    static public function destroy($id): bool
    {
        //!
        return  $res = DB::execute(' DELETE FROM roles WHERE id :id', ["id" => $id]);
    }
}