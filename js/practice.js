var titulo = $('h2');
var span_points  = $('points');

var a_options = [];
var verbosElegibles;

var practiceMode = '';
var electedVerb;

var points = -1;
var lives =  3;
var modo;
var num_options = 4;
var n_verb;

for (var i = 1; i <= num_options; i++) {
	a_options.push($('option' + i));
}

for (var i = 0; i <= modos.length - 1; i++) {
	if (titulo.innerText == modos[i] + ":") {
		modo = i;
		var restantModes = removeItemFromArr(modos,modos[modo]);
	}
}
var chooseVarPracticeMode = function (value) {
	practiceMode = value;
	changeVerb();
}
var choosePractice = function () {
	titulo.innerText += "What do you want to practice?";
	for (var i = 0; i <= restantModes.length - 1; i++) {
		a_options[i].innerText = restantModes[i];
		a_options[i].setAttribute('style', 'display:inline-block;')
		a_options[i].setAttribute("onclick", "chooseVarPracticeMode('" + restantModes[i] + "');");
	}
}

choosePractice();


function refreshOptions(){
	for (var i = 1; i <= num_options; i++) {
		$('option' + i).innerText = "";
		$('option' + i).setAttribute('style', 'display:none;')

	}
}

var changeVerb =  function () {
	n_verb = Math.floor(Math.random() * php[modo].length);
	n_modePractice = 0;

	points++;
	span_points.innerText = points;

	titulo.innerText = modos[modo] + ":" +  php[modo][n_verb];

	for(var i = 0; i <= modos.length - 1; i ++){
		if (practiceMode == modos[i]) {
			n_modePractice = i;
		}
	}

	verbosElegibles = [php[n_modePractice][n_verb]];
	electedVerb = php[n_modePractice][n_verb];

	for (var i =1; i <= num_options - 1; i++) {
		var option = php[n_modePractice][Math.floor(Math.random() * php[n_modePractice].length)];
		while(verbosElegibles.includes(option)){
			option = php[n_modePractice][Math.floor(Math.random() * php[n_modePractice].length)];
		}
		verbosElegibles.push(option);
	}
	verbosElegibles.sort();

	for (var i = 0; i <= a_options.length - 1; i++) {
		a_options[i].innerText = verbosElegibles[i];
		a_options[i].setAttribute('style','display:inline-block;')
		if (verbosElegibles[i] == electedVerb) {
			a_options[i].setAttribute("onclick",'changeVerb();');
		}else{
			a_options[i].setAttribute("onclick",'lose();');
		}
		
	}

}
var lose =  function(){
	$('live' +  lives).setAttribute('style','display:none;');
	if (lives == 1) {
		titulo.innerText = "You lose";
		refreshOptions();
		$('option1').innerText = "Back to Menu";
		$('option1').setAttribute('href','../')
		$('option1').setAttribute('style','display:inline-block;')
		$('option2').innerText = "Restart";
		$('option2').setAttribute('onclick','javascript:window.location.reload();')
		$('option2').setAttribute('style','display:inline-block;')
	}else{
		lives--;
	}
	

}