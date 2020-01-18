<?php

namespace model;

/**
 * Class Subject
 * @package model
 */
class Subject
{

    private $id;
    private $name;
    private $type; // type as string
    private $majors;//map from majors and minimum course and only course
    private $courses;//array of courses
    private $group; //group as string
    private $workloads;//Workload object
    private $credits;
    private $lecturers;//array from Lecturer objects
    private $show_to_admin;

    /**
     * Subject constructor.
     * @param $name
     * @param $type
     * @param $majors
     * @param $courses
     * @param $group
     * @param $workloads
     * @param $credits
     * @param $lecturers
     */
    public function __construct($name, $type, $majors, $courses, $group, $workloads, $credits, $lecturers)
    {
        $this->name = $name;
        $this->type = $type;
        $this->majors = $majors;
        $this->courses = $courses;
        $this->group = $group;
        $this->workloads = $workloads;
        $this->credits = $credits;
        $this->lecturers = $lecturers;
    }

    /**
     * @return mixed
     */
    public function getShowToAdmin()
    {
        return $this->show_to_admin;
    }

    /**
     * @param $show_to_admin
     */
    public function setShowToAdmin($show_to_admin)
    {
        $this->show_to_admin = $show_to_admin;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return mixed
     */
    public function getCredits()
    {
        return $this->credits;
    }

    /**
     * @return mixed
     */
    public function getGroup()
    {
        return $this->group;
    }

    /**
     * @return mixed
     */
    public function getType1()
    {
        return $this->type;
    }

    /**
     * @return object Workload
     */
    public function getWorkloads()
    {
        return $this->workloads;
    }
    /**
     * @return array
     */
    public function getMajors()
    {
        return $this->majors;
    }

    /**
     * @return array
     */
    public function getLecturers()
    {
        return $this->lecturers;
    }

    /**
     * @return mixed
     */
    public function getCourses()
    {
        return $this->courses;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @param $name
     */
    public function setName($name)
    {
        $this->name=$name;
    }

    /**
     * @param $type
     */
    public function setType($type)
    {
        $this->type=$type;
    }

    /**
     * @param array $majors
     */
    public function setMajors($majors)
    {
        $this->majors = $majors;
    }


    /**
     * @param $courses
     */
    public function setCourses($courses)
    {
        $this->courses=$courses;
    }

    /**
     * @param $group
     */
    public function setGroup($group)
    {
        $this->group=$group;
    }

    /**
     * @param $workloads
     */
    public function setWorkloads($workloads)
    {
        $this->workloads=$workloads;
    }

    /**
     * @param $credits
     */
    public function setCredits($credits)
    {
        $this->credits=$credits;
    }

    /**
     * @param array $lecturers
     */
    public function setLecturers($lecturers)
    {
        $this->lecturers = $lecturers;
    }



}