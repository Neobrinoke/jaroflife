<?php
if( isset( $_GET['id'] ) && is_numeric( $_GET['id'] ) )
{
	$task = new Task( $db );
	$result = $task->getTaskById( $_GET['id'] );
	if( !$result )
	{
		sendMessage( 'Impossible de trouvé la tâche', 'error' );
	}
	else
	{
		if( isset( $_POST['submit'] ) )
		{
			if( isset( $_POST['name'], $_POST['priority'], $_POST['description'] ) )
			{
				$name = htmlspecialchars( $_POST['name'] );
				$priority = htmlspecialchars( $_POST['priority'] );
				$description = htmlspecialchars( $_POST['description'] );
	
				if( $name && $priority && $description )
				{
					$task->updateTaskById( $name, $priority, $description, $_GET['id'] );
					sendMessage( 'La tâche à bien été modifié', 'valid' );
				}
				else sendMessage( 'Merci de tous completer', 'error' );
			}
			else sendMessage( 'Merci de tous completer', 'error' );
		}
		require_once( 'view/view.edit.php' );
	}
}
?>