<?php
define('FOLDER','/lp2/api/'); // cria a constante caminho padrão
$url = $_SERVER['REQUEST_URI']; // pega o que está na url
$lengthStrFolder = strlen(FOLDER); // guarda o tamanho da constante folder
$urlClean = substr($url, $lengthStrFolder); // separa a string por partes

$route = explode('/', $urlClean);

//automatiza o carregamento dos modelos
spl_autoload_register(function ($class_name) {
    require 'models/' . $class_name . '.php';
});

if($route[0] == 'user'){
    require('controllers/UserController.php');
} elseif($route[0] == 'product'){
    require('controllers/ProductController.php');
} else {
    header("HTTP/1.1 404 Not Found");
    header('Content-Type: application/json; charset=utf-8');
    $result["message"] =  "404 - Página não econtrada";
    echo json_encode($result);
    die;
}
?>