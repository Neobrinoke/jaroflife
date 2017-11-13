<?php
require_once( 'model/model.task.php' );

if( !isset( $_SESSION['userId'] ) ) {
	header( 'Location: /connect' );
}

if( isset( $_GET['todoId'] ) && is_numeric( $_GET['todoId'] ) )
{
	if( isset( $_POST['sendAddTask'] ) )
	{
		if( isset( $_POST['name'], $_POST['priority'], $_POST['description'] ) )
		{
			$task = new Task( $db );

			$name = htmlspecialchars( $_POST['name'] );
			$priority = htmlspecialchars( $_POST['priority'] );
			$description = htmlspecialchars( $_POST['description'] );

			if( $name && $priority && $description )
			{
				if( $task->create( $name, $priority, $description, $_SESSION['userId'], $_GET['todoId'] ) ) {
					header( 'Location: /browse' );
				} else {
					sendMessage( 'Une erreur s\'est produite', 'error' );
				}
			}
			else sendMessage( 'Merci de tous completer', 'error' );
		}
		else sendMessage( 'Merci de tous completer', 'error' );
	}

	require_once( 'view/view.add.php' );
}
?>