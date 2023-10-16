<?php 
if (isset($_POST['submit'])){
    include_once("config.php");
    $nomeP = $_POST['nomeP'];
    $nome_emp = $_POST['nome_emp'];
    $Fid = mysqli_query($conexao, "SELECT fornecedor_id FROM fornecedor WHERE mome_emp = '$nome_emp'");
    $prodID = mysqli_query($conexao, "SELECT produto_id FROM produtos WHERE nome = '$nomeP'");
    $preco
    $categoria = $_POST['categoria'];
    
    $cadastroP = mysqli_query($conexao, "INSERT INTO pedidos (produtoID, fornecedor_id, preco, categoria, avaliacao, estoque) VALUES 
    ('$prodID','$Fid','$preco','$categoria','$avaliacao','$estoque')");
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
            <a href="Comprar.php">Voltar</a>
        </ul>
    </nav>
    <main>
    <h2>Cadastro de produtos</h2>
    <form action="pedido.php" method="POST" name="cadastro1" class="cadastro1">
        <label for="nome">Nome do produto</label><br>
        <?php 
            include_once("config.php");
            $sqlV = "SELECT nome FROM produtos";
            $result = mysqli_query($conexao, $sqlV)
        ?>
        <select name="nomeP" id="produto_nome">

            <option value="Selecione">Selecione..</option>
        <?php
            while($dados = mysqli_fetch_assoc($result)){
            
        ?>
            <option value="<?php echo $dados['nome'] ?>">
                <?php 
                    echo $dados['nome']
                ?>
            </option>
        


        <?php 
            }
        ?>
        </select><br>

    <label for="nome_fornecedor">Nome do fornecedor</label><br>
        <?php 
            include_once("config.php");
            $sqlV = "SELECT nome_emp FROM fornecedor";
            $result = mysqli_query($conexao, $sqlV)
        ?>
        <select name="nome_emp" id="nome_emp">

            <option value="Selecione">Selecione..</option>
        <?php
            while($dados = mysqli_fetch_assoc($result)){
            
        ?>
            <option value="<?php echo $dados['nome_emp'] ?>">
                <?php 
                    echo $dados['nome_emp']
                ?>
            </option>
        


        <?php 
            }
        ?>
        </select><br>

        
        <br><br>
        <label for="categoria">Categoria</label>
        <select name="categoria" id="categoria">
            <option value="celular">celular</option>
            <option value="peca">peça</option>
        </select><br><br>
        
        
        <input type="submit" name="submit" class="submit" value = "Proseguir compra">
    </form>
    </main>

    
        
    
</body>
</html>