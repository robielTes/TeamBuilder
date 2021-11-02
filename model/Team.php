<?php

require_once 'model/DB.php';

class Team
{

    public $id;
    public $name;
    public $state_id;

    public function __construct($id = null, $name = null, $state_id = null)
    {
        $this->id = $id;
        $this->name = $name;
        $this->state_id = $state_id;
    }

    static public function make($fields): Team
    {
        if (is_array($fields)) {
            $res = DB::selectMany("SELECT id FROM `teams` order by id desc limit 1", []);
            return new Team($res[0]->id, $fields['name'], $fields['state_id']);
        }
        return new Team($fields->id, $fields->name, $fields->state_id);
    }

    public function create(): bool
    {
        try {
            if (isset($this->name) && isset($this->state_id)) {
                DB::insert('INSERT INTO `teams` (name,state_id) VALUES (:name,:state_id)',
                    ["name" => $this->name, "state_id" => $this->state_id]);
                return true;
            }
        } catch (PDOException $e) {
            //echo $e->getMessage();
            return false;
        }

    }

    static public function find($id): null|Team
    {
        $select = DB::selectOne("SELECT * FROM `teams` where id = :id", ["id" => $id]);
        if ($select != null) {
            return self::make($select);
        }
        return null;
    }

    static public function all(): array
    {
        return $res = DB::selectMany("SELECT * FROM `teams`", []);
    }

    public function save(): bool
    {
        try {
            if ($this->id != null) {
                $sql = "UPDATE `teams` SET ";
                if ($this->name != null) {
                    $sql .= " `name` = :name,";
                }
                if ($this->state_id != null) {
                    $sql .= " `state_id` = :state_id,";
                }
                $sql = substr($sql, 0, -1);
                $sql .= " WHERE id = :id;";

                $res = DB::execute($sql,
                    ["id" => $this->id, "name" => $this->name, "state_id" => $this->state_id]);
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
            DB::execute(' DELETE FROM `teams` WHERE id = :id', ["id" => $id]);
            return true;
        } catch (\PDOException $e) {
            //echo $e->getMessage();
            return false;
        }
    }


}

/*
    public function members()
    {
        $query  = sprintf("SELECT %s.* ", Member::$table);
        $query .= sprintf("FROM %s ", static::$table);
        $query .= sprintf("INNER JOIN team_member ON team_member.team_id = %s.id ", static::$table);
        $query .= sprintf("INNER JOIN %s ON %s.id = team_member.member_id ", Member::$table, Member::$table);
        $query .= sprintf("WHERE %s.id = :id ", static::$table);
        $query .= sprintf("ORDER BY %s.name;", Member::$table);

        $connector = DB::getInstance();
        return $connector->selectMany($query, ["id" => $this->id], Member::class);
    }

    public function captain()
    {
        $query  = sprintf("SELECT `%s`.name ", Member::$table);
        $query .= sprintf("FROM `team_member` ");
        $query .= sprintf("INNER JOIN %s ON %s.id = team_member.member_id ", Member::$table, Member::$table);
        $query .= sprintf("WHERE `team_member`.team_id = :id ");
        $query .= sprintf("AND team_member.is_captain = 1;");

        $connector = DB::getInstance();
        return $connector->selectOne($query, ["id" => $this->id], Member::class);
    }

    public function setCaptain(int $user_id)
    {
        $query  = "INSERT INTO `team_member` ";
        $query .= "SET member_id = :member_id, team_id = :team_id, membership_type = :membership_type, is_captain = :is_captain; ";

        $connector = DB::getInstance();
        return $connector->execute($query, [
            "member_id" => $user_id,
            "team_id" => $this->id,
            "membership_type" => 1,
            "is_captain" => 1
        ]);
    }

    public function eligibleMembers()
    {
        $members = $this->members();
        $membersIds = array_map(function($member)
        {
            return $member->id;
        }, $members
        );

        $query  = sprintf("SELECT DISTINCT %s.*, COUNT(*) AS memberships ", Member::$table);
        $query .= sprintf("FROM %s ", Member::$table);
        $query .= sprintf("INNER JOIN team_member ON team_member.member_id = %s.id ", Member::$table);
        $query .= sprintf("WHERE team_member.member_id NOT IN (");
        foreach ($membersIds as $memberId) {
            $query .= "$memberId,";
        }
        $query = substr($query, 0, -1);
        $query .= ") ";
        $query .= sprintf("GROUP BY team_member.member_id ");
        $query .= sprintf("HAVING memberships < %d ", MAX_MEMBERSHIP);
        $query .= sprintf("ORDER BY %s.name;", Member::$table);

        $connector = DB::getInstance();
        return $connector->selectMany($query, [], Member::class);
    }

    public function addMember(int $id)
    {
        $query  = "INSERT INTO `team_member` ";
        $query .= "SET member_id = :member_id, team_id = :team_id, membership_type = :membership_type, is_captain = :is_captain; ";

        $connector = DB::getInstance();
        return $connector->execute($query, [
            "member_id" => $id,
            "team_id" => $this->id,
            "membership_type" => 1,
            "is_captain" => 0
        ]);
    }

    public function isMemberEligible(int $id): bool
    {
        $query  = "SELECT TRUE ";
        $query .= "FROM team_member ";
        $query .= "WHERE member_id = :member_id ";
        $query .= "GROUP BY member_id ";
        $query .= sprintf("HAVING COUNT(*) < %d;", MAX_MEMBERSHIP);

        $result = null;
        $connector = DB::getInstance();

        $result = $connector->selectOne($query, ["member_id" => $id]);

        // is result is empty, is means that the database returned nothing
        return !($result === null);
    }*/