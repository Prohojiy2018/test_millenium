<?php

namespace Orders;

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
        $user_id = $_REQUEST['user_id'];
        if (empty($user_id) || !is_numeric($user_id)) {
            exit('Не указан ID пользователя');
        }

        $user_name = $this->model->getUserNameById($user_id);
        if (empty($user_name)) {
            exit('Пользователь не найден');
        }

        $orders =  json_encode($this->model->getOrdersByUserId($user_id), JSON_UNESCAPED_UNICODE);

        print_r($this->view->show($user_name, $orders));
    }
}