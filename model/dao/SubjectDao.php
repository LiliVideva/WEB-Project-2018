<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 5/11/2018
 * Time: 6:29 PM
 */

namespace model\dao;

use model\Lecturer;
use model\Subject;
use model\Workload;

require_once "AbstractDao.php";
require_once "..\Subject.php";

class SubjectDao extends AbstractDao
{

    public static function getAllSubjects(){

    }

    //function to add new subject --> add data in 4 tables with transaction
    //parameter --> object Subject with everything except id
    public static function addNewSubject(Subject $subject) {
        try {
            self::$pdo->beginTransaction();
            $stmt = self::$pdo->prepare("INSERT INTO subjects (name, credits, group_id, type_id) VALUES (?,?,?,?)");
            $params = array($subject->getName(),$subject->getCredits(),$subject->getGroupId(),$subject->getTypeId());
            $stmt->execute($params);

            //get auto generated id of the subject
            $last_id = self::$pdo->lastInsertId();
            $subject->setId($last_id);

            $stmt = self::$pdo->prepare("INSERT INTO workloads (lectures, seminars, practices, subject_id) VALUES (?,?,?,?)");
            $workload = $subject->getWorkloads();
            $params = array($workload->getLectures(),$workload->getSeminars(), $workload->getPractices(), $subject->getId());
            $stmt->execute($params);

            foreach ($subject->getLecturers() as $lecturer) {
                $stmt = self::$pdo->prepare("INSERT INTO subject_has_lecturers (subject_id, lecturer_id) VALUES (?,?)");
                $params = array($subject->getId(), $lecturer->getId());
                $stmt->execute($params);
            }

            foreach ($subject->getMajors() as $majorInfo) {

                $majorId = $majorInfo["major"];//only major id
                $minCourse = $majorInfo["minCourse"];//only course id
                $onlyCourse = $majorInfo["onlyCourse"];//only course id

                if((!(is_null($minCourse)))&&is_null($onlyCourse)){
                    $stmt = self::$pdo->prepare("INSERT INTO subject_has_majors (subject_id, major_id, min_course_id) VALUES (?,?)");
                    $params = array($subject->getId(), $majorId, $minCourse);
                    $stmt->execute($params);
                }
                else if((!(is_null($onlyCourse)))&&is_null($minCourse)){
                    $stmt = self::$pdo->prepare("INSERT INTO subject_has_majors (subject_id, major_id, only_course_id) VALUES (?,?)");
                    $params = array($subject->getId(), $majorId, $onlyCourse);
                    $stmt->execute($params);
                }

            }

            self::$pdo->commit();
        }
        catch (\PDOException $e){
            self::$pdo->rollBack();
            throw $e;
        }
    }

}