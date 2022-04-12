<?php
define('FOLDER','/lp2/api/'); // cria a constante caminho padrão
$url = $_SERVER['REQUEST_URI']; // pega o que está na url
$lengthStrFolder = strlen(FOLDER); // guarda o tamanho da constante folder
$urlClean = substr($url, $lengthStrFolder); // separa a string por partes

$route = explode('/', $urlClean);

//Carrega autoloaders
require('helpers/autoloaders.php');

//Cria objeto de resposta da api
$response = new Output();

// Checa se o controller e a action existem na rota
if(!isset($route[0]) || !isset($route[1])){
    $result['message'] = "404 - Rota da Api Não Encontrada";
    $response->out($result, 404);
}

$controller_name = $route[0];
$action = str_replace('-', '', $route[1]);

$controller_path = 'controllers/'.$controller_name.'Controller.php';

// Checa se o arquivo do controller existe
if (file_exists($controller_path)) {
    $controller_class_name = $controller_name.'Controller';
    $controller = new $controller_class_name();
    // Checa se a action do controller existe
    if (method_exists($controller, $action)){
        $controller->$action();
    }
}
$result['message'] = "404 - Rota da Api Não Encontrada";
$response->out($result, 404);
?>