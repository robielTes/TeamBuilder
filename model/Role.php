<?php

require 'Model.php';
require 'DB.php';

class Role extends Model
{
    public $id;
    public $slug;
    public $name;


    public function __construct($id, $slug, $name)
    {
        $this->id = $id;
        $this->slug = $slug;
        $this->name = $name;
    }


    static public function make(array $fields) :Role
    {
        return new Role($fields['slug'],$fields['name']);
    }

    public function create(): bool
    {
        if(isset($this->name )&& isset($this->slug)){
            try{
                $res = DB::insert('INSERT INTO roles (slug,name) VALUES (:slug,:name )', ["slug" => $this->slug, "name" => $this->name]);
                $this->id = $res;
                return isset($this->id);
            }

            catch(PDOException $e){
                printf("Connection failed : %s\n", $e->getMessage());
                exit();
            }
        }
        return false;
    }

    static public function find($id)
    {
        return  $res = DB::selectOne("SELECT * FROM roles where id = :id", ["id" => $id]);
    }

    static public function all(): array
    {
        return $res = DB::selectMany("SELECT * FROM roles", []);
    }

    public function save(): bool
    {
        return $res = DB::execute("UPDATE roles set name = :name WHERE id = :id", ["id" => $this->id, "name" => $this->name]);
    }

    public function delete(): bool
    {
        if(isset($this->name )|| isset($this->slug) || isset($this->id)){
            unset($this->slug);
            unset($this->name);
            unset($this->id);

        }
            return true;

    }

    static public function destroy($id): bool
    {
        return  $res = DB::execute(' DELETE FROM roles WHERE id :id', ["id" => $id]);
    }
}