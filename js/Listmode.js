var container_columns = $('div-columns');
var btn_check = $('check');

for (var i = 0; i <= modos.length - 1; i++) {
	var column = document.createElement('div');
	column.id = 'column-' + modos[i];
	column.setAttribute('class','column');
	container_columns.appendChild(column);
}

function cleanInterface() {
	for (var i = 0; i <= modos.length - 1; i++) {
		$('column-' + modos[i]).innerHTML = "";
		
	}
	container_columns.removeChild($('checks'));
}

var changeInterface = function(){

	cleanInterface();

	var bandera = 0;
	var array_item;
	var span;
	var select;
	var options_select = [];
	var option;
	var objOption;

	for (var i = 0; i <= php.length - 1; i++) {
		for (var l = 0; l <= php[i].length - 1; l++) {
			if (bandera == 0) {
				span = document.createElement('span');
				span.innerText = php[i][l];
				span.id = modos[i] + '-span' + l;
				span.class = 'span-item';
				$('column-' + modos[i]).appendChild(span);
				
			}else{
				select = document.createElement('select');
				select.id = modos[i] + '-select' + l;
				options_select = [];
				options_select.push(php[i][l]);
				for (var k = 0; k <= 2; k++) {
					option = php[i][Math.floor(Math.random() * php[i].length)];
					while(options_select.includes(option)){
						option = php[i][Math.floor(Math.random() * php[i].length)];
					}
					options_select.push(option);
				}
				options_select.sort();
				for (var k = 0; k <= options_select.length -1; k++) {
					objOption = document.createElement('option');
					objOption.innerText = options_select[k];
					select.appendChild(objOption);
				}
				$('column-' + modos[i]).appendChild(select);
			}
		}
	bandera = 1;
	}

	btn_check.setAttribute('onclick','check()');
}

changeInterface();

check_div = document.createElement('div');

var check = function () {

	check_div.setAttribute('class','column');
	check_div.id = 'checks';
	container_columns.appendChild(check_div);
	$('checks').innerHTML = "";

	for (var i = 1; i <= php.length - 1; i++) {
		for (var l = 0; l <= php[i].length - 1; l++) {
			var sp_ticket = document.createElement('span');
			if (" " + $(modos[i] + '-select' + l).value == php[i][l] || $(modos[i] + '-select' + l).value == php[i][l]) {
				sp_ticket.innerText = '✔';
				for (var k = 0; k <= modos.length - 1; k++) {
				}
			}else{
			
				sp_ticket.innerText = '✖' + php[i][l];
			}
			$('checks').appendChild(sp_ticket);
		}
	}
	btn_check.setAttribute('onclick','changeInterface()');
}
