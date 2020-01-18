<?php

namespace model;

class Lecturer
{
    private $id;
    private $name;
    private $title;

    /**
     * Lecturer constructor.
     * @param $id
     * @param $name
     * @param $title
     */
    public function __construct($id, $name, $title) {
        $this->id = $id;
        $this->name = $name;
        $this->title = $title;
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
        return $this->name;
    }

    /**
     * @return mixed
     */
    public function getTitleId() {
        return $this->title;
    }

}