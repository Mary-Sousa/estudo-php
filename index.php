   


   

<?php

$preco_etanol = 6;
$preco_gasolina = 8;
$porcentagem = $preco_etanol / $preco_gasolina;
echo $porcentagem;

if($porcentagem < 0.7){
   $melhor_combustivel = "Etanol";
} else {
   $melhor_combustivel = "Gasolina";
}

echo "Abasteça com ${melhor_combustivel}";

?>


