<?php 
if (isset($_POST['submit'])){

    $nomeE = $_POST['nomeE'];
    $emailE = $_POST['emailE'];
    $avaliacao = (float)$_POST['avaliacao'] + 0;
    $cnpj = $_POST['cnpj'];
    $Uid = (int)$_POST['usuario_id'];

    include_once("config.php");
    $cadastroP = mysqli_query($conexao, "INSERT INTO fornecedor (usuario_id, nome_emp, email_emp, avaliacao, cnpj) VALUES ('$Uid', '$nomeE','$emailE','$avaliacao','$cnpj')");
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
<body class = "body1">
<nav class="navbar">
        <ul>
            <a href="home.php">Voltar</a>
        </ul>
    </nav>
    <h2>Dados da compra</h2>
    <form action="cadastro_fornecedor.php" method="POST" name="cadastro1" class="cadastro1">
        <label for="nomeE">Nome da empresa</label>
        <input type="text" name="nomeE" class="nomeE">
        <label for="usuario_id">Id do usuario</label> <br>
        <?php 
            include_once("config.php");
            $sqlV = "SELECT usuario_id FROM usuario";
            $result = mysqli_query($conexao, $sqlV)
        ?>
        <select name="usuario_id" class= "usuario_id">
            <option value="Selecione">Selecione..</option>
        <?php
            while($dados = mysqli_fetch_assoc($result)){
            
        ?>
            <option value="<?php echo $dados['usuario_id'] ?>">
                <?php 
                    echo $dados['usuario_id']
                ?>
            </option>
        


        <?php 
            }
        ?>
        </select>
            <br>
        <label for="emailE">Email da empresa</label>
        <input type="email" name="emailE" class="emailE"> 
        <label for="avaliacao">Avaliação do fornecedor</label>
        <input type="number" name="avaliacao" class="avaliacao"> 
        <label for="cnpj">Cnpj</label>
        <input type="text" name="cnpj" class="cnpj">  
        <br>
        <input type="submit" name="submit" class="submit" value = "Cadastrar">
    </form>
</body>
</html>