<?php
require_once( 'model/model.user.php' );

if( isset( $_POST['sendRegister'] ) )
{
	$user = new User( $db );
	$error = [];

	if( isset( $_POST['username'], $_POST['login'], $_POST['email'], $_POST['emailconf'], $_POST['password'], $_POST['passwordconf'] ) )
	{
		$username = htmlspecialchars( protect( $_POST['username'] ) );
		$login = htmlspecialchars( protect( $_POST['login'] ) );
		$email = htmlspecialchars( protect( $_POST['email'] ) );
		$emailconf = htmlspecialchars( protect( $_POST['emailconf'] ) );
		$password = sha1( protect( $_POST['password'] ) );
		$passwordconf = sha1( protect( $_POST['passwordconf'] ) );
		
		if( $username && $login && $email && $emailconf && $password && $passwordconf )
		{
			$isLoginUse = $user->findByLogin( $login );
			$isEmailUse = $user->findByEmail( $email );

			if( strlen( $login ) < 4 ) {
				array_push( $error, "L'identifiant dois avoir une longueur supérieur à 4" );
			}
			if( $password !== $passwordconf ) {
				array_push( $error, "Le mot de passe n'est pas égale à celui de confirmation" );
			}
			if( $email !== $emailconf ) {
				array_push( $error, "L'email n'est pas égale à celui de confirmation" );
			}
			if( strlen( $password ) < 4 ) {
				array_push( $error, "Le mot de passe dois avoir une longueur supérieur à 4" );
			}
			if( !filter_var( $email, FILTER_VALIDATE_EMAIL ) ) {
				array_push( $error, "L'email possède un format incorrecte" );
			}
			if( $isLoginUse ) {
				array_push( $error, "L'identifiant est déjà utilisé" );
			}
			if( $isEmailUse ) {
				array_push( $error, "L'email est déjà utilisé" );
			}
		}
		else array_push( $error, "Merci de tous compléter" );
	}
	else array_push( $error, "Merci de tous compléter" );

	if( empty( $error ) )
	{
		if( $user->create( $username, $login, $email, $password ) ) {
			sendMessage( 'Inscription réussi !', 'valid' );
		} else {
			sendMessage( 'Une erreur s\'est produite' ,'error' );
		}
	}
	else sendMessage( $error ,'error', true );
}

require_once( 'view/user/view.register.php' );
?>