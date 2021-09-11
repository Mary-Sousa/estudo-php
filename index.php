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
			<button class="enviar">Cálculo</button>
		</fieldset>
	</form>   



<?php

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

if(isset($_GET["etanol"]) && isset($_GET["gasolina"])){
	echo "Abasteça com ${melhor_combustivel}";
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
if (!mysqli_query($mysqli_connection, $mysqli_query)) {
	echo "Error: " . $mysqli_query . "<br>" . mysqli_error($mysqli_connection);
	exit;
}
//else {
// 	  echo "New record created successfully";
//  }
mysqli_close($conn);

?>

</body>
</html>	

