<?php
if( isset( $_GET['id'] ) && is_numeric( $_GET['id'] ) )
{
?>
	<?php
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
		<h1>Éditer une tâche</h1>
		<form class="ui form" action="" method="POST">
			<div class="field">
				<div class="two fields">
					<div class="field">
						<label>Nom</label>
						<input type="text" name="name" id="name" value="<?= $result->tasklabel ?>">
					</div>
					<div class="field">
						<label>Priorité</label>
						<select class="ui dropdown" name="priority" id="priority">
							<option value="1" <?php if( $result->priority == 1 ) echo 'selected'; ?>>Basse</option>
							<option value="2" <?php if( $result->priority == 2 ) echo 'selected'; ?>>Moyenne</option>
							<option value="3" <?php if( $result->priority == 3 ) echo 'selected'; ?>>Haute</option>
						</select>
					</div>
				</div>
			</div>
			<div class="field">
				<label>Text</label>
				<textarea name="description" id="description"><?= $result->description ?></textarea>
			</div>
			<input class="ui submit button" type="submit" value="Envoyer" name="submit" id="submit">
		</form>
		<?php
		if( isset( $_POST['submit'] ) )
		{
			if( isset( $_POST['name'], $_POST['priority'], $_POST['description'] ) )
			{
				$name = htmlspecialchars( $_POST['name'] );
				$priority = htmlspecialchars( $_POST['priority'] );
				$description = htmlspecialchars( $_POST['description'] );

				if( $name && $priority && $description )
				{
					$db->execute( "UPDATE task SET tasklabel = ?, priority = ?, description = ? WHERE taskid = ?", [$name, $priority, $description, $_GET['id']] );
					echo '
					<div class="ui success message">
						<div class="header">Succès</div>
						<p>La tâche à bien été modifié</p>
					</div>';
				}
				else
				{
					echo '
					<div class="ui error message">
						<div class="header">Erreur</div>
						<p>Merci de tous completer</p>
					</div>';
				}
			}
			else
			{
				echo '
				<div class="ui error message">
					<div class="header">Erreur</div>
					<p>Merci de tous completer</p>
				</div>';
			}
		}
	}
}
?>