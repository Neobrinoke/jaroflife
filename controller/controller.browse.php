<?php
if( isset( $_SESSION['userId'] ) )
{
	require_once( 'model/model.task.php' );
	require_once( 'model/model.todo.php' );
	$task = new Task( $db );
	$todo = new Todo( $db );

	function getTodos()
	{
		global $todo;
		
		$resTodos = $todo->getTodosByUserId( $_SESSION['userId'] );
		$result = '';
		foreach( $resTodos as $res )
		{
			ob_start();
			?>
			<div class="eight wide column">
				<div class="ui attached message">
					<h1 class="header">
						<span>TDL - <?= $todo->getTodoById( $res->todo_id )->name ?></span>
						<a class="ui right floated label" href="/add?todoId=<?= $res->todo_id ?>">Ajouter</a>
					</h1>
				</div>
				<div class="ui attached fluid segment">
					<table class="ui celled selectable table">
						<thead>
							<tr>
								<th>#</th>
								<th>Nom</th>
								<th>Priorité</th>
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

		$resTasks = $task->getTasksByTodoId( $todo_id );
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
				<td><?= $res->taskid ?></td>
				<td><?= $res->tasklabel ?></td>
				<td><?= $priority ?></td>
				<td><a href="/delete?id=<?= $res->taskid ?>">Supprimer</a></td>
			</tr>
			<?php
			$result .= ob_get_clean();
		}
		return $result;
	}
	
	require_once( 'view/view.browse.php' );
}
else header( 'Location: /connect' );
?>