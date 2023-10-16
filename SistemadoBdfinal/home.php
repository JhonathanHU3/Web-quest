
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.php">
</head>
<body class="body1">
    <main>
    <nav class="navbar">
        <ul>
            <a href="home.php"></a>
            <a href="cadastro_produtos.php">Cadastrar produto</a>
            <a href="cadastro_fornecedor.php">Cadastrar Fornecedor</a>
            <a href="Comprar.php">Comprar</a>
        </ul>
    </nav>
<?php

include_once("config.php");
$nome = "SELECT nome FROM produtos";
$preco = "SELECT preco FROM produtos";
$idP = "SELECT produto_id FROM produtos WHERE nome = $nome";
$numids = "SELECT COUNT(produto_id) FROM produtos";

$dados = mysqli_query($conexao, "SELECT * FROM produtos");
// transforma os dados em um array
$linha = mysqli_fetch_assoc($dados);
// calcula quantos dados retornaram
$total = mysqli_num_rows($dados);
?>

<html>
	<head>
	<title>Exemplo</title>
    <link rel="stylesheet" href="style2.css">
</head>
<body>
<main>

    

<div class="cards1">
    <?php
        // se o número de resultados for maior que zero, mostra os dados
        if($total > 0) {
            // inicia o loop que vai mostrar todos os dados
            do {
                
    ?>  
            
                
                    <div class="card" name="<?=$linha['produto_id'] ?>">
                        <img src="midia/shopping.png" alt="">
                        <p>Id: <?=$linha ['produto_id'] ?></p>
                        <p>Nome: <?=$linha['nome'] ?> </p>
                        <p>Preço: R$<?=$linha['preco'] ?></p>
                    </div>
                
              
                
    <?php
            
            }
            // finaliza o loop que vai mostrar os dados
            while($linha = mysqli_fetch_assoc($dados) and $numids>1);
        // fim do if
        }
    ?>
    
    </div>
</main>
</body>
</html>
<?php
// tira o resultado da busca da memória
mysqli_free_result($dados);
?>
    
</body>
</html>