var titulo = $('h2');
var a_options = [];
var practiceMode = '';
var points = -1;
var span_points  = $('points');
var lives =  3;

for (var i = 1; i <= 4; i++) {
	a_options.push($('option' + i));
}

for (var i = 0; i <= modos.length - 1; i++) {
	if (titulo.innerText == modos[i] + ":") {
		var modo = i;
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
		a_options[i].setAttribute('style','display:inline-block;')
		a_options[i].setAttribute("onclick","chooseVarPracticeMode('" + restantModes[i] + "');");
	}
}
choosePractice();
var verbosElegibles;
var electedVerb;

var changeVerb =  function () {
	n_verb = Math.floor(Math.random() * php[modo].length);
	php[modo].splice(n_verb,1);
	n_modePractice = 0;

	points++;
	span_points.innerText = points;

	titulo.innerText = modos[modo] + ":" +  php[modo][n_verb];

	for(var i = 0; i <= modos.length - 1; i ++){
		if (practiceMode == modos[i]) {
			n_modePractice = i;
		}
	}
	verbosElegibles = [php[n_modePractice][n_verb + 1]];
		electedVerb = php[n_modePractice][n_verb + 1];
	php[n_modePractice].splice(n_verb + 1,1);

	for (var i =1; i <= 3; i++) {
		verbosElegibles.push(php[n_modePractice][Math.floor(Math.random() * php[n_modePractice].length)]);
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
	lives--;
}