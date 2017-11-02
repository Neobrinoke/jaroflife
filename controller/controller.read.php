<?php
if( isset( $_GET['id'] ) && is_numeric( $_GET['id'] ) )
{
	$task = new Task( $db );
	$result = $task->getTaskById( $_GET['id'] );
	if( !$result ) {
		sendMessage( 'Impossible de trouvé la tâche', 'error' );
	} else {
		require_once( 'view/view.read.php' );
	}
}
?>