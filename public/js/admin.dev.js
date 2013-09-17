$(function () {
	init();
});

/**
 * inisialisasi jquery plugins
 * 
 * @return void
 */
function init () {
	// fokus input
	$('#nomor').focus();

	// color picker
	var warna = $('#warna');

	warna.ColorPicker({
		onShow: function (object) {
			$(object).fadeIn();
		},
		onSubmit: function (hsb, hex, rgb, element) {
			warna.val(hex);
			warna.ColorPickerHide();
		},
		onBeforeShow: function () {
			warna.ColorPickerSetColor(this.value);
		},
		onChange: function (hsb, hex, rgb, element) {
			warna.val(hex);
		}
	});

	// date picker
	$('#tanggal').datepicker({
		format: 'dd-mm-yyyy',
		autoclose: true,
		language: 'id'
	});

	// link paginasi
	$('.paginasi a').click(function (event) {
		// data
		var url = $(this).prop('href');

		// load
		$('#konten').load(url, function () {
			init();
		});

		event.preventDefault();

		return false;
	});
};

/**
 * rubah zodiak
 * 
 * @return void
 */
function zodiak (object) {
	// nama zodiak
	var zodiak = $(object).data('zodiak');

	// rubah zodiak
	$('#zodiak').data('zodiak', zodiak).text(zodiak);

	// hilangkan zodiak
	$(object).parent().remove();
}


/**
 * formulir tambah ramalan
 * 
 * @param  anchor object
 * @return void
 */
function formTambahRamalan (object) {
	$('#konten').load(urlTambahRamalan, function () {
		init();
	});

	link(object);
}

/**
 * tambah ramalan
 * 
 * @return void
 */
function tambahRamalan () {
	// input
	var nomor = $.trim($('#nomor').val());
	var warna = $.trim($('#warna').val());
	var tanggal = $.trim($('#tanggal').val());
	var zodiak = $.trim($('#zodiak').data('zodiak'));
	var umum = $.trim($('#umum').val());
	var asmara = $.trim($('#asmara').val());
	var karir = $.trim($('#karir').val());
	var motivasi = $.trim($('#motivasi').val());

	// ajax
	$.post(urlTambahRamalan, { _token: token, nomor: nomor, warna: warna, tanggal: tanggal, zodiak: zodiak, umum: umum, asmara: asmara, karir: karir, motivasi: motivasi }, function (data, textStatus, xhr) {
		// disable tombol
		$('#tambah').button('loading');

		// error
		if (data.status) {
			// zodiak error
			if (data.zodiak) {
				$('#error').text(data.zodiak).fadeIn();

			// zodiak valid
			} else {
				$('#error').text('').fadeOut();
			};

			// nomor error
			if (data.nomor) {
				$('#form-nomor').addClass('has-error');
				$('#error-nomor').text(data.nomor).fadeIn();

			// nomor valid
			} else {
				$('#form-nomor').removeClass('has-error');
				$('#error-nomor').text('').fadeOut();
			};

			// warna error
			if (data.warna) {
				$('#form-warna').addClass('has-error');
				$('#error-warna').text(data.warna).fadeIn();

			// warna valid
			} else {
				$('#form-warna').removeClass('has-error');
				$('#error-warna').text('').fadeOut();
			};
			
			// tanggal error
			if (data.tanggal) {
				$('#form-tanggal').addClass('has-error');
				$('#error-tanggal').text(data.tanggal).fadeIn();

			// tanggal valid
			} else {
				$('#form-tanggal').removeClass('has-error');
				$('#error-tanggal').text('').fadeOut();
			};
			
			// umum error
			if (data.umum) {
				$('#form-umum').addClass('has-error');
				$('#error-umum').text(data.umum).fadeIn();

			// umum valid
			} else {
				$('#form-umum').removeClass('has-error');
				$('#error-umum').text('').fadeOut();
			};

			// asmara error
			if (data.asmara) {
				$('#form-asmara').addClass('has-error');
				$('#error-asmara').text(data.asmara).fadeIn();

			// asmara valid
			} else {
				$('#form-asmara').removeClass('has-error');
				$('#error-asmara').text('').fadeOut();
			};

			// karir error
			if (data.karir) {
				$('#form-karir').addClass('has-error');
				$('#error-karir').text(data.karir).fadeIn();

			// karir valid
			} else {
				$('#form-karir').removeClass('has-error');
				$('#error-karir').text('').fadeOut();
			};

			// motivasi error
			if (data.motivasi) {
				$('#form-motivasi').addClass('has-error');
				$('#error-motivasi').text(data.motivasi).fadeIn();

			// motivasi valid
			} else {
				$('#form-motivasi').removeClass('has-error');
				$('#error-motivasi').text('').fadeOut();
			};
		
		// sukses
		} else {
			// hapus pesan error
			$('.form-group').removeClass('has-error');
			$('.help-block, #error').text('').fadeOut();

			// tampilkan pesan sukses
			$('#sukses').text(data.pesan).fadeIn().fadeOut(5000);

			// bersihkan input
			$('input, textarea').val('');

			// fokus input
			$('#nomor').focus();
		};

		// enable tombol
		$('#tambah').button('reset');
	}, 'json');
}

