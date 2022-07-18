<?php

namespace App\Model;

class AccessoryManager extends AbstractManager
{
    public const TABLE = 'accessory';

    public function insert(array $accessory)
    {
        $statement = $this->pdo->prepare("INSERT INTO " . self::TABLE . " (`name`, `url`) VALUES (:name, :url)");
        $statement->bindValue('name', $accessory['name'], \PDO::PARAM_STR);
        $statement->bindValue('url', $accessory['url'], \PDO::PARAM_STR);
        $statement->execute();
    }

    public function selectByAccessory(): array
    {
        $statement = $this->pdo->prepare("SELECT * FROM " . self::TABLE . " INNER JOIN cupcake ON "
        . self::TABLE . ".id=cupcake.accessory_id");
        $statement->execute();
        return $statement->fetchAll();
    }
}
