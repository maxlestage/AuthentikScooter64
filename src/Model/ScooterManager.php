<?php
/**
 * Created by PhpStorm.
 * User: sylvain
 * Date: 07/03/18
 * Time: 18:20
 * PHP version 7
 */

namespace App\Model;

/**
 *
 */
class ScooterManager extends AbstractManager
{
    /**
     *
     */
    const TABLE = 'scooter';

    /**
     *  Initializes this class.
     */
    public function __construct()
    {
        parent::__construct(self::TABLE);
    }


    /**
     * @param array $scooter
     * @return int
     */
    public function insert(array $scooter): int
    {
        //$statement = $this->pdo->prepare("INSERT INTO $this->table (`title`) VALUES (:title)");
        // prepared request   INSERT INTO scooter (marque_id, cylinder, model, engine, color, km, price )
        $statement = $this->pdo->prepare("INSERT INTO $this->table
        (`marque_id`, `cylinder`, `model`, `engine`, `color`, `km`, `price`)
        VALUES (:marque_id, :cylinder, :model, :engine, :color, :km, :price )");
        $statement->bindValue('marque_id', $scooter['marque_id'], \PDO::PARAM_INT);

        $statement->bindValue('cylinder', $scooter['cylinder'], \PDO::PARAM_INT);

        $statement->bindValue('model', $scooter['model'], \PDO::PARAM_STR);

        $statement->bindValue('engine', $scooter['engine'], \PDO::PARAM_INT);

        $statement->bindValue('color', $scooter['color'], \PDO::PARAM_STR);

        $statement->bindValue('km', $scooter['km'], \PDO::PARAM_INT);

        $statement->bindValue('price', $scooter['price'], \PDO::PARAM_INT);

        if ($statement->execute()) {
            return (int)$this->pdo->lastInsertId();
        }
    }


    /**
     * @param int $id
     */
    public function delete(int $id): void
    {
        // prepared request
        $statement = $this->pdo->prepare("DELETE FROM $this->table WHERE id=:id");
        $statement->bindValue('id', $id, \PDO::PARAM_INT);
        $statement->execute();
    }


    /**
     * @param array $scooter
     * @return bool
     */
    public function update(array $scooter):bool
    {
        // prepared request
        $statement = $this->pdo->prepare("UPDATE $this->table SET `marque_id` = :marque_id, `cylinder` = :cylinder, 
           `model` = :model, `engine` = :engine, `color` = :color, `km` = :km, `price` = :price 
           WHERE id=:id");

        $statement->bindValue('id', $scooter['id'], \PDO::PARAM_INT);

        $statement->bindValue('marque_id', $scooter['marque_id'], \PDO::PARAM_INT);

        $statement->bindValue('cylinder', $scooter['cylinder'], \PDO::PARAM_INT);

        $statement->bindValue('model', $scooter['model'], \PDO::PARAM_STR);

        $statement->bindValue('engine', $scooter['engine'], \PDO::PARAM_INT);

        $statement->bindValue('color', $scooter['color'], \PDO::PARAM_STR);

        $statement->bindValue('km', $scooter['km'], \PDO::PARAM_INT);

        $statement->bindValue('price', $scooter['price'], \PDO::PARAM_INT);

        return $statement->execute();
    }

    /**
     * Get all row from database.
     *
     * @return array
     */
    public function selectAllMarque(): array
    {
        return $this->pdo->query('SELECT * FROM marque')->fetchAll();
    }

    public function selectAll(): array
    {

        return $this->pdo->query("SELECT s.*, m.name FROM $this->table s JOIN marque m on s.marque_id = m.id ")->fetchAll();
    }


    public function selectScootById(int $id)
    {
        // prepared request
        $statement = $this->pdo->prepare("SELECT scooter.*, marque.name as name FROM $this->table 
        JOIN marque ON scooter.marque_id = marque.id
        WHERE scooter.id=:id");
        $statement->bindValue('id', $id, \PDO::PARAM_INT);
        $statement->execute();

        return $statement->fetch();
    }
}
