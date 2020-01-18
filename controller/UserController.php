<?php

namespace controller;

use model\dao\UserDao;
use model\PasswordData;
use model\User;

/**
 * Class UserController
 * @package controller
 */
class UserController{

    const IS_ADMIN = '1';
    const IS_NOT_ADMIN = '0';
    const SUCCESSFUL_LOGIN_LOCATION = "location: index.php?page=search_subjects";
    const LOGOUT_LOCATION = "location: index.php?page=login";
    const MAIN_LOCATION = "location: index.php?page=main";
    const SUCCESSFUL_REGISTER_LOCATION = "location: index.php?page=login";

    /**
     * @var
     */
    private static $instance;

    /**
     * UserController constructor.
     */
    private function __construct(){
    }

    /**
     * @return UserController
     */
    public static function getInstance(){
        if(self::$instance === null){
            self::$instance = new UserController();
        }
        return self::$instance;
    }

    /**
     *
     */
    public static function logout(){
        unset($_SESSION['user']);
        header(self::MAIN_LOCATION);
    }

    /**
     * @return string
     */
    public static function userIsAdmin(){
        /* @var $user User*/
        $user = $_SESSION["user"];
        $userIsAdmin = $user->getIsAdmin();
        if ($userIsAdmin) {
            return self::IS_ADMIN;
        }else{
            return self::IS_NOT_ADMIN;
        }
    }

    /**
     *
     */
    public static function login(){
        $email = htmlentities($_POST['email']);
        $password = htmlentities($_POST['password']);
        try{
            $user_dao = new UserDao();
            if($user_dao->login($email , $password)){
				$logged_user = $user_dao->login($email , $password);
				$_SESSION["user"] = $logged_user;
				$_SESSION["isAdmin"] = $logged_user->getisAdmin();
				header(self::SUCCESSFUL_LOGIN_LOCATION);
			}
			else header(self::MAIN_LOCATION);
        } catch (\PDOException $e) {
            header('HTTP/1.1 500 Server error');
            die($e->getMessage());
        }
    }

    /**
     *
     */
    public static function register()
    {
        $first_name = htmlentities($_POST["first_name"]);
        $last_name = htmlentities($_POST["last_name"]);
        $type_id = htmlentities($_POST["type"]);
        $email = htmlentities($_POST["email"]);
        $password = htmlentities($_POST["password"]);
        $password_repeat = htmlentities($_POST["password_repeat"]);
        try {
            if ($password !== $password_repeat) {
                header('HTTP/1.1 400 Bad Request');
                die("Register no");
            }
            $new_user = new User($email,$password,$first_name,$last_name,$type_id,0);
            UserDao::register($new_user);
            header(self::SUCCESSFUL_REGISTER_LOCATION);
        } catch (\RuntimeException $e) {
            die($e->getTraceAsString());
        }
    }


    /**
     * @return mixed
     */
    public static function getLoggedUser(){
        if (isset($_SESSION['user'])){
            $user_in_session = &$_SESSION['user'];
            return $user_in_session;
        }
    }

}

