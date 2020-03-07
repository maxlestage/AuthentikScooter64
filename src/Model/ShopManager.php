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
class ShopManager extends AbstractManager
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

    public function selectAllMarques()
    {
        return $this->pdo->query('SELECT * FROM marque')->fetchAll();
    }

    public function selectByMarque($marqueId)
    {
        return $this->pdo->query('SELECT * FROM ' . $this->table. ' s join marque m on m.id=s.marque_id 
                where marque_id='.$marqueId)->fetchAll();
    }

    public function selectAllWithMarque()
    {
        return $this->pdo->query('SELECT * FROM ' . $this->table. ' s join marque m on m.id=s.marque_id')->fetchAll();
    }
}
