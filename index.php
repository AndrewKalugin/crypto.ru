<?php

#Настроки
ini_set('display_errors', '1');


#Подключение базы и автоподгрузка компонентов с моделями
define('ROOT', dirname(__FILE__));
require ROOT. '/vendor/autoload.php';

#Router
$router = new Core\Router();

$router->add('', ['controller' => 'index', 'action' => 'index']);
$router->add('profile', ['controller' => 'profile', 'action' => 'index']);
$router->add('logout', ['controller' => 'index', 'action' => 'logout']);

$router->run($router->getURI());

?>