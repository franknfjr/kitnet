<html>
   <head>
      <title>Register</title>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
   </head>
   <body>
      <a href="index.html">Home</a> <br />
      <?php
         include("connection.php");

         if(isset($_POST['submit'])) {
         	$name = $_POST['name'];
          $address = $_POST['address'];
          $pnumber = $_POST['pnumber'];
          $rg = $_POST['rg'];
          $cpf = $_POST['cpf'];
         	$email = $_POST['email'];
         	$user = $_POST['username'];
         	$pass = $_POST['password'];

         	if($name == "" || $address == "" || $pnumber == "" || $rg == "" || $cpf == "" || $email == "" || $user == "" || $pass == ""){
         		echo "Todos os campos devem ser preenchidos. Um ou varios campos estao vazios.";
         		echo "<br/>";
         		echo "<a href='registerProprietario.php'>Voltar</a>";
         	} else {
         		mysqli_query($mysqli, "INSERT INTO proprietario(nome, endereco , telefone , rg, cpf, email, username, senha) VALUES('$name', '$address', '$pnumber', '$rg', '$cpf', '$email', '$user', md5('$pass'))")
         			or die("Could not execute the insert query.");

         		echo "Cadastrado com sucesso!";
         		echo "<br/>";
         		echo "<a href='login.php'>Login</a>";
         	}
         } else {
         ?>
      <div class="col-md-6 offset-md-3">
         <hr class="mb-5">
         <!-- form card registerProprietario -->
         <div class="card card-outline-secondary">
            <div class="card-header">
               <h3 class="mb-0">Sign Up</h3>
            </div>
            <div class="card-block">
               <form class="form" role="form" autocomplete="off" name="form1" method="post" action="">
                  <div class="form-group">
                     <label for="inputName">Name</label>
                     <input type="text" class="form-control" name="name" placeholder="Joao Pedro Cruz">
                  </div>
                  <div class="form-group">
                     <label for="inputName">Endereco</label>
                     <input type="text" class="form-control" name="address" placeholder="ex: Universidade Federal Rural da Amazonia">
                  </div>
                  <div class="form-group">
                     <label for="inputName">Telefone</label>
                     <input type="text" class="form-control" name="pnumber" placeholder="ex: 982457414">
                  </div>
                  <div class="form-group">
                     <label for="inputName">RG</label>
                     <input type="text" class="form-control" name="rg" placeholder="ex: 5545333">
                  </div>
                  <div class="form-group">
                     <label for="inputName">C.P.F</label>
                     <input type="text" class="form-control" name="cpf" placeholder="ex: 01247454522">
                  </div>
                  <div class="form-group">
                     <label for="inputEmail3">Email</label>
                     <input type="email" class="form-control" name="email" placeholder="ex: ufra@edu.br" required="">
                  </div>
                  <div class="form-group">
                     <label for="inputPassword3">Apelido</label>
                     <input type="text" class="form-control" name="username" placeholder="ex: 4head" required="">
                  </div>
                  <div class="form-group">
                     <label for="inputVerify3">Senha</label>
                     <input type="password" class="form-control" name="password" placeholder=" ****** " required="">
                  </div>
                  <div class="form-group">
                     <button type="submit" name="submit" value="Submit" class="btn btn-success btn-lg float-right">Register</button>
                  </div>
               </form>
            </div>
         </div>
         <!-- /form card registerProprietario -->
      </div>
      <?php
         }
         ?>
   </body>
</html>
