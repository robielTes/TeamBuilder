<?php

require 'Model.php';

class Member extends Model
{
    public $id;
    public $name;
    public $password;
    public $role_id;

    static public function make(array $fields)
    {
        // TODO: Implement make() method.
    }

    public function create(): bool
    {
        // TODO: Implement create() method.
        return false;
    }

    static public function find($id)
    {
        // TODO: Implement find() method.
    }

    static public function all(): array
    {
        // TODO: Implement all() method.
        return [];
    }

    public function save(): bool
    {
        // TODO: Implement save() method.
        return false;
    }

    public function delete(): bool
    {
        // TODO: Implement delete() method.
        return false;
    }

    static public function destroy($id): bool
    {
        // TODO: Implement destroy() method.
        return false;
    }
}