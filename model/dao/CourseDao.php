<?php

namespace model\dao;

use model\Course;


/**
 * Class CourseDao
 * @package model\dao
 */
class CourseDao extends AbstractDao implements ICourseDao
{
    /**
     * CourseDao constructor.
     */
    public function __construct()
    {
        parent::init();
    }

    /**
     * @return array
     */
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