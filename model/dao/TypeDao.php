<?php

namespace model\dao;

use model\Type;


/**
 * Class TypeDao
 * @package model\dao
 */
class TypeDao extends AbstractDao implements ITypeDao
{
    /**
     * TypeDao constructor.
     */
    public function __construct() {
        parent::init();
    }

    /**
     * @return array|mixed
     */
    public static function getAllTypes() {
        try {
            $types = array();
            $stmt = self::$pdo->prepare(
                "SELECT type_id, name 
            FROM types");
            $stmt->execute();

            while($row = $stmt->fetch(\PDO::FETCH_ASSOC)){
                $type = new Type($row["type_id"],$row["name"]);
                $types[] = $type;
            }
        }
        catch (\PDOException $e){
            throw $e;
        }
        return $types;
    }
}