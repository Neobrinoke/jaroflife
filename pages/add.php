<h1>Ajouter une tâche</h1>
<form class="ui form" action="" method="POST">
	<div class="field">
		<div class="two fields">
			<div class="field">
				<label>Nom</label>
				<input type="text" name="name" id="name">
			</div>
			<div class="field">
				<label>Priorité</label>
				<select class="ui dropdown" name="priority" id="priority">
					<option value="1">Basse</option>
					<option value="2">Moyenne</option>
					<option value="3">Haute</option>
				</select>
			</div>
		</div>
	</div>
	<div class="field">
		<label>Text</label>
		<textarea name="description" id="description"></textarea>
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
			$db->execute( "INSERT INTO task (tasklabel, priority, description)VALUE(?, ?, ?)", [$name, $priority, $description] );
			echo '
			<div class="ui success message">
				<div class="header">Succès</div>
				<p>La tâche à bien été ajouté</p>
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
?>