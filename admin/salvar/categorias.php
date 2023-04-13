<?php

    $nome = $_POST["nome"] ?? NULL;
    

    $sql = "";

    $consulta = $pdo->prepare($sql);
    $consulta->execute();

    $dados = $consulta->fetch(PDO::FETCH_OBJ);

