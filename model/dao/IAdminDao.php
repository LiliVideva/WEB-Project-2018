<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 4/15/2018
 * Time: 10:32 AM
 */

namespace model\dao;


use model\Subject;

/**
 * Interface IAdminDao
 * @package model\dao
 */
interface IAdminDao{

    /**
     * @param Subject $subject
     * @return mixed
     */
    public static function saveNewSubject(Subject $subject);

}