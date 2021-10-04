<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="desafio.css">
	<title>Google</title>
	<meta charset="UTF-8"/>
</head>
<body>
	<h1>Etanol ou Gasolina?</h1>
	<form action="" method="GET">
		<fieldset>
			<input type="text" placeholder="Preço Etanol" class="pesquisa" name="etanol"><br><br>
            <input type="text" placeholder="Preço Gasolina" class="pesquisa" name="gasolina"><br><br>
			<button class="enviar">Cálculo</button><br>
		</fieldset>
	</form> 
	
<?php
session_start();
date_default_timezone_set('America/Sao_Paulo');

if (isset($_COOKIE['cookie_teste'])) {
	echo 'Útimo acesso ', strftime( '%d/%m/%Y %H:%M:%S');
	
} else {
	echo 'Bem vindo!';
	setcookie('cookie_teste', 'Algum valor...', time() + 30);
}
	echo "<br><br> ";

//var_dump($_GET);// printa um array ou variavel
// exit; //para a execucao
$preco_etanol = $_GET["etanol"];
$preco_gasolina = $_GET["gasolina"];
$porcentagem = $preco_etanol / $preco_gasolina;
// echo isset($porcentagemn);

if($porcentagem < 0.7){
   $melhor_combustivel = "Etanol";
} else {
   $melhor_combustivel = "Gasolina";
}


if(isset($_GET["etanol"]) && isset($_GET["gasolina"]) && $preco_gasolina != "" && $preco_etanol != ""){
	echo "Abasteça com ${melhor_combustivel} <br>";
}

//Connect To Database

	
$hostname="localhost";
$username="root";
$password="root";
$dbname="calculadora_php";


$mysqli_connection = new MySQLi($hostname, $username, $password, $dbname);
if($mysqli_connection->connect_error){
   echo "Desconectado! Erro: " . $mysqli_connection->connect_error;
   exit;
}
// else{
//    echo "Conectado!";
// }
$data = date("Y-m-d H:i:s");
$mysqli_query = "INSERT INTO informacoes (data, etanol, gasolina, calculo) VALUES ('$data', '{$preco_etanol}', {$preco_gasolina}, {$porcentagem})";

if(isset($_GET["etanol"]) && isset($_GET["gasolina"])){
	$result = mysqli_query($mysqli_connection, $mysqli_query);
}

$id = filter_input (INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
$mysqli_query = "DELETE FROM informacoes WHERE id='$id'";
$resultado_delete = mysqli_query($mysqli_connection, $mysqli_query);

$mysqli_query = "SELECT * FROM informacoes ORDER BY id DESC LIMIT 5"; 
$resultado_lista = mysqli_query ($mysqli_connection, $mysqli_query);
while ($row_lista = mysqli_fetch_assoc ($resultado_lista)) {

$data = strtotime($row_lista ['data']);
	echo "<br><hr>";
	echo "ID: " . $row_lista ['id'] . "<br>";
	// echo "DATA: " . $row_lista ['data'] . "<br>";
	echo "DATA: " . date('d/m/Y', $data) . "<br>";
	echo "ETANOL: " . $row_lista ['etanol'] . "<br>";
	echo "GASOLINA: " . $row_lista ['gasolina'] . "<br>";
	echo "CÁLCULO: " . $row_lista ['calculo'] . "<br>";
	echo "<a href='index.php?id=". $row_lista ['id'] ."'>Delete</a><br>";	
}
 

	
// if (!$result) {
// 	echo "Error: " . $mysqli_query . "<br>" . mysqli_error($mysqli_connection);
// 	exit;
// }
//else {
// 	  echo "New record created successfully";
//  }
mysqli_close($conn);

?>

</body>
</html>	


