<?php

namespace App\Model;

class RechercheManager extends AbstractManager
{
    const TABLE = 'scooter';

    /**
     *  Initializes this class.
     */
    public function __construct()
    {
        parent::__construct(self::TABLE);
    }

    /**
     * @param string $query
     * @return array
     */
    public function search($query): array
    {
        $words = explode(' ', $query);
        $search = implode('|', $words);
        $operator = (count($words) > 1) ? 'and' : 'or';
        return $this->pdo
            ->query(
                "SELECT * FROM $this->table s 
                        join marque m on m.id=s.marque_id 
                      WHERE model regexp '$search' $operator name regexp '$search'"
            )
            ->fetchAll();
    }
}
