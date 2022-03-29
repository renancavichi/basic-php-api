<?php
    if(isset($route[1]) && $route[1] != ''){
        if($route[1] == 'create'){
            $name = $_POST['name'];
            $email = $_POST['email'];
            $pass = $_POST['pass'];
            $user = new User(null, $name, $email, $pass);
            $user->create();
        }elseif ($route[1] == 'delete') {
            $user = new User(10, 'Renan','','');
            $user->delete();
        }else{
            echo "Página não econtrada";
        }
    }else{
        echo "Página não econtrada";
    }
?>