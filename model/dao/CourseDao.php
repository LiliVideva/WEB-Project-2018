<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 5/11/2018
 * Time: 5:32 PM
 */

namespace model\dao;

use model\Course;

require_once "AbstractDao.php";
require_once "..\Course.php";

class CourseDao extends AbstractDao
{
    public static function getAllCourses() {
        try {
            $courses = array();
            $stmt = self::$pdo->prepare(
                "SELECT course_id, course 
            FROM courses;");
            $stmt->execute();

            while($row = $stmt->fetch(\PDO::FETCH_ASSOC)){
                $course = new Course($row["course_id"],$row["course"]);
                $courses[] = $course;
            }
        }
        catch (\PDOException $e){
            throw $e;
        }
        return $courses;
    }
}