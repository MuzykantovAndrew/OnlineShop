<?php

namespace app;

use App;
use Exception;

class Kernel {

 public $defaultControllerName = 'Home';
public $defaultActionName = 'index';

 public function run() {
list($controllerName, $actionName, $params) = App::$router->route();
echo($this->loadPage($controllerName, $actionName, $params));
}

 public function loadPage($controllerName, $actionName, $params) {
// -> Определение пути к контроллеру
$controllerName = empty($controllerName) ? $this->defaultControllerName : ucfirst($controllerName);
// -> проверка существования файла контроллера
$controllerPath = ROOTPATH.DIRECTORY_SEPARATOR.'controllers'.DIRECTORY_SEPARATOR.$controllerName.'.php';
if(!file_exists($controllerPath)){
    throw new Exception('Файл класса контроллера для данного запроса не найден');
}
require_once($controllerPath);

// -> проверка существования клвсса контроллера
$controllerName = '\\controllers\\'.ucfirst($controllerName);
if(!class_exists($controllerName)){
    throw new Exception('Kласс контроллера для данного запроса не найден');
}

 // -> Создание экземпляра контроллера
$controller = new $controllerName;


//-> Проверка существования метода действия для загрузки заданной страницы
$actionName = empty($actionName) ? $this->defaultActionName : $actionName;
if(!method_exists($controller, $actionName)){
    throw new Exception('Метод контроллера для данного запроса не найден');
}

// -> Вызов метода действия (загрузки страницы с передачей параметра)
return $controller->$actionName($params);
}

}