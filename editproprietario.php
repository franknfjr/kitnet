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
       $nome = $_POST['nome'];
       $endereco = $_POST['endereco'];
       $telefone = $_POST['telefone'];
       $rg = $_POST['rg'];
       $cpf = $_POST['cpf'];
       $email = $_POST['email'];
       $username = $_POST['username'];
       $senha = $_POST['senha'];

   	// checking empty fields
       if(empty($nome) || empty($endereco) || empty($telefone) || empty($rg) || empty($cpf) || empty($email) || empty($username) || empty($senha)){

           if(empty($nome)) {
               echo "<font color='red'>nome field is empty.</font><br/>";
           }
           if(empty($endereco)) {
               echo "<font color='red'>endereco field is empty.</font><br/>";
           }
           if(empty($telefone)) {
               echo "<font color='red'>telefone field is empty.</font><br/>";
           }
           if(empty($rg)) {
               echo "<font color='red'>Rg field is empty.</font><br/>";
           }
           if(empty($cpf)) {
               echo "<font color='red'>Cpf field is empty.</font><br/>";
           }
           if(empty($email)) {
               echo "<font color='red'>Email field is empty.</font><br/>";
           }
           if(empty($username)) {
               echo "<font color='red'>Username is empty.</font><br/>";
           }
           if(empty($senha)) {
               echo "<font color='red'>Senha field is empty.</font><br/>";
           }
       }else {
   		//updating the table
   		$result = mysqli_query($mysqli, "UPDATE proprietario SET nome='$nome', endereco='$endereco', telefone='$telefone', rg='$rg', cpf='$cpf', email='$email', username='$username', senha=md5('$senha') WHERE id=$id");

   		//redirectig to the display page. In our case, it is view.php
   		header("Location: viewProprietario.php");
   	}
   }
   ?>
<?php
   $id = $_GET['id'];
   //selecting data associated with this particular id
   $result = mysqli_query($mysqli, "SELECT * FROM proprietario WHERE id=$id");

   while($res = mysqli_fetch_array($result)) {
       $nome = $res['nome'];
       $endereco = $res['endereco'];
       $telefone = $res['telefone'];
       $rg = $res['rg'];
       $cpf = $res['cpf'];
       $email = $res['email'];
       $username = $res['username'];
       $senha = $res['senha'];

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
      <h2>Edit Proprietario</h2>
      <br>
      <form name="form1" method="post" action="editProprietario.php">
         <div class="form-row">
            <div class="form-group col-md-6">
               <label for="inputCity" class="col-form-label"><b>Nome</b></label>
               <input type="text" name="nome" value="<?php echo $nome;?>" class="form-control">
            </div>
            <div class="form-group col-md-6">
               <label for="inputState" class="col-form-label"><b>Endereco</b></label>
               <input type="text" name="endereco" value="<?php echo $endereco;?>" class="form-control">
            </div>
         </div>
         <div class="form-row">
            <div class="form-group col-md-6">
               <label for="inputCity" class="col-form-label"><b>Telefone</b></label>
               <input type="text" name="telefone" value="<?php echo $telefone;?>" class="form-control">
            </div>
            <div class="form-group col-md-2">
               <label for="inputState" class="col-form-label"><b>RG</b></label>
               <input type="text" name="rg" value="<?php echo $rg;?>" class="form-control">
            </div>
            <div class="form-group col-md-4">
               <label for="inputZip" class="col-form-label"><b>CPF</b></label>
               <input type="text" name="cpf" value="<?php echo $cpf;?>" class="form-control">
            </div>
         </div>
         <div class="form-group">
            <label for="inputAddress" class="col-form-label"><b>Email</b></label>
            <input type="text" name="email" value="<?php echo $email;?>" class="form-control">
         </div>
         <div class="form-group">
            <label for="inputAddress2" class="col-form-label"><b>Username</b></label>
            <input type="text" name="username" value="<?php echo $username;?>" class="form-control">
         </div>
         <div class="form-row">
            <div class="form-group col-md-6">
               <label for="inputEmail4" class="col-form-label"><b>Senha</b></label>
               <input type="text" name="senha" value="<?php echo $senha;?>"  class="form-control">
            </div>
         </div>
         <input type="hidden" name="id" value=<?php echo $_GET['id'];?>>
         <button type="submit" class="btn btn-primary pull-right" name="update" value="Update">Atualizar</button>
      </form>
   </body>
</html>
