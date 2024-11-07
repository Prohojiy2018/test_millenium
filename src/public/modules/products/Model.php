<?php

namespace Products;

use PDO;

class Model
{
	private $db;

	public function __construct(PDO $db)
	{
        $this->db = $db;
	}

    public function insertProduct(array $product): int
    {
        $query = $this->db->prepare(
<<<SQL
            INSERT INTO 
                products (title, price)
            VALUES 
                (:title, :price)
SQL
        );

        $query->execute(['title' => $product['title'], 'price' => $product['price']]);

        return $query->rowCount();
    }
}