<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/style/header.css">
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.css">
    <link rel="stylesheet" href="assets/style/intro.css">
    <title>Introdução</title>
</head>

<body>

    <?php
    include('fphp/session.php');
    ?>
    <header class="navbar bg-primary" data-bs-theme="dark">

        <div class="container-sm">
            <a class="navbar-brand">API Web Quest</a>
        </div>
    
        <div>
            <p><?php echo $_SESSION['nome']; ?></p>  
            <a href="fphp/logout.php">Sair</a>
        </div>
        <div id="icone">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
            </svg>
        </div>

    </header>

    <div id="out-menu">
        <ul id="menu">
            <li><a href="intro.php" class="links">Introdução</a></li>

            <li><a href="tarefa.html" class="links">Tarefa </a></li>

            <li><a href="processos.html" class="links">Processos</a></li>

            <li><a href="atividades.html" class="links">Questionário</a></li>

            <li><a href="conclusao.html" class="links">Conclusão</a></li>

        </ul>
    </div>

    <div id="out-content">
        <div class="text" id="text1">
            <p id="title">O que é uma API ?</p>
        </div>

        <div class="text" id="text2">
            <p>As tarefas a seguir foram meticulosamente elaboradas para proporcionar uma experiência de aprendizado abrangente e prática
                Nesta primeira fase, mergulhe primeiro nos fundamentos das APIs. Lembre-se de ir atrás de todas as informações possiveis para que entenda não apenas o que são, mas por que são essenciais no cenário tecnológico atual. Explore os tipos de APIs, desde as clássicas APIs RESTful até as flexíveis APIs GraphQL. Aprofunde-se nos componentes cruciais, como pontos de extremidade (endpoints) – os pontos de contato entre seu aplicativo e a API – e compreenda a estrutura de solicitações e respostas. </p>
        </div>

        <div id="outimg1">
            <img id="img" src="assets/imgs/52410651-fa95b900-2b13-11e9-970e-eff9afd83b23.png" alt="">
        </div>
    </div>

</body>

</html>