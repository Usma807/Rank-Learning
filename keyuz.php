
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>So'z o'yini</title>
	<link href='https://fonts.googleapis.com/css?family=Raleway:400,700' rel='stylesheet' type='text/css'>
<style>
  * {
	margin: 0;
	padding: 0;
	box-sizing: border-box;
	-webkit-box-sizing: border-box;
}

body {
	background-color: #353535;
	font-family: 'Raleway', sans-serif;
}

.wrapper {
	max-width: 600px;
	margin: 0 auto;
	width: 100%;
	text-align: center;
	padding: 2%;
	background-color: #424242;
	height: 500px;
}

h1 {
    color: #ecf0f1;
}

h1 + p {
	margin-bottom: 5%;
    color: #3498db;
}

.scoreWrap {float: left;}
.timeWrap {float: right;}

.outerWrap:after {
	content: "";
	display: block;
	clear: both;
}

.bg {
	background-color: #04AF71;
}

button {
   border: none;
  background-color: green;
  box-shadow: 0px 5px 0px 0px green;
  outline: none;
  border-radius: 5px;
  padding: 10px 15px;
  font-size: 22px;
  text-decoration: none;
  margin: 20px;
  color: #fff;
  position: relative;
  display: inline-block;
  cursor: pointer;
}

button:active {
  transform: translate(0px, 5px);
  -webkit-transform: translate(0px, 5px);
  box-shadow: 0px 1px 0px 0px;
}

.scoreWrap p, .scoreWrap span, .timeWrap p, .timeWrap span {
    font-size: 30px;
    color: gold;
}

.wordsWrap {
	margin-top: 50px;
}

.words span{
    font-size: 60px;
    letter-spacing: 1px;
    color: #ECF0F1;
}

</style>
</head>
<body>
	<div class="wrapper">
		<h1>Klaviaturada yozish o'yini</h1>
		<p>Tez va to'g'ri yozishni o'rganing!</p>
		<button>Boshlash</button>
		<a href="index.php" style="border: none;
  background-color: red;
  box-shadow: 0px 5px 0px 0px red;
  outline: none;
  border-radius: 5px;
  padding: 10px 15px;
  font-size: 22px;
  text-decoration: none;
  margin: 20px;
  color: #fff;
  position: relative;
  display: inline-block;
  cursor: pointer;">Chiqish</a>
		<div class="outerWrap">
			<div class="scoreWrap">
				<p>Natija</p>
				<span class="score">0</span>
			</div>
			<div class="timeWrap">
				<p>Qolgan vaqt</p>
				<span class="time">60</span>
			</div>
		</div>
		<div class="wordsWrap">
			<p class="words"></p>
		</div>
	</div>
  <script>
    var temp = document.querySelector('.time');
var button = document.querySelector("button");
var words = document.querySelector(".words");
var timerDiv = document.querySelector(".time");
var scoreDiv = document.querySelector(".score");
var points = 0;
var spans;
var typed;
var seconds = 60;
var spark = new Audio("http://k003.kiwi6.com/hotpolink/qdpr7bioht/spark.mp3");

function countdown() {
    points = 0;
    scoreDiv.innerHTML = points; // Score to zero when starting
    var timer = setInterval(function() {
        button.disabled = true;
        seconds--;
        temp.innerHTML = seconds;
        if (seconds === 0) {
            alert("Game over! Your score is " + points);
            words.innerHTML = "";
            button.disabled = false;
            clearInterval(timer);
            seconds = 60;
            timerDiv.innerHTML = "60";
        }
    }, 1000);
}

function random() {
    words.innerHTML = "";
    var randomIndex = Math.floor(Math.random() * list.length); // Use list.length instead
    var wordArray = list[randomIndex].split("");
    for (var i = 0; i < wordArray.length; i++) {
        var span = document.createElement("span");
        span.classList.add("span");
        span.innerHTML = wordArray[i];
        words.appendChild(span);
    }
    spans = document.querySelectorAll(".span");
}

