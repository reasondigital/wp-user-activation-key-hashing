<?php

if(!isset($_GET['keyhashing')){
  return;
}

require_once 'wp-includes/class-phpass.php';
global $wpdb;

$users = $wpdb->get_results(
	$wpdb->prepare(
		"
         SELECT ID, user_login, user_activation_key FROM $wpdb->users
		 WHERE user_activation_key <> ''
		",
		""
	)
);

foreach($users as $user){
	if($user->user_activation_key == ''){
		continue;
	}

	echo $user->user_activation_key;

	$wp_hasher = new PasswordHash( 8, true );

	$hashedActivationKey = $wp_hasher->HashPassword( $user->user_activation_key );
	echo '<br />'.$hashedActivationKey;


	$wpdb->update(
		$wpdb->users,
		array(
			'user_activation_key' => $hashedActivationKey,
		),
		array('ID' => $user->ID),
		array(
			'%s'
		)
	);

	echo '<br /><a href="'.home_url().'/wp-login.php?action=rp&key='.$user->user_activation_key.'&login='.$user->user_login.'">activation link</a><br />';
}
