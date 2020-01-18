<?php

namespace model\dao;

use model\Subject;
use model\dao\TypeDao;
use model\dao\GroupDao;

/**
 * Class SubjectDao
 * @package model\dao
 */
class SubjectDao extends AbstractDao implements ISubjectDao
{
    /**
     * SubjectDao constructor.
     */
    public function __construct()
    {
        parent::init();
    }


    /**
     * @param $type
     * @param $major
     * @param $course
     * @param $group
     * @param $lecturer
     * @param $sort
     * @return array
     */
    public static function getSubjects($type, $major, $course, $group, $lecturer, $sort)
    {
        try {
            $subjects = [];
            $workloads = [];
            $lecturers= [];
            $params = [];
            $sql =  "SELECT s.subject_id, s.name as name, t.name as type, m.name as major, c.course as course, g.name as groups,
                      w.lectures as lectures, w.seminars as seminars, w.practices as practices, s.credits as credits, 
                      tt.name as title, l.name as lecturer
                      FROM subject as s
                      JOIN types as t ON s.type_id = t.type_id
                      JOIN subject_has_majors as shm ON s.subject_id = shm.subject_id 
						LEFT JOIN majors as m ON shm.major_id=m.major_id
						LEFT JOIN courses as c ON shm.min_course_id=c.course_id
                      JOIN groups as g ON s.group_id = g.group_id 
                      JOIN workloads as w ON s.subject_id=w.subject_id
                      JOIN subject_has_lecturers as shl ON s.subject_id=shl.subject_id
						LEFT JOIN lecturers as l  ON shl.lecturer_id=l.lecturer_id
                        LEFT JOIN titles as tt ON l.title_id=tt.title_id
                      WHERE t.type_id = ? AND m.major_id LIKE ? AND c.course_id LIKE ? AND g.group_id LIKE ? AND l.lecturer_id LIKE ?";

              if ($sort == "type") {
                $sql .= " ORDER BY t.name ASC";
              }elseif ($sort == "major"){
                $sql .= " ORDER BY m.name ASC";
              }elseif ($sort == "course"){
                $sql .= " ORDER BY c.course ASC";
              }elseif ($sort == "group"){
                $sql .= " ORDER BY g.name ASC";
              }elseif ($sort == "lecturer"){
                $sql .= " ORDER BY l.name ASC";
              }else {
                $sql .= " ORDER BY s.name ASC";
              }
			  
			   if ($major == "none") {
                $major = "%";
              }
			  if ($course == "none"){
                $course = "%";
              }
			  if ($group == "none"){
                $group = "%";
              }
			  if ($lecturer == "none"){
                $lecturer = "%";
              }

            $stmt = self::$pdo->prepare($sql);

            $stmt->execute(array($type,$major,$course,$group,$lecturer));
            /*While ($query_result = $stmt->fetch(\PDO::FETCH_ASSOC)) {
                $name=$query_result["name"];
                $type=$query_result["type"];
                $majors=$query_result["major"];
                $courses=$query_result["course"];
                $group=$query_result["groups"];

                $workloads[]=$query_result["lectures"];
                $workloads[]=$query_result["seminars"];
                $workloads[]=$query_result["practices"];

                $credits=$query_result["credits"];

                $lecturers[]=$query_result["title"];
                $lecturers[]=$query_result["lecturer"];

                $subjects = new Subject($name,$type,$majors,$courses,$group,$workloads,$credits,$lecturers);
            }*/
			
			$subjects = $stmt->fetchAll(\PDO::FETCH_ASSOC);

            return $subjects;

        } catch (\PDOException $e) {
            throw $e;
        }
    }

}