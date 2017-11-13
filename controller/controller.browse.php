<?php
require_once( 'model/model.task.php' );
require_once( 'model/model.todo.php' );
require_once( 'model/model.user.php' );

if( !isset( $_SESSION['userId'] ) ) {
	header( 'Location: /connect' );
}

$task = new Task( $db );
$todo = new Todo( $db );
$user = new User( $db );

function getTodos()
{
	global $todo;
	
	$resTodos = $todo->findByUserId( $_SESSION['userId'] );
	$result = '';
	foreach( $resTodos as $res )
	{
		ob_start();
		?>
		<div class="sixteen wide column">
			<div class="ui attached message">
				<h1 class="header">
					<span>TDL - <?= $todo->findById( $res->todo_id )->name ?></span>
					<a class="ui right floated label blue" href="/add?todoId=<?= $res->todo_id ?>">Ajouter</a>
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
					<tbody><?= getTasks( (int)$res->todo_id ) ?></tbody>
				</table>
			</div>
		</div>
		<?php
		$result .= ob_get_clean();
	}
	return $result;
}

function getTasks( $todo_id )
{
	global $task;
	global $user;

	$resTasks = $task->findByTodoId( $todo_id );
	$result = '';
	foreach( $resTasks as $res )
	{
		$priority = 'Basse';
		if( $res->priority == 2 )
			$priority = 'Moyenne';
		else if( $res->priority == 3 )
			$priority = 'Haute';

		ob_start();
		?>
		<tr onclick="location.href='read?id=<?= $res->taskid ?>'" style="cursor: pointer;">
			<td><?= $res->tasklabel ?></td>
			<td><?= $res->description ?></td>
			<td><?= $priority ?></td>
			<td><?= $user->findById( $res->authorId )->name ?></td>
			<td><?= $res->created_at ?></td>
			<td><a class="ui right floated label red" href="/delete?id=<?= $res->taskid ?>">Supprimer</a></td>
		</tr>
		<?php
		$result .= ob_get_clean();
	}
	return $result;
}

require_once( 'view/view.browse.php' );
?>