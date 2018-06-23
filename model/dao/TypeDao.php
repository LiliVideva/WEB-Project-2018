<?php

namespace model\dao;

use model\Type;

require_once "AbstractDao.php";
require_once "..\Type.php";

class TypeDao extends AbstractDao
{
    public static function getAllTypes() {
        try {
            $types = array();
            $stmt = self::$pdo->prepare(
                "SELECT type_id, name 
            FROM types;");
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