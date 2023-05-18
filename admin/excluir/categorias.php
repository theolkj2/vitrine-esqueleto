<?php 
    
       
        $sql = "select * from categoria where id = :id";
        $consulta = $pdo->prepare($sql);
        $consulta->bindParam(':id', $id);
        $consulta->execute();

        $dados = $consulta->fetch(PDO::FETCH_OBJ);

        if(empty($dados->id)){
            mensagemErro("Erro ao deletar");
        }

        $sql = "DELETE FROM categoria WHERE id = :id";
        $consulta = $pdo->prepare($sql);
        $consulta->bindParam(":id",$dados->id);

        if($consulta->execute()){
            echo "<script>location.href='listar/categorias'</script>";   
            exit;
        }

       
 
        


    