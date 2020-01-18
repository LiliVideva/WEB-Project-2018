<?php

namespace model;

/**
 * Class Title
 * @package model
 */
class Title
{
    private $id;
    private $name;

    /**
     * Title constructor.
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