<div class="ui attached message">
	<h1 class="header">Inscription</h1>
</div>
<div class="ui attached fluid segment">
	<form method="POST" class="ui form">
		<div class="field">
			<div class="two fields">
				<div class="field">
					<label>Nom</label>
					<input type="text" name="username" placeholder="Nom">
				</div>
				<div class="field">
					<label>Identifiant</label>
					<input type="text" name="login" placeholder="Identifiant">
				</div>
			</div>
		</div>
		<div class="field">
			<div class="two fields">
				<div class="field">
					<label>Email</label>
					<input type="email" name="email" placeholder="Email">
				</div>
				<div class="field">
					<label>Email <i>(confirmation)</i></label>
					<input type="email" name="emailconf" placeholder="Email (confirmation)">
				</div>
			</div>
		</div>
		<div class="field">
			<div class="two fields">
				<div class="field">
					<label>Mot de passe</label>
					<input type="password" name="password" placeholder="Mot de passe">
				</div>
				<div class="field">
					<label>Mot de passe <i>(confirmation)</i></label>
					<input type="password" name="passwordconf" placeholder="Mot de passe (confirmation)">
				</div>
			</div>
		</div>
		<div class="field">
			<input class="ui button blue" type="submit" name="sendRegister" value="S'inscrire">
		</div>
	</form>
</div>