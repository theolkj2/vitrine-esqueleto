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
                    <a href="javascript:excluir(<?=$dados->id?>)" class="btn btn btn-danger" title="Excluir Dados" >
                        <i class="fas fa-trash" ></i>
                    </a>
                </td>
            </tr>
            <?php
            }
            ?>
        </tbody>   
        </table>
    </div>
</div>
<script>
    function excluir(id){
        Swal.fire({
            title:'voce deseja excluir esta categoria',
            showCancelButton: true,
            confirmButtonText: 'Excluir',
            cancelButtonText: 'Cancelar',
        }).then((result) => {
            if(result.isConfirmed){
                location.href='excluir/categorias/'+id;
                console.log('vc v');
            }
        });
    }
</script>