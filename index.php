<?php include('incs/config.php');
$data= date('y-m-d');
    $stmt = $db->prepare("SELECT a.id, a.tarefa, a.data, b.nome AS nomeacao, c.nome AS nomeentidade,
     a.hora 
                            FROM todo.tarefas AS a
                            INNER JOIN todo.acoes AS b
                            ON a.id_acao = b.id
                            INNER JOIN todo.entidades as c
                            ON a.id_entidade = c.id
                            WHERE a.data= :data");
    $stmt->bindParam(':data',$data);
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
    <?php include('incs/nav.php');?>
    <div class="container pt-4">
      <h1>
        <p class="text-muted">
          Tarefas agendadas para hoje
        </p>
      </h1>
    </div>

    <div class="container  pt-4">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        Gestão de Tarefas | Lista
                    </div>
                    <div class="card-body">
                    <a href="/todo/tarefas/tarefas_list.php" class="btn btn-primary">Lista de Tarefas</a>
                    <div class="card-body pt-4">    
                        <table class="table table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Tarefa</th>
                                <th scope="col">Ação</th>
                                <th scope="col">Entidade</th>
                                <th scope="col">data</th>
                                <th scope="col">hora</th>
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
                                <td><?php echo $tarefa['data']; ?></td>
                                <td><?php echo $tarefa['hora']; ?></td>
                                
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
    <?php
    $stmt = $db->prepare("SELECT a.id, a.tarefa, b.nome AS nomeacao, c.nome AS nomeentidade,
     a.concluido
                            FROM todo.tarefas AS a
                            INNER JOIN todo.acoes AS b
                            ON a.id_acao = b.id
                            INNER JOIN todo.entidades as c
                            ON a.id_entidade = c.id
                            WHERE a.concluido= 1");
    $stmt->execute();
    $tarefas = $stmt->fetchAll();
    ?>
    <div class="container pt-4">
      <h1>
        <p class="text-muted">
          Tarefas concluidas
        </p>
      </h1>
    </div>

    <div class="container  pt-4">
        <div class="row">
            <div class="col-8">
                <div class="card">
                    <div class="card-header">
                        Gestão de Tarefas | Lista
                    </div>
                    <div class="card-body">
                    <a href="/todo/tarefas/tarefas_list.php" class="btn btn-primary">Lista de Tarefas</a>
                    <div class="card-body pt-4">    
                        <table class="table table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Tarefa</th>
                                <th scope="col">Ação</th>
                                <th scope="col">Entidade</th>
                                
                              
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



   
   
    <?php include('incs/footer.php');?>
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