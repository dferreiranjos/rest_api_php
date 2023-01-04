<?php

if($acao == ''){ echo json_encode(['ERRO' => 'Caminho não encontrado!']); exit;}
if($acao == 'update' && $param == ''){
    echo json_encode(['ERRO' => 'Informe o cliente que você deseja atualizar']);
    exit;
}

if($acao == 'update' && $param != ''){
    
    array_shift($_POST);

    $sql = 'UPDATE clientes SET ';
    
    foreach(array_keys($_POST) as $keys){
        $sql .= "$keys = '$_POST[$keys]', ";
    }

    $sql = substr($sql, 0, -2);
    $sql .= " WHERE id = {$param}";
    
    $db = DB::connect();
    $rs = $db->prepare($sql);
    $exec = $rs->execute();
    
    if ($exec) {
        echo json_encode(["dados" => 'O Registro foi atualizado com sucesso!']);
    } else {
        echo json_encode(["dados" => 'Erro ao tentar atualizar os dados.']);
    }
}