<?php

    //Aqui esta validando se estar recebendo algum POST
    if($_POST){
    //Aqui esta capturando os dados dos formulario que foram enviados no campo nome e id 
    $id = $_POST["id"] ?? NULL;    
    $nome = $_POST["nome"] ?? NULL;
    
    //Aqui esta validando se foi digitado algum nome no campo nome
    if (empty($nome)) {
        mensagemErro("Digite um nome");
    }

    //Aqui estamos fazendo um select para validar se existe uma categoria com o mesmo nome comparando o nome e se o 
    //id digitado é dfferente do banco 
    $sql = "SELECT id FROM categoria WHERE nome = :nome and id <> :id";
    //Esta preparando o sql para o bando de dados
    $consulta = $pdo->prepare($sql);
    //Esta pegando o parametro :nome e prepara para fazer a consulta no banco de dados
    $consulta->bindParam(":nome", $nome);
    //Esta pegando o parametro :id e prepara para fazer a consulta no banco de dados
    $consulta->bindParam(":id", $id);
    //Aqui esta executando o bando de dados
    $consulta->execute();

    //Aqui estamos convertendo o que esta vindo do banco em objeto para o php conseguir validar
    $dados = $consulta->fetch(PDO::FETCH_OBJ);

    //Aqui ta validando se ja existe uma categoria com o mesmo nome ja existente passado em :nome e se caso exista ele de uma mensagem de erro 
    if (!empty($dados->id)) {
        mensagemErro("Já existe uma categoria com esse nome");
    }

    //Aqui ta validando se não existe uma id ele insira uma categoria na tabela e se já existe faça a alteração do nome da tabela
    if(empty($id)){
        //Aqui estamos fazendo um insert na tabela para inserir uma nova categoria
        $sql = "insert into categoria (nome) values (:nome)";
        //Esta preparando o sql para o bando de dados
        $consulta = $pdo->prepare($sql);
        //Esta pegando o parametro :nome e prepara para fazer a consulta no banco de dados
        $consulta->bindParam(":nome", $nome);
    }else{
        //Aqui esta fazendo um uptade na tabela caso ja exita um id com o nome da tabela ele subistitua o nome da tabela
        $sql = "update categoria set nome = :nome where id = :id";
        //Esta preparando o sql para o bando de dados
        $consulta = $pdo->prepare($sql);
        //Esta pegando o parametro :nome e prepara para fazer a consulta no banco de dados
        $consulta->bindParam(":nome", $nome);
        //Esta pegando o parametro :id e prepara para fazer a consulta no banco de dados
        $consulta->bindParam(":id", $id);

    }
   
    //Aqui ele ta executando o sql caso nao consiga ele mostre uma mensagem de erro
    if (!$consulta->execute()){
        mensagemErro("Nao foi possivel salvar os dados");
    }

    //Aqui esta setando na url o caminho que ele ira fazer ao salvar a categoria 
    echo "<script>location.href='listar/categorias'</script>";


    }