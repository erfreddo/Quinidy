// Quinidy - Discovery Quiz script

// Quiz screen elements
const questionImg = document.querySelector(".question-img");
const startScreen = document.querySelector(".start-screen");
const quizScreen = document.querySelector(".quiz-screen");
const endScreen = document.querySelector(".end-screen");
const nextButton = document.getElementById("next");
const imgNumber = document.getElementById("selected-level");

// Variables
let q=questionsDiscovery.length;	// Number of questions selected
let correct=0;		// Number of correct answers
let attempts=0;		// Number of answers (correct+wrong)
let qSelected;		// Question displayed
let qList=[];		// List of questions
let oList=[];		// List of options
let count=0;

// Start quiz
function startQuiz() {
	if (document.getElementById('fl').innerHTML < q){
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
	for (let i=0; i < questionsDiscovery.length; i++) { // Push all questions from questions.js to qList
		qList.push(questionsDiscovery[i]);
	}

}

// Prepare questions and options
function getQuestion() {
	// Show random question
	document.getElementById("input-word").focus();
	document.getElementById("your-word").classList.remove("correct");
	document.getElementById("your-word").classList.remove("wrong");
	document.getElementById("input-word").disabled = false;
	document.getElementById("apply").disabled = false;
	document.getElementById("apply").classList.remove("disabled");
    const qSelected = qList[imgNumber.innerHTML-1+count];
	document.getElementById("context").innerHTML=qSelected.q;
    questionImg.src = qSelected.img;
	answer = qSelected.answer;
	document.getElementById("your-word").innerHTML="???"
	document.getElementById("apply").setAttribute("onclick", "getResult(answer)");
	
}

// Show the result of question
function getResult(answer) {
    var yourWord = document.getElementById("your-word").innerHTML;
    // Check if the selected option is the answer in questions.js
	if (yourWord===""){
		document.getElementById("your-word").innerHTML="???"
	}
    if (answer.includes(yourWord.toLowerCase())) {
        nextButton.classList.remove("hiding"); // Show next button after one is clicked
		document.getElementById("input-word").value="";
		document.getElementById("input-word").disabled = true;
		document.getElementById("apply").classList.add("disabled");
		document.getElementById("your-word").classList.remove("wrong");
		document.getElementById("your-word").classList.add("correct");
		count++;
		document.getElementById("discovery_levels").value = imgNumber.innerHTML-1+count;
		document.getElementById('fl').innerHTML = imgNumber.innerHTML-1+count;
	}
	else{
		document.getElementById("your-word").classList.remove("correct");
		document.getElementById("your-word").classList.add("wrong");
	}
}

// Generate next question screen
function nextQuestion() {
    if (imgNumber.innerHTML-1+count==q) { 
		endQuiz();
	}
	else { 
		getQuestion();
		document.getElementById("input-word").focus();
	}
	nextButton.classList.add("hiding"); // Hide "next" button
}

// End of the game function
function endQuiz() {
    quizScreen.classList.add("hide"); // Hide quiz screen
	endScreen.classList.remove("hide");
}

function resetQuiz(){
	document.getElementById("discovery_levels").value = 0;
	document.getElementById('fl').innerHTML = 0;
	setTimeout(function(){ window.location.reload(); }, 200);
}

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

document.getElementById('apply').addEventListener('click', function() { 
	document.getElementById('your-word').innerHTML = document.getElementById('input-word').value.trim();
})

document.getElementById('reset').addEventListener('click', function() { 
	document.getElementById('your-word').innerHTML = document.getElementById('input-word').value.trim();
})
