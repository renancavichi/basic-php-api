<?php
function myLoaders($class_name){
    if(file_exists('models/' . $class_name . '.php')){
        require 'models/' . $class_name . '.php';
    }
    if(file_exists('helpers/' . $class_name . '.php')){
        require 'helpers/' . $class_name . '.php';
    }
    if(file_exists('controllers/' . $class_name . '.php')){
        require 'controllers/' . $class_name . '.php';
    }
}
//automatiza o carregamento dos modelos
spl_autoload_register('myLoaders');
?>