<?php

class HeruValidator extends Illuminate\Validation\Validator {

	/**
	 * validasi nama sekarang
	 *
	 * @param array $attribute
	 * @param array $value
	 * @param array $parameters
	 * @return bool
	 */
	public function validateNamaSekarang($attribute, $value, $parameters)
	{
		return strtolower($value) == strtolower(Auth::user()->nama);
	}

	/**
	 * validasi username sekarang
	 *
	 * @param array $attribute
	 * @param array $value
	 * @param array $parameters
	 * @return bool
	 */
	public function validateUsernameSekarang($attribute, $value, $parameters)
	{
		return $value == Auth::user()->username;
	}

	/**
	 * validasi password sekarang
	 *
	 * @param array $attribute
	 * @param array $value
	 * @param array $parameters
	 * @return bool
	 */
	public function validatePasswordSekarang($attribute, $value, $parameters)
	{
		return Hash::check($value, Auth::user()->password);
	}

	/**
	 * validasi ramalan
	 *
	 * @param array $attribute
	 * @param array $value
	 * @param array $parameters
	 * @return bool
	 */
	public function validateRamalan($attribute, $value, $parameters)
	{
		$zodiak = trim(Input::get('zodiak'));
		$tanggal = date('Y-m-d', strtotime(trim($value)));
		$cek = Ramal::cek($zodiak, $tanggal);

		return $cek == 0;
	}

	public function replaceRamalan($message, $attribute, $rule, $parameters)
	{
		$zodiak = trim(Input::get('zodiak'));
		$tanggal = trim(Input::get('tanggal'));
		$pesan = array('zodiak' => $zodiak, 'tanggal' => $tanggal);

		return strtr($message, $pesan);
	}

}