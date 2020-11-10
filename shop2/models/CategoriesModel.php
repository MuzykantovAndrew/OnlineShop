<?php

namespace models;
use providers\SqlProvider;

class CategoriesModel extends SqlProvider {
    public function GetCategories(){
        return $this->sqlExecute('select * from categories order by id');
    }
}