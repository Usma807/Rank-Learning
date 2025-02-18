<?php
include("conn.php");
$user_id = $_SESSION["user_id"];
$exID = $_GET['id'];
if($user_id=="" || $user_id==null){
  header("Location:login.php");
}

$sql = "SELECT * FROM users WHERE ID = :user_id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(":user_id", $user_id);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
$full_name = $user['ism']." ".$user['familiya'];
$sql = "SELECT * FROM exercises WHERE ID = :ex_id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(":ex_id", $exID);
        $stmt->execute();
        $ex = $stmt->fetch(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>So'z topish o'yini</title>
    <!--Google Fonts-->
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap"
      rel="stylesheet"
    />
    <!-- Stylesheet -->
<style>
    * {
  padding: 0;
  margin: 0;
  box-sizing: border-box;
  font-family: "Poppins", sans-serif;
}
body {
  background-color: #7786f5;
}
.wrapper {
  position: absolute;
  width: 90%;
  max-width: 37em;
  background-color: #ffffff;
  padding: 7em 3em;
  position: absolute;
  transform: translate(-50%, -50%);
  top: 50%;
  left: 50%;
  text-align: center;
  border-radius: 1em;
}
.controls-container {
  background-color: #7786f5;
  position: absolute;
  width: 100%;
  height: 100%;
  display: flex;
  align-items: center;
  justify-content: center;
  flex-direction: column;
  top: 0;
}
#start {
  font-size: 1.2em;
  padding: 1em 3em;
  background-color: #ffffff;
  border: none;
  outline: none;
  border-radius: 2em;
  cursor: pointer;
}
#letter-container {
  display: flex;
  flex-wrap: wrap;
  gap: 0.8em 0.4em;
  justify-content: center;
  margin-top: 2em;
}
#letter-container button {
  background-color: #ffffff;
  border: 2px solid #7786f5;
  color: #7786f5;
  outline: none;
  border-radius: 0.3em;
  cursor: pointer;
  height: 3em;
  width: 3em;
}
#letter-container .correct {
  background-color: #008000;
  color: #ffffff;
  border: 2px solid #008000;
}
#letter-container .incorrect {
  background-color: #8a8686;
  color: #ffffff;
  border: 2px solid #8a8686;
}
.hint-ref {
  margin-bottom: 1em;
}
.hint-ref span {
  font-weight: 600;
}
#chanceCount {
  margin: 1em 0;
  position: absolute;
  top: 0.62em;
  right: 2em;
}
#word {
  font-weight: 600;
  margin: 1em 0 2em 0;
}
#word span {
  text-transform: uppercase;
  font-weight: 400;
}
.hide {
  display: none;
}

</style>
</head>
  <body>
    <div class="wrapper">
      <div class="hint-ref"></div>
      <div id="user-input-section"></div>
      <div id="message"></div>
      <div id="letter-container"></div>
    </div>
    <div class="controls-container">
      <div id="result"></div>
      <div id="word"></div>
      <button id="start">Boshlash</button>
    </div>
    <!-- Script -->
    <script>
        //Word and Hints Object
const options = {
  <?php echo $ex['ex_termin']; ?>: "<?php echo $ex['ex_tavsif']; ?>"
};

//Initial References
const message = document.getElementById("message");
const hintRef = document.querySelector(".hint-ref");
const controls = document.querySelector(".controls-container");
const startBtn = document.getElementById("start");
const letterContainer = document.getElementById("letter-container");
const userInpSection = document.getElementById("user-input-section");
const resultText = document.getElementById("result");
const word = document.getElementById("word");
const words = Object.keys(options);
let randomWord = "",
  randomHint = "";
let winCount = 0,
  lossCount = 0;

//Generate random value
const generateRandomValue = (array) => Math.floor(Math.random() * array.length);

//Block all the buttons
const blocker = () => {
  let lettersButtons = document.querySelectorAll(".letters");
  stopGame();
};

//Start Game
startBtn.addEventListener("click", () => {
  controls.classList.add("hide");
  init();
});

//Stop Game
const stopGame = () => {
  controls.classList.remove("hide");
};

//Generate Word Function
const generateWord = () => {
  letterContainer.classList.remove("hide");
  userInpSection.innerText = "";
  randomWord = words[generateRandomValue(words)];
  randomHint = options[randomWord];
  hintRef.innerHTML = `<div id="wordHint">
  <span>Ko'rsatma: </span>${randomHint}</div>`;
  let displayItem = "";
  randomWord.split("").forEach((value) => {
    displayItem += '<span class="inputSpace">_ </span>';
  });

  //Display each element as span
  userInpSection.innerHTML = displayItem;
  userInpSection.innerHTML += `<div id='chanceCount'>Qolgan urinishlar: ${lossCount}</div>`;
};

//Initial Function
const init = () => {
  winCount = 0;
  lossCount = 5;
  randomWord = "";
  word.innerText = "";
  randomHint = "";
  message.innerText = "";
  userInpSection.innerHTML = "";
  letterContainer.classList.add("hide");
  letterContainer.innerHTML = "";
  generateWord();

  //For creating letter buttons
  for (let i = 65; i < 91; i++) {
    let button = document.createElement("button");
    button.classList.add("letters");

    //Number to ASCII[A-Z]
    button.innerText = String.fromCharCode(i);

    //Character button onclick
    button.addEventListener("click", () => {
      message.innerText = `To'g'ri harf`;
      message.style.color = "#008000";
      let charArray = randomWord.toUpperCase().split("");
      let inputSpace = document.getElementsByClassName("inputSpace");

      //If array contains clicked value replace the matched Dash with Letter
      if (charArray.includes(button.innerText)) {
        charArray.forEach((char, index) => {
          //If character in array is same as clicked button
          if (char === button.innerText) {
            button.classList.add("correct");
            //Replace dash with letter
            inputSpace[index].innerText = char;
            //increment counter
            winCount += 1;
            //If winCount equals word length
            if (winCount == charArray.length) {
            window.location.href = 'save-rank.php?full_name=<?=$full_name ?>&user_id=<?=$user_id ?>&rank=10';
              resultText.innerHTML = "Yutdingiz";
              startBtn.innerText = "Qayta boshlash";
              //block all buttons
              blocker();
            }
          }
        });
      } else {
        //lose count
        button.classList.add("incorrect");
        lossCount -= 1;
        document.getElementById(
          "chanceCount"
        ).innerText = `Chances Left: ${lossCount}`;
        message.innerText = `Xato harf`;
        message.style.color = "#ff0000";
        if (lossCount == 0) {
          word.innerHTML = `The word was: <span>${randomWord}</span>`;
          resultText.innerHTML = "Game Over";
          blocker();
        }
      }

      //Disable clicked buttons
      button.disabled = true;
    });

    //Append generated buttons to the letters container
    letterContainer.appendChild(button);
  }
};

window.onload = () => {
  init();
};

    </script>
  </body>
</html>
