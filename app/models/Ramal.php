<?php

class Ramal extends Eloquent {

	// konfigurasi database
	protected $table = 'ramal';
	protected $hidden = array('id');
	protected $fillable = array('zodiak', 'umum', 'asmara', 'karir', 'motivasi', 'nomor', 'warna', 'tanggal');
	protected $guarded = array('id');

	/**
	 * tambah data ramalan
	 * 
	 * @param  string $zodiak  
	 * @param  string $umum    
	 * @param  string $asmara  
	 * @param  string $karir   
	 * @param  string $motivasi
	 * @param  string $nomor   
	 * @param  string $warna   
	 * @param  date $tanggal 
	 * @return void
	 */
	public static function tambah ($zodiak, $umum, $asmara, $karir, $motivasi, $nomor, $warna, $tanggal)
	{
		$data = compact('zodiak', 'umum', 'asmara', 'karir', 'motivasi', 'nomor', 'warna', 'tanggal');
		Ramal::create($data);
	}

	/**
	 * cek zodiak
	 * 
	 * @param  string $zodiak  
	 * @param  date $tanggal 
	 * @return int
	 */
	public static function cek ($zodiak, $tanggal)
	{
		return Ramal::whereRaw('zodiak = ? and tanggal = ?', array($zodiak, $tanggal))->count();
	}

	/**
	 * tampil ramalan zodiak
	 * 
	 * @param string $zodiak  
	 * @param date $tanggal 
	 * @return \Illuminate\Pagination\Paginator
	 */
	public static function tampil ($zodiak, $tanggal)
	{
		return Ramal::whereRaw('zodiak = ? and tanggal <= ?', array($zodiak, $tanggal))->orderBy('tanggal', 'desc')->paginate(1);
	}

	/**
	 * data ramalan
	 * 
	 * @return \Illuminate\Pagination\Paginator
	 */
	public static function data ()
	{
		return Ramal::orderBy('tanggal', 'desc')->orderBy('zodiak', 'asc')->paginate(10);
	}

	/**
	 * set ramalan
	 * 
	 * @param int $id
	 * @return array
	 */
	public static function setRamalan ($id)
	{
		return Ramal::find($id);
	}

	/**
	 * rubah ramalan
	 * 
	 * @param  int $id
	 * @param  string $zodiak  
	 * @param  string $umum    
	 * @param  string $asmara  
	 * @param  string $karir   
	 * @param  string $motivasi
	 * @param  string $nomor   
	 * @param  string $warna   
	 * @param  date $tanggal 
	 * @return void
	 */
	public static function rubah($id, $zodiak, $umum, $asmara, $karir, $motivasi, $nomor, $warna, $tanggal)
	{
		$ramalan = Ramal::find($id);
		$ramalan->zodiak = $zodiak;
		$ramalan->umum = $umum;
		$ramalan->asmara = $asmara;
		$ramalan->karir = $karir;
		$ramalan->motivasi = $motivasi;
		$ramalan->nomor = $nomor;
		$ramalan->warna = $warna;
		$ramalan->tanggal = $tanggal;
		$ramalan->save();
	}

	/**
	 * hapus ramalan
	 * 
	 * @param  int $id
	 * @return void
	 */
	public static function hapus($id)
	{
		Ramal::destroy($id);
	}

}