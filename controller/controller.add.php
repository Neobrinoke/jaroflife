<?php
if( isset( $_SESSION['userId'] ) )
{
	if( isset( $_POST['sendAddTask'] ) )
	{
		require_once( 'model/model.task.php' );
		$task = new Task( $db );

		if( isset( $_POST['name'], $_POST['priority'], $_POST['description'] ) )
		{
			$name = htmlspecialchars( $_POST['name'] );
			$priority = htmlspecialchars( $_POST['priority'] );
			$description = htmlspecialchars( $_POST['description'] );

			if( $name && $priority && $description )
			{
				$task->addTask( $name, $priority, $description, $_SESSION['userId'] );
				sendMessage( 'La tâche à bien été ajouté', 'valid' );
			}
			else sendMessage( 'Merci de tous completer', 'error' );
		}
		else sendMessage( 'Merci de tous completer', 'error' );
	}

	require_once( 'view/view.add.php' );
}
else header( 'Location: /connect' );
?>