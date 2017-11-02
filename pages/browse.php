<?php
$results = $db->query( "SELECT * FROM task ORDER BY priority DESC" );
?>
<h1>Liste des tâches</h1>
<table class="ui celled selectable table">
	<thead>
		<tr>
			<th>#</th>
			<th>Nom</th>
			<th>Priorité</th>
			<th></th>
			<th></th>
		</tr>
	</thead>
	<tbody>
		<?php
		foreach( $results as $result )
		{
			$priority = 'Basse';
			if( $result->priority == 2 )
				$priority = 'Moyenne';
			else if( $result->priority == 3 )
				$priority = 'Haute';
			?>
			<tr onclick="location.href='read?id=<?php echo $result->taskid; ?>'" style="cursor: pointer;">
				<td><?= $result->taskid ?></td>
				<td><?= $result->tasklabel ?></td>
				<td><?= $priority ?></td>
				<td><a href="/delete?id=<?= $result->taskid ?>">Supprimer</a></td>
				<td><a href="/edit?id=<?= $result->taskid ?>">Éditer</a></td>
			</tr>
			<?php
		}?>
	</tbody>
</table>