/**
 * formulir data ramalan
 * 
 * @param  anchor object
 * @return void
 */
function dataRamalan (object) {
	$('#konten').load(urlDataRamalan, function () {
		init();
	});

	link(object);
}

/**
 * formulir rubah ramalan
 * 
 * @param  anchor object
 * @return void
 */
function formRubahRamalan (object) {
	var id = $(object).prop('id');

	$('#konten').load(urlRubahRamalan + '/' + id, function () {
		init();
	});

	link(object);
}

/**
 * rubah ramalan
 * 
 * @param  int id
 * @return void
 */
function rubahRamalan (id) {
	// input
	var nomor = $.trim($('#nomor').val());
	var warna = $.trim($('#warna').val());
	var tanggal = $.trim($('#tanggal').val());
	var zodiak = $.trim($('#zodiak').data('zodiak'));
	var umum = $.trim($('#umum').val());
	var asmara = $.trim($('#asmara').val());
	var karir = $.trim($('#karir').val());
	var motivasi = $.trim($('#motivasi').val());

	// ajax
	$.post(urlRubahRamalan + '/' + id, { _token: token, nomor: nomor, warna: warna, tanggal: tanggal, zodiak: zodiak, umum: umum, asmara: asmara, karir: karir, motivasi: motivasi }, function (data, textStatus, xhr) {
		// disable tombol
		$('#simpan').button('loading');

		// error
		if (data.status) {
			// zodiak error
			if (data.zodiak) {
				$('#error').text(data.zodiak).fadeIn();

			// zodiak valid
			} else {
				$('#error').text('').fadeOut();
			};

			// nomor error
			if (data.nomor) {
				$('#form-nomor').addClass('has-error');
				$('#error-nomor').text(data.nomor).fadeIn();

			// nomor valid
			} else {
				$('#form-nomor').removeClass('has-error');
				$('#error-nomor').text('').fadeOut();
			};

			// warna error
			if (data.warna) {
				$('#form-warna').addClass('has-error');
				$('#error-warna').text(data.warna).fadeIn();

			// warna valid
			} else {
				$('#form-warna').removeClass('has-error');
				$('#error-warna').text('').fadeOut();
			};
			
			// tanggal error
			if (data.tanggal) {
				$('#form-tanggal').addClass('has-error');
				$('#error-tanggal').text(data.tanggal).fadeIn();

			// tanggal valid
			} else {
				$('#form-tanggal').removeClass('has-error');
				$('#error-tanggal').text('').fadeOut();
			};
			
			// umum error
			if (data.umum) {
				$('#form-umum').addClass('has-error');
				$('#error-umum').text(data.umum).fadeIn();

			// umum valid
			} else {
				$('#form-umum').removeClass('has-error');
				$('#error-umum').text('').fadeOut();
			};

			// asmara error
			if (data.asmara) {
				$('#form-asmara').addClass('has-error');
				$('#error-asmara').text(data.asmara).fadeIn();

			// asmara valid
			} else {
				$('#form-asmara').removeClass('has-error');
				$('#error-asmara').text('').fadeOut();
			};

			// karir error
			if (data.karir) {
				$('#form-karir').addClass('has-error');
				$('#error-karir').text(data.karir).fadeIn();

			// karir valid
			} else {
				$('#form-karir').removeClass('has-error');
				$('#error-karir').text('').fadeOut();
			};

			// motivasi error
			if (data.motivasi) {
				$('#form-motivasi').addClass('has-error');
				$('#error-motivasi').text(data.motivasi).fadeIn();

			// motivasi valid
			} else {
				$('#form-motivasi').removeClass('has-error');
				$('#error-motivasi').text('').fadeOut();
			};
		
		// sukses
		} else {
			// hapus pesan error
			$('.form-group').removeClass('has-error');
			$('.help-block, #error').text('').fadeOut();

			// tampilkan pesan sukses
			$('#sukses').text(data.pesan).fadeIn().fadeOut(5000);

			// fokus input
			$('#nomor').focus();
		};

		// enable tombol
		$('#simpan').button('reset');
	}, 'json');
}

