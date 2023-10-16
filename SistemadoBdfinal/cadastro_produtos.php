<?php 
if (isset($_POST['submit'])){

    $nomeP = $_POST['nome'];
    $IDfornecedor = $_POST['fornecedor_id'];
    $preco = $_POST['preco'];
    $categoria = $_POST['categoria'];
    $avaliacao = $_POST['avaliacao'];
    $estoque = $_POST['estoque'];

    include_once("config.php");
    $cadastroP = mysqli_query($conexao, "INSERT INTO produtos (nome, fornecedor_id, preco, categoria, avaliacao, estoque) VALUES ('$nomeP','$IDfornecedor','$preco','$categoria','$avaliacao','$estoque')");
}

?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro | Login</title>
    <link rel="stylesheet" href="style.php">
</head>
<body class="body1">

<nav class="navbar">
        <ul>
            <a href="home.php">Voltar</a>    
        </ul>
    </nav>
    <main>
    <h2>Cadastro de produtos</h2>
    <form action="cadastro_produtos.php" method="POST" name="cadastro1" class="cadastro1">
        <label for="nome">Nome</label>
        <input type="text" name="nome" class="nome">
        <label for="fornecedor_id">Id do fornecedor</label>
        <input type="number" name="fornecedor_id" class= "fornecedor_id">




        
        <label for="preco">Preço</label>
        <input type="number" name="preco" class="preco"> 
        <br><br>
        <label for="categoria">Categoria</label>
        <select name="categoria" id="categoria">
            <option value="celular">celular</option>
            <option value="peca">peça</option>
        </select><br><br>
        <label for="avaliacao">Avaliação do produto</label>
        <input type="number" name="avaliacao" class="avaliacao"> 
        <label for="estoque">Estoque</label>
        <input type="number" name="estoque" class="estoque">  
        <br>
        <input type="submit" name="submit" class="submit" value = "Cadastrar">
    </form>
    </main>
</body>
</html>