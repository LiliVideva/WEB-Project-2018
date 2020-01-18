<?php

namespace model\dao;

use model\Group;

/**
 * Class GroupDao
 * @package model\dao
 */
class GroupDao extends AbstractDao implements IGroupDao
{
    /**
     * GroupDao constructor.
     */
    public function __construct() {
        parent::init();
    }

    /**
     * @return array|mixed
     */
    public static function getAllGroups() {
        try {
            $groups = array();
            $stmt = self::$pdo->prepare(
                "SELECT group_id, name 
            FROM groups");
            $stmt->execute();

            while($row = $stmt->fetch(\PDO::FETCH_ASSOC)){
                $group = new Group($row["group_id"],$row["name"]);
                $groups[] = $group;
            }
        }
        catch (\PDOException $e){
            throw $e;
        }
        return $groups;
    }

    /**
     * @param $groupName
     */
    public static function addNewGroup($groupName){
        $stmt = self::$pdo->prepare(
            "INSERT INTO groups (name) VALUES (?)");
        $stmt->execute(array(
            $groupName
        ));
    }

}