/**
 * konfirmasi hapus ramalan
 * 
 * @param  anchor object
 * @return void
 */
function konfirmasiHapusRamalan (object) {
	// data
	var id = $(object).prop('id');

	// load konten
	$('.modal-content').load(urlHapusRamalan + '/' + id, function () {
		// tampilkan modal
		$('.modal').modal('show');
	});
}

/**
 * hapus ramalan
 * 
 * @param int id
 * @return void
 */
function hapusRamalan (id) {
	// disable tombol
	$('#simpan').button('loading');

	// ajax
	$.post(urlHapusRamalan + '/' + id, {}, function (data) { }, 'json');

	// enable tombol
	$('#simpan').button('reset');

	// sembunyikan modal
	$('.modal').modal('hide');

	// load data ramalan
	$('#konten').load(urlDataRamalan);
}

/**
 * formulir tambah admin
 * 
 * @param  anchor object
 * @return void
 */
function formTambahAdmin (object) {
	$('#konten').load(urlTambahAdmin);

	link(object);
}

/**
 * event keypress formulir tambah admin
 * 
 * @param  event event
 * @return void
 */
function tekanTambahAdmin (event) {
	if (event.which == 13) tambahAdmin();
}

/**
 * tambah admin
 * 
 * @return void
 */
function tambahAdmin () {
	// input
	var nama = $.trim($('#nama').val());
	var username = $.trim($('#username').val());
	var password = $.trim($('#password').val());

	// ajax
	$.post(urlTambahAdmin, { _token: token, nama: nama, username: username, password: password }, function (data, textStatus, xhr) {
		// disable tombol
		$('#tambah').button('loading');

		// error
		if (data.status) {
			// nama error
			if (data.nama) {
				$('#form-nama').addClass('has-error');
				$('#error-nama').text(data.nama).fadeIn();

			// nama valid
			} else {
				$('#form-nama').removeClass('has-error');
				$('#error-nama').text('').fadeOut();
			};

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
		
		// sukses
		} else {
			// hapus pesan error
			$('.form-group').removeClass('has-error');
			$('.help-block').text('').fadeOut();

			// tampilkan pesan sukses
			$('#sukses').text(data.pesan).fadeIn().fadeOut(5000);

			// bersihkan input
			$('input').val('');

			// fokus input
			$('#nama').focus();
		};

		// enable tombol
		$('#tambah').button('reset');
	}, 'json');
}

/**
 * formulir data admin
 * 
 * @param  anchor object
 * @return void
 */
function dataAdmin (object) {
	$('#konten').load(urlDataAdmin, function () {
		init();
	});

	link(object);
}

/**
 * formulir rubah admin
 * 
 * @param  anchor object
 * @return void
 */
function formRubahAdmin (object) {
	var id = $(object).prop('id');

	$('#konten').load(urlRubahAdmin + '/' + id, function () {
		init();
	});

	link(object);
}

/**
 * event keypress formulir rubah admin
 * 
 * @param  event event
 * @return void
 */
function tekanRubahAdmin (event, id) {
	if (event.which == 13) rubahAdmin(id);
}

/**
 * rubah admin
 * 
 * @param  int id
 * @return void
 */
function rubahAdmin (id) {
	// input
	var nama = $.trim($('#nama').val());
	var username = $.trim($('#username').val());
	var password = $.trim($('#password').val());

	// ajax
	$.post(urlRubahAdmin + '/' + id, { _token: token, nama: nama, username: username, password: password }, function (data, textStatus, xhr) {
		// disable tombol
		$('#simpan').button('loading');

		// error
		if (data.status) {
			// nama error
			if (data.nama) {
				$('#form-nama').addClass('has-error');
				$('#error-nama').text(data.nama).fadeIn();

			// nama valid
			} else {
				$('#form-nama').removeClass('has-error');
				$('#error-nama').text('').fadeOut();
			};

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
		
		// sukses
		} else {
			// hapus pesan error
			$('.form-group').removeClass('has-error');
			$('.help-block').text('').fadeOut();

			// tampilkan pesan sukses
			$('#sukses').text(data.pesan).fadeIn().fadeOut(5000);

			// fokus input
			$('#nama').focus();
		};

		// enable tombol
		$('#simpan').button('reset');
	}, 'json');
}

