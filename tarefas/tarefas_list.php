<?php 
    include('../incs/config.php');
    $stmt = $db->prepare("SELECT a.id, a.tarefa, b.nome AS nomeacao, c.nome AS nomeentidade,
     a.concluido
                            FROM todo.tarefas AS a
                            INNER JOIN todo.acoes AS b
                            ON a.id_acao = b.id
                            INNER JOIN todo.entidades as c
                            ON a.id_entidade = c.id");
    $stmt->execute();
    $tarefas = $stmt->fetchAll();
?>
<!doctype html>
<html lang="pt">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <title>ToDo App GPSI | v<?php echo $versao ?> </title>
  </head>
  <body>
    <?php include('../incs/nav.php');?>
    <div class="container-fluid pt-4">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        Gestão de Tarefas | Lista
                    </div>
                    <div class="card-body">
                        <a href="tarefas_add.php" class="btn btn-primary btn-lg">Criar nova</a>
                        <h5 class="card-title">Lista das Tarefas</h5>
                        <table class="table table-sm">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Tarefa</th>
                                <th scope="col">Ação</th>
                                <th scope="col">Entidade</th>
                                <th scope="col">Estado</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                foreach($tarefas as $tarefa){
                            ?>
                            <tr>
                                <th scope="row"><?php echo $tarefa['id']; ?></th>
                                <td><?php echo $tarefa['tarefa']; ?></td>
                                <td><?php echo $tarefa['nomeacao']; ?></td>
                                <td><?php echo $tarefa['nomeentidade']; ?></td>
                                <td>
                                    <?php 
                                    if($tarefa['concluido']=='0'){
                                        echo "Por fazer";
                                    }else{
                                       echo "feito";
                                    }
                                    ?>
                                </td>
                                <td>
                                    <a href="tarefas_edit.php?id=<?php echo $tarefa
                                    ['id']?>" class="btn btn-warning">Alterar</a>
                                    <a href="tarefas_del.php?id=<?php echo $tarefa
                                    ['id']?>" class="btn btn-danger">Eliminar</a>
                                    <?php 
                                     if($tarefa['concluido']=='0'){
                                       
                                    ?>
                                        <a href="tarefas_concluir.php?id=<?php echo $tarefa
                                        ['id']?>" class="btn btn-primary">concluir</a>
                                   <?php
                                     }
                                    ?>
                                </td>
                            </tr>
                            <?php
                                }
                            ?>
                        </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include('../incs/footer.php');?>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

    <!-- Option 2: jQuery, Popper.js, and Bootstrap JS
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    -->
  </body>
</html>