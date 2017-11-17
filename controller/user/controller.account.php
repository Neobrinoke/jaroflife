<?php
require_once( 'model/model.user.php' );

if( !isset( $_SESSION['userId'] ) ) {
	header( 'Location: /user/connect/' );
}

$user = new User( $db );

$userInfo = $user->findById( $_SESSION['userId'] );
if( $userInfo != null ) {
	require_once( 'view/user/view.account.php' );
} else {
	sendMessage( 'Utilisateur introuvable', 'error' );
}
?>