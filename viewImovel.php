<?php session_start(); ?>

<?php
if(!isset($_SESSION['valid'])) {
	header('Location: login.php');
}
?>

<?php
//including the database connection file
include_once("connection.php");

//verifica a página atual caso seja informada na URL, senão atribui como 1ª página
$pagina = (isset($_GET['pagina']))? $_GET['pagina'] : 1;

//fetching data in descending order (lastest entry first)
$result = mysqli_query($mysqli, "SELECT * FROM imovel WHERE proprietario_id=".$_SESSION['id']." ORDER BY id DESC");

//seleciona todos os itens da tabela
$res = mysqli_query($result);

//conta o total de itens
$total = mysqli_num_rows($res);

//seta a quantidade de itens por página, neste caso, 2 itens
$registros = 2;

//calcula o número de páginas arredondando o resultado para cima
$numPaginas = ceil($total/$registros);

//variavel para calcular o início da visualização com base na página atual
$inicio = ($registros*$pagina)-$registros;

//seleciona os itens por página
$result = mysqli_query($mysqli, "SELECT * FROM imovel WHERE proprietario_id=".$_SESSION['id']." ORDER BY id DESC LIMIT $inicio, $registros");
$res = mysqli_query($result);
$total = mysqli_num_rows($res);

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
		 <div class="container-fluid">
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
<table class="table table-hover table-sm table-responsive overflow-y: hidden">
  <thead class="thead-inverse">
    <tr>
      <th>Tipo</th>
      <th>Endereço</th>
      <th>Bairro</th>
      <th>Cep</th>
      <th>Valor ($)</th>
      <th>Descrição</th>
      <th>Qtd quartos</th>
      <th>Area Total</th>
      <th>Update</th>
    </tr>
  </thead>
  <tbody>
			<?php
			while($res = mysqli_fetch_array($result)) {
				echo "<tr>";
				echo "<td>".$res['tipo']."</td> ";
				echo "<td>".$res['endereco']."<a href=\"maps.php?id=$res[id]\"> Maps</a></td>";
				echo "<td>".$res['bairro']."</td>";
				echo "<td>".$res['cep']."</td>";
				echo "<td>".$res['valor_aluguel']."</td>";
				echo "<td>".$res['descricao']."</td>";
				echo "<td>".$res['qtd_quartos']."</td>";
				echo "<td>".$res['area_total']."</td>";
 				echo "<td><a class='btn btn-primary' href=\"editImovel.php?id=$res[id]\">Edit</a> | <a class='btn btn-danger' href=\"delete.php?id=$res[id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";
			}

			//exibe a paginação
    	for($i = 1; $i < $numPaginas+1; $i++) {
        echo "<a href='viewImovel.php?pagina=$i'>".$i."</a> ";
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
