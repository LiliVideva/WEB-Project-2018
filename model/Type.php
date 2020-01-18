<?php

namespace model;

/**
 * Class Type
 * @package model
 */
class Type
{
    private $id;
    public $name;

    /**
     * Type constructor.
     * @param $id
     * @param $name
     */
    public function __construct($id, $name) {
        $this->id = $id;
        $this->name = $name;
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
}