<?php
require_once( 'model/model.user.php' );

if( isset( $_POST['sendConnect'] ) )
{
	$account = null;
	$Error = null;
	if( isset( $_POST['login'], $_POST['password'] ) )
	{
		$login = htmlspecialchars( $_POST['login'] );
		$password = sha1( $_POST['password'] );
		
		if( $login && $password )
		{
			$user = new User( $db );
			$account = $user->findByEmailOrLogin( $login );

			if( !$account || $password !== $account->password ) {
				$Error .= " - Utilisateur introuvable";
			}
		}
		else $Error .= " - Merci de tous compléter<br>";
	}
	else $Error .= " - Merci de tous compléter<br>";

	if( !isset( $Error ) )
	{
		$_SESSION['userId'] = $account->userid;
		header( 'Location: /' );
	}
	else sendMessage( $Error, 'error' );
}

require_once( 'view/view.connect.php' );
?>