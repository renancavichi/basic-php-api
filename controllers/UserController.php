<?php
class UserController{

    function create(){
        //Entradas
        $name = $_POST['name'];
        $email = $_POST['email'];
        $pass = $_POST['pass'];
        //Processamento ou Persistencia
        $user = new User(null, $name, $email, $pass);
        $id = $user->create();
        //Saída
        $result['message'] = "Cadastrado com sucesso!";
        $result['user']['id'] = $id;
        $result['user']['name'] = $name;
        $result['user']['email'] = $email;
        $result['user']['pass'] = $pass;
        $response = new Output();
        $response->out($result);
    }

    function delete(){
        $id = $_POST['id'];
        $user = new User($id, null, null, null);
        $user->delete();
        $result['message'] = "User deletado com sucesso!";
        $result['user']['id'] = $id;
        $response = new Output();
        $response->out($result);
    }

    function update(){
        $id = $_POST['id'];
        $name = $_POST['name'];
        $email = $_POST['email'];
        $pass = $_POST['pass'];
        $user = new User($id, $name, $email, $pass);
        $user->update();
        $result['message'] = "User atualizado com sucesso!";
        $result['user']['id'] = $id;
        $result['user']['name'] = $name;
        $result['user']['email'] = $email;
        $result['user']['pass'] = $pass;
        $response = new Output();
        $response->out($result);
    }

    function selectAll(){
        $user = new User(null, null, null, null);
        $result = $user->selectAll();
        $response = new Output();
        $response->out($result);
    }

}
?>