<div class="ui attached message">
	<h1 class="header">
		<span>Vos tâche pour la liste [ <?= $resTodo->name ?> ]</span>
		<span class="floated right"><a class="ui basic label blue" href="/task/add/<?= $resTodo->id ?>/">Ajouter</a></span>
	</h1>
</div>
<div class="ui attached fluid segment">
	<?php
	if( !empty( $resTasks ) )
	{
		?>
		<table class="ui celled selectable table">
			<thead>
				<tr>
					<th>Nom</th>
					<th>Description</th>
					<th>Priorité</th>
					<th>Auteur</th>
					<th>Ajouté le ...</th>
					<th></th>
				</tr>
			</thead>
			<tbody>
				<?php foreach( $resTasks as $resTask ): ?>
					<tr onclick="location.href='/task/read/<?= $resTask->taskid ?>/'" style="cursor: pointer;">
						<td><?= $resTask->tasklabel ?></td>
						<td><?= $resTask->description ?></td>
						<td><?= getPriority( $resTask->priority ) ?></td>
						<td><?= $user->findById( $resTask->authorId )->name ?></td>
						<td><?= $resTask->created_at ?></td>
						<td><a class="ui right floated label red" href="/task/delete/<?= $resTodo->id ?>/<?= $resTask->taskid ?>/">Supprimer</a></td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
		<?php
	}
	else sendMessage( 'Aucune tâche actuellement disponible', 'error' );
	?>
</div>