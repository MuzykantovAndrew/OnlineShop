<?php

namespace controllers;


use models\CategoriesModel;

class Admin extends Base{
    public function categories() {
        if($this->getUser() === 'admin123'){
        $model = new CategoriesModel();
        $data = [
            'title' => 'Категории товаров',
            'categories' => $model->getCategories()
        ];
        return $this->render('admin', 'categories', $data); 
    } else{
        return $this->render('layouts', '403', ['title' => '403']); 
    }
    }

}