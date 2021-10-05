<?php

require 'Model.php';

class Team extends Model
{

    public $id;
    public $name;
    public $state_id;


    public function __construct($id, $name, $state_id)
    {
        $this->id = $id;
        $this->name = $name;
        $this->state_id = $state_id;
    }

    static public function make(array $fields) :Team
    {
        return new Team($fields['name'],$fields['state_id']);
    }

    public function create(): bool
    {
        if(isset($this->name )&& isset($this->state_id)){
            try{
                $res = DB::insert('INSERT INTO teams (name,state_id) VALUES (:name,:state_id )', ["name" => $this->name, "state_id" => $this->state_id]);
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
        return  $res = DB::selectOne("SELECT * FROM teams where id = :id", ["id" => $id]);
    }

    static public function all(): array
    {
        return $res = DB::selectMany("SELECT * FROM teams", []);
    }

    public function save(): bool
    {
        //!
        return $res = DB::execute("UPDATE teams set name = :name WHERE id = :id", ["id" => $this->id, "name" => $this->name]);
    }

    public function delete(): bool
    {
        if(isset($this->id )|| isset($this->name) || isset($this->state_id)){
            unset($this->id);
            unset($this->name);
            unset($this->state_id);

        }
        return true;

    }

    static public function destroy($id): bool
    {
        return  $res = DB::execute(' DELETE FROM teams WHERE id :id', ["id" => $id]);
    }
}