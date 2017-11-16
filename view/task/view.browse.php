<div class="ui grid">
    <?php foreach( $resTodos as $resTodo ): ?>
		<div class="sixteen wide column">
			<div class="ui attached message">
				<h1 class="header">
					<span>TDL - <?= $todo->findById( $resTodo->todo_id )->name ?></span>
					<a class="ui right floated label blue" href="/task/add/<?= $resTodo->todo_id ?>/">Ajouter</a>
				</h1>
			</div>
			<div class="ui attached fluid segment">
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
                        <?php foreach( getTasks( $resTodo->todo_id ) as $resTask ): ?>
                            <tr onclick="location.href='/task/read/<?= $resTask->taskid ?>/'" style="cursor: pointer;">
                                <td><?= $resTask->tasklabel ?></td>
                                <td><?= $resTask->description ?></td>
                                <td><?= getPriority( $resTask->priority ) ?></td>
                                <td><?= $user->findById( $resTask->authorId )->name ?></td>
                                <td><?= $resTask->created_at ?></td>
                                <td><a class="ui right floated label red" href="/task/delete/<?= $resTask->taskid ?>/">Supprimer</a></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
				</table>
			</div>
		</div>
    <?php endforeach; ?>
</div>