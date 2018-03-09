<div class="ui middle aligned center aligned grid">
	<div class="column" style="max-width: 450px;">
		<h2 class="ui teal image header">
			<div class="content">Connectez-vous à votre compte</div>
		</h2>
		<form class="ui large form" method="POST">
			<div class="ui stacked segment">
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
				<input class="ui fluid large teal submit button" type="submit" name="sendConnect" value="Se connecter">
			</div>
		</form>
		<div class="ui message">Nouveau ? <a href="/user/register/">Enregistez-vous !</a></div>
	</div>
</div>