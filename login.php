<?php session_start(); ?>
<html>
   <head>
      <title>Login</title>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
   </head>
   <body>
      <a href="index.php">Home</a> <br />
      <?php
         include("connection.php");

         if(isset($_POST['submit'])) {
             $user = mysqli_real_escape_string($mysqli, $_POST['username']);
             $pass = mysqli_real_escape_string($mysqli, $_POST['password']);

              if( $user != null && $pass !=null){
                 $result = mysqli_query($mysqli, "SELECT * FROM proprietario WHERE username='$user' AND senha=md5('$pass')")
                 or die("Could not execute the select query.");

                 $resultCliente = mysqli_query($mysqli, "SELECT * FROM cliente WHERE username='$user' AND senha=md5('$pass')")
                 or die("Could not execute the select query.");

                 $row = mysqli_fetch_assoc($result);
                 $rowCliente = mysqli_fetch_assoc($resultCliente);

                 if(is_array($row) && !empty($row)) {
                         $validuser = $row['username'];
                         $_SESSION['valid'] = $validuser;
                         $_SESSION['nome'] = $row['nome'];
                         $_SESSION['id'] = $row['id'];
                 } else if(is_array($rowCliente) && !empty($rowCliente)){
                         $validuser = $rowCliente['username'];
                         $_SESSION['validCliente'] = $validuser;
                         $_SESSION['nome'] = $rowCliente['nome'];
                         $_SESSION['id'] = $rowCliente['id'];
                 }else {
                     echo "Usuario ou senha invalidos.";
                     echo "<br/>";
                     echo "<a href='login.php'>Voltar</a>";
                 }

                 if(isset($_SESSION['valid']) || isset($_SESSION['validCliente'])){
                     header('Location: index.php');
                 }
             }
         } else {
             ?>
      <hr class="mb-5">
      <div class="col" align="center">
         <div class="col-md-6 offset-md-3" >
            <!-- form card login -->
            <div class="card card-outline-secondary">
               <div class="card-header">
                  <h3 class="mb-0">Login</h3>
               </div>
               <div class="card-block">
                  <form name="form1" method="post" action="" role="form" autocomplete="off">
                     <div class="form-group">
                        <label for="uname1">Username</label>
                        <input type="text" class="form-control" name="username" id="uname1" required="">
                     </div>
                     <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" name="password" required="" autocomplete="new-password">
                     </div>
                     <button type="submit" name="submit" value="Submit" class="btn btn-success btn-lg float-right">Login</button>
                  </form>
               </div>
               <!--/card-block-->
            </div>
            <!-- /form card login -->
            <div>
              <ul>
                <br>
                <li class="float-left"><a href="registerProprietario.php">Registre-se para ganhar dinheiro alugando um imóvel</a></li><br>
                <li class="float-left"><a href="registerCliente.php">Registre-se para alugar um imóvel</a></li>
              </ul>
            </div>
         </div>
      </div>
      </div>
      <?php
         }
         ?>
   </body>
</html>
