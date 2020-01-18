<?php

namespace model\dao;
use model\Subject;
use model\dao\Lecturer;


/**
 * Class AdminDao
 * @package model\dao
 */
class AdminDao extends UserDao implements IAdminDao {

    /**
     * @param Subject $subject
     */
    public static function saveNewSubject(Subject $subject)
    {

        try {
            self::$pdo->beginTransaction();
            $stmt = self::$pdo->prepare("INSERT INTO subject (name, credits, group_id, type_id) VALUES (?,?,?,?)");
            $params = array($subject->getName(),$subject->getCredits(),$subject->getGroup(),$subject->getType1());
            $stmt->execute($params);

            //get auto generated id of the subject
            $last_id = self::$pdo->lastInsertId();
            $subject->setId($last_id);

            $stmt = self::$pdo->prepare("INSERT INTO workloads (lectures, seminars, practices, subject_id) VALUES (?,?,?,?)");
            $workloads = $subject->getWorkloads();
            $params = array($workloads["lectures"],$workloads["seminars"], $workloads["practices"], $subject->getId());
            $stmt->execute($params);

			$stmt = self::$pdo->prepare("INSERT INTO subject_has_lecturers (subject_id, lecturer_id) VALUES (?,?)");
			$params = array($subject->getId(), $subject->getLecturers());
			$stmt->execute($params);


			$stmt = self::$pdo->prepare("INSERT INTO subject_has_majors (subject_id, major_id, min_course_id) VALUES (?,?,?)");
			$params = array($subject->getId(), $subject->getMajors(), $subject->getCourses());
			$stmt->execute($params);

            self::$pdo->commit();
        }
        catch (\PDOException $e){
            self::$pdo->rollBack();
            throw $e;
        }

    }
}