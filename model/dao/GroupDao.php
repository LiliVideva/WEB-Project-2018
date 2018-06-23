<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 5/11/2018
 * Time: 6:17 PM
 */

namespace model\dao;

use model\Group;

require_once "AbstractDao.php";
require_once "..\Group.php";

class GroupDao extends AbstractDao
{

    public static function getAllGroups() {
        try {
            $groups = array();
            $stmt = self::$pdo->prepare(
                "SELECT group_id, name 
            FROM groups;");
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