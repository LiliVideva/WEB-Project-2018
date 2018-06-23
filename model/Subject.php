<?php

namespace model;

class Subject
{

    private $id;
    private $name;
    private $credits;
    private $group;
    private $type;

    private $workloads;//Workload object
    private $majors;//map from majors and minimum course and only course
    private $lecturers;//array from Lecturer objects

    public function __construct($name, $credits, $group, $type)
    {
        $this->name = $name;
        $this->credits = $credits;
        $this->group = $group;
        $this->type = $type;
        $this->majors = array();
        $this->lecturers = array();
    }

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getCredits()
    {
        return $this->credits;
    }

    public function getGroupId()
    {
        return $this->groupId;
    }

    public function getTypeId()
    {
        return $this->typeId;
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
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @param array $majors
     */
    public function setMajors($majors)
    {
        $this->majors = $majors;
    }

    /**
     * @param array $lecturers
     */
    public function setLecturers($lecturers)
    {
        $this->lecturers = $lecturers;
    }



}