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
            echo "<font color='red'>Valor field is empty.</font><br/>";
        }
        if(empty($cpf)) {
            echo "<font color='red'>cpf field is empty.</font><br/>";
        }
        if(empty($email)) {
            echo "<font color='red'>Qtd quartos field is empty.</font><br/>";
        }
        if(empty($username)) {
            echo "<font color='red'>Area field is empty.</font><br/>";
        }
        if(empty($senha)) {
            echo "<font color='red'>senha field is empty.</font><br/>";
        }
    }else {
		//updating the table
		$result = mysqli_query($mysqli, "UPDATE proprietario SET nome='$nome', endereco='$endereco', telefone='$telefone', rg='$rg', cpf='$cpf', email='$email', username='$username', senha='$senha'");

		//redirectig to the display page. In our case, it is view.php
		header("Location: view.php");
	}
}
?>
<?php
//getting id from url

//selecting data associated with this particular id
$result = mysqli_query($mysqli, "SELECT * FROM proprietario");

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
<html>
<head>
	<title>Edit proprietario</title>
</head>

<body>
	<a href="index.php">Home</a> | <a href="view.php">View proprietario</a> | <a href="logout.php">Logout</a>
	<br/><br/>


    <form name="form1"  method="post" action="edituser.php">
        <table width="25%" border="0">
            <tr>
                <td>nome</td>
                <td><input type="text" name="nome" value="<?php echo $nome;?>"></td>
            </tr>
            <tr>
                <td>endereco</td>
                <td><input type="text" name="endereco" value="<?php echo $endereco;?>"></td>
            </tr>
            <tr>
                <td>telefone</td>
                <td><input type="text" name="telefone" value="<?php echo $telefone;?>"></td>
            </tr>
            <tr>
                <td>Valor</td>
                <td><input type="text" name="rg" value="<?php echo $rg;?>"></td>
            </tr>
            <tr>
                <td>cpf</td>
                <td><input type="text" name="cpf" value="<?php echo $cpf;?>"></td>
            </tr>
            <tr>
                <td>Qdt Quartos</td>
                <td><input type="text" name="email" value="<?php echo $email;?>"></td>
            </tr>
            <tr>
                <td>Area total</td>
                <td><input type="text" name="username" value="<?php echo $username;?>"></td>
            </tr>
            <tr>
                <td>senha</td><td><input type="text" name="senha" value="<?php echo $senha;?>"></td>
            </tr>
            <tr>
         <td><input type="submit" name="update" value="Update"></td>
            </tr>
        </table>
    </form>
</body>
</html>
