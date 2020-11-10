<?php

namespace controllers;

class Errors extends Base{
    public function error_404($err) {
        $data = [
            'title' => 404,
            'mess' => $err[0]->getMessage()
        ];
        return $this->render('layouts', '404', $data);
    }
}