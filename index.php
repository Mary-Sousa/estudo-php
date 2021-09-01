   


   

<?php

//var_dump($_GET); printa um array ou variavel
// exit; para a execucao
$preco_etanol = $_GET["preco_etanol"];
$preco_gasolina = $_GET["preco_gasolina"];
$porcentagem = $preco_etanol / $preco_gasolina;
echo $porcentagem;

if($porcentagem < 0.7){
   $melhor_combustivel = "Etanol";
} else {
   $melhor_combustivel = "Gasolina";
}

echo "Abasteça com ${melhor_combustivel}";

?>


