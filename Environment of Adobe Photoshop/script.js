const progressBar = document.querySelector(".progress-bar");
const progressText = document.querySelector(".progress-text");

const progress = (value) => {
  const percentage = (value / time) * 100;
  progressBar.style.width = `${percentage}%`;
  progressText.innerHTML = `${value}`;
};

const startBtn = document.querySelector(".start");
const numQuestions = document.querySelector("#num-questions");
const category = document.querySelector("#category");
const difficulty = document.querySelector("#difficulty");
const timePerQuestion = document.querySelector("#time");
const quiz = document.querySelector(".quiz");
const startScreen = document.querySelector(".start-screen");

let questions = [];
let time = 30;
let score = 0;
let currentQuestion;
let timer;
let warningCount = 0;
const maxWarnings = 3;

const startQuiz = async () => {
  const num = numQuestions.value;
  const cat = category.value;
  const diff = difficulty.value;

  try {
    const response = await fetch("fetch_questions.php");
    const data = await response.json();
    questions = data.questions;

    loadingAnimation();

    setTimeout(() => {
      startScreen.classList.add("hide");
      quiz.classList.remove("hide");
      currentQuestion = 1;
      showQuestion(questions[0]);
    }, 1000);
  } catch (error) {
    console.error("Error fetching questions:", error);
   
  }
};


startBtn.addEventListener("click", startQuiz);

const showQuestion = (question) => {
  const questionText = document.querySelector(".question"),
    answersWrapper = document.querySelector(".answer-wrapper");
  questionNumber = document.querySelector(".number");

  questionText.innerHTML = question.question;

  const answers = [
    ...question.incorrect_answers,
    question.correct_answer.toString(),
  ];
  answersWrapper.innerHTML = "";
  answers.sort(() => Math.random() - 0.5);
  answers.forEach((answer) => {
    answersWrapper.innerHTML += `
                  <div class="answer ">
            <span class="text">${answer}</span>
            <span class="checkbox">
              <i class="fas fa-check"></i>
            </span>
          </div>
        `;
  });

  questionNumber.innerHTML = ` Question <span class="current">${
    questions.indexOf(question) + 1
  }</span>
            <span class="total">/${questions.length}</span>`;
  const answersDiv = document.querySelectorAll(".answer");
  answersDiv.forEach((answer) => {
    answer.addEventListener("click", () => {
      if (!answer.classList.contains("checked")) {
        answersDiv.forEach((answer) => {
          answer.classList.remove("selected");
        });
        answer.classList.add("selected");
        submitAnswer();
      }
    });
  });

  time = timePerQuestion.value;
  startTimer(time);
};

const startTimer = (time) => {
  timer = setInterval(() => {
    if (time === 3) {
      playAdudio("countdown.mp3");
    }
    if (time >= 0) {
      progress(time);
      time--;
    } else {
      clearInterval(timer);
      const selectedAnswer = document.querySelector(".answer.selected");
      if (!selectedAnswer) {
       
        if (currentQuestion === 1) {
          const incorrectAnswers = document.querySelectorAll(".answer:not(.selected)");
          const randomIndex = Math.floor(Math.random() * incorrectAnswers.length);
          const randomIncorrectAnswer = incorrectAnswers[randomIndex];
          randomIncorrectAnswer.classList.add("selected");
          submitAnswer(); 
        } else {
          nextQuestion(); 
        }
      } else {
        submitAnswer();
        nextQuestion(); 
      }
    }
  }, 1000);
};




const loadingAnimation = () => {
  startBtn.innerHTML = "Loading";
  const loadingInterval = setInterval(() => {
    if (startBtn.innerHTML.length === 10) {
      startBtn.innerHTML = "Loading";
    } else {
      startBtn.innerHTML += ".";
    }
  }, 500);
};

function defineProperty() {
  var osccred = document.createElement("div");
  osccred.style.display = "none";
  osccred.style.position = "absolute";
  osccred.style.bottom = "0";
  osccred.style.right = "0";
  osccred.style.fontSize = "10px";
  osccred.style.color = "#fff";
  osccred.style.fontFamily = "sans-serif";
  osccred.style.padding = "5px";
  osccred.style.background = "#fff";
  osccred.style.borderTopLeftRadius = "5px";
  osccred.style.borderBottomRightRadius = "5px";
  osccred.style.boxShadow = "0 0 5px #ccc";
  document.body.appendChild(osccred);
}

defineProperty();
const submitAnswer = () => {
  clearInterval(timer);
  const selectedAnswer = document.querySelector(".answer.selected");
  const correctAnswerText = questions[currentQuestion - 1].correct_answer;

  if (selectedAnswer) {
    const answer = selectedAnswer.querySelector(".text").innerHTML;

    if (answer === correctAnswerText) {
      score++;
    }
  }

  const answeredQuestion = questions[currentQuestion - 1];
  if (!answeredQuestion.answered) {
    answeredQuestion.answered = true;
  }

  nextQuestion();
};

const nextQuestion = () => {
  if (currentQuestion < questions.length) {
    currentQuestion++;
    showQuestion(questions[currentQuestion - 1]);
  } else {
    showScore();
  }
};

const endScreen = document.querySelector(".end-screen"),
  finalScore = document.querySelector(".final-score"),
  totalScore = document.querySelector(".total-score");

const showScore = () => {
  endScreen.classList.remove("hide");
  quiz.classList.add("hide");
  finalScore.innerHTML = score;
  totalScore.innerHTML = `/ ${questions.length}`;
};

const restartBtn = document.querySelector(".restart");
restartBtn.addEventListener("click", () => {
  window.location.reload();
});

const playAdudio = (src) => {
  const audio = new Audio(src);
  audio.play();
};

const resetIdleTimer = () => {
  clearTimeout(idleTimer);
  idleTimer = setTimeout(() => {
    // Display warning or take action here
    warningCount++;
    if (warningCount >= maxWarnings) {
      alert("Suspicious activity detected. You are being logged out.");
      window.location.href = "../logout/logout.php"; 
      alert("You have been idle for 30 seconds.");
    }
  }, 30000);
};

window.addEventListener("blur", (event) => {
  const clickedElement = event.relatedTarget;
  if (clickedElement && clickedElement.closest(".exit-btn")) {
    return;
  }

  warningCount++;
  if (warningCount >= maxWarnings) {
    alert("Suspicious activity detected. You are being logged out.");
    window.location.href = "../logout/logout.php"; 
  } else {
    alert("You have switched tabs.");
  }
});

