<?php
//just to try

use model\Course;

require_once "..\Course.php";

const DB_NAME = "web_project";
const DB_IP = "localhost";
const DB_PORT = "3306";
const DB_USER = "root";
const DB_PASS = "EvaPaunova96";

$pdo;

try {
    $pdo = new \PDO("mysql:host=" . DB_IP . ":" . DB_PORT . ";dbname=" . DB_NAME, DB_USER, DB_PASS);
    $pdo->setAttribute( \PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION );

}
catch (\PDOException $e){
    echo "Problem with db query  - " . $e->getMessage();
}

try {
    $types = array();
    $stmt = $pdo->prepare(
        "SELECT course_id, course 
            FROM courses;");
    $stmt->execute();

    while($row = $stmt->fetch(\PDO::FETCH_ASSOC)){
        $course = new Course($row["course_id"],$row["course"]);
        echo $course->getId()." name: ".$course->getName().PHP_EOL;
        $courses[] = $course;
    }
}
catch (\PDOException $e){
    throw $e;
}