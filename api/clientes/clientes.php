<?php

if($api == 'clientes'){

    if(Usuarios::verificar()){
        // GET
        if($method == 'GET'){
            require_once 'get.php';
            exit;
        }
    
        // POST
        if($method == 'POST' && !isset($_POST['_method'])){
            require_once 'post.php';
        }

        // PUT
        if($method == 'POST' && isset($_POST['_method']) && $_POST['_method'] == 'PUT'){
            require_once 'put.php';
            exit;
        }

        // DELETE
        if($method == 'POST' && isset($_POST['_method']) && $_POST['_method'] == 'DELETE'){
            require_once 'delete.php';
            exit;
        }
    }else{
        echo json_encode(['ERRO' => 'Você não está logado, ou seu token é inválido.']);
    }
}

