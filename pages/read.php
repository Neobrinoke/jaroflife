<?php
if( isset( $_GET['id'] ) && is_numeric( $_GET['id'] ) )
{
	$result = $db->query( "SELECT * FROM task WHERE taskid = ?", [$_GET['id']], true );
	if( !$result )
	{
	?>
		<div class="ui error message">
			<div class="header">Erreur</div>
			<p>Impossible de trouvé la tâche</p>
		</div>
	<?php
	}
	else
	{
	?>
		<h1>Tâche [<?= $result->tasklabel ?>]</h1>
		<div class="ui items">
			<div class="item">
				<div class="description">
					<p><?= $result->description ?></p>
				</div>
			</div>
		</div>
	<?php
	}
}
?>