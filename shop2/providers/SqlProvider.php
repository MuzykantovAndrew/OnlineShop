<?php

namespace providers;

class SqlProvider{
    public $pdo; 
    public function __construct(){
        $settings = $this->getPDOSettings();
        $this->pdo = new \PDO($settings['conn_str'], $settings['user'], $settings['pass'], null);
    }

    protected function getPDOSettings(){
        $config_set = include(ROOTPATH.DIRECTORY_SEPARATOR.'config'.DIRECTORY_SEPARATOR.'db_config.php');
        $settings['conn_str'] = "{$config_set['type']}:host={$config_set['host']};dbname={$config_set['dbname']};charset={$config_set['charset']}";
        $settings['user'] = $config_set['user'];
        $settings['pass'] = $config_set['pass'];
        return $settings;  
    }

    public function sqlExecute($sql, array $params = null, $queryIsSelect = true){
        if(is_null($params)){
            $stmt = $this->pdo->query($sql);
        } else {
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute($params);
        }
        if($queryIsSelect){
            return $stmt->fetchAll();
        } else {
            return [];
        }
    }

}