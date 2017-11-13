<?php
require_once( 'model/model.user.php' );

if( isset( $_POST['sendRegister'] ) )
{
	$user = new User( $db );
	
	if( isset( $_POST['username'], $_POST['login'], $_POST['email'], $_POST['emailconf'], $_POST['password'], $_POST['passwordconf'] ) )
	{
		$username = htmlspecialchars( $_POST['username'] );
		$login = htmlspecialchars( $_POST['login'] );
		$email = htmlspecialchars( $_POST['email'] );
		$emailconf = htmlspecialchars( $_POST['emailconf'] );
		$password = sha1( $_POST['password'] );
		$passwordconf = sha1( $_POST['passwordconf'] );

		if( $username && $login && $email && $emailconf && $password && $passwordconf )
		{
			$isLoginUse = $user->getUserByLogin( $login );
			$isEmailUse = $user->getUserByEmail( $email );

			if( strlen( $login ) < 4 ) {
				$Error .= " - L'identifiant dois avoir une longueur supérieur à 4<br>";
			}
			if( $password !== $passwordconf ) {
				$Error .= " - Le mot de passe n'est pas égale à celui de confirmation<br>";
			}
			if( $email !== $emailconf ) {
				$Error .= " - L'email n'est pas égale à celui de confirmation<br>";
			}
			if( strlen( $password ) < 4 ) {
				$Error .= " - Le mot de passe dois avoir une longueur supérieur à 4<br>";
			}
			if( !filter_var( $email, FILTER_VALIDATE_EMAIL ) ) {
				$Error .= " - L'email possède un format incorrecte<br>";
			}
			if( $isLoginUse ) {
				$Error .= " - L'identifiant est déjà utilisé<br>";
			}
			if( $isEmailUse ) {
				$Error .= " - L'email est déjà utilisé<br>";
			}
		}
		else $Error .= " - Merci de tous compléter<br>";
	}
	else $Error .= " - Merci de tous compléter<br>";

	if( isset( $Error ) ) {
		sendMessage( $Error ,'error' );
	} else {
		$user->addUser( $username, $login, $email, $password );
		sendMessage( 'Inscription réussi !', 'valid' );
	}
}
require_once( 'view/view.register.php' );
?>