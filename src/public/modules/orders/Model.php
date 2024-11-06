<?php

namespace Orders;

use PDO;

class Model
{
	private $db;

	public function __construct(PDO $db)
	{
        $this->db = $db;
	}

    public function getUserNameById($user_id): ?string
    {
        $query = $this->db->prepare(
<<<SQL
            SELECT 
                user.second_name,
                user.first_name
            FROM user 
            WHERE id = :user_id
            LIMIT 1
SQL
        );

        $query->execute(['user_id' => $user_id]);

        return implode(' ', (array)$query->fetch(PDO::FETCH_ASSOC));
    }

    public function getOrdersByUserId($user_id) : ?array
    {
        $query = $this->db->prepare(
<<<SQL
            SELECT 
                products.title,
                products.price,
                user_order.created_at
            FROM user_order
            LEFT JOIN products ON products.id = user_order.product_id
            WHERE user_order.user_id = :user_id
            ORDER BY title ASC, price DESC
SQL
        );

        $query->execute(['user_id' => $user_id]);

        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
}