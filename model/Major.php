<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 5/7/2018
 * Time: 4:48 PM
 */

namespace model;

class Major
{
    private $id;
    private $name;

    public function __construct($id,$name) {
        $this->id = $id;
        $this->name = $name;
    }

    public function getId() {
        return $this->id;
    }

    public function getName() {
        return $this->name;
    }

}