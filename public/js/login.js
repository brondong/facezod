/**
 * penekanan tombol keyboard pada input
 *  
 * @param  event
 * @return void
 */
function tekan (event) {
	// tombol enter
	if (event.which == 13) login();
}

/**
 * proses login
 * 
 * @return void | redirect
 */
function login () {
	// input
	var username = $.trim($('#username').val());
	var password = $.trim($('#password').val());
	var ingat = ($("#ingat").is(':checked')) ? 1 : 0;

	// ajax
	$.post(url_login, { username: username, password: password, ingat: ingat }, function (data, textStatus, xhr) {
		// disable tombol
		$('button').button('loading');

		// error
		if (data.status) {
			// username error
			if (data.username) {
				$('#form-username').addClass('has-error');
				$('#error-username').text(data.username).fadeIn();

			// username valid
			} else {
				$('#form-username').removeClass('has-error');
				$('#error-username').text('').fadeOut();
			};

			// password error
			if (data.password) {
				$('#form-password').addClass('has-error');
				$('#error-password').text(data.password).fadeIn();

			// password valid
			} else {
				$('#form-password').removeClass('has-error');
				$('#error-password').text('').fadeOut();
			};

			// login error
			if (data.login) {
				$('#error-login').text(data.login).fadeIn();

			// login valid
			} else {
				$('#error-login').text('').fadeOut();
			};

			// hapus password
			$('#password').val('');
		
		// sukses
		} else {
			// redirect
			$(location).prop('href', url_home);
		};

		// enable tombol
		$('button').button('reset');
	}, 'json');
}