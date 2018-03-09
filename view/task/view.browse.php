<div class="ui attached message">
	<h1 class="header">
		<span>Vos tâche pour la liste [ <?= $resTodo->name ?> ]</span>
		<span><a class="ui right floated basic icon button" href="/task/add/<?= $resTodo->id ?>/" data-tooltip="Ajouter une tâche"><i class="add icon"></i></a></span>
	</h1>
</div>
<div class="ui attached fluid segment">
	<?php
	if( !empty( $resTasks ) )
	{
		?>
		<table class="ui celled sortable selectable table teal">
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
					<tr>
						<td onclick="location.href='/task/read/<?= $resTodo->id ?>/<?= $resTask->taskid ?>/'" style="cursor: pointer;"><?= $resTask->tasklabel ?></td>
						<td onclick="location.href='/task/read/<?= $resTodo->id ?>/<?= $resTask->taskid ?>/'" style="cursor: pointer;"><?= $resTask->description ?></td>
						<td onclick="location.href='/task/read/<?= $resTodo->id ?>/<?= $resTask->taskid ?>/'" style="cursor: pointer;"><?= getPriority( $resTask->priority ) ?></td>
						<td onclick="location.href='/task/read/<?= $resTodo->id ?>/<?= $resTask->taskid ?>/'" style="cursor: pointer;"><?= $user->findById( $resTask->authorId )->name ?></td>
						<td onclick="location.href='/task/read/<?= $resTodo->id ?>/<?= $resTask->taskid ?>/'" style="cursor: pointer;"><?= $resTask->created_at ?></td>
						<td class="collapsing"><a class="ui icon button red" onclick="onConfirmNotif('Voulez-vous vraiment supprimer cette tâche ?', '/task/delete/<?= $resTodo->id ?>/<?= $resTask->taskid ?>/')" data-tooltip="Supprimer la tâche"><i class="trash icon"></i></a></td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
		<?php
	}
	else sendMessage( 'Aucune tâche actuellement disponible', 'error' );
	?>
</div>