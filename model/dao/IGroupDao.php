<?php

namespace model\dao;

use model\dao\AbstractDao;
use model\dao\GroupDao;
use model\Group;

/**
 * Interface IGroupDao
 * @package model\dao
 */
interface IGroupDao
{
    /**
     * @return mixed
     */
    public static function getAllGroups();

    /**
     * @param $groupName
     * @return mixed
     */
    public static function addNewGroup($groupName);
}