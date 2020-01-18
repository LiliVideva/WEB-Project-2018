<?php

namespace model;

/**
 * Class Course
 * @package model
 */
class Course
{
    private $id;
    private $course;

    /**
     * Course constructor.
     * @param $id
     * @param $course
     */
    public function __construct($id, $course) {
        $this->id = $id;
        $this->course = $course;
    }

    /**
     * @return mixed
     */
    public function getId() {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getName() {
        return $this->course;
    }

}
