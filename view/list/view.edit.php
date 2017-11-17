<div class="ui attached message">
    <h1 class="header">Modification de la liste [ <?= $result->name ?> ]</h1>
</div>
<div class="ui attached fluid segment">
	<form class="ui form" action="" method="POST">
		<div class="field">
		    <label>Nom</label>
		    <input type="text" name="name" id="name" value="<?= $result->name ?>">
		</div>
		<div class="field">
		    <label>Description</label>
		    <textarea name="description" id="description" cols="30" rows="10"><?= $result->description ?></textarea>
		</div>
		<input class="ui fluid submit button teal" type="submit" value="Modifier" name="editTodo">
	</form>
</div>