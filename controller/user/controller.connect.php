<?php
require_once( 'model/model.user.php' );

if( isset( $_POST['sendConnect'] ) )
{
	$account = null;
	$error = [];

	if( isset( $_POST['login'], $_POST['password'] ) )
	{
		$login = htmlspecialchars( protect( $_POST['login'] ) );
		$password = sha1( protect( $_POST['password'] ) );
		
		if( $login && $password )
		{
			$user = new User( $db );
			$account = $user->findByEmailOrLogin( $login );

			if( !$account || $password !== $account->password ) {
				array_push( $error, "Utilisateur introuvable" );
			}
		}
		else array_push( $error, "Merci de tous compléter" );
	}
	else array_push( $error, "Merci de tous compléter" );

	if( empty( $error ) )
	{
		$_SESSION['userId'] = $account->userid;
		$_SESSION['name'] = $account->name;
		header( 'Location: /' );
	}
	else sendMessage( $error, 'error', true );
}

require_once( 'view/user/view.connect.php' );
?>