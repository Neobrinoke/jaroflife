<?php
require_once( 'model/model.todo.php' );

if( !isset( $_SESSION['userId'] ) ) {
	header( 'Location: /connect' );
}

if( isset( $_POST['createTodo'] ) )
{
	$todo = new Todo( $db );
	if( isset( $_POST['name'] ) )
	{
		$name = htmlspecialchars( $_POST['name'] );
		if( $name )
		{
			if( strlen( $name ) < 4 ) {
				$Error .= ' - Le nom dois avoir une longueur supérieur à 4<br>';
			}
		}
		else $Error .= ' - Merci de tous compléter<br>';
	}
	else $Error .= ' - Merci de tous compléter<br>';

	if( !isset( $Error ) )
	{
		$todo->addTodo( $name, $_SESSION['userId'] );
		header( 'Location: /browse' );
	}
	else sendMessage( $Error, 'error' );
}

require_once( 'view/view.create-todo.php' );
?>