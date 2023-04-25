// Quinidy - Classic Quiz script

// Quiz screen elements
const questionText = document.querySelector(".question");
const optionBox = document.querySelector(".options");
const counterBar = document.querySelector(".counter-bar");
const timerNum = document.querySelector(".timer");

const startScreen = document.querySelector(".start-screen");
const quizScreen = document.querySelector(".quiz-screen");
const endScreen = document.querySelector(".end-screen");
const nextButton = document.getElementById("next");

const category = document.getElementById("category");
const categoryLogo = document.getElementById("categoryLogo");

// Variables
let q=0;		// Number of questions selected
let icon;		// Icon string
let seconds=0;	// Timer seconds
let count=0;	// Question counter
let correct=0;	// Number of correct answers
let attempts=0;	// Number of answers (correct+wrong)

let qSelected;	// Question displayed
let qList=[];	// List of questions
let oList=[];	// List of options

// Start quiz
function startQuiz() {
	
    startScreen.classList.add("hide"); 		// Hide start screen
    quizScreen.classList.remove("hide"); 	// Show quiz screen
    setGame(); 								// Set game values, import questions
    getQuestion();							// Display question, options...
    setCounterBar();						// Set counter bar of questions
}

// Set game values
function setGame() {
	
    nextButton.classList.add("hiding"); // Hide next question button
	q = parseInt(document.getElementById("q").value); //Get questions number from options
	seconds = parseInt(document.getElementById("seconds").value); //Get timer seconds form options
	
	// Choose array of questions
	switch (category.value){
		case "questionsArt":
			for (let i=0; i < questionsArt.length; i++) { // Push all questions from questions.js to qList
				qList.push(questionsArt[i]);
			}
			icon="bi-palette-fill"; // Change icon style
			break;
		case "questionsCinema":
			for (let i=0; i < questionsCinema.length; i++) {
				qList.push(questionsCinema[i]);
			}
			icon="bi-film";
			break;
		case "questionsWorld":
			for (let i=0; i < questionsWorld.length; i++) {
				qList.push(questionsWorld[i]);
			}
			icon="bi-globe-europe-africa";
			break;
		case "questionsMusic":
			for (let i=0; i < questionsMusic.length; i++) { 
				qList.push(questionsMusic[i]);
			}
			icon="bi-music-note-beamed";
			break;
		case "questionsScience":
			for (let i=0; i < questionsScience.length; i++) {
				qList.push(questionsScience[i]);
			}
			icon="bi-gear-fill";
			break;
		case "questionsHistory":
			for (let i=0; i < questionsHistory.length; i++) {
				qList.push(questionsHistory[i]);
			}
			icon="bi-hourglass-split";
			break;
		case "questionsSport":
			for (let i=0; i < questionsSport.length; i++) {
				qList.push(questionsSport[i]);
			}
			icon="bi-bicycle";
			break;
	}
	categoryLogo.classList.remove("bi-book-half"); // Remove icon class from title
	categoryLogo.classList.add(icon); // Add new category icon class 
}

