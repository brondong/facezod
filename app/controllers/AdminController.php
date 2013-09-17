<?php

class AdminController extends BaseController {

	/**
	 * konstruktor
	 */
	public function __construct ()
	{
		$this->beforeFilter('auth', array('except' => array('login', 'postLogin')));
		$this->beforeFilter('guest', array('only' => 'login'));
		$this->beforeFilter('ajax', array('except' => array('login', 'home')));
		$this->beforeFilter('csrf', array('only' => array('tambahRamalan', 'rubahRamalan', 'rubahNama', 'rubahUsername', 'rubahPassword')));
	}

	/**
	 * form login
	 * 
	 * @return view
	 */
	public function login ()
	{
		return View::make('admin.login');
	}

	/**
	 * proses login
	 * 
	 * @return json
	 */
	public function postLogin ()
	{
		// validasi
		$input = Input::get();
		$rules = array(
			'username' => 'required|min:6|max:20|exists:admins,username',
			'password' => 'required|min:8|max:30'
		);
		$validasi = Validator::make($input, $rules);

		// error
		if ($validasi->fails()) {
			// pesan
			$status = 'error';
			$username = $validasi->messages()->first('username');
			$password = $validasi->messages()->first('password');
			$respon = compact('status', 'username', 'password');

			return Response::json($respon);

		// valid
		} else {
			// input
			$username = trim(Input::get('username'));
			$password = trim(Input::get('password'));
			$ingat = (trim(Input::get('ingat'))) == 1 ? true : false;

			// authentikasi
			$data = compact('username', 'password');

			// cocok
			if (Auth::attempt($data, $ingat)) {
				// pesan
				$status = null;				
				$respon = compact('status');

				return Response::json($respon);
			
			// tidak cocok
			} else {
				// pesan
				$status = 'error';
				$login = 'Username atau password yang anda masukkan tidak cocok.';
				$respon = compact('status', 'login');

				return Response::json($respon);
			}			
		}
	}

	/**
	 * halaman home admin
	 * 
	 * @return view
	 */
	public function home ()
	{
		return View::make('admin.master');
	}

	/**
	 * form tambah ramalan
	 * 
	 * @return view
	 */
	public function formTambahRamalan ()
	{
		return View::make('admin.tambah_ramalan');
	}

	/**
	 * tambah ramalan
	 * 
	 * @return json
	 */
	public function tambahRamalan ()
	{
		// validasi
		$input = Input::get();
		$rules = array(
			'zodiak' => 'required',
			'umum' => 'required',
			'asmara' => 'required',
			'karir' => 'required',
			'motivasi' => 'required',
			'nomor' => 'required|integer',
			'warna' => 'required',
			'tanggal' => 'required|ramalan:zodiak',
		);
		$validasi = Validator::make($input, $rules);

		// error
		if ($validasi->fails()) {
			// pesan
			$status = 'error';
			$zodiak = $validasi->messages()->first('zodiak');
			$umum = $validasi->messages()->first('umum');
			$asmara = $validasi->messages()->first('asmara');
			$karir = $validasi->messages()->first('karir');
			$motivasi = $validasi->messages()->first('motivasi');
			$nomor = $validasi->messages()->first('nomor');
			$warna = $validasi->messages()->first('warna');
			$tanggal = $validasi->messages()->first('tanggal');
			$respon = compact('status', 'zodiak', 'umum', 'asmara', 'karir', 'motivasi', 'nomor', 'warna', 'tanggal');

			return Response::json($respon);
		}
		
		// input
		$zodiak = trim(Input::get('zodiak'));
		$umum = trim(Input::get('umum'));
		$asmara = trim(Input::get('asmara'));
		$karir = trim(Input::get('karir'));
		$motivasi = trim(Input::get('motivasi'));
		$nomor = trim(Input::get('nomor'));
		$warna = trim(Input::get('warna'));
		$tanggal = date('Y-m-d', strtotime(trim(Input::get('tanggal'))));

		Ramal::tambah($zodiak, $umum, $asmara, $karir, $motivasi, $nomor, $warna, $tanggal);

		// pesan
		$status = null;
		$pesan = 'Data ramalan berhasil ditambah.';
		$respon = compact('status', 'pesan');

		return Response::json($respon);
	}

