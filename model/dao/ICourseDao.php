<?php

namespace model\dao;

use model\dao\AbstractDao;
use model\dao\CourseDao;
use model\Course;

/**
 * Interface ICourseDao
 * @package model\dao
 */
interface ICourseDao
{

    /**
     * @return mixed
     */
    public static function getAllCourses();
}