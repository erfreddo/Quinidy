// Quinidy - 4F1P Quiz script

// Quiz screen elements
const questionImg = document.querySelector(".question-img");
const startScreen = document.querySelector(".start-screen");
const quizScreen = document.querySelector(".quiz-screen");
const endScreen = document.querySelector(".end-screen");
const nextButton = document.getElementById("next");
const imgNumber = document.getElementById("selected-level");
const yourAnswer = document.getElementById("your-word");
const inputBar = document.getElementById("input-word");
const applyButton = document.getElementById("apply");

// Variables
let q=questionsFour.length;	// Number of questions selected
let correct=0;		// Number of correct answers
let attempts=0;		// Number of answers (correct+wrong)
let qSelected;		// Question displayed
let qList=[];		// List of questions
let oList=[];		// List of options
let count=0;

// Start quiz
function startQuiz() {
	if (document.getElementById('fl').innerHTML < q){
		document.getElementById("back-button").style.display="inline";
		startScreen.classList.add("hide"); 		// Hide start screen
		quizScreen.classList.remove("hide"); 	// Show quiz screen
		setGame(); 								// Set game values, import questions
		getQuestion();							// Display question, options...
	}
}
function showReset(){
	if(document.getElementById('fl').innerHTML==q){
		document.getElementById("reset-start").classList.remove("hiding"); 
		document.getElementById("start-four").classList.add("hiding"); 
	}
}
// Set game values
function setGame() {
    //nextButton.classList.add("hiding"); // Hide next question button
	for (let i=0; i < questionsFour.length; i++) { // Push all questions from questions.js to qList
		qList.push(questionsFour[i]);
	}

}

// Prepare questions and options
function getQuestion() {
	// Show random question
	inputBar.focus();
	yourAnswer.classList.remove("correct");
	yourAnswer.classList.remove("wrong");
	inputBar.disabled = false;
	applyButton.disabled = false;
	applyButton.classList.remove("disabled");
	
    const qSelected = qList[imgNumber.innerHTML-1+count];
    questionImg.src = qSelected.img;
	answer = qSelected.answer;
	yourAnswer.innerHTML=fieldWord(answer.length);
	applyButton.setAttribute("onclick", "getResult(answer)");
	
}
// Display dashes below image
function fieldWord(n){
	let dashes="";
	for (let i=0; i<n; i++){
		if(i!=0 || i!=n) dashes = dashes.concat("_ ");
		else dashes = dashes.concat("_");
	}
	return dashes;
}
// Show the result of question
function getResult(answer) {
    var yourWord = yourAnswer.innerHTML;
    // Check if the selected option is the answer in questions.js
	if (yourWord===""){
		yourAnswer.innerHTML=fieldWord(answer.length);
	}
    if (yourWord.toLowerCase() === answer.toLowerCase()) {
        nextButton.disabled = false; // Show next button after one is clicked
		inputBar.value="";
		inputBar.disabled = true;
		applyButton.classList.add("disabled");
		yourAnswer.classList.remove("wrong");
		yourAnswer.classList.add("correct");
		count++;
		document.getElementById("four_levels").value = imgNumber.innerHTML-1+count;
		document.getElementById('fl').innerHTML = imgNumber.innerHTML-1+count;
	}
	else{
		yourAnswer.classList.remove("correct");
		yourAnswer.classList.add("wrong");
	}
}

// Generate next question screen
function nextQuestion() {
    if (imgNumber.innerHTML-1+count==q) { 
		endQuiz();
	}
	else { 
		getQuestion();
		inputBar.focus();
	}
	nextButton.disabled = true; // Hide "next" button
}

// End of the game function
function endQuiz() {
    quizScreen.classList.add("hide"); // Hide quiz screen
	endScreen.classList.remove("hide");
}

function resetQuiz(){
	document.getElementById("four_levels").value = 0;
	document.getElementById('fl').innerHTML = 0;
	setTimeout(function(){ window.location.reload(); }, 200);
}
// Generate level buttons on start screen
window.addEventListener("DOMContentLoaded", function myFunction(e){
	let lastLevel = document.getElementById("fl").innerHTML;
	for(let i = 1; i <= q; i++){
		let newBtn = document.createElement('a');
		newBtn.classList.add("btn","btn-four");
		if (i<10){
			newBtn.innerText="0"+String(i);
		}
		else{newBtn.innerText=i;}
		newBtn.addEventListener('click', function() { document.getElementById('start-four').classList.remove("disabled"); })
		newBtn.addEventListener('click', function() { document.getElementById('selected-level').innerHTML = i; })
		if(i-1 < lastLevel){
			newBtn.classList.remove("hiding");
			newBtn.classList.add("btn-success","disabled");
			newBtn.setAttribute('disabled','');
		}
		else if(i-1 == lastLevel){
			newBtn.classList.remove("hiding");
			newBtn.classList.add("btn-warning");
		}
		else if(i-1 > lastLevel){
			newBtn.classList.add("hiding");
		}
		
		document.querySelector('.level-box').appendChild(newBtn);
	}
});
// Show your input text below the image
document.getElementById('apply').addEventListener('click', function() { 
	yourAnswer.innerHTML = inputBar.value.trim();
})

document.getElementById('reset').addEventListener('click', function() { 
	yourAnswer.innerHTML = inputBar.value.trim();
})
