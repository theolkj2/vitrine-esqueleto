<div class="card">
    <div class="card-body">
    <table class="table table-bordered table-hover table-striped">
        <tr> 
          <td>Código</td> 
          <td>Nome</td> 
          <td>Opçoes</td>
        </tr>
        <tbody>
            <?php
            $sql = "SELECT * FROM categoria";
            $consulta = $pdo->prepare($sql);
            $consulta->execute();
            while ($dados = $consulta->fetch(PDO::FETCH_OBJ)){
            ?>
            <tr>
                <td><?=$dados->id?></td>
                <td><?=$dados->nome?></td>
                <td>
                    <a href="cadastros/categorias/<?=$dados->id?>" class="btn btn btn-warning">Editar</a>
                    <form action="deletar/categorias" method="post">
                            <input type="hidden" name="id" value="<?php echo"$dados->id"?>">
                            <input type="submit" class="btn btn-danger" value="Excluir">
                        </form>
                </td>
            </tr>
            <?php
            }
            ?>
        </tbody>   
        </table>
    </div>
</div>