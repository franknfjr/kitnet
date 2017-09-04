<?php session_start(); ?>
<html>
<head>
    <title>Homepage</title>
    <link href="style.css" rel="stylesheet" type="text/css">
</head>

<body>
<div id="header">
    Bem vindo ao Kit Net!
</div>
<?php
if(isset($_SESSION['valid'])) {
    include("connection.php");
    $result = mysqli_query($mysqli, "SELECT * FROM proprietario");
    ?>

    Bem vindo <?php echo $_SESSION['nome'] ?> ! <a href='logout.php'>Logout</a><br/>
    <br/>
    <a href='viewImovel.php'>Visualizar e adicionar Imóveis</a>
    <br/><br/>
    <?php
} else {
    echo "Você deve estar logado para ver esta página.<br/><br/>";
    echo "<a href='login.php'>Login</a> | <a href='register.php'>Register</a>";
}
?>
<div id="footer">
    Codigo fonte <a href="http://github.com/franknfjr/kitnet" title="Github">Github</a>
</div>
</body>
</html>
