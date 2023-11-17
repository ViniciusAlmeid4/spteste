      <?php
        session_start();
        if(!isset($_SESSION["user"]))
        {
          echo "<script language='javascript' type='text/javascript'>
          window.location.href='index.php';
          </script>";
          exit();
        }
        $id = $_GET['id'];
        $_SESSION["turma"] = $id;
      ?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="content-language" content="pt-br">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SPTEST</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
		<link  href="css/headers.css" rel="stylesheet">
  </head>
  <body>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <div class="container-fluid ">
      <?php
      echo "<div>";
      if (empty($_SESSION["user"])){
        echo "<a class='text-start' href='log.php' style='color: black; text-decoration: none; font-weight: bold;>Login </a>";
        echo "<a class='text-end' href='sair.php' style='color: black; text-decoration: none; font-weight: bold;'> Sair</a>";
      }
      else {
        $usuario = $_SESSION["user"];
        echo "<b class='text-start'><font color='black'> ".$usuario." </font></b>";
        echo "<a class='text-end' href='sair.php' style='color: black; text-decoration: none; font-weight: bold;'> Sair</a>";
      }
      echo "</div>";
      ?>
      <br/>
      <hr>
      <br/>
      <div class="row row-cols-2 row-cols-md-1 mb-3 text-center">
      <div class="col">
        <div class="card mb-4 rounded-3 shadow-sm">
        <div class="card-header py-2">
            <?php
                $id=$_GET['id'];
                include_once('conecta.php');
                $sql = "SELECT * FROM turma WHERE id=$id";
                $query = $conn->query($sql);
                while ($dados = $query->fetch_array()) {
                  $nome = $dados['nome'];
                }
                ?>
            <h4 class="d-inline text-nome-turma"><b><?php echo $nome; ?></b></h4>
            <button type="button" class="d-inline btn btn-primary button-cadastra" data-bs-toggle="modal" data-bs-target="#exampleModal">Cadastrar Atividade</button>
          </div>
          <div class="card-body">
            <table class="table table-hover">
            <thead>
            <tr>
            <th scope="col">Número</th>
                <th scope="col">Nome</th>
            </tr>
            </thead>
            <tbody>
            <?php
              include 'conecta.php';
              $id=$_GET['id'];
              $pesquisa = mysqli_query($conn, "SELECT * FROM atividade WHERE id_turma=".$id."");
              $row = mysqli_num_rows($pesquisa);
              if ($row > 0) {
                while ($registro = $pesquisa -> fetch_array()) {
                  $id = $registro['id'];
                  echo '<tr>';
                  echo '<td>'.$registro['id'].'</td>';
                  echo '<td>'.$registro['atividade'].'</td>';
                  echo '</tr>';
                }
                echo '</tbody>';
                echo '</table>';
              } else {
                echo "Não há atividades cadastradas!";
                echo '</tbody>';
                echo '</table>';
              }
              ?>
          </div>
        </div>
      </div>
    </div>
    </div>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Cadastrar Nova Atividade</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="cadatividade.php" method="POST">
            <div class="form-group">
                <label>Nome</label>
                <input type="text" class="form-control" name="nome" placeholder="Insira o nome da atividade" required/>
                <br/>
              </div>
            </form>
          </div>
          <div class="modal-footer">
        <button type="submit" class="btn btn-outline-success">Cadastrar</button>
        <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Fechar</button>
      </div>
    </div>
  </div>
</div>
  </body>
</html>