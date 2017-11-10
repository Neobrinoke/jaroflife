<?php
if( isset( $_SESSION['userId'] ) )
{
	if( isset( $_GET['id'] ) && is_numeric( $_GET['id'] ) )
	{
		require_once( 'model/model.task.php' );
		$task = new Task( $db );
		if( $task->removeTaskById( $_SESSION['userId'], $_GET['id'] ) ) {
			sendMessage( 'La tâche à bien été supprimé', 'valid' );
		} else {
			sendMessage( 'Une erreur s\'est produite', 'error' );
		}
	}	
}
else header( 'Location: /connect' );
?>