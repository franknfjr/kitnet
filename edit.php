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
		
		//redirectig to the display page. In our case, it is view.php
		header("Location: view.php");
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
<html>
<head>	
	<title>Edit Imovel</title>
</head>

<body>
	<a href="index.php">Home</a> | <a href="view.php">View Imovel</a> | <a href="logout.php">Logout</a>
	<br/><br/>


    <form name="form1"  method="post" action="edit.php">
        <table width="25%" border="0">
            <tr>
                <td>Endereco</td>
                <td><input type="text" name="endereco" value="<?php echo $endereco;?>"></td>
            </tr>
            <tr>
                <td>Bairro</td>
                <td><input type="text" name="bairro" value="<?php echo $bairro;?>"></td>
            </tr>
            <tr>
                <td>Cep</td>
                <td><input type="text" name="cep" value="<?php echo $cep;?>"></td>
            </tr>
            <tr>
                <td>Valor</td>
                <td><input type="text" name="valor_aluguel" value="<?php echo $valor_aluguel;?>"></td>
            </tr>
            <tr>
                <td>Descricao</td>
                <td><input type="text" name="descricao" value="<?php echo $desc;?>"></td>
            </tr>
            <tr>
                <td>Qdt Quartos</td>
                <td><input type="text" name="qtd_quartos" value="<?php echo $qtd_quartos;?>"></td>
            </tr>
            <tr>
                <td>Area total</td>
                <td><input type="text" name="area_total" value="<?php echo $area_total;?>"></td>
            </tr>
            <tr>
                <td>Tipo</td>
                <td><input type="text" name="tipo" value="<?php echo $tipo;?>"></td>
            </tr>
            <tr>
                <td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
                <td><input type="submit" name="update" value="Update"></td>
            </tr>
        </table>
    </form>
</body>
</html>
