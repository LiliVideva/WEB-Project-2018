<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 5/11/2018
 * Time: 5:53 PM
 */

namespace model\dao;
use model\Lecturer;

require_once "AbstractDao.php";
require_once "..\Lecturer.php";

class LecturerDao extends AbstractDao
{

    public static function getAllLecturers() {
        try {
            $lecturers = array();
            $stmt = self::$pdo->prepare(
                "SELECT l.lecturer_id as id, l.name as name, t.name as title 
                FROM lecturers as l 
                LEFT JOIN titles as t ON l.title_id=t.title_id
                ORDER BY l.name;");
            $stmt->execute();

            while($row = $stmt->fetch(\PDO::FETCH_ASSOC)){
                $lecturer = new Lecturer($row["id"],$row["name"],$row["title"]);
                $lecturers[] = $lecturer;
            }
        }
        catch (\PDOException $e){
            throw $e;
        }
        return $lecturers;
    }

    public static function getAllSubjectLecturers($subjectId) {
        try {
            $lecturers = array();
            $stmt = self::$pdo->prepare(
                "SELECT l.lecturer_id as id, l.name as name, t.name as title 
                FROM subject_has_lecturers as sl
                JOIN lecturers as l ON sl.lecturer_id=l.lecturer_id
                LEFT JOIN titles as t ON l.title_id=t.title_id
                WHERE sl.subject_id = ?
                ORDER BY l.name;");
            $stmt->execute(array($subjectId));

            while($row = $stmt->fetch(\PDO::FETCH_ASSOC)){
                $lecturer = new Lecturer($row["id"],$row["name"],$row["title"]);
                $lecturers[] = $lecturer;
            }
        }
        catch (\PDOException $e){
            throw $e;
        }
        return $lecturers;
    }

    /**
     * @param $lecturerName
     * @param $lecturerTitle
     */
    public static function addNewLecturer($lecturerName, $lecturerTitle){
        $stmt = self::$pdo->prepare(
            "INSERT INTO lecturers (name, title_id) VALUES (?, ?)");
        $stmt->execute(array(
            $lecturerName,
            $lecturerTitle
        ));
    }

}