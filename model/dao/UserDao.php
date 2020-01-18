<?php

namespace model\dao;

use model\User;

/**
 * Class UserDao
 * @package model\dao
 */
class UserDao extends AbstractDao implements IUserDao {

    /**
     * UserDao constructor.
     */
    public function __construct() {
        parent::init();
    }

    /**
     * @param User $new_user
     * @return mixed|User
     */
    public static function register(User $new_user){
        $stmt = self::$pdo->prepare(
            "INSERT INTO users (email, first_name, last_name, password, type_id, is_admin) 
                       VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->execute(array(
            $new_user->getEmail(),
            $new_user->getFirstName(),
            $new_user->getLastName(),
            $new_user->getPassword(),
            $new_user->getTypeId(),
			0,
			));
        $new_user->setUserId(self::$pdo->lastInsertId());
        return $new_user;
    }

    /**
     * @param $email
     * @param $password
     * @return array|bool|mixed|User
     */
    public static function login($email , $password){
        $stmt = self::$pdo->prepare(
            "SELECT count(*) as user_is_valid FROM users WHERE (email = ? AND password = ?); ");
        $stmt->execute(array($email , $password));
        $result = $stmt->fetch(\PDO::FETCH_ASSOC);
        if($result['user_is_valid'] != 0){
            $user = self::getUser($email);
            return $user;
        }
        return false;
    }

    /**
     * @param $email
     * @return array|User
     */
    public static function getUser($email){
        $user = [];
        $stmt = self::$pdo->prepare(
            "SELECT user_id, email, first_name, last_name, password, type_id, is_admin FROM users WHERE email = ?; ");
        $stmt->execute(array($email));
        while($row = $stmt->fetch(\PDO::FETCH_ASSOC)){
            $user = new User($row["email"],$row["password"],$row["first_name"],$row["last_name"],$row["type_id"],$row["is_admin"]);
            $user->setPassword($row["password"]);
        }
        return $user;
    }

 }