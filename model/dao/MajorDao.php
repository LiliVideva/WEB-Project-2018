<?php

namespace model\dao;

use model\Major;

/**
 * Class MajorDao
 * @package model\dao
 */
class MajorDao extends AbstractDao implements IMajorDao
{
    /**
     * MajorDao constructor.
     */
    public function __construct()
    {
        parent::init();
    }

    /**
     * @return array
     */
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