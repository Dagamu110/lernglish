var selectLists = document.getElementById('lists');
var selectType = document.getElementById('type');
var selectMode = document.getElementById('mode');


for (var i = 0; i <= lists.length - 1; i++) {
	var list = document.createElement('option');
	list.value = lists[i]['name'];
	list.innerHTML = lists[i]['name'];
	selectLists.appendChild(list);
}

var bandera = 0;
var changeList =  function(){
	selectLists.children[0].disabled = 'true';
	selectType.style = "display : inline-block;";
	selectMode.style = "display : inline-block;";
	
	if (bandera) {
		for (var i = 0; i <= selectType.length - 1; i++) {
			selectType.removeChild(selectType.children[i]);
		}
	}
	for (var i = 0; i <= lists.length - 1; i++) {
		if (lists[i]['name'] == selectLists.value) {
			for(var l = 0; l <= lists[i]['type'].length - 1; l++){
				var type = document.createElement('option');
				type.value = lists[i]['type'][l];
				type.id ='types';
				type.innerHTML = lists[i]['type'][l];
				selectType.appendChild(type);
				bandera = 1;
			}
			for (var l = 0; l <= lists[i]['modes'].length - 1; l++) {
				var mode = document.createElement('option');
				mode.value = lists[i]['modes'][l];
				mode.id ='modes';
				mode.innerHTML = lists[i]['modes'][l];
				selectMode.appendChild(mode);
			}
		}
	}



}

selectLists.addEventListener('change', changeList);
selectType.addEventListener('change', disabledOn(selectType.children[0]));
selectMode.addEventListener('change', disabledOn(selectMode.children[0]));
