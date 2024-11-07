<?php

namespace Products;

class Controller
{
    private $model;
    private $view;
	public function __construct (Model $model, View $view)
	{
        $this->model = $model;
        $this->view = $view;
	}

    public function index()
    {
        $products = json_decode(file_get_contents("php://input"), true);

        if (!is_array($products) || count($products) === 0) {
            exit('Товары не переданы');
        }

        $inserted_products = [];

        foreach ($products as $product) {
            if (empty($product['title']) || empty($product['price'])) {
                continue;
            }

            if ($this->model->insertProduct($product) === 1) {
                $inserted_products[] = $product;
            }
        }

        print_r($this->view->show($inserted_products));
    }
}