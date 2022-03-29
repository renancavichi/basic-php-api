<?php
    if(isset($route[1]) && $route[1] != ''){
        if($route[1] == 'create'){
            $product = new Product(10, 'Renan','','');
            $$product->create();
        }elseif ($route[1] == 'delete') {
            $product = new Product(10, 'Renan','','');
            $product->delete();
        }else{
            echo "Página não econtrada";
        }
    }else{
        echo "Página não econtrada";
    }
?>