	/**
	 * data ramalan
	 * 
	 * @return view
	 */
	public function dataRamalan ()
	{
		// data view
		$ramalan = Ramal::data();
		$data = compact('ramalan');

		return View::make('admin.data_ramalan', $data);
	}

	/**
	 * form rubah ramalan
	 * 
	 * @return view
	 */
	public function formRubahRamalan ($id)
	{
		// data view
		$ramalan = Ramal::setRamalan($id);
		$data = compact('ramalan');

		return View::make('admin.rubah_ramalan', $data);
	}

	/**
	 * rubah ramalan
	 * 
	 * @return json
	 */
	public function rubahRamalan ($id)
	{
		// validasi
		$input = Input::get();
		$rules = array(
			'zodiak' => 'required',
			'umum' => 'required',
			'asmara' => 'required',
			'karir' => 'required',
			'motivasi' => 'required',
			'nomor' => 'required|integer',
			'warna' => 'required',
			'tanggal' => 'required',
		);
		$validasi = Validator::make($input, $rules);

		// error
		if ($validasi->fails()) {
			// pesan
			$status = 'error';
			$zodiak = $validasi->messages()->first('zodiak');
			$umum = $validasi->messages()->first('umum');
			$asmara = $validasi->messages()->first('asmara');
			$karir = $validasi->messages()->first('karir');
			$motivasi = $validasi->messages()->first('motivasi');
			$nomor = $validasi->messages()->first('nomor');
			$warna = $validasi->messages()->first('warna');
			$tanggal = $validasi->messages()->first('tanggal');
			$respon = compact('status', 'zodiak', 'umum', 'asmara', 'karir', 'motivasi', 'nomor', 'warna', 'tanggal');

			return Response::json($respon);
		}
		
		// input
		$zodiak = trim(Input::get('zodiak'));
		$umum = trim(Input::get('umum'));
		$asmara = trim(Input::get('asmara'));
		$karir = trim(Input::get('karir'));
		$motivasi = trim(Input::get('motivasi'));
		$nomor = trim(Input::get('nomor'));
		$warna = trim(Input::get('warna'));
		$tanggal = date('Y-m-d', strtotime(trim(Input::get('tanggal'))));

		Ramal::rubah($id, $zodiak, $umum, $asmara, $karir, $motivasi, $nomor, $warna, $tanggal);

		// pesan
		$status = null;
		$pesan = 'Data ramalan berhasil dirubah.';
		$respon = compact('status', 'pesan');

		return Response::json($respon);
	}

	/**
	 * konfirmasi hapus ramalan
	 * 
	 * @return view
	 */
	public function konfirmasiHapusRamalan ($id)
	{
		// data view
		$ramalan = Ramal::setRamalan($id);
		$data = compact('ramalan');

		return View::make('admin.hapus_ramalan', $data);
	}

	/**
	 * hapus ramalan
	 * 
	 * @param  int $id
	 * @return void
	 */
	public function hapusRamalan ($id)
	{
		Ramal::hapus($id);
	}

	/**
	 * formulir tambah admin
	 * 
	 * @return view
	 */
	public function formTambahAdmin ()
	{
		return View::make('admin.tambah_admin');
	}

