<?php session_start();
include("connection.php");?>
<!DOCTYPE html>
<html lang="pt-BR">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta name="description" content="">
      <meta name="author" content="">
      <link rel="icon" href="https://getbootstrap.com/favicon.ico">
      <title>Kitnet</title>
      <!-- Bootstrap core CSS -->
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
      <!-- Custom styles for this template -->
      <link href="narrow-jumbotron.css" rel="stylesheet">
   </head>
   <body>
     <div class="container-fluid">
        <div class="header clearfix">
           <nav>
              <ul class="nav nav-pills float-right" role="tablist">
                 <li class="nav-item">
                    <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
                 </li>
                 <?php
                 if (!isset($_SESSION['valid']) && !isset($_SESSION['validCliente'])) {
                 echo "<li class='nav-item'>";
                 echo "<a class='nav-link' href='login.php'>Login</a>";
                 echo "</li>";
                 echo "<li class='nav-item'>";
                 echo "<a class='nav-link' href='registerProprietario.php'>Cadastre seu imovel</a>";
                 echo "</li>";
                 }
                 else if(isset($_SESSION['valid'])) {
                 echo "<li class='nav-item'>";
                 echo "<a class='nav-link' href='viewImovel.php'>Imoveis</a>";
                 echo "</li>";
                 echo "<li class='nav-item'>";
                 echo "<a class='nav-link' href='logout.php'>Logout</a>";
                 echo "</li>";
               }
               else if(isset($_SESSION['validCliente'])) {
                echo "<li class='nav-item'>";
                echo "<a class='nav-link' href=\"editcliente.php?id=$_SESSION[id]\">Editar conta</a>";
                echo "</li>";
                echo "<li class='nav-item'>";
                echo "<a class='nav-link' href='logout.php'>Logout</a>";
                echo "</li>";
              }
                 ?>
              </ul>
           </nav>
           <h3 class="text-muted">Kitnet</h3>
        </div>
        <div class="jumbotron">
          <?php
        if(isset($_SESSION['valid']) || isset($_SESSION['validCliente']) ) {

              $result = mysqli_query($mysqli, "SELECT * FROM proprietario");
              $result = mysqli_query($mysqli, "SELECT * FROM cliente");
              ?>

              Bem vindo <?php echo $_SESSION['nome'] ?>!
                <?php
            }
            else if (isset($_SESSION['validCliente'])) {
                $resultId = mysqli_query($mysqli, "SELECT * FROM cliente WHERE id=".$_SESSION['id']." ORDER BY id DESC");
                $rowId = mysqli_fetch_assoc($resultId);
                $_SESSION['id'] = $rowId['id'];
              } else {
                echo "Você deve estar logado para fazer qualquer tipo de negócio na pagina.<br/><br/>";

            }
            ?>
           <div class="input-group">
              <input type="text" class="form-control" placeholder="Search for Imóvel..." aria-label="Search for...">
              <span class="input-group-btn">
              <button class="btn btn-primary" type="button">Go!</button>
              </span>
           </div>
           <br>
           <h1 class="display-3">Enconte Casas e Kitnets para aluguél em Belém</h1>
           <p class="lead">Cras justo odio, dapibus ac facilisis in, egestas eget quam. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
           <?php if(!isset($_SESSION['valid']) && !isset($_SESSION['validCliente'])) {
             echo "<p><a class='btn btn-lg btn-success' href='registerCliente.php' role='button'>REGISTRE-SE</a></p>";
           } ?>
           <br>
        </div>
        <div class="row">
          <?php
          $resTresImovel = mysqli_query($mysqli, "SELECT * FROM imovel limit 3");
          if (isset($_SESSION['validCliente'])) {
            while ($res = mysqli_fetch_array($resTresImovel)) {
            echo "<div class='col-md-4'>";
            echo "<div class='card'>";
            echo "<img class='card-img-top' src='img-kitnet.jpg' alt='Card image cap'>";
            echo "<div class='card-body'>";
            echo "<h4 class='card-title'>".$res['tipo']."</h4>";
            echo "<p class='card-text'>".$res['descricao']."</p>";
            echo "</div>";
            echo "<div class='card-footer'>";
            echo "<small class='text-muted'>Last updated 3 mins ago</small>";
            echo "</div>";
            echo "</div>";
            echo "</div>";
            }

          }
           ?>
        </div>
        <footer class="footer">
           <p>&copy; Company 2017  | Código Fonte <a href="http://github.com/franknfjr/kitnet" target="_blank" title="Github">Github</a></p>
        </footer>
     </div>
</body>
</html>
