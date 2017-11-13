<?php
if( isset( $_SESSION['userId'] ) )
{
	if( isset( $_POST['createTodo'] ) )
	{
		require_once( 'model/model.todo.php' );
		$list = new Todo( $db );
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
			$list->addTodo( $name );
			sendMessage( 'La liste à bien été crée', 'valid' );
		}
		else sendMessage( $Error, 'error' );

	}

	require_once( 'view/view.create-todo.php' );
}
else header( 'Location: /connect' );
?>