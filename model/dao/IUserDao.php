<?php

namespace model\dao;

use model\dao\AbstractDao;
use model\dao\UserDao;
use model\User;
use model\PasswordData;

/**
 * Interface IUserDao
 * @package model\dao
 */
interface IUserDao{

    /**
     * @param User $new_user
     * @return mixed
     */
    public static function register(User $new_user);

    /**
     * @param $email
     * @param $password
     * @return mixed
     */
    public static function login($email , $password);


}