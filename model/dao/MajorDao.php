<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 5/11/2018
 * Time: 6:25 PM
 */

namespace model\dao;

use model\Major;

require_once "AbstractDao.php";
require_once "..\Major.php";

class MajorDao extends AbstractDao
{

    public static function getAllMajors() {
        try {
            $majors = array();
            $stmt = self::$pdo->prepare(
                "SELECT major_id, name 
            FROM majors;");
            $stmt->execute();

            while($row = $stmt->fetch(\PDO::FETCH_ASSOC)){
                $major = new Major($row["major_id"],$row["name"]);
                $majors[] = $major;
            }
        }
        catch (\PDOException $e){
            throw $e;
        }
        return $majors;
    }

    /**
     * @param $majorName
     */
    public static function addNewMajor($majorName){
        $stmt = self::$pdo->prepare(
            "INSERT INTO majors (name) VALUES (?)");
        $stmt->execute(array(
            $majorName
        ));
    }

}