<div class="ui attached message">
	<h1 class="header">
		<span>Détails de la liste [ <?= $todoList->name ?> ]</span>
		<span><a class="ui right floated basic icon button" href="/list/add-user/<?= $todoId ?>/" data-tooltip="Ajouter un utilisateur"><i class="user add icon"></i></a></span>
	</h1>
</div>
<div class="ui attached fluid segment">
	<h4 class="ui dividing header">Participants</h4>
	<?php
	if( !empty( $todoMembers ) )
	{
		?>
		<table class="ui celled selectable table">
			<thead>
				<tr>
					<th>Nom</th>
					<th>Date de rejoins</th>
					<th>Authority level</th>
					<th></th>
					<th></th>
				</tr>
			</thead>
			<tbody>
				<?php
				foreach( $todoMembers as $member )
				{
					?>
					<form class="ui form" action="" method="POST">
						<input type="hidden" name="userId" value="<?= $member->user_id ?>">
						<tr>
							<td><?= $user->findById( $member->user_id )->name ?></td>
							<td><?= $member->joined_at ?></td>
							<td>
								<div class="field">
									<select name="authority_id">
										<option value="1" <?= $member->authority_id == 1 ? 'selected' : '' ?>>Administrateur</option>
										<option value="2" <?= $member->authority_id == 2 ? 'selected' : '' ?>>Modérateur</option>
										<option value="3" <?= $member->authority_id == 3 ? 'selected' : '' ?>>Utlisateur</option>
									</select>
								</div>
							</td>
							<td class="collapsing"><input class="ui button teal" type="submit" name="edit" value="Editer" /></td>
							<td class="collapsing"><input class="ui button red" type="submit" name="expulse" value="Expulser" /></td>
						</tr>
					</form>
					<?php
				}
				?>
			</tbody>
		</table>
		<?php
	}
	else sendMessage( 'Vous êtes seul sur cette liste', 'info' );
	?>
	<h4 class="ui dividing header">Suppression</h4>
	<a class="ui button red" onclick="onConfirmNotif('Voulez-vous vraiment supprimer cette liste ?\nToutes les tâches correspondante serons aussi supprimer\nL\'action est irresversible', '/list/delete/<?= $todoList->id ?>/')">Supprimer cette liste  !</a>
</div>