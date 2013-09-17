/**
 * rubah zodiak
 * 
 * @return void
 */
function zodiak (object) {
	// nama zodiak
	var zodiak = $(object).data('zodiak');

	// rubah zodiak
	$(location).prop('href', custom + zodiak);
}