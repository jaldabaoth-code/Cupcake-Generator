<?php

namespace App\Model;

class CupcakeManager extends AbstractManager
{
    public const TABLE = 'cupcake';
    public function insert(array $cupcake)
    {
        $date = date('Y-m-d H:i:s');
        $statement = $this->pdo->prepare("INSERT INTO " . self::TABLE . "
        (`name`, `color1`, `color2`, `color3`, `accessory_id`, `created_at`)
        VALUES (:name, :color1, :color2, :color3, :accessory, :created_at)");
        $statement->bindValue('name', $cupcake['name'], \PDO::PARAM_STR);
        $statement->bindValue('color1', $cupcake['color1'], \PDO::PARAM_STR);
        $statement->bindValue('color2', $cupcake['color2'], \PDO::PARAM_STR);
        $statement->bindValue('color3', $cupcake['color3'], \PDO::PARAM_STR);
        $statement->bindValue('accessory', $cupcake['accessory'], \PDO::PARAM_STR);
        $statement->bindValue('created_at', $date, \PDO::PARAM_STR);
        $statement->execute();
    }

    public function selectByCupcakeId(int $idCupcake): array
    {
        $statement = $this->pdo->prepare("SELECT * FROM " . self::TABLE . " INNER JOIN accessory ON "
        . self::TABLE . ".accessory_id=accessory.id WHERE " . self::TABLE . ".id=:id");
        $statement->bindValue('id', $idCupcake, \PDO::PARAM_INT);
        $statement->execute();
        return $statement->fetch();
    }

    public function selectLast(): array
    {
        $query = 'SELECT * FROM ' . self::TABLE . ' ORDER BY Id DESC LIMIT 1';
        return $this->pdo->query($query)->fetch();
    }
}
