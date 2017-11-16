<div class="ui attached message">
	<h1 class="header">Connexion</h1>
</div>
<div class="ui attached fluid segment">
	<form method="POST" class="ui form">
		<div class="field">
			<div class="two fields">
				<div class="field">
					<div class="ui left icon input">
					<i class="user icon"></i>
						<input type="text" name="login" placeholder="Identifiant ou Email">
					</div>
				</div>
				<div class="field">
					<div class="ui left icon input">
						<i class="lock icon"></i>
						<input type="password" name="password" placeholder="Mot de passe">
					</div>
				</div>
			</div>
		</div>
		<div class="ui buttons fluid">
			<input class="ui button teal" type="submit" name="sendConnect" value="Se connecter">
			<div class="or"></div>
			<a class="ui positive button" href="/user/register/">Enregistez-vous</a>
		</div>
	</form>
</div>