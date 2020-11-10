<?php

namespace models;
use providers\SqlProvider;

class OrdersModel extends SqlProvider {
    public function addOrder($user_id, $product_id, $number, $init_date, $status_id){
        $query = 'insert into orders (user_id, product_id, number, init_date, status_id) ';
        $query .= 'values (?, ?, ?, ?, ?)';
        $this->sqlExecute($query, [$user_id, $product_id, $number, $init_date, $status_id], false);
    }

    public function getQuantity($user_id){
        $query = 'select count(id) from orders where user_id=?';
        return $this->sqlExecute($query, [$user_id])[0];
    }

    public function getAmount($user_id) {
       $query ='select sum(g.price) from orders o, goods g ';
       $query .='where o.product_id=g.id and user_id=?';
       $query .='';
       return $this->sqlExecute($query,[$user_id])[0];
    }
}