/**
 * konfirmasi hapus admin
 * 
 * @param  anchor object
 * @return void
 */
function konfirmasiHapusAdmin (object) {
	// data
	var id = $(object).prop('id');

	// load konten
	$('.modal-content').load(urlHapusAdmin + '/' + id, function () {
		// tampilkan modal
		$('.modal').modal('show');
	});
}

/**
 * hapus admin
 * 
 * @param int id
 * @return void
 */
function hapusAdmin (id) {
	// disable tombol
	$('#simpan').button('loading');

	// ajax
	$.post(urlHapusAdmin + '/' + id, {}, function (data) { }, 'json');

	// enable tombol
	$('#simpan').button('reset');

	// sembunyikan modal
	$('.modal').modal('hide');

	// load data ramalan
	$('#konten').load(urlDataAdmin);
}

/**
 * formulir rubah nama
 * 
 * @param  anchor object
 * @return void
 */
function formRubahNama (object) {
	$('#konten').load(urlRubahNama);

	link(object);
}

/**
 * event keypress formulir rubah nama
 * 
 * @param  event event
 * @return void
 */
function tekanNama (event) {
	if (event.which == 13) rubahNama();
}

/**
 * rubah nama
 * 
 * @return void
 */
function rubahNama () {
	// input
	var nama_sekarang = $.trim($('#nama-sekarang').val());
	var nama_baru = $.trim($('#nama-baru').val());
	var konfirmasi_nama_baru = $.trim($('#konfirmasi-nama-baru').val());

	// ajax
	$.post(urlRubahNama, { _token: token, nama_sekarang: nama_sekarang, nama_baru: nama_baru, konfirmasi_nama_baru: konfirmasi_nama_baru }, function (data, textStatus, xhr) {
		// disable tombol
		$('#simpan').button('loading');

		// error
		if (data.status) {
			// nama sekarang error
			if (data.nama_sekarang) {
				$('#form-nama-sekarang').addClass('has-error');
				$('#error-nama-sekarang').text(data.nama_sekarang).fadeIn();

			// nama sekarang valid
			} else {
				$('#form-nama-sekarang').removeClass('has-error');
				$('#error-nama-sekarang').text('').fadeOut();
			};

			// nama baru error
			if (data.nama_baru) {
				$('#form-nama-baru').addClass('has-error');
				$('#error-nama-baru').text(data.nama_baru).fadeIn();

			// nama baru valid
			} else {
				$('#form-nama-baru').removeClass('has-error');
				$('#error-nama-baru').text('').fadeOut();
			};

			// konfirmasi nama error
			if (data.konfirmasi_nama_baru) {
				$('#form-konfirmasi-nama-baru').addClass('has-error');
				$('#error-konfirmasi-nama-baru').text(data.konfirmasi_nama_baru).fadeIn();

			// konfirmasi nama valid
			} else {
				$('#form-konfirmasi-nama-baru').removeClass('has-error');
				$('#error-konfirmasi-nama-baru').text('').fadeOut();
			};
		
		// sukses
		} else {
			// hapus pesan error
			$('.form-group').removeClass('has-error');
			$('.help-block').text('').fadeOut();

			// tampilkan pesan sukses
			$('#sukses').text(data.pesan).fadeIn().fadeOut(5000);

			// bersihkan input
			$('input').val('');

			// fokus input
			$('#nama-sekarang').focus();
		};

		// enable tombol
		$('#simpan').button('reset');
	}, 'json');
}

/**
 * formulir rubah username
 * 
 * @param  anchor object
 * @return void
 */
function formRubahUsername (object) {
	$('#konten').load(urlRubahUsername);

	link(object);
}

/**
 * event keypress formulir rubah username
 * 
 * @param  event event
 * @return void
 */
function tekanUsername (event) {
	if (event.which == 13) rubahUsername();
}

/**
 * rubah username
 * 
 * @return void
 */
