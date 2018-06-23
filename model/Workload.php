<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 5/7/2018
 * Time: 4:51 PM
 */

namespace model;

class Workload
{

    private $lectures;
    private $seminars;
    private $practices;

    public function __construct($lectures, $seminars, $practices)
    {
        $this->lectures = $lectures;
        $this->seminars = $seminars;
        $this->practices = $practices;
    }

    public function getLectures()
    {
        return $this->lectures;
    }

    public function getSeminars()
    {
        return $this->seminars;
    }

    public function getPractices()
    {
        return $this->practices;
    }




}