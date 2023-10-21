<!DOCTYPE html>
<html lang="en">
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
    include ('fphp/session.php');
    if (isset($_SESSION['name'])){
        var_dump($_SESSION['name']);
    }

    ?>

    <header class="navbar bg-primary" data-bs-theme="dark">

        <div class="container-fluid">
            <a class="navbar-brand">API Web Quest</a>
        </div>

    </header>
    <p>Bem vindo <?php echo $_SESSION['nome']; ?></p>   
    <div id="out-menu" >
        <ul id="menu" >
            <a href="Intro.html" class="links" >Introdução</a>

            <a href="tarefa.html" class="links" >Tarefa  </a>

            <a href="Processos.html" class="links" >Processos</a>

            <a href="atividades.html" class="links" >Questionário</a>

            <a href="conclusao.html" class="links" >Conclusão</a>

        </ul>
    </div>

    <div id= "out-content" >
        <div id="text" >
            <p>O que é uma API ?</p>
        </div>

        <div id="text2" >
            <p>As tarefas a seguir foram meticulosamente elaboradas para proporcionar uma experiência de aprendizado abrangente e prática
            Nesta primeira  fase, mergulhe primeiro nos fundamentos das APIs. Lembre-se de ir atrás de todas as informações possiveis para que entenda não apenas o que são, mas por que são essenciais no cenário tecnológico atual. Explore os tipos de APIs, desde as clássicas APIs RESTful até as flexíveis APIs GraphQL. Aprofunde-se nos componentes cruciais, como pontos de extremidade (endpoints) – os pontos de contato entre seu aplicativo e a API – e compreenda a estrutura de solicitações e respostas. </p>
        </div>

        <div id="img1" >
            <img src="" alt="">
        </div>
    </div>

</body>
</html>
