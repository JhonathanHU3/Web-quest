<?php
    include('fphp/session.php');
    ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.css">
    <link rel="stylesheet" href="assets/style/header.css">
    <link rel="stylesheet" href="assets/style/conclusao.css">

    <title>Introdução</title>
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

    <main>
        <div id="imgout">
            <img src="assets/imgs/imagem_2023-10-22_171303330-removebg-preview.png" alt="">
        </div>

        <div id="textout">
            <p id="textoin">
            <h4>Agradecemos por participar do nosso WebQuest</h4>Parabéns por concluir este abrangente WebQuest sobre
            APIs! Ao longo desta jornada, você explorou os conceitos fundamentais, aplicações práticas e a relevância do
            mundo real das Interfaces de Programação de Aplicações.
            Continue experimentando com diferentes APIs,
            Desejamos muito sucesso em seus futuros projetos
            </p>
            <a href="bibliografia.php" class="btn btn-primary fbutton">Acesse a bibliografia</a>
            <a href="classificacao.php" class="btn btn-primary fbutton">Classificação do questionário</a>
        </div>
    </main>


</body>

</html>