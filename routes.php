<?php
require('config.php');
//Cria a constante caminho padrão
$url = $_SERVER['REQUEST_URI']; // pega a url do request
$lengthStrFolder = strlen(BASE_URL_API); // guarda o tamanho da constante folder
$urlClean = substr($url, $lengthStrFolder); // separa a parte do BASE_URL_API da string
$routeWithoutParameters = explode('?', $urlClean); // elimina parâmetros
$route = explode('/', $routeWithoutParameters[0]); // separa rota em um array
//Carrega autoloaders
require(HELPERS_FOLDER.'autoloaders.php');
//Cria objeto de resposta da api
$response = new Output();
// Checa se o controller e a action existem na rota
if(!isset($route[0]) || !isset($route[1])){
    $result['message'] = "404 - API Route Not Found.";
    $response->out($result, 404);
}
//Guarda o controller e o action da rota
$controller_name = $route[0];
$action = str_replace('-', '', $route[1]);
// Checa se o arquivo do controller existe
$controller_path = CONTROLLERS_FOLDER.$controller_name.'Controller.php';
if (file_exists($controller_path)) {
    $controller_class_name = $controller_name.'Controller';
    $controller = new $controller_class_name();
    // Checa se a action do controller existe
    if (method_exists($controller, $action)){
        $controller->$action();
    }
}
// Caso não exista controller e action retorna 404
$result['message'] = "404 - API Route Not Found.";
$response->out($result, 404);
?>