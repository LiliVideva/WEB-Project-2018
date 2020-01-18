<?php


namespace controller;

/**
 * Class AbstractController
 * @package controller
 */
abstract class AbstractController{

    /**
     * @param $controller_name
     * @return AdminController|UserController
     */
    public static function createController($controller_name)
    {
        $controller_name = ucfirst($controller_name);

        switch ($controller_name) {
            case 'AdminController':
                return AdminController::getInstance();

            case 'UserController':
                return UserController::getInstance();

            default:
                header('location: index.php?page=404.html');
                die();
        }
    }
}