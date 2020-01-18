<?php

namespace model\dao;

/**
 * Interface ISubjectDao
 * @package model\dao
 */
interface ISubjectDao
{

    /**
     * @param $type
     * @param $major
     * @param $course
     * @param $group
     * @param $lecturer
     * @param $sort
     * @return mixed
     */
    public static function getSubjects($type, $major, $course, $group, $lecturer, $sort);

}