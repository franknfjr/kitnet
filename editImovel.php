<?php session_start(); ?>

<?php
if(!isset($_SESSION['valid'])) {
	header('Location: login.php');
}
?>

<?php
// including the database connection file
include_once("connection.php");

if(isset($_POST['update'])) {

    $id = $_POST['id'];

    $endereco = $_POST['endereco'];
    $bairro = $_POST['bairro'];
    $cep = $_POST['cep'];
    $valor_aluguel = $_POST['valor_aluguel'];
    $desc = $_POST['descricao'];
    $qtd_quartos = $_POST['qtd_quartos'];
    $area_total = $_POST['area_total'];
    $tipo = $_POST['tipo'];

	// checking empty fields
    if(empty($endereco) || empty($bairro) || empty($cep) || empty($valor_aluguel) || empty($desc) || empty($qtd_quartos) || empty($area_total) || empty($tipo)){

        if(empty($endereco)) {
            echo "<font color='red'>Endereco field is empty.</font><br/>";
        }
        if(empty($bairro)) {
            echo "<font color='red'>Bairro field is empty.</font><br/>";
        }
        if(empty($cep)) {
            echo "<font color='red'>Cep field is empty.</font><br/>";
        }
        if(empty($valor_aluguel)) {
            echo "<font color='red'>Valor field is empty.</font><br/>";
        }
        if(empty($desc)) {
            echo "<font color='red'>Descricao field is empty.</font><br/>";
        }
        if(empty($qtd_quartos)) {
            echo "<font color='red'>Qtd quartos field is empty.</font><br/>";
        }
        if(empty($area_total)) {
            echo "<font color='red'>Area field is empty.</font><br/>";
        }
        if(empty($tipo)) {
            echo "<font color='red'>Tipo field is empty.</font><br/>";
        }
    }else {
		//updating the table
		$result = mysqli_query($mysqli, "UPDATE imovel SET endereco='$endereco', bairro='$bairro', cep='$cep', valor_aluguel='$valor_aluguel', descricao='$desc', qtd_quartos='$qtd_quartos', area_total='$area_total', tipo='$tipo' WHERE id=$id");

		//redirectig to the display page. In our case, it is viewImovel.php
		header("Location: viewImovel.php");
	}
}
?>
<?php
//getting id from url
$id = $_GET['id'];

//selecting data associated with this particular id
$result = mysqli_query($mysqli, "SELECT * FROM imovel WHERE id=$id");

while($res = mysqli_fetch_array($result)) {
    $endereco = $res['endereco'];
    $bairro = $res['bairro'];
    $cep = $res['cep'];
    $valor_aluguel = $res['valor_aluguel'];
    $desc = $res['descricao'];
    $qtd_quartos = $res['qtd_quartos'];
    $area_total = $res['area_total'];
    $tipo = $res['tipo'];

}
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
         <h2>Edit Imovel</h2>
         <br>
    <form name="form1"  method="post" action="editImovel.php">
			<div class="form-row align-items-center">
				 <div class="col-auto">
						<label class="mr-sm-2" for="inlineFormCustomSelect"><b>Tipo de Imóvel</b></label>
						<select class="custom-select mb-2 mr-sm-2 mb-sm-0" name="tipo">
							 <option value="casa comum" selected>Casa Comum</option>
							 <option value="casa de praia">Casa de Praia</option>
							 <option value="kitnet">Kitnet</option>
							 <option value="apartamento">Apartamento</option>
							 <option value="chale">Chalé</option>
						</select>
				 </div>
			</div>
			<div class="form-row">
				 <div class="form-group col-md-6">
						<label for="inputCity" class="col-form-label"><b>Endereco</b></label>
						<input type="text" name="endereco" value="<?php echo $endereco;?>" class="form-control">
				 </div>
				 <div class="form-group col-md-4">
						<label for="inputState" class="col-form-label"><b>Bairro</b></label>
						<input type="text" name="bairro" value="<?php echo $bairro;?>" class="form-control">
				 </div>
				 <div class="form-group col-md-2">
						<label for="inputZip" class="col-form-label"><b>CEP</b></label>
						<input type="text" name="cep" value="<?php echo $cep;?>" class="form-control">
				 </div>
			</div>
			<div class="form-row">
				 <div class="form-group col-md-4">
						<label for="inputEmail4" class="col-form-label"><b>Valor</b></label>
						<input type="text" name="valor_aluguel" value="<?php echo $valor_aluguel;?>" class="form-control">
				 </div>
			</div>
			<div class="form-group">
				 <label for="inputAddress" class="col-form-label"><b>Descrição</b></label>
				 <input type="text" name="descricao" value="<?php echo $desc;?>" class="form-control">
			</div>
			<div class="form-group">
				 <label for="inputAddress2" class="col-form-label"><b>Quantidade de quartos</b></label>
				 <input type="text" name="qtd_quartos" value="<?php echo $qtd_quartos;?>" class="form-control">
			</div>
			<div class="form-row">
				 <div class="form-group col-md-4">
						<label for="inputEmail4" class="col-form-label"><b>Área em m² do Imóvel</b></label>
						<input type="text" name="area_total" value="<?php echo $area_total;?>"  class="form-control">
				 </div>
			</div>
      <input type="hidden" name="id" value=<?php echo $_GET['id'];?>>
         <button type="submit" class="btn btn-primary pull-right" name="update" value="Update">Atualizar</button>

    </form>
</body>
</html>
