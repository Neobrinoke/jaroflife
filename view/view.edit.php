<div class="ui attached message">
    <h1 class="header">Éditer des tâches</h1>
</div>
<div class="ui attached fluid segment">
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
		<input class="ui submit button blue" type="submit" value="Envoyer" name="submit" id="submit">
	</form>
</div>