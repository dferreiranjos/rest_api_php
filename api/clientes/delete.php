<?php

if($acao == ''){ echo json_encode(['ERRO' => 'Caminho não encontrado!']); exit;}
if($acao == 'delete' && $param == ''){
    echo json_encode(['ERRO' => 'Informe o cliente que você deseja atualizar']);
    exit;
}

if($acao == 'delete' && $param != ''){
    

    $db = DB::connect();
    $rs = $db->prepare("DELETE FROM clientes WHERE id = {$param}");
    $exec = $rs->execute();
    
    if ($exec) {
        echo json_encode(["dados" => 'O Registro foi excluído com sucesso!']);
    } else {
        echo json_encode(["dados" => 'Erro ao tentar excluir os dados.']);
    }

    
}