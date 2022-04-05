<?php
define('FOLDER','/lp2/api/'); // cria a constante caminho padrão
$url = $_SERVER['REQUEST_URI']; // pega o que está na url
$lengthStrFolder = strlen(FOLDER); // guarda o tamanho da constante folder
$urlClean = substr($url, $lengthStrFolder); // separa a string por partes

$route = explode('/', $urlClean);

//carrega autoloaders
require('helpers/autoloaders.php');

if($route[0] == 'user'){
    require('controllers/UserController.php');
} elseif($route[0] == 'product'){
    require('controllers/ProductController.php');
} else {
    $result['message'] = "404 - Rota da Api Não Encontrada";
    $response = new Output();
    $response->out($result, 404);
}
?>