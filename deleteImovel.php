<?php session_start(); ?>
<?php
   if(!isset($_SESSION['valid'])) {
   	header('Location: login.php');
   }
   ?>
<?php
   //incluindo o arquivo de conexão do banco de dados
   include("connection.php");

   //obtendo identificação dos dados da url
   $id = $_GET['id'];

   //excluindo a linha da tabela
   $result=mysqli_query($mysqli, "DELETE FROM imovel WHERE id=$id");

   //redirecionando para a página de exibição (view.php no nosso caso
   header("Location:viewImovel.php");
?>
