<?php 
    include('../incs/config.php');
   $stmt = $db->prepare("SELECT * FROM todo.acoes ORDER BY nome ASC");
   $stmt->execute();
   $acoes = $stmt->fetchAll(); 
    
   $stmt = $db->prepare("SELECT * FROM todo.entidades ORDER BY nome ASC");
   $stmt->execute(); 
   $entidades = $stmt->fetchAll();
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
    <div class="container pt-4">
      <h1>
        <p class="text-muted">
        Tarefas
        </p>
      </h1>
    </div> 
    <div class="container pt-4">
        <div class="row">
            <div class="col-8">
                <div class="card">
                    <div class="card-header">
                        Gestão de Tarefas | Adicionar
                    </div>
                    <div class="card-body">
                        <form action="trata_tarefa_add.php" method="post">

                          <div class="form-group">
                           <label for="tarefa">Tarefa</label>
                           <input type="text" name="tarefa" id="tarefa" class="form-control" 
                           maxlength="20" required>
                          </div>

                          <div class="form-group">
                           <label for="descricao">Descrição</label>
                           <textarea name="descricao" id="descricao" rows="3" class="form-control" max=256></textarea>
                          </div>

                          <div class="form-group"> 
                            <label for="acao">Ação</label>
                            <select name="acao" id="acao" class="form-control">
                              <?php foreach ($acoes as $acao){ 
                                ?> 
                                  <option value="<?php echo $acao['id']; ?>"><?php echo $acao
                                   ['nome'];?>
                                  </option>
                                <?php
                                } ?>
                            </select>
                          </div>

                          <div class="form-group">
                            <label for="entidade">Entidade</label>
                            
                            <select name="entidade" id="entidade" class="form-control">
                             <?php foreach ($entidades as $entidade) { 
                              ?>
                               <option value="<?php echo $entidade['id'];?>"><?php echo
                                $entidade['nome']; ?></option>
                                <?php 
                              } ?>  
                            </select> 
                          </div>

                          <div class="form-group">
                            <label for="data">Data</label>
                            <input type="Date" name="data" id="data" class="form-control">
                          </div>

                          <div class="form-group">
                            <label for="hora">Hora</label>
                            <input type="time" name="hora" id="hora" class="form-control">
                          </div>
                          <input type="submit" value="Confirmar" class="btn btn-primary">
                          </form>
                          
                      </div>
                </div>
            </div>
        </div>
    </div>
  
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