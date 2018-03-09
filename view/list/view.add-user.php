<div class="ui attached message">
    <h1 class="header">Ajouter un utilisateur</h1>
</div>
<div class="ui attached fluid segment">
	<form class="ui form" action="" method="POST">
		<div class="two fields">
			<div class="field">
				<label>Nom ou Email</label>
				<input type="text" name="name" id="name" placeholder="Nom de l'utilisateur ou Email">
			</div>
			<div class="field">
				<label>Rang</label>
				<select class="ui dropdown" name="authority" id="authority">
					<option value="1">Admin</option>
					<option value="2">Modérateur</option>
					<option value="3" selected>Utilisateur</option>
				</select>
			</div>
		</div>
		<input class="ui fluid submit button teal" type="submit" value="Ajouter" name="sendAddUser">
	</form>
</div>