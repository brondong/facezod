##	FaceZod
FaceZod merupakan aplikasi facebook yang berfungsi untuk menampilkan ramalan zodiak.

##	Installasi
1.	Pindahkan folder `facezod` ke dalam folder htdocs anda

		c:\xampp\htdocs\facezod

2.	Buka command prompt dan arahkan ke direktori `facezod`

		cd c:\xampp\htdocs\facezod

3.	Install library yang dibutuhkan menggunakan `Composer`

		composer install

4.	Rubah API key aplikasi facebook anda di `/app/config/packages/boparaiamrit/facebook/config.php`

		'secret' => array('appId'  => '**********', 'secret' => '**********')

5.	Buka file `/app/config/app.php`, rubah `url` menjadi URL aplikasi anda

		'url' => 'facezod.dev',

6.	Buka file `/app/config/database.php`, sesuaikan data database mysql anda

		'host' => '127.0.0.1', 'database' => 'zodiak_db', 'username' => 'root', 'password' => ''

7.	Import file `zodiak_db.sql` melalui PHPMyAdmin atau dengan perintah artisan

		php artisan migrate --seed

8.	Upload folder `public` ke server dalam direktori `public_html`

9.	Upload folder lainnya di luar direktori `public_html`

10.	Login sebagai admin, misal url anda `facezod.dev`, login di
		
		facezod.dev/founder/masuk

11.	Gunakan username `admins` dan password `adminlocal` untuk login

12.	Input data ramalan zodiak