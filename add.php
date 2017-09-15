<?php session_start(); ?>
<?php
   if(!isset($_SESSION['valid'])) {
   	header('Location: login.php');
   }
   ?>
<html>
   <head>
      <title>Add Imovel</title>
   </head>
   <body>
      <?php
         //including the database connection file
         include_once("connection.php");

         if(isset($_POST['Submit'])) {
         	$endereco = $_POST['endereco'];
         	$bairro = $_POST['bairro'];
         	$cep = $_POST['cep'];
         	$valor_aluguel = $_POST['valor_aluguel'];
         	$desc = $_POST['descricao'];
         	$qtd_quartos = $_POST['qtd_quartos'];
         	$area_total = $_POST['area_total'];
         	$tipo = $_POST['tipo'];
         	$proprietario = $_SESSION['id'];


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

         		//link to the previous page
         		echo "<br/><a href='javascript:self.history.back();'>Voltar</a>";
         	} else {
         		// if all the fields are filled (not empty)

         		//insert data to database
         		$result = mysqli_query($mysqli, "INSERT INTO imovel(endereco, bairro, cep, valor_aluguel, descricao, qtd_quartos, area_total, tipo, proprietario_id) VALUES('$endereco','$bairro','$cep','$valor_aluguel','$desc','$qtd_quartos','$area_total','$tipo','$proprietario')");

         		//display success message
         		echo "<font color='green'>Data added successfully.";
         		echo "<br/><a href='viewImovel.php'>View Result</a>";
         	}
         }
         ?>
   </body>
</html>
