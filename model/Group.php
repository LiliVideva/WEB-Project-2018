<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 5/7/2018
 * Time: 4:49 PM
 */

namespace model;

class Group
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