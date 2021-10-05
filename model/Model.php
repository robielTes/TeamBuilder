<?php

abstract class Model
{
    abstract static public function make(array $fields);
    abstract public function create():bool;
    abstract static public function find($id);
    abstract static public function all():array;
    abstract public function save():bool;
    abstract public function delete():bool;
    abstract static public function destroy($id):bool;
}