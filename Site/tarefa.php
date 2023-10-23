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
    <link rel="stylesheet" href="assets/style/tarefa.css">

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
            <li><a href="intro.php" class="links">Introdução</a></li>

            <li><a href="tarefa.php" class="links">Tarefa </a></li>

            <li><a href="processos.php" class="links">Processos</a></li>

            <li><a href="atividades.php" class="links">Questionário</a></li>

            <li><a href="conclusao.php" class="links">Conclusão</a></li>
        </ul>
    </div>

    <main>

        <div id="task-text">
            <h4>Agora é com você !!</h4>
            <p>

                Nesta atividade, você está prestes a embarcar em uma jornada de aprendizado prático e envolvente. O
                desafio proposto é criar sua própria página web de previsão do tempo, capaz de trazer informações
                climáticas atualizadas de qualquer cidade do mundo diretamente para a tela do seu computador. Esta
                experiência não apenas aprimorará suas habilidades em HTML, CSS e JavaScript, mas também lhe dará a
                oportunidade de entender profundamente a integração de APIs em aplicações reais.

                <br>
                Vamos começar esta jornada de aprendizado e criação!
                <br>
                Sucesso !
            </p>
        </div>

        <div id="girl_chill">
            <img src="assets/imgs/png-image.png" alt="">
        </div>


    </main>

</body>

</html>