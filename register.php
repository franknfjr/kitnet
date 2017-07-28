<html>
<head>
	<title>Register</title>
</head>

<body>
<a href="index.php">Home</a> <br />
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
		echo "All fields should be filled. Either one or many fields are empty.";
		echo "<br/>";
		echo "<a href='register.php'>Go back</a>";
	} else {
		mysqli_query($mysqli, "INSERT INTO proprietario(nome, endereco , telefone , rg, cpf, email, username, senha) VALUES('$name', '$address', '$pnumber', '$rg', '$cpf', '$email', '$user', md5('$pass'))")
			or die("Could not execute the insert query.");
			
		echo "Registration successfully";
		echo "<br/>";
		echo "<a href='login.php'>Login</a>";
	}
} else {
?>
	<p><font size="+2">Register</font></p>
	<form name="form1" method="post" action="">
		<table width="75%" border="0">
			<tr> 
				<td width="10%">Full Name</td>
				<td><input type="text" name="name"></td>
			</tr>
            <tr>
                <td width="10%">Address</td>
                <td><input type="text" name="address"></td>
            </tr>
            <tr>
                <td width="10%">Phone number</td>
                <td><input type="text" name="pnumber"></td>
            </tr>
            <tr>
                <td>Rg</td>
                <td><input type="text" name="rg"></td>
            </tr>
            <tr>
                <td>Cpf</td>
                <td><input type="text" name="cpf"></td>
            </tr>
			<tr> 
				<td>Email</td>
				<td><input type="text" name="email"></td>
			</tr>			
			<tr> 
				<td>Username</td>
				<td><input type="text" name="username"></td>
			</tr>
			<tr> 
				<td>Password</td>
				<td><input type="password" name="password"></td>
			</tr>
			<tr> 
				<td>&nbsp;</td>
				<td><input type="submit" name="submit" value="Submit"></td>
			</tr>
		</table>
	</form>
<?php
}
?>
</body>
</html>
