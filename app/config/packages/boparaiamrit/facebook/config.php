<?php 

return array(
	'secret' => array(
		//put your app id and secret
		'appId'  => '',
		'secret' => ''
	),
	//Redirect after successfull login
	'redirect' => route('home'),
	//When Someone Logout from your Site
	'logout' => route('logout'),
	//you can add scope according to your requirement
	'scope' => 'user_birthday,user_photos,user_relationships'
);
