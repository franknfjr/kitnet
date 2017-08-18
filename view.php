<?php session_start(); ?>

<?php
if(!isset($_SESSION['valid'])) {
	header('Location: login.php');
}
?>

<?php
//including the database connection file
include_once("connection.php");

//fetching data in descending order (lastest entry first)
$result = mysqli_query($mysqli, "SELECT * FROM imovel WHERE proprietario_id=".$_SESSION['id']." ORDER BY id DESC");
?>

<html>
<head>
	<title>View</title>
</head>

<body>
	<a href="index.php">Home</a> | <a href="add.html">Add Imovel</a> | <a href="logout.php">Logout</a>
	<br/><br/>
	
	<table width='80%' border=0>
		<tr bgcolor='#CCCCCC'>
            <td>Tipo</td>
			<td>Endereco</td>
			<td>Bairro</td>
			<td>Cep</td>
            <td>Valor aluguel</td>
            <td>Descricao</td>
            <td>Qtd quarto</td>
            <td>Area total</td>

            <td>Update</td>
		</tr>
		<?php
		while($res = mysqli_fetch_array($result)) {
			echo "<tr>";
            echo "<td>".$res['tipo']."</td> ";
            echo "<td>".$res['endereco']."<a href=\"maps.php\"> Maps</a></td>";
            echo "<td>".$res['bairro']."</td>";
			echo "<td>".$res['cep']."</td>";
			echo "<td>".$res['valor_aluguel']."</td>";
			echo "<td>".$res['descricao']."</td>";
			echo "<td>".$res['qtd_quartos']."</td>";
			echo "<td>".$res['area_total']."</td>";

			echo "<td><a href=\"edit.php?id=$res[id]\">Edit</a> | <a href=\"delete.php?id=$res[id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";
		}
		?>
	</table>	
</body>
</html>
