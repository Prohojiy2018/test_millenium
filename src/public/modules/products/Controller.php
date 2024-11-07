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

        if (count($products) === 0) {
            exit('Товары не переданы');
        }

        $output = [];

        foreach ($products as $product) {
            if (empty($product['title']) || empty($product['price'])) {
                continue;
            }

            if ($this->model->insertProduct($product) === 1) {
                $output[] = $product;
            }
        }

        $inserted_products =  json_encode($output, JSON_UNESCAPED_UNICODE);

        print_r($this->view->show($inserted_products));
    }
}