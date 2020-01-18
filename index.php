<?php


use controller\AbstractController;
use model\dao\AbstractDao;
use model\AbstractModel;
use controller\UserController;

spl_autoload_register(
    function ($class) {
        $class_name = str_replace("\\", "/", $class);

        if (strstr($class_name, "model/dao/") !== false) {
            require_once "./" . $class_name . ".php";

        } elseif (strstr($class_name, "controller/") !== false) {
            require_once "./" . $class_name . ".php";

        } elseif (strstr($class_name, "Controller") !== false) {
            // do nothing

        } else {
            require_once $class_name . ".php";
        }
    });

ini_set('mbstring.internal_encoding', 'UTF-8');
header('Content-Type: text/html; charset=UTF-8');

const LOGIN_PAGE_NAME = 'login';
const ERROR_PAGE_NAME = 'error';
const REGISTER_PAGE_NAME = 'register';
const MAIN_PAGE_NAME = 'main';
const ADD_SUBJECT_PAGE_NAME = 'add_subject';
const ADD_MAJOR_PAGE_NAME = 'add_major';
const ADD_GROUP_PAGE_NAME = 'add_group';
const ADD_LECTURER_PAGE_NAME = 'add_lecturer';
const EDIT_SUBJECT_PAGE_NAME = 'edit_subject';
const SEARCH_SUBJECT_PAGE_NAME = 'search_subjects';

session_start();

if (isset($_SESSION['user'])) {
    /* @var $user_in_session \model\User */
    $user_in_session = &$_SESSION['user'];
}

?>

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <title> Избираеми дисциплини </title>
    <meta name="description" content="">
    <meta name="author" content="">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="view/assets/css/default.css">
    <link rel="stylesheet" href="view/assets/css/normalize.css">
    <link rel="stylesheet" href="view/assets/css/skeleton.css">
    <link rel="stylesheet" href="view/assets/css/navBar.css">

    <script src="./view/assets/js/validation.js" type="text/javascript"></script>


</head>
<body>


<div class="container">
    <?php
    $page = "";
    if (isset($_GET["page"])) {
        $page = $_GET["page"];
    }
	
    if (isset($user_in_session)) {
        if (UserController::userIsAdmin()) {
            require_once "./view/admin_navigation.html";
			require_once "./view/navBar.html";

        } else {
            require_once "./view/user_navigation.html";
        }
    } else {
        require_once "./view/guest_navigation.html";
    }
    require_once "./view/header.html";


    ?>
    <div id="main" style="display:block">

        <?php

        if (isset($_GET['page'])) {
            $page_name = $_GET['page'];

            if ($page_name === ADD_SUBJECT_PAGE_NAME || $page_name === EDIT_SUBJECT_PAGE_NAME) {
                if (isset($_SESSION['user'])) {
                    if ($user_in_session->getisAdmin() != 1) {
                        $page_name = ERROR_PAGE_NAME;
                    }
                }
                else {
                    $page_name = ERROR_PAGE_NAME;
                }
            }

            if ($page_name === LOGIN_PAGE_NAME || $page_name === REGISTER_PAGE_NAME) {
                if (isset($_SESSION['user'])) {
                    $page_name = ERROR_PAGE_NAME;
                }
            }

            if ($page_name !== LOGIN_PAGE_NAME && $page_name !== REGISTER_PAGE_NAME &&
                $page_name !== MAIN_PAGE_NAME && $page_name !== EDIT_SUBJECT_PAGE_NAME &&
                 $page_name !== ADD_SUBJECT_PAGE_NAME  && $page_name !== ADD_MAJOR_PAGE_NAME &&
				 $page_name !== ADD_GROUP_PAGE_NAME && $page_name !== ADD_LECTURER_PAGE_NAME &&
				 $page_name !== SEARCH_SUBJECT_PAGE_NAME && 
				 $page_name !== null) {
                if (!isset($user_in_session)) {
                    $page_name = ERROR_PAGE_NAME;

                }
            }


        } else {
            $page_name = MAIN_PAGE_NAME;
        }
        $page_path = __DIR__ . "\\view\\" . $page_name . ".html";
        if ($page_name === EDIT_SUBJECT_PAGE_NAME || $page_name === SEARCH_SUBJECT_PAGE_NAME || $page_name === ADD_SUBJECT_PAGE_NAME ||
		  $page_name === ADD_MAJOR_PAGE_NAME  || $page_name === ADD_GROUP_PAGE_NAME  || $page_name === ADD_LECTURER_PAGE_NAME) {
            $page_path = __DIR__ . "\\view\\" . $page_name . ".php";
        }

        if (file_exists($page_path)) {
            require_once $page_path;
        } else {
            require_once __DIR__ . "\\view\\" . ERROR_PAGE_NAME . ".html";
        }

        ?>
    </div>

    <?php
    require_once "./view/footer.html";
    ?>
</div>

<script src="./view/assets/js/validation.js" type="text/javascript"></script>

</body>

</html>
