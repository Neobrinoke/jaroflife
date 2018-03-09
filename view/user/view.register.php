<div class="ui middle aligned center aligned grid">
	<div class="column" style="max-width: 450px;">
		<h2 class="ui teal image header">
			<div class="content">Inscrivez-vous</div>
		</h2>
		<form class="ui large form" method="POST">
			<div class="ui stacked segment">
				<div class="field">
					<div class="ui left icon input">
						<i class="user icon"></i>
						<input type="text" name="username" placeholder="Nom">
					</div>
				</div>
				<div class="field">
					<div class="ui left icon input">
						<i class="user icon"></i>
						<input type="text" name="login" placeholder="Identifiant">
					</div>
				</div>
				<div class="field">
					<div class="ui left icon input">
						<i class="user icon"></i>
						<input type="email" name="email" placeholder="Email">
					</div>
				</div>
				<div class="field">
					<div class="ui left icon input">
						<i class="user icon"></i>
						<input type="email" name="emailconf" placeholder="Email (confirmation)">
					</div>
				</div>
				<div class="field">
					<div class="ui left icon input">
						<i class="lock icon"></i>
						<input type="password" name="password" placeholder="Mot de passe">
					</div>
				</div>
				<div class="field">
					<div class="ui left icon input">
						<i class="lock icon"></i>
						<input type="password" name="passwordconf" placeholder="Mot de passe (confirmation)">
					</div>
				</div>
				<input class="ui fluid large teal submit button" type="submit" name="sendRegister" value="S'inscrire">
			</div>
		</form>
		<div class="ui message">Déjà un compte ? <a href="/user/connect/">Connectez-vous !</a></div>
	</div>
</div>