<?php

namespace controllers;

class Home extends Base{
    public function index() {
        $data = [
            'title' => 'Главная'
        ];
        return $this->render('home', 'index', $data); 
    }

    public function about() {
        $data = [
            'title' => 'Про сайт'
        ];
        return $this->render('home', 'about', $data);
    }

    public function contacts() {
        $data = [
            'title' => 'Контакты'
        ];
        return $this->render('home', 'contacts', $data);
    }
}