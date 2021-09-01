<form action="" method="GET">
			<fieldset>
				<div class="conteiner">
					<input type="text" placeholder="Preço Etanol" class="pesquisa" name="etanol"><br><br>
               <input type="text" placeholder="Preço Gasolina" class="pesquisa" name="gasolina"><br><br>
				</div>
				<div class="bot">
					<button class="enviar">Pesquisa</button>
									</div>
			</fieldset>
    	</form>   


   

<?php

//var_dump($_GET);// printa um array ou variavel
// exit; //para a execucao
$preco_etanol = $_GET["etanol"];
$preco_gasolina = $_GET["gasolina"];
$porcentagem = $preco_etanol / $preco_gasolina;
echo $porcentagem;

if($porcentagem < 0.7){
   $melhor_combustivel = "Etanol";
} else {
   $melhor_combustivel = "Gasolina";
}

echo "Abasteça com ${melhor_combustivel}";

?>