	/**
	 * tambah admin
	 * 
	 * @return void
	 */
	public function tambahAdmin ()
	{
		// validasi
		$input = Input::get();
		$aturan = array(
			'nama' => 'required|min:5|max:20',
			'username' => 'required|min:6|max:20|unique:admins,username',
			'password' => 'required|min:8'
		);
		$validasi = Validator::make($input, $aturan);

		// tidak valid
		if ($validasi->fails()) {
			// pesan
			$status = 'error';
			$nama = $validasi->messages()->first('nama') ?: '';
			$username = $validasi->messages()->first('username') ?: '';
			$password = $validasi->messages()->first('password') ?: '';
			$respon = compact('status', 'nama', 'username', 'password');

			return Response::json($respon);
		}

		// input
		$nama = ucwords(trim(Input::get('nama')));
		$username = trim(Input::get('username'));
		$password = Hash::make(trim(Input::get('password')));
		
		// tambah data di basisdata
		Admin::tambah($nama, $username, $password);

		// pesan
		$status = null;
		$pesan = 'Data admin berhasil ditambah.';
		$respon = compact('status', 'pesan');

		return Response::json($respon);
	}

	/**
	 * data admin
	 * 
	 * @return view
	 */
	public function dataAdmin ()
	{
		// data view
		$admins = Admin::data();
		$data = compact('admins');

		return View::make('admin.data_admin', $data);
	}

	/**
	 * form rubah ramalan
	 * 
	 * @return view
	 */
	public function formRubahAdmin ($id)
	{
		// data view
		$admin = Admin::set($id);
		$data = compact('admin');

		return View::make('admin.rubah_admin', $data);
	}

	/**
	 * rubah admin
	 * 
	 * @return json
	 */
	public function rubahAdmin ($id)
	{
		// validasi
		$input = Input::get();
		$rules = array(
			'nama' => 'required|min:5|max:20',
			'username' => 'required|min:6|max:20|unique:admins,username,' . $id,
			'password' => 'required|min:8'
		);
		$validasi = Validator::make($input, $rules);

		// error
		if ($validasi->fails()) {
			// pesan
			$status = 'error';
			$nama = $validasi->messages()->first('nama') ?: '';
			$username = $validasi->messages()->first('username') ?: '';
			$password = $validasi->messages()->first('password') ?: '';
			$respon = compact('status', 'nama', 'username', 'password');

			return Response::json($respon);
		}		

		// input
		$nama = ucwords(trim(Input::get('nama')));
		$username = trim(Input::get('username'));
		$password = Hash::make(trim(Input::get('password')));
		
		// tambah data di basisdata
		Admin::rubah($id, $nama, $username, $password);

		// pesan
		$status = null;
		$pesan = 'Data admin berhasil dirubah.';
		$respon = compact('status', 'pesan');

		return Response::json($respon);
	}

	/**
	 * konfirmasi hapus admin
	 * 
	 * @return view
	 */
	public function konfirmasiHapusAdmin ($id)
	{
		// data view
		$admin = Admin::set($id);
		$data = compact('admin');

		return View::make('admin.hapus_admin', $data);
	}

	/**
	 * hapus admin
	 * 
	 * @param  int $id
	 * @return void
	 */
	public function hapusAdmin ($id)
	{
		Admin::hapus($id);
	}

	/**
	 * formulir rubah nama
	 * 
	 * @return view
	 */
	public function formRubahNama ()
	{
		return View::make('admin.rubah_nama');
	}

	/**
	 * rubah nama admin
	 * 
	 * @return void
	 */
	public function rubahNama ()
	{
		// validasi
		$input = Input::get();
		$aturan = array(
			'nama_sekarang' => 'required|min:5|max:20|nama_sekarang',
			'nama_baru' => 'required|min:5|max:20|different:nama_sekarang|unique:admins,nama',
			'konfirmasi_nama_baru' => 'required|min:5|max:20|same:nama_baru',
		);
		$validasi = Validator::make($input, $aturan);

		// tidak valid
		if ($validasi->fails()) {
			// pesan
			$status = 'error';
			$nama_sekarang = $validasi->messages()->first('nama_sekarang') ?: '';
			$nama_baru = $validasi->messages()->first('nama_baru') ?: '';
			$konfirmasi_nama_baru = $validasi->messages()->first('konfirmasi_nama_baru') ?: '';
			$respon = compact('status', 'nama_sekarang', 'nama_baru', 'konfirmasi_nama_baru');
			return Response::json($respon);
		}

		// id admin
		$id = Auth::user()->id;

		// input
		$nama_baru = ucwords(trim(Input::get('nama_baru')));
		
		// rubah data di basisdata
		Admin::rubahNama($id, $nama_baru);

		// pesan
		$status = null;
		$pesan = 'Nama anda berhasil dirubah.';
		$respon = compact('status', 'pesan');

		return Response::json($respon);
	}

