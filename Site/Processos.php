<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.css">
    <link rel="stylesheet" href="assets/style/header.css">
    <link rel="stylesheet" href="assets/style/processos.css">

    <title>Introdução</title>
</head>

<body>

    <?php
    include('fphp/session.php');
    ?>

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
        <div id="text">
            <h2>Conteúdo teórico e prático</h2>
            <p>

                Para começar a desenvolver sua primeira API é necessário entender e ver os diversos exemplos que estão
                presentes no nosso dia a dia. Portanto vamos disponibilizar um video que irá te ensinar como criar uma
                API que mostra o tempo (temperatura, humidade, previsão de chuava, etc) de cada país no mundo. Não se
                esqueça de fazer a API juntamente com o desenvolvedor do video, pois a prática é de suma importância.
                Fique atento para não perder os conceitos básicos sobre uma API e, caso esteja com alguma dúvida,
                pesquise bastante, porque essa é umas das skills mais importantes de um desenvolvedor, saber pesquisar.
                <a href="https://github.com/DenverCoder1/weather-app-tutorial">Clique aqui para ver o código no GitHub
                    para análise</a>

            </p>
        </div>

        <div id="out_girl">
            <img id="in_girl" src="assets/imgs/67i9jm-removebg-preview.png" alt="">

            <div id="video">
                <iframe width="935" height="526" src="https://www.youtube.com/embed/JdJ2VBbYYTQ" title="Getting the user&#39;s location with JavaScript (Geolocation API tutorial)" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
            </div>
        </div>


    </main>

</body>

</html>