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

8.	Upload semua file & folder pada folder `public` ke server dalam direktori `public_html`

9.	Upload semua file & folder lainnya di luar direktori `public_html`

10.	Rubah path `public` pada file `/bootstrap/paths.php` menjadi `public_html`

		'public' => __DIR__.'/../public_html',

11.	Login sebagai admin, misal url anda `facezod.dev`, login di
		
		facezod.dev/founder/masuk

12.	Gunakan username `admins` dan password `adminlocal` untuk login