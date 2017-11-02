<?php
if( isset( $_GET['id'] ) && is_numeric( $_GET['id'] ) )
{
	if( $db->execute( "DELETE FROM task WHERE taskid = ?", [$_GET['id']] ) ) {
		sendMessage( 'La tâche à bien été supprimé', 'valid' );
	} else {
		sendMessage( 'Une erreur s\'est produite', 'error' );
	}
}
?>