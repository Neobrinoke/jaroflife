<div class="ui attached message">
    <h1 class="header">Ajouter une tâche</h1>
</div>
<div class="ui attached fluid segment">
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
		<input class="ui fluid submit button teal" type="submit" value="Créer" name="sendAddTask">
	</form>
</div>