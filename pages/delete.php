<?php
if( isset( $_GET['id'] ) && is_numeric( $_GET['id'] ) )
{
	if( $db->execute( "DELETE FROM task WHERE taskid = ?", [$_GET['id']] ) )
	{
		echo '
		<div class="ui success message">
			<div class="header">Succès</div>
			<p>La tâche à bien été supprimé</p>
		</div>';
	}
	else
	{
		echo '
		<div class="ui error message">
			<div class="header">Erreur</div>
			<p>Une erreur s\'est produite</p>
		</div>';
	}
}
?>