	/**
	 * formulir rubah username
	 * 
	 * @return view
	 */
	public function formRubahUsername ()
	{
		return View::make('admin.rubah_username');
	}

	/**
	 * rubah username admin
	 * 
	 * @return void
	 */
	public function rubahUsername ()
	{
		// validasi
		$input = Input::get();
		$aturan = array(
			'username_sekarang' => 'required|min:6|max:20|username_sekarang',
			'username_baru' => 'required|min:6|max:20|different:username_sekarang|unique:admins,username',
			'konfirmasi_username_baru' => 'required|min:6|max:20|same:username_baru',
		);
		$validasi = Validator::make($input, $aturan);

		// tidak valid
		if ($validasi->fails()) {
			// pesan
			$status = 'error';
			$username_sekarang = $validasi->messages()->first('username_sekarang') ?: '';
			$username_baru = $validasi->messages()->first('username_baru') ?: '';
			$konfirmasi_username_baru = $validasi->messages()->first('konfirmasi_username_baru') ?: '';
			$respon = compact('status', 'username_sekarang', 'username_baru', 'konfirmasi_username_baru');
			return Response::json($respon);
		}

		// id admin
		$id = Auth::user()->id;

		// input
		$username_baru = trim(Input::get('username_baru'));
		
		// rubah data di basisdata
		Admin::rubahUsername($id, $username_baru);

		// pesan
		$status = null;
		$pesan = 'Username anda berhasil dirubah.';
		$respon = compact('status', 'pesan');

		return Response::json($respon);
	}

	/**
	 * formulir rubah password
	 * 
	 * @return view
	 */
	public function formRubahPassword ()
	{
		return View::make('admin.rubah_password');
	}

	/**
	 * rubah password admin
	 * 
	 * @return void
	 */
	public function rubahPassword ()
	{
		// validasi
		$input = Input::get();
		$aturan = array(
			'password_sekarang' => 'required|min:8|max:20|password_sekarang',
			'password_baru' => 'required|min:8|max:20|different:password_sekarang|unique:admins,password',
			'konfirmasi_password_baru' => 'required|min:8|max:20|same:password_baru',
		);
		$validasi = Validator::make($input, $aturan);

		// tidak valid
		if ($validasi->fails()) {
			// pesan
			$status = 'error';
			$password_sekarang = $validasi->messages()->first('password_sekarang') ?: '';
			$password_baru = $validasi->messages()->first('password_baru') ?: '';
			$konfirmasi_password_baru = $validasi->messages()->first('konfirmasi_password_baru') ?: '';
			$respon = compact('status', 'password_sekarang', 'password_baru', 'konfirmasi_password_baru');
			return Response::json($respon);
		}

		// id admin
		$id = Auth::user()->id;

		// input
		$password_baru = Hash::make(trim(Input::get('password_baru')));
		
		// rubah data di basisdata
		Admin::rubahPassword($id, $password_baru);

		// pesan
		$status = null;
		$pesan = 'Password anda berhasil dirubah.';
		$respon = compact('status', 'pesan');

		return Response::json($respon);
	}

	/**
	 * logout admin
	 * 
	 * @return void
	 */
	public function logout ()
	{
		Auth::logout();
	}
}