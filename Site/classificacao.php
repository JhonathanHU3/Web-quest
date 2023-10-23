<?php
include('fphp/session.php');

try {
    $options = array(
        PDO::MYSQL_ATTR_SSL_CA => 'connections/DigiCertGlobalRootCA.crt.pem'
    );
    $pdo = new PDO('mysql:host=api-webquest-teste01-server2.mysql.database.azure.com;port=3306;dbname=bdapi', 'qrlvyvqjpp', '114810AOWJI2F2F1$', $options);
    
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "SELECT u.nome, q.total, q.tempo
            FROM usuarios u
            INNER JOIN questionarios q ON u.usuario_id = q.usuario_id
            ORDER BY q.total DESC, q.tempo ASC";

    $stmt = $pdo->query($sql);
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Erro na conexão: " . $e->getMessage());
}

$pdo = null; // Feche a conexão

// Agora você pode usar $result para processar os resultados
?>


<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.css">
    <link rel="stylesheet" href="assets/style/header.css">
    <link rel="stylesheet" href="assets/style/processos.css">
    <title>Classificação</title>
</head>


<body>

    <?php
    function firstName($name)
    {
        $array = explode(" ", $name);
        return $array[0];
    }

    $name = $_SESSION['nome'];
    ?>


    <header class="navbar bg-primary" data-bs-theme="dark">

        <nav id="navbar">
            <div id="nomeSite">
                <a class="navbar-brand">API Web Quest</a>
            </div>
            <div id="out-mensag">
                <p id="mensagem">Bem vindo
                    <?php echo firstName($name); ?>
                </p>
            </div>

            <div class="dropdown">

                <div class="dropbtn">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                        <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                        <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
                    </svg>
                </div>

                <div class="dropdown-content">
                    <a href="fphp/logout.php">Sair</a>
                </div>

            </div>
        </nav>

    </header>



    <div id="out-menu">
        <ul id="menu">
            <li><a href="Intro.php" class="links">Introdução</a></li>

            <li><a href="tarefa.php" class="links">Tarefa </a></li>

            <li><a href="processos.php" class="links">Processos</a></li>

            <li><a href="atividades.php" class="links">Questionário</a></li>

            <li><a href="conclusao.php" class="links">Conclusão</a></li>

        </ul>
    </div>

    <div class="container mt-5">
        <h2>Classificação</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Posição</th>
                    <th>Nome</th>
                    <th>Acertos Totais</th>
                    <th>Tempo</th>
                </tr>
            </thead>
            <tbody>
            <?php
            $posicao = 1;
            foreach ($result as $row) { // Use um loop foreach para percorrer o array $result
                echo "<tr>";
                echo "<td>{$posicao}</td>";
                echo "<td>{$row['nome']}</td>";
                echo "<td>{$row['total']}</td>";
                echo "<td>{$row['tempo']}</td>";
                echo "</tr>";
                $posicao++;
            }
            ?>
            </tbody>
        </table>
    </div>

</body>

</html>