<?php
  include('fphp/session.php');
  ?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.css">
  <link rel="stylesheet" href="assets/style/header.css">
  <link rel="stylesheet" href="assets/style/questionario.css">

  <title>Introdução</title>

  <link rel="stylesheet" href="assets/style/header.css">
  <title>Questionario</title>

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
        <p id="mensagem">Bem vindo <?php echo firstName($name); ?></p>
      </div>
      <div class="dropdown">

        <div class="dropbtn">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
            <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
            <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
          </svg>
        </div>

        <div class="dropdown-content">
          
          <a href="#">Sair</a>

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

  <div class="questionario">
    <div id="container">
      <div class="quest-container hide">
        <span class="question">Pergunta aqui!</span>
        <div class="result"></div>
        <div class="answers-container">
          <button class="answer button">Resposta 1</button>
          <button class="answer button">Resposta 2</button>
          <button class="answer button">Resposta 3</button>
          <button class="answer button">Resposta 4</button>
        </div>
      </div>
      <div class="inicial">
        <h1>Bem vindo ao questionário avaliativo sobre APIs!</h1> <br>
        <p class="texto2">Neste questionario será testato suas habilidades e conhecimentos desenvolvidos até aqui. <br>
          Quando estiver preparado para começar clique no botão abaixo.</p>
      </div>
      <div class="controls-container">
        <button class="start-quiz button">Iniciar questionário!</button>
        <button class="next-question button hide">Próxima pergunta!</button>
      </div>
      <div class="final hide">
        <span class="question q2">Todas as perguntas respondidas!</span>
        <span class="question q3"></span>
      </div>
    </div>
  </div>

  <script>
    const startQuizzButton = document.querySelector(".start-quiz");
    const questionsContainer = document.querySelector(".quest-container");
    const answersContainer = document.querySelector(".answers-container")
    const questionText = document.querySelector(".question");
    const resultDiv = document.querySelector(".result");
    const nextQuestionButton = document.querySelector(".next-question");
    const finalDiv = document.querySelector(".final");
    const resultado = document.querySelector(".q3");
    const textoInicial = document.querySelector(".inicial");

    startQuizzButton.addEventListener("click", startGame);
    nextQuestionButton.addEventListener("click", displayNextQuestion);

    let currentQuestionIndex = 0;
    let totalCorrect = 0;
    var dateAntes;
    var tempoTotal;

    function startGame() {
      startQuizzButton.classList.add("hide");
      questionsContainer.classList.remove("hide");
      displayNextQuestion();
      dateAntes = Date.now();
      textoInicial.classList.add("hide");
    }

    function displayNextQuestion() {
      while (answersContainer.firstChild) {
        answersContainer.removeChild(answersContainer.firstChild);
      }

      if (questions.length === currentQuestionIndex) {
        return finishGame();
      }

      resultDiv.textContent = "";
      nextQuestionButton.classList.add("hide");

      questionText.textContent = questions[currentQuestionIndex].question;
      questions[currentQuestionIndex].answers.forEach(answers => {
        const newAnswer = document.createElement("button");
        newAnswer.classList.add("button", "answer");
        newAnswer.textContent = answers.text;
        if (answers.correct) {
          newAnswer.dataset.correct = answers.correct;
        }

        answersContainer.appendChild(newAnswer);

        newAnswer.addEventListener("click", selectAnswer);
      })
    }

    function selectAnswer(e) {
      if (e.target.dataset.correct) {
        resultDiv.textContent = "Correto!";
        resultDiv.style.color = "#00FF00";
        totalCorrect++;

      } else {
        resultDiv.textContent = "Errado!";
        resultDiv.style.color = "#FF0000";
      }

      document.querySelectorAll(".answer").forEach(button => {
        if (button.dataset.correct) {
          button.style.backgroundColor = "#32CD32";
        } else {
          button.style.backgroundColor = "#B22222";
        }

        button.disabled = true;
        button.style.cursor = "not-allowed";
      })
      nextQuestionButton.classList.remove("hide");
      currentQuestionIndex++;
    }

    function finishGame() {
      const totalQuestions = questions.length;
      resultado.innerHTML = `Você acertou ${totalCorrect} de ${totalQuestions} perguntas!<br><br>`;
      finalDiv.classList.remove("hide");
      nextQuestionButton.classList.add("hide");
      questionText.classList.add("hide");
      resultDiv.textContent = "";
      let tempoTotal = Date.now() - dateAntes;
      let segundos = Math.trunc(tempoTotal / 1000)

      resultado.innerHTML += `O seu tempo foi de ${segundos} segundos<br><br>`;

      resultado.innerHTML += '<button class="button" onclick="window.location.reload()">Refazer questionário</button>';

      // Adicione o código fetch para enviar os resultados ao servidor PHP
      fetch('fphp/results.php', {
          method: 'POST',
          headers: {
            'Content-Type': 'application/json', // ajuste conforme necessário
          },
          body: JSON.stringify({
            totalCorrect: totalCorrect,
            totalQuestions: totalQuestions,
            tempo: segundos,
          }),
        })
        .then(response => response.json())
        .then(data => {
          // Se desejar fazer algo com a resposta do servidor, você pode fazer aqui
          console.log(data);
        })
        .catch(error => {
          // Se houver um erro, você pode lidar com ele aqui
          console.error('Erro no envio dos resultados:', error);
        });
    }


    const questions = [{
        question: "O que significa a sigla \"API\"?",
        answers: [{
            text: "Abreviação para \"Aplicação Integrada de Programas\".",
            correct: false
          },
          {
            text: "Abreviação para \"Acesso Público à Internet\".",
            correct: false
          },
          {
            text: "Abreviação para \"Interface de Programação de Aplicações\".",
            correct: true
          },
          {
            text: "Abreviação para \"Algoritmo de Programação Inteligente\".",
            correct: false
          }
        ]
      },
      {
        question: "Qual é o papel de um endpoint em uma API?",
        answers: [{
            text: "Representar o ponto de acesso a um serviço ou recurso na API.",
            correct: true
          },
          {
            text: "Identificar a localização física dos servidores da API.",
            correct: false
          },
          {
            text: "Determinar a autenticação do usuário.",
            correct: false
          },
          {
            text: "Criar uma interface gráfica para a API.",
            correct: false
          }
        ]
      },
      {
        question: "Qual é a diferença entre os métodos HTTP GET e POST em uma solicitação de API?",
        answers: [{
            text: 'GET é usado para enviar dados ao servidor, enquanto POST é usado para receber dados do servidor.',
            correct: false
          },
          {
            text: 'GET é usado para solicitar dados do servidor, enquanto POST é usado para enviar dados ao servidor.',
            correct: true
          },
          {
            text: 'Ambos GET e POST são usados para solicitar dados do servidor.',
            correct: false
          },
          {
            text: "Ambos GET e POST são usados para enviar dados ao servidor.",
            correct: false
          }
        ]
      },
      {
        question: 'O que é OAuth e como ele é usado em autenticação de API?',
        answers: [{
            text: "OAuth é um protocolo de autorização que permite que aplicativos acessem dados de um usuário sem a necessidade de revelar senhas.",
            correct: true
          },
          {
            text: "OAuth é um protocolo de autenticação que permite aos usuários logarem em várias contas de redes sociais simultaneamente.",
            correct: false
          },
          {
            text: "OAuth é uma criptografia avançada usada para proteger dados sensíveis em transmissões de API.",
            correct: false
          },
          {
            text: "OAuth é um framework para criar APIs RESTful seguras.",
            correct: false
          }
        ]
      },
      {
        question: 'O que é throttling em uma API e por que as APIs implementam essa técnica?',
        answers: [{
            text: 'Throttling é o processo de identificar e bloquear solicitações de IP suspeitas em uma API para evitar ataques de hackers.',
            correct: false
          },
          {
            text: 'Throttling é a prática de limitar o número de solicitações que um cliente pode fazer a uma API em um determinado período de tempo.',
            correct: true
          },
          {
            text: 'Throttling é um método de compressão de dados utilizado para otimizar o desempenho da API em redes de baixa largura de banda.',
            correct: false
          },
          {
            text: 'Throttling é uma técnica de criptografia usada para proteger dados transmitidos por uma API.',
            correct: false
          }
        ]
      },
    ]
  </script>

</body>

</html>