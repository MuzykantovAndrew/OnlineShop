<?php

namespace controllers;

use models\GoodsModel;
use models\UsersModel;
use models\OrdersModel;

class Goods extends Base{
    public function catalog() {
        $model = new GoodsModel();
        $data = [
            'title' => 'Каталог',
            'user' => $this->getUser(),
            'goods' => $model->getAllGoods()
        ];
        return $this->render('goods', 'catalog', $data); 
    }

    public function add_to_cart($productId) {
        $usersModel = new UsersModel();
        $ordersModel = new OrdersModel();
        $user_id = $usersModel->getIdByLogin($this->getUser())[0];
        $product_id = $productId;
        $number = 1;
        $init_date = date('Y-m-d H:i:s');
        $status_id = 1;
        $ordersModel->addOrder($user_id, $product_id, $number, $init_date, $status_id);
        $quantity = $ordersModel->getQuantity($user_id)[0];
        $amount = $ordersModel->getAmount($user_id)[0];
        $data = [
            'quantity' => $quantity,
            'amount' => $amount,
            'mess' => 'ТОВАР УСПЕШНО ДОБАВЛЕН'
        ];
        echo(json_encode($data));
    }
}