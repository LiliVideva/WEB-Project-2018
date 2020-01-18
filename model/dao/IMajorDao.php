<?php

namespace model\dao;

use model\dao\AbstractDao;
use model\dao\MajorDao;
use model\Major;

/**
 * Interface IMajorDao
 * @package model\dao
 */
interface IMajorDao
{
    /**
     * @return mixed
     */
    public static function getAllMajors();

    /**
     * @param $majorName
     * @return mixed
     */
    public static function addNewMajor($majorName);
}