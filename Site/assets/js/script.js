const startQuizzButton = document.querySelector(".start-quiz");
const questionsContainer = document.querySelector(".quest-container");
const answersContainer = document.querySelector(".answers-container")
const questionText = document.querySelector(".question");
const resultDiv = document.querySelector(".result");
const nextQuestionButton = document.querySelector(".next-question");
const finalDiv = document.querySelector(".final");
const resultado = document.querySelector(".q3");

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
}

function displayNextQuestion() {
    while(answersContainer.firstChild) {
        answersContainer.removeChild(answersContainer.firstChild);
    }

    if(questions.length === currentQuestionIndex) {
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
  if(e.target.dataset.correct) {
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
  
  resultado.innerHTML += `O seu tempo foi de ${tempoTotal} ms<br><br>`;
  
  resultado.innerHTML += '<button class="button" onclick="window.location.reload()">Refazer questionário</button>';
}





const questions = [
    {
      question: "O que significa a sigla \"API\"?",
      answers: [
        { text: "Abreviação para \"Aplicação Integrada de Programas\".", correct: false },
        { text: "Abreviação para \"Acesso Público à Internet\".", correct: false },
        { text: "Abreviação para \"Interface de Programação de Aplicações\".", correct: true },
        { text: "Abreviação para \"Algoritmo de Programação Inteligente\".", correct: false }
      ]
    },
    {
      question: "Qual é o papel de um endpoint em uma API?",
      answers: [
        { text: "Representar o ponto de acesso a um serviço ou recurso na API.", correct: true },
        { text: "Identificar a localização física dos servidores da API.", correct: false },
        { text: "Determinar a autenticação do usuário.", correct: false },
        { text: "Criar uma interface gráfica para a API.", correct: false }
      ]
    },
    {
      question: "Qual é a diferença entre os métodos HTTP GET e POST em uma solicitação de API?",
      answers: [
        { text: 'GET é usado para enviar dados ao servidor, enquanto POST é usado para receber dados do servidor.', correct: false },
        { text: 'GET é usado para solicitar dados do servidor, enquanto POST é usado para enviar dados ao servidor.', correct: true },
        { text: 'Ambos GET e POST são usados para solicitar dados do servidor.', correct: false },
        { text: "Ambos GET e POST são usados para enviar dados ao servidor.", correct: false }
      ]
    },
    {
      question: 'O que é OAuth e como ele é usado em autenticação de API?',
      answers: [
        { text: "OAuth é um protocolo de autorização que permite que aplicativos acessem dados de um usuário sem a necessidade de revelar senhas.", correct: true },
        { text: "OAuth é um protocolo de autenticação que permite aos usuários logarem em várias contas de redes sociais simultaneamente.", correct: false },
        { text: "OAuth é uma criptografia avançada usada para proteger dados sensíveis em transmissões de API.", correct: false },
        { text: "OAuth é um framework para criar APIs RESTful seguras.", correct: false }
      ]
    },
    {
      question: 'O que é throttling em uma API e por que as APIs implementam essa técnica?',
      answers: [
        { text: 'Throttling é o processo de identificar e bloquear solicitações de IP suspeitas em uma API para evitar ataques de hackers.', correct: false },
        { text: 'Throttling é a prática de limitar o número de solicitações que um cliente pode fazer a uma API em um determinado período de tempo.', correct: true },
        { text: 'Throttling é um método de compressão de dados utilizado para otimizar o desempenho da API em redes de baixa largura de banda.', correct: false },
        { text: 'Throttling é uma técnica de criptografia usada para proteger dados transmitidos por uma API.', correct: false }
      ]
    },
  ]