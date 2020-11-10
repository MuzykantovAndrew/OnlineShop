<?php

namespace models;
use providers\SqlProvider;

class UsersModel extends SqlProvider {
    public function GetIdByLogin($login){
        $query = 'select id from users where login=?';
        return $this->sqlExecute($query,[$login])[0];
    }
}