const list = [
    'HISOB', 'TOGRI', 'ER', 'KROSS', 'HARAKAT', 'HARAKAT', 'FAOL', 'FAOLIYAT',
    'HAQIQIY', 'HAQIQATDA', 'QOSHMOQ', 'QOSHIMCHA', 'QOSHIMCHALAR', 'SIFAT',
    'KATTALIK', 'SARGUZASHT', 'MASLAHAT', 'TASIR', 'QORQMOQ', 'KEYIN',
    'SOAT', 'YANA', 'QARSHI', 'YOSH', 'OLDIN', 'ROYXAT', 'HAYOT',
    'HAMMA', 'RUXSAT BERMOQ', 'DEYARLI', 'YALGIZ', 'BOYLAB', 'BALAND',
    'ALIFBO', 'ALLAqi', 'SHUNDAY', 'AMMO', 'ORMON', 'MIQDOR', 'QADIMIY',
    'BURCHAK', 'GASHY', 'HAYVON', 'ELON QILMOQ', 'BOSHQA', 'JAVOB',
    'QONGIZ', 'HAR QANDAY', 'HAR QANDAY KISHI', 'HAR QANDAY NARSALAR',
    'HAR QANDAY YOL', 'AJRATMOQ', 'TAMOZ', 'BILMOQ', 'YETMOQ', 'KELMOQ',
    'KETMOQ', 'OQMOQ', 'KURASHMOQ', 'SAVOL', 'JAVOB', 'SAVDO', 'TIZIM',
    'DUNYO', 'QISH', 'YAZ', 'BAHOR', 'YIL', 'KUN', 'TUN', 'HAVO',
    'YER', 'OLAM', 'SHU', 'BUNING', 'TUZATMOQ', 'OYIN', 'YOL',
    'KISHI', 'BOLALIK', 'KATTA', 'QIZ', 'OGIL', 'DOST', 'UZUN',
    'QISQA', 'QOSHILMOQ', 'MUSTAQIL', 'TAYYOR', 'SHART', 'TUGASH',
    'OLISH', 'BERISH', 'YETISH', 'QOYISH', 'OTMOQ', 'QONGIZ',
    'XARID', 'SOTISH', 'TUGATMOQ', 'BILISH', 'ORGANMOQ', 'URMOQ',
    'TAYYORLAMOQ', 'KAFOLAT', 'ORTA', 'BIR', 'IKKI', 'UCH', 'TORT',
    'BESH', 'OLTI', 'YETTI', 'SAKKIZ', 'TOQQIZ', 'ON', 'OT', 'KATTA',
    'KASAL', 'QOSHMOQ', 'UZOQ', 'YAQIN', 'QIZIQ', 'QAYTMOQ',
    'TASHLASH', 'YETISHMOQ', 'QOLMOQ', 'OZGARMAS', 'BIRGALIKDA',
    'TAMOM', 'BIRINCHI', 'IKKINCHI', 'UCHINCHI', 'TORTINCHI',
    'BESHINCHI', 'BIRINCHI', 'BIRGALIKDA', 'KIM', 'NIMA', 'QANDAY',
    'QANDAYDIR', 'YETIM', 'BOLISH', 'YETISH', 'YETISHMOQ', 'OLDING',
    'YETIQ', 'MAJBURLASH', 'TASIR ETMOQ', 'SAVDO', 'BOZOR',
    'SHAXAR', 'QISHLOQ', 'JAMOAT', 'OILAVY', 'YETAKCHILIK',
    'TANLANMOQ', 'TANLANISH', 'KAM', 'KAMAYMOQ', 'KAMAYISH',
    'KAMQOY', 'KAMYETMOQ', 'BIRINCHILIK', 'IKKINCHILIK',
    'TAYYORLASH', 'TAYYORLANMOQ', 'MALUMOT', 'IQTISOD', 'OZBEK',
    'MAHSULOT', 'MUSTAQIL', 'TALAB', 'TALAB ETMOQ', 'TALAB QILMOQ',
    'TALAB QILISH', 'SIFATLI', 'SIFATLIK', 'SIFATLIY', 'OZBEKCHA',
    'TIZIMLAR', 'HAYOTIY', 'HAYOTGA', 'KONTEKST', 'KONTEKSTGA',
    'KONTEKSTLI', 'KONTEKSTDA', 'KONTEKSTLIY', 'MAVZU', 'MAVZULI',
    'MAVZULIY', 'MAVZULIK', 'MAVZUVIY', 'MAVZULIKLAR', 'MAVZULIKDA',
    'MAVZULIKDA', 'KONTEKSTDA', 'KONTEKSTDA', 'KONTEKSTLIY',
    'DOLZARBA', 'DOLZARBA QILMOQ', 'DOLZARBA QILISH', 'DOLZARBA QILMOQ',
];

button.addEventListener("click", function(e) {
    countdown();
    random();
    button.disabled = true;	
});

function typing(e) {
    typed = String.fromCharCode(e.which);
    for (var i = 0; i < spans.length; i++) {
        if (spans[i].innerHTML === typed) {
            if (spans[i].classList.contains("bg")) {
                continue;
            } else if (spans[i].classList.contains("bg") === false && (i === 0 || spans[i - 1].classList.contains("bg"))) {
                spans[i].classList.add("bg");
                break;
            }
        }
    }
  
    var checker = 0;
    for (var j = 0; j < spans.length; j++) {
        if (spans[j].className === "span bg") {
            checker++;
        }
        if (checker === spans.length) {
            spark.pause();
            spark.currentTime = 0;
            spark.play();
            words.classList.add("animated");
            words.classList.add("fadeOut");
            points++;
            scoreDiv.innerHTML = points;
            document.removeEventListener("keydown", typing, false);
            setTimeout(function() {
                words.className = "words"; // restart the classes
                random(); // give another word
                document.addEventListener("keydown", typing, false);
            }, 400);
        }
    }
}

document.addEventListener("keydown", typing, false);
  </script>
</body>
</html>