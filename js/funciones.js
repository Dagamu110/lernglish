function $(object) {
	return document.getElementById(object);
}
function disabledOn(object) {
	object.disabled = 'true';
}
function removeItemFromArr( arr, item ) {
    return arr.filter( function( e ) {
        return e !== item;
    } );
};