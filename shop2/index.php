<?php

session_start();
// !!! -> Временный глобальный доступ для супер-админа
$_SESSION['user'] = 'admin123';

define('ROOTPATH', __DIR__);
define('BASEDIR', end(explode('\\', ROOTPATH)));

require_once(ROOTPATH.'/app/App.php');
App::init();
App::$kernel->run();
