<?php

namespace controller;


use model\dao\AdminDao;
use model\dao\SubjectDao;
use model\dao\MajorDao;
use model\dao\TypeDao;
use model\dao\GroupDao;
use model\dao\LecturerDao;
use model\Subject;
use model\User;
use model\Major;
use model\Group;


/**
 * Class AdminController
 * @package controller
 */
class AdminController extends AbstractController
{
    /**
     * @var
     */
    private static $instance;

    /**
     * AdminController constructor.
     */
    private function __construct()
    {
        if (isset($_SESSION['user'])) {
            /* @var $user_in_session User */
            $user_in_session = &$_SESSION['user'];
            if ($user_in_session->getisAdmin()) {

            } else {
                header("location: index.php?page=error");
                die("Only admin");
            }
        }

    }


    /**
     * @return AdminController
     */
    public static function getInstance()
    {
        if (self::$instance === null) {
            self::$instance = new AdminController();
        }
        return self::$instance;
    }


    /**
     *
     */
    public static function addSubject()
    {
        if (isset($_POST["add_subject"])) {

            $error = "";
            $workloads = [];

            $name = $_POST["subject_name"];
            $type = $_POST["subject_type"];
            $major = htmlentities($_POST["subject_major"]);
            $course = htmlentities($_POST["subject_course"]);
            $group = htmlentities($_POST["subject_group"]);
            $lectures = $_POST["subject_lectures"];
            $seminars = $_POST["subject_seminars"];
            $practices = $_POST["subject_practices"];
            $credits = $_POST["subject_credits"];
            $lecturer = htmlentities($_POST["subject_lecturer"]);

            if (empty($name) || empty($type) || empty($major) || empty($course) || empty($group) ||
                empty($lectures) || empty($seminars) || empty($practices) || empty($credits) || empty($lecturer)) {
                $error .= "Missing info";
            }


            if ($error === "") {
                try {
                    $adminDao = new AdminDao();

                    $workloads["lectures"] = $lectures;
                    $workloads["seminars"] = $seminars;
                    $workloads["practices"] = $practices;

                    $new_subject = new Subject($name, $type, $major, $course, $group, $workloads, $credits, $lecturer);

                    $adminDao->saveNewSubject($new_subject);
                    header("location: index.php?page=add_subject");
                    die();
                } catch (\PDOException $e) {
                    header("location: index.php?page=error");
                    die();

                }
            } else {
                header("location: index.php?page=error");
                die();

            }
        } else {
            header("location: index.php?page=error");
            die();
        }
    }

    /**
     *
     */
    public static function addMajor()
    {
        if (isset($_POST["add_major"])) {

            $error = "";

            $name = $_POST["subject_major"];

            if (empty($name)) {
                $error .= "Missing info";
            }


            if ($error === "") {
                try {
                    $majorDao = new MajorDao();

                    $majorDao->addNewMajor($name);
                    
                    header("location: index.php?page=add_major");
                    die();
                } catch (\PDOException $e) {
                    header("location: index.php?page=error");
                    die();

                }
            } else {
				header("location: index.php?page=error");
                die();

            }
        } else {
            header("location: index.php?page=error");
            die();
        }
    }

    /**
     *
     */
    public static function addGroup()
    {
        if (isset($_POST["add_group"])) {

            $error = "";

            $name = $_POST["subject_group"];


            //validate data
            if (empty($name)) {
                $error .= "Missing info";
            }


            if ($error === "") {
                try {
                    $groupDao = new GroupDao();

                    $groupDao->addNewGroup($name);
                    
                    header("location: index.php?page=add_group");
                    die();
                } catch (\PDOException $e) {
                    header("location: index.php?page=error");
                    die();

                }
            } else {
                header("location: index.php?page=error");
                die();

            }
        } else {
            header("location: index.php?page=error");
            die();
        }
    }

    /**
     *
     */
    public static function addLecturer()
    {
        if (isset($_POST["add_lecturer"])) {

            $error = "";

            $name = $_POST["subject_lecturer"];
			$title = $_POST["lecturer_title"];


            //validate data
            if (empty($name)) {
                $error .= "Missing info";
            }


            if ($error === "") {
                try {
                    $lecturerDao = new LecturerDao();

                    $lecturerDao->addNewLecturer($name, $title);
                    
                    header("location: index.php?page=add_lecturer");
                    die();
                } catch (\PDOException $e) {
                    header("location: index.php?page=error");
                    die();

                }
            } else {
                header("location: index.php?page=error");
                die();
            }
        } else {
            header("location: index.php?page=error");
            die();
        }
    }
	
	


}
