<?php session_start(); ?>

<?php
if(!isset($_SESSION['valid'])) {
	header('Location: login.php');
}
?>

<?php
//including the database connection file
include_once("connection.php");

//fetching data in descending order (lastest entry first)
$result = mysqli_query($mysqli, "SELECT * FROM proprietario WHERE id=".$_SESSION['id']." ORDER BY id DESC");
?>
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
	                      <a class="nav-link" href="add.html">Add Imovel</a>
	                   </li>
										 <li class="nav-item">
												<a class="nav-link" href="viewProprietario.php">Ajustes</a>
										 </li>
	                   <li class="nav-item">
	                      <a class="nav-link" href="logout.php">Logout</a>
	                   </li>
	                </ul>
	             </nav>
	             <h3 class="text-muted">Kitnet</h3>
	          </div>
<table class="table">
  <thead class="thead-inverse">
    <tr>
      <th>Nome</th>
      <th>Endereço</th>
      <th>Telefone</th>
      <th>RG</th>
      <th>CPF</th>
      <th>Email</th>
      <th>Username</th>
      <th>Senha</th>
      <th>Update</th>
    </tr>
  </thead>
  <tbody>
			<?php
			while($res = mysqli_fetch_array($result)) {
				echo "<tr>";
				echo "<td>".$res['nome']."</td> ";
				echo "<td>".$res['endereco']."</td>";
				echo "<td>".$res['telefone']."</td>";
				echo "<td>".$res['rg']."</td>";
				echo "<td>".$res['cpf']."</td>";
				echo "<td>".$res['email']."</td>";
				echo "<td>".$res['username']."</td>";
				echo "<td>".$res['senha']."</td>";
 				echo "<td><a class='btn btn-primary' href=\"editProprietario.php?id=$res[id]\">Edit</a> | <a class='btn btn-danger' href=\"deleteProprietario.php?id=$res[id]\" onClick=\"return confirm('Deletando sua conta voce removerá todos seus registros do banco de dados. Voce tem certeza?')\">Delete</a></td>";
			}
			?>
		</tr>
  </tbody>
</table>
</div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
  </body>
</html>
