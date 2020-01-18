<?php

namespace model\dao;

use model\dao\AbstractDao;
use model\dao\TypeDao;
use model\Type;


/**
 * Interface ITypeDao
 * @package model\dao
 */
interface ITypeDao
{

    /**
     * @return mixed
     */
    public static function getAllTypes();
}