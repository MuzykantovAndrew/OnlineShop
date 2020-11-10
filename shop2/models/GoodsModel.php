<?php

namespace models;
use providers\SqlProvider;

class GoodsModel extends SqlProvider {
    public function GetAllGoods(){
        $query = "select g.id, g.name, c.name as 'cname', p.name as 'pname', g.number, g.price, g.photo ";
        $query .= 'from goods g, categories c, producers p ';
        $query .= 'where g.category_id=c.id and g.producer_id=p.id';
        return $this->sqlExecute($query);
    }
}