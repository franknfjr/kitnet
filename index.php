<?php session_start(); ?>
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
     <div class="container">
        <div class="header clearfix">
           <nav>
              <ul class="nav nav-pills float-right" role="tablist">
                 <li class="nav-item">
                    <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
                 </li>
                 <li class="nav-item">
                    <a class="nav-link" href="login.php">Login</a>
                 </li>
                 <?php
                 if(isset($_SESSION['valid'])) {
                 echo "<li class='nav-item'>";
                 echo "<a class='nav-link' href='viewImovel.php'>Imoveis</a>";
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
          if(isset($_SESSION['valid'])) {
              include("connection.php");
              $result = mysqli_query($mysqli, "SELECT * FROM proprietario");
              ?>

              Bem vindo <?php echo $_SESSION['nome'] ?>!
                <?php
            } else {
                echo "Você deve estar logado para fazer qualquer tipo de negócio na pagina.<br/><br/>";
                //echo "<a href='login.php'>Login</a> | <a href='registerProprietario.php'>Register</a>";
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
           <p><a class="btn btn-lg btn-success" href="registerProprietario.php" role="button">Sign up today</a></p>
           <br>
        </div>
        <div class="row">
           <div class="col-md-4">
              <div class="card">
                 <img class="card-img-top" src="img-kitnet.jpg" alt="Card image cap">
                 <div class="card-body">
                    <h4 class="card-title">Kitnet title</h4>
                    <p class="card-text">Aluga-se kitnet com 1 quarto ou casa com 2 quartos, cozinha americana, banheiro social e área de serviço no em um residencial seguro e confortável próximo ao centro de Castanhal-Pa. </p>
                 </div>
                 <div class="card-footer">
                    <small class="text-muted">Last updated 3 mins ago</small>
                 </div>
              </div>
           </div>
           <div class="col-md-4">
              <div class="card">
                 <img class="card-img-top" src="img-kitnet.jpg" alt="Card image cap">
                 <div class="card-body">
                    <h4 class="card-title">Kitnet title</h4>
                    <p class="card-text">Aluga-se kitnet com 1 quarto ou casa com 2 quartos, cozinha americana, banheiro social e área de serviço no em um residencial seguro e confortável próximo ao centro de Castanhal-Pa. </p>
                 </div>
                 <div class="card-footer">
                    <small class="text-muted">Last updated 3 mins ago</small>
                 </div>
              </div>
           </div>
           <div class="col-md-4">
              <div class="card">
                 <img class="card-img-top" src="img-kitnet.jpg" alt="Card image cap">
                 <div class="card-body">
                    <h4 class="card-title">Kitnet title</h4>
                    <p class="card-text">Aluga-se kitnet com 1 quarto ou casa com 2 quartos, cozinha americana, banheiro social e área de serviço no em um residencial seguro e confortável próximo ao centro de Castanhal-Pa. </p>
                 </div>
                 <div class="card-footer">
                    <small class="text-muted">Last updated 3 mins ago</small>
                 </div>
              </div>
           </div>
        </div>
        <footer class="footer">
           <p>&copy; Company 2017  | Código Fonte <a href="http://github.com/franknfjr/kitnet" target="_blank" title="Github">Github</a></p>
        </footer>
     </div>
</body>
</html>
