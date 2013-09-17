<?php

class HomeController extends BaseController {

	/**
	 * konstruktor
	 */
	public function __construct()
	{
		// filter
		$this->beforeFilter('facebook');

		// atur paginasi
		Config::set('view.pagination', 'paginator.ramalan');
	}

	/**
	 * home aplikasi
	 * 
	 * @return view|redirect
	 */
	public function home()
	{
		// kode error
		$error = (isset($_GET['error'])) ? $_GET['error'] : null;

		// error
		if ($error) {
			// cancelled
			if ($error == 'access_denied') return $this->facebook();
			
		// sukses
		} else {
			// graph api
			$user = FB::api('me?fields=id,name,birthday,gender,picture.height(400).type(square).width(400),relationship_status&locale=id_ID');

			// data user
			$zodiak = $this->zodiak(date('j-n', strtotime($user['birthday'])));
			$now = $this->format(date('D, d M Y', strtotime(date('d-m-Y'))));
			$foto = $user['picture']['data']['url'];
			$nama = $user['name'];
			$lahir = $this->format(date('D, d M Y', strtotime($user['birthday'])));
			$umur = $this->umur(date('Y-m-d', strtotime($user['birthday'])));
			$gender = ucwords($user['gender']);
			$status = ucwords($user['relationship_status']);

			// data ramalan
			$tanggal = date('Y-m-d');
			$ramal = Ramal::tampil($zodiak, $tanggal);
			
			// data view
			$data = compact('zodiak', 'now', 'foto', 'nama', 'lahir', 'umur', 'gender', 'status', 'user', 'ramal');

			return View::make('app.layout', $data);
		}
	}

	/**
	 * custom zodiak
	 * 
	 * @param  string $zodiak
	 * @return view
	 */
	public function customZodiak($zodiak)
	{
		// graph api
		$user = FB::api('me?fields=id,name,birthday,gender,picture.height(400).type(square).width(400),relationship_status&locale=id_ID');

		// data user
		$now = $this->format(date('D, d M Y', strtotime(date('d-m-Y'))));
		$foto = $user['picture']['data']['url'];
		$nama = $user['name'];
		$lahir = $this->format(date('D, d M Y', strtotime($user['birthday'])));
		$umur = $this->umur(date('Y-m-d', strtotime($user['birthday'])));
		$gender = ucwords($user['gender']);
		$status = ucwords($user['relationship_status']);

		// data ramalan
		$tanggal = date('Y-m-d');
		$ramal = Ramal::tampil($zodiak, $tanggal);
		
		// data view
		$data = compact('zodiak', 'now', 'foto', 'nama', 'lahir', 'umur', 'gender', 'status', 'user', 'ramal');

		return View::make('app.layout', $data);	}

	/**
	 * login dialog
	 * 
	 * @return redirect
	 */
	public function login()
	{
		$url = FB::loginUrl();

		return Redirect::to($url);
	}

	/**
	 * logout user
	 * 
	 * @return redirect
	 */
	public function logout()
	{
		// hapus session
		FB::destroySession();
		Session::flush();

		return $this->facebook();
	}

	/**
	 * 500 error handler
	 * 
	 * @return [type] [description]
	 */
	public function ise()
	{
		return Response::make(View::make('errors.500'), 500);
	}

	/**
	 * redirect ke facebook
	 * 
	 * @return redirect
	 */
	private function facebook()
	{
		$url = 'https://facebook.com/';
		
		return Redirect::to($url);
	}

	/**
	 * rubah format tanggal & bulan menjadi indonesia
	 * 
	 * @param  date $tanggal
	 * @return string
	 */
	private function format($tanggal)
	{
		// array inggris => indonesia 
		$format = array(
			'Sun' => 'Minggu',
			'Mon' => 'Senin',
			'Tue' => 'Selasa',
			'Wed' => 'Rabu',
			'Thu' => 'Kamis',
			'Fri' => 'Jumat',
			'Sat' => 'Sabtu',
			'Jan' => 'Januari',
			'Feb' => 'Februari',
			'Mar' => 'Maret',
			'Apr' => 'April',
			'May' => 'Mei',
			'Jun' => 'Juni',
			'Jul' => 'Juli',
			'Aug' => 'Agustus',
			'Sep' => 'September',
			'Oct' => 'Oktober',
			'Nov' => 'November',
			'Dec' => 'Desember'
		);

		return strtr($tanggal, $format);
	}

	/**
	 * hitung umur user
	 * 
	 * @param  date $tanggal
	 * @return int
	 */
	private function umur($tanggal)
	{
		// kalkulasi umur
		$lahir = date_create($tanggal);
		$sekarang = date_create('now');
		$umur = date_diff($lahir, $sekarang)->y;

		return $umur;
	}

	/**
	 * perhitungan zodiak user
	 * 
	 * @param  date $tanggal
	 * @return string
	 */
	private function zodiak($tanggal)
	{
		// proses tanggal
		$pecah = explode('-', $tanggal);
		$tanggal = $pecah[0];
		$bulan = $pecah[1];
		
		// kalkulasi zodiak
		switch ($pecah) {
			case ($tanggal > 20) && ($bulan == 3):
			case ($tanggal < 21) && ($bulan == 4):
				$zodiak = 'Aries';
				break;

			case ($tanggal > 20) && ($bulan == 4):
			case ($tanggal < 22) && ($bulan == 5):
				$zodiak = 'Taurus';
				break;

			case ($tanggal > 21) && ($bulan == 5):
			case ($tanggal < 22) && ($bulan == 6):
				$zodiak = 'Gemini';
				break;

			case ($tanggal > 21) && ($bulan == 6):
			case ($tanggal < 23) && ($bulan == 7):
				$zodiak = 'Cancer';
				break;

			case ($tanggal > 22) && ($bulan == 7):
			case ($tanggal < 24) && ($bulan == 8):
				$zodiak = 'Leo';
				break;

			case ($tanggal > 23) && ($bulan == 8):
			case ($tanggal < 23) && ($bulan == 9):
				$zodiak = 'Virgo';
				break;

			case ($tanggal > 22) && ($bulan == 9):
			case ($tanggal < 24) && ($bulan == 10):
				$zodiak = 'Libra';
				break;

			case ($tanggal > 23) && ($bulan == 10):
			case ($tanggal < 23) && ($bulan == 11):
				$zodiak = 'Scorpio';
				break;

			case ($tanggal > 22) && ($bulan == 11):
			case ($tanggal < 24) && ($bulan == 12):
				$zodiak = 'Sagitarius';
				break;

			case ($tanggal > 23) && ($bulan == 12):
			case ($tanggal < 21) && ($bulan == 1):
				$zodiak = 'Capricorn';
				break;

			case ($tanggal > 20) && ($bulan == 1):
			case ($tanggal < 19) && ($bulan == 2):
				$zodiak = 'Aquarius';
				break;
					
			default:
				$zodiak = 'Pisces';
				break;
		}

		return $zodiak;
	}

}