<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 5/7/2018
 * Time: 4:49 PM
 */

namespace model;

class Course
{
    private $id;
    private $course;

    public function __construct($id, $course) {
        $this->id = $id;
        $this->course = $course;
    }

    public function getId() {
        return $this->id;
    }

    public function getName() {
        return $this->course;
    }

}
