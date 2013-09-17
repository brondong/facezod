<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class Admin extends Eloquent implements UserInterface, RemindableInterface {

	// konfigurasi database
	protected $table = 'admins';
	protected $hidden = array('id', 'password');
	protected $fillable = array('nama', 'username', 'password');
	protected $guarded = array('id');

	/**
	 * Get the unique identifier for the user.
	 *
	 * @return mixed
	 */
	public function getAuthIdentifier()
	{
		return $this->getKey();
	}

	/**
	 * Get the password for the user.
	 *
	 * @return string
	 */
	public function getAuthPassword()
	{
		return $this->password;
	}

	/**
	 * Get the e-mail address where password reminders are sent.
	 *
	 * @return string
	 */
	public function getReminderEmail()
	{
		return $this->email;
	}

	/**
	 * rubah nama admin
	 * 
	 * @param  int $id
	 * @param  string $nama_baru
	 * @return void
	 */
	public static function rubahNama($id, $nama_baru)
	{
		$admin = Admin::find($id);
		$admin->nama = $nama_baru;
		$admin->save();
	}

	/**
	 * rubah username admin
	 * 
	 * @param  int $id
	 * @param  string $username_baru
	 * @return void
	 */
	public static function rubahUsername($id, $username_baru)
	{
		$admin = Admin::find($id);
		$admin->username = $username_baru;
		$admin->save();
	}

	/**
	 * rubah password admin
	 * 
	 * @param  int $id
	 * @param  string $password_baru
	 * @return void
	 */
	public static function rubahPassword($id, $password_baru)
	{
		$admin = Admin::find($id);
		$admin->password = $password_baru;
		$admin->save();
	}

	/**
	 * tambah admin
	 * 
	 * @param  string $nama
	 * @param  string $username
	 * @param  string $password
	 * @return void
	 */
	public static function tambah($nama, $username, $password)
	{
		$data = compact('nama', 'username', 'password');
		Admin::create($data);
	}

	/**
	 * data admin
	 * 
	 * @return \Illuminate\Pagination\Paginator
	 */
	public static function data ()
	{
		return Admin::orderBy('nama', 'asc')->paginate(1);
	}

	/**
	 * set admin
	 * 
	 * @return array
	 */
	public static function set ($id)
	{
		return Admin::find($id);
	}

	/**
	 * rubah admin
	 * 
	 * @param  int $id
	 * @param  string $nama
	 * @param  string $username
	 * @param  string $password
	 * @return void
	 */
	public static function rubah($id, $nama, $username, $password)
	{
		$admin = Admin::find($id);
		$admin->nama = $nama;
		$admin->username = $username;
		$admin->password = $password;
		$admin->save();
	}

	/**
	 * hapus admin
	 * 
	 * @param  int $id
	 * @return void
	 */
	public static function hapus($id)
	{
		Admin::destroy($id);
	}

}