// Quinidy - 4F1P Quiz script

// Quiz screen elements
const questionImg = document.querySelector(".question-img");
const startScreen = document.querySelector(".start-screen");
const quizScreen = document.querySelector(".quiz-screen");
const endScreen = document.querySelector(".end-screen");
const nextButton = document.getElementById("next");
const imgNumber = document.getElementById("selected-level");

const inputWord = document.getElementById("input-word");
const yourWord = document.getElementById("your-word");
const applyButton = document.getElementById("apply");

// Variables
let q=questionsFour.length;	// Number of questions
let qSelected; // Question displayed
let qList=[]; // List of questions
let count=0;

// Start quiz
function startQuiz() {
	if (document.getElementById('fl').innerHTML < q){
		document.getElementById("back-button").style.display="inline"; // Show back button on navbaer
		startScreen.classList.add("hide"); 		// Hide start screen
		quizScreen.classList.remove("hide"); 	// Show quiz screen
		setGame(); 								// Set game values, import questions
		getQuestion();							// Display question, options...
	}
}
// Show reset button if all levels are completed
function showReset(){
	if(document.getElementById('fl').innerHTML==q){
		document.getElementById("reset-start").classList.remove("hiding"); 
		document.getElementById("start-four").classList.add("hiding"); 
	}
}
// Set game values
function setGame() {
	for (let i=0; i < questionsFour.length; i++) { // Push all questions from questions.js to qList
		qList.push(questionsFour[i]);
	}

}
// Prepare questions and options
function getQuestion() {
	// Set initial status of question
	inputWord.focus(); // Focus cursore on input field
	yourWord.classList.remove("correct"); // Remove style of word displayed
	yourWord.classList.remove("wrong");
	inputWord.disabled = false; // Active input field
	applyButton.disabled = false;
	applyButton.classList.remove("disabled");
	// Select question in order
    const qSelected = qList[imgNumber.innerHTML-1+count];
    questionImg.src = qSelected.img; // Set the image
	answer = qSelected.answer;
	yourWord.innerHTML=fieldWord(answer.length); // Display dashes with word lenght under the image
	applyButton.setAttribute("onclick", "getResult(answer)"); // "Apply" button in input field shows the result when clicked
	
}
// Function that generate n dashes
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
	
    var w = yourWord.innerHTML;
	
	if (w===""){
		yourWord.innerHTML=fieldWord(answer.length); // Empty string in input -> show dashes
	}
	// Check if the selected option is the answer in questions.js
    if (w.toLowerCase() === answer.toLowerCase()) {
        nextButton.classList.remove("disabled"); // Active next button after correct answer submit
		inputWord.value="";
		inputWord.disabled = true; // Disable input form
		applyButton.classList.add("disabled");
		yourWord.classList.remove("wrong");
		yourWord.classList.add("correct"); // Add green style to word
		count++;
		document.getElementById("four_levels").value = imgNumber.innerHTML-1+count; // Save value of current completed levels
		document.getElementById('fl').innerHTML = imgNumber.innerHTML-1+count;
	}
	else{
		yourWord.classList.remove("correct");
		yourWord.classList.add("wrong"); // If input is wrong change to red style
	}
}

// Generate next question screen
function nextQuestion() {
    if (imgNumber.innerHTML-1+count==q) { // End quiz if all levels are completed
		endQuiz();
	}
	else { 
		getQuestion(); // Generate another question
		inputWord.focus();
	}
	nextButton.classList.add("disabled"); // Disable "next" button
}

// End of the game function
function endQuiz() {
    quizScreen.classList.add("hide"); // Hide quiz screen
	endScreen.classList.remove("hide"); // Show end screen
}
// Reset quiz: value of completed levels = 0
function resetQuiz(){
	document.getElementById("four_levels").value = 0;
	document.getElementById('fl').innerHTML = 0;
	setTimeout(function(){ window.location.reload(); }, 200);
}
// Generate n buttons for level progression/selection
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
			newBtn.classList.add("disabled");
		}
		document.querySelector('.level-box').appendChild(newBtn);
	}
});
// "Apply" button sets the word displayed below image = word in input field
applyButton.addEventListener('click', function() { 
	yourWord.innerHTML = inputWord.value.trim();
})

document.getElementById('reset').addEventListener('click', function() { 
	yourWord.innerHTML = inputWord.value.trim();
})