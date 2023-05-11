
<?php
    if(!empty($id)){
        $sql = "SELECT nome,id FROM categoria WHERE id = :id";
        $consulta = $pdo->prepare($sql);
        $consulta->bindParam(":id", $id);
        $consulta->execute();
        $dados = $consulta->fetch(PDO::FETCH_OBJ); 

        if(!$dados){
            $dados = (object)[
                "nome" => "",
            ];
            $mensagemBtn = "Cadastrar";
        }else{
            $mensagemBtn = "Editar";
        }
       
    }else{
        $dados = (object)[
            "nome" => "",
            "id" => "",
        ];
        $mensagemBtn = "Cadastrar";
    }

?>

<div class="card">
    <div class="card-header">
        <h2 class="float-left" >Cadastro de Categorias</h2>
        <div class="float-right">
            <a href="listar/categorias" class="btn btn-success">
                Listar Categorias
            </a>
        </div>
    </div>
    <div class="card-body">
        <form method="POST" action="salvar/categorias" >
            <label for="id">Id</label>
            <input type="text" name="id" id="id" required placeholder="preencha este campo" class="form-control" value="<?php echo"$dados->id";?>">

            <br>

            <label for="nome">Nome</label>
            <input type="text" name="nome" id="nome" required placeholder="preencha este campo" class="form-control" value="<?php echo"$dados->nome";?>" >
            <br>

            <button type="submit" class="btn btn-success w-100">Salvar Dados</button>
        </form>
    </div>
</div>