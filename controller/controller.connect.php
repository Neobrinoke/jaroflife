<?php
if( isset( $_POST['sendConnect'] ) )
{
	require_once( 'model/model.user.php' );
	$user = new User( $db );

	$account = null;
	if( isset( $_POST['login'], $_POST['password'] ) )
	{
		$login = htmlspecialchars( $_POST['login'] );
		$password = sha1( $_POST['password'] );
		
		if( $login && $password )
		{
			$account = $user->getUserByEmailOrLogin( $login );

			if( !$account || $password !== $account->password ) {
				$Error .= " - Utilisateur introuvable";
			}
		}
		else $Error .= " - Merci de tous compléter<br>";
	}
	else $Error .= " - Merci de tous compléter<br>";

	if( isset( $Error ) ) {
		sendMessage( $Error, 'error' );
	} else {
		$_SESSION['userId'] = $account->userid;
		header( 'Location: /' );
	}
}

require_once( 'view/view.connect.php' );
?>