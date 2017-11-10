<?php
if( isset( $_SESSION['userId'] ) )
{
	if( isset( $_GET['id'] ) && is_numeric( $_GET['id'] ) )
	{
		require_once( 'model/model.task.php' );
		$task = new Task( $db );
		
		$result = $task->getTaskById( $_SESSION['userId'], $_GET['id'] );
		if( !$result ) {
			sendMessage( 'Impossible de trouvé la tâche', 'error' );
		} else {
			require_once( 'view/view.read.php' );
		}
	}
}
else header( 'Location: /connect' );
?>