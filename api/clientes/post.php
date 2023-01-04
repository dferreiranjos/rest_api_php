<?php

    if($acao == ''){ echo json_encode(['ERRO' => 'Caminho não encontrado!']); exit;}
    if($acao == 'adiciona' && $param == ''){
        
        $sql = 'INSERT INTO clientes(';

        foreach(array_keys($_POST) as $key){
            $sql .= "{$key},";
        }

        $sql = substr($sql, 0, -1);
        $sql .= ') VALUES(';

        foreach(array_values($_POST) as $values){
            $sql .= "'$values',";
        }
        
        $sql = substr($sql, 0, -1);
        $sql .= ');';

        $db = DB::connect();
        $rs = $db->prepare($sql);
        $exec = $rs->execute();
        
        if ($exec) {
            echo json_encode(["dados" => 'Os dados foram inseridos com sucesso!']);
        } else {
            echo json_encode(["dados" => 'Erro ao inserir os dados.']);
        }
    }