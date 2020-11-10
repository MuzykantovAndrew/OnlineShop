<?php

class App{
    public static $router;
    public static $kernel;
    public static $provider;

    public static function init() {
        spl_autoload_register(['static' , 'autoLoadClasses']);
        static::$router = new app\Router();
        static::$kernel = new app\Kernel();
        static::$provider = new providers\SqlProvider();   
        set_exception_handler(['App', 'handlerException']);
    }

    public static function autoLoadClasses($className){
        $className = str_replace('\\',  DIRECTORY_SEPARATOR, $className);
        require_once(ROOTPATH.DIRECTORY_SEPARATOR.$className.'.php');
    }

    public static function handlerException(Exception $err){
        echo(static::$kernel->loadPage('errors', 'error_404', [$err]));
    }
    
}