<?php

namespace model;

/**
 * Class Workload
 * @package model
 */
class Workload
{

    private $lectures;
    private $seminars;
    private $practices;

    /**
     * Workload constructor.
     * @param $lectures
     * @param $seminars
     * @param $practices
     */
    public function __construct($lectures, $seminars, $practices)
    {
        $this->lectures = $lectures;
        $this->seminars = $seminars;
        $this->practices = $practices;
    }

    /**
     * @return mixed
     */
    public function getLectures()
    {
        return $this->lectures;
    }

    /**
     * @return mixed
     */
    public function getSeminars()
    {
        return $this->seminars;
    }

    /**
     * @return mixed
     */
    public function getPractices()
    {
        return $this->practices;
    }




}