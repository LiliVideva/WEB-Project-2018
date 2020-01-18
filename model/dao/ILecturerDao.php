<?php

namespace model\dao;

use model\dao\AbstractDao;
use model\dao\LecturerDao;
use model\Lecturer;
use model\Subject;

/**
 * Interface ILecturerDao
 * @package model\dao
 */
interface ILecturerDao
{

    /**
     * @return mixed
     */
    public static function getAllLecturers();

    /**
     * @param $subjectId
     * @return mixed
     */
    public static function getAllSubjectLecturers($subjectId);

    /**
     * @param $lecturerName
     * @param $lecturerTitle
     * @return mixed
     */
    public static function addNewLecturer($lecturerName, $lecturerTitle);
}