function rubahUsername () {
	// input
	var username_sekarang = $.trim($('#username-sekarang').val());
	var username_baru = $.trim($('#username-baru').val());
	var konfirmasi_username_baru = $.trim($('#konfirmasi-username-baru').val());

	// ajax
	$.post(urlRubahUsername, { _token: token, username_sekarang: username_sekarang, username_baru: username_baru, konfirmasi_username_baru: konfirmasi_username_baru }, function (data, textStatus, xhr) {
		// disable tombol
		$('#simpan').button('loading');

		// error
		if (data.status) {
			// username sekarang error
			if (data.username_sekarang) {
				$('#form-username-sekarang').addClass('has-error');
				$('#error-username-sekarang').text(data.username_sekarang).fadeIn();

			// username sekarang valid
			} else {
				$('#form-username-sekarang').removeClass('has-error');
				$('#error-username-sekarang').text('').fadeOut();
			};

			// username baru error
			if (data.username_baru) {
				$('#form-username-baru').addClass('has-error');
				$('#error-username-baru').text(data.username_baru).fadeIn();

			// username baru valid
			} else {
				$('#form-username-baru').removeClass('has-error');
				$('#error-username-baru').text('').fadeOut();
			};

			// konfirmasi username error
			if (data.konfirmasi_username_baru) {
				$('#form-konfirmasi-username-baru').addClass('has-error');
				$('#error-konfirmasi-username-baru').text(data.konfirmasi_username_baru).fadeIn();

			// konfirmasi username valid
			} else {
				$('#form-konfirmasi-username-baru').removeClass('has-error');
				$('#error-konfirmasi-username-baru').text('').fadeOut();
			};
		
		// sukses
		} else {
			// hapus pesan error
			$('.form-group').removeClass('has-error');
			$('.help-block').text('').fadeOut();

			// tampilkan pesan sukses
			$('#sukses').text(data.pesan).fadeIn().fadeOut(5000);

			// bersihkan input
			$('input').val('');

			// fokus input
			$('#username-sekarang').focus();
		};

		// enable tombol
		$('#simpan').button('reset');
	}, 'json');
}

/**
 * formulir rubah password
 * 
 * @param  anchor object
 * @return void
 */
function formRubahPassword (object) {
	$('#konten').load(urlRubahPassword);

	link(object);
}

/**
 * event keypress formulir rubah password
 * 
 * @param  event event
 * @return void
 */
function tekanPassword (event) {
	if (event.which == 13) rubahPassword();
}

/**
 * rubah password
 * 
 * @return void
 */
function rubahPassword () {
	// input
	var password_sekarang = $.trim($('#password-sekarang').val());
	var password_baru = $.trim($('#password-baru').val());
	var konfirmasi_password_baru = $.trim($('#konfirmasi-password-baru').val());

	// ajax
	$.post(urlRubahPassword, { _token: token, password_sekarang: password_sekarang, password_baru: password_baru, konfirmasi_password_baru: konfirmasi_password_baru }, function (data, textStatus, xhr) {
		// disable tombol
		$('#simpan').button('loading');

		// error
		if (data.status) {
			// password sekarang error
			if (data.password_sekarang) {
				$('#form-password-sekarang').addClass('has-error');
				$('#error-password-sekarang').text(data.password_sekarang).fadeIn();

			// password sekarang valid
			} else {
				$('#form-password-sekarang').removeClass('has-error');
				$('#error-password-sekarang').text('').fadeOut();
			};

			// password baru error
			if (data.password_baru) {
				$('#form-password-baru').addClass('has-error');
				$('#error-password-baru').text(data.password_baru).fadeIn();

			// password baru valid
			} else {
				$('#form-password-baru').removeClass('has-error');
				$('#error-password-baru').text('').fadeOut();
			};

			// konfirmasi password error
			if (data.konfirmasi_password_baru) {
				$('#form-konfirmasi-password-baru').addClass('has-error');
				$('#error-konfirmasi-password-baru').text(data.konfirmasi_password_baru).fadeIn();

			// konfirmasi password valid
			} else {
				$('#form-konfirmasi-password-baru').removeClass('has-error');
				$('#error-konfirmasi-password-baru').text('').fadeOut();
			};
		
		// sukses
		} else {
			// hapus pesan error
			$('.form-group').removeClass('has-error');
			$('.help-block, #error').text('').fadeOut();

			// tampilkan pesan sukses
			$('#sukses').text(data.pesan).fadeIn().fadeOut(5000);

			// bersihkan input
			$('input').val('');

			// fokus input
			$('#password-sekarang').focus();
		};

		// enable tombol
		$('#simpan').button('reset');
	}, 'json');
}

/**
 * logout admin
 * 
 * @param  anchor object
 * @return void
 */
function logout (object) {
	$.get(urlLogout, function () {
		$(location).prop('href', urlLogin);
	});
}

/**
 * tambah class active
 * 
 * @param  anchor object
 * @return void
 */
function link (object) {
	$('.nav-tabs li').removeClass('active');
	$(object).parent().addClass('active');
}