// Prepare questions and options
function getQuestion() {
	
	// Show random question
    const qIndex = qList[Math.floor(Math.random()*qList.length)]; 
    qSelected = qIndex;
    questionText.innerHTML = qSelected.q;
	
	// Remove showed question from future picks
    const i = qList.indexOf(qIndex);
    qList.splice(i,1); 
	
    // Option Index
    oList=[0,1,2,3];

    optionBox.innerHTML= '';
	
	// Start timer
	startTimer(seconds); 

    // Display options
    for (let i=0; i<4; i++) {
        // Random option index
        const oIndex = oList[Math.floor(Math.random()*oList.length)];
		
		// Remove showed option from future picks
        const j = oList.indexOf(oIndex);
        oList.splice(j,1);
		
		// Create single option
        const singleOption = document.createElement("div");
        singleOption.innerHTML = qSelected.options[oIndex];
        singleOption.id = oIndex;
        singleOption.className = "option";
        optionBox.appendChild(singleOption);
        singleOption.setAttribute("onclick", "getResult(this)"); // When option is clicked show result
    }
    count++;
}
// Timer function
function startTimer(seconds){
    counter = setInterval(timer,900);
    function timer(){
        timerNum.textContent = seconds; // Set starting time
		seconds--;
        if(seconds < 9){
            timerNum.textContent = "0"+timerNum.textContent; // Add 0 after number when time is <10
        }
		// When timer is zero show the correct answer, disable the options and show the next button
        if(seconds < 0){
            clearInterval(counter);
			for (let i=0; i<4; i++) {
				if (parseInt(optionBox.children[i].id) === qSelected.answer) {
					optionBox.children[i].classList.add("correct");
				}
			}
			disableOptions();
            nextButton.classList.remove("hiding");
        }
    }
}
// Show the result of question
function getResult(opt) {
    const id = parseInt(opt.id);
    // Check if the selected option is the answer in questions.js
    if (id === qSelected.answer) {
        opt.classList.add("correct"); // Add correct style (green) to option
        updateBar("correct"); // Update square bar
        correct++;
    } else {
        opt.classList.add("wrong"); // Add wrong style (red) to option
        updateBar("wrong"); // Update square bar

        // Display correct answer
        for (let i=0; i<4; i++) {
            if (parseInt(optionBox.children[i].id) === qSelected.answer) {
                optionBox.children[i].classList.add("correct");
            }
        }
    }
	nextButton.classList.remove("hiding"); // Show next button after one is clicked
	disableOptions(); // Disable the options when one is clicked
    attempts++;
	clearInterval(counter);
}
// Generate next question screen
function nextQuestion() {
    if (count===q) { endQuiz(); } // When last question is displayed end the quiz
	else { getQuestion(); }
	nextButton.classList.add("hiding"); // Hide "next" button
}

// Disable other option function
function disableOptions() {
    for (let i=0; i<4; i++) {
        optionBox.children[i].classList.add("disabled"); // Add "not-clickable" style to all options
    }
}

// Generate the counter of questions. Number of questions = number of squares
function setCounterBar() {
    counterBar.innerHTML = '';
    for (let i=0; i<q; i++) {
        counterBar.appendChild(document.createElement("div")); // Create square
    }
}

// Change color of square in progress bar
function updateBar(color) { counterBar.children[count-1].classList.add(color); }

// End of the game function
function endQuiz() {
    quizScreen.classList.add("hide"); // Hide quiz screen
    endScreen.classList.remove("hide"); // Show final result screen
    setResult(); // Set final values
}

// Final result screen function
function setResult() {
	// Show the results
    endScreen.querySelector(".questions-num").innerHTML = q; // Number of questions displayed
    endScreen.querySelector(".answered-num").innerHTML = attempts; // Number of questions answered
    endScreen.querySelector(".correct-num").innerHTML = correct; // Number of correct answers
    endScreen.querySelector(".wrong-num").innerHTML = attempts - correct; // Number of wrong answers
	
	// Set values of form's inputs for database upload
	document.getElementById("a").value = attempts;
	document.getElementById("c").value = correct;
	let stars = (correct*2)+((attempts - correct)*(-1));
    endScreen.querySelector(".score").innerHTML = stars;
	
	// Add value to specific category input
	switch (category.value){
		case "questionsArt": document.getElementById("ap").value = stars; break;
		case "questionsCinema": document.getElementById("cp").value = stars; break;
		case "questionsWorld": document.getElementById("wp").value = stars; break;
		case "questionsMusic": document.getElementById("mp").value = stars; break;
		case "questionsScience": document.getElementById("sp").value = stars; break;
		case "questionsHistory": document.getElementById("hp").value = stars; break;
		case "questionsSport": document.getElementById("spp").value = stars; break;
	}
}