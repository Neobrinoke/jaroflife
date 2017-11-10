<?php
if( isset( $_SESSION['userId'] ) )
{
	require_once( 'model/model.task.php' );
	$task = new Task( $db );

	function getTasks()
	{
		global $task;

		$results = $task->getTasks( $_SESSION['userId'] );
		foreach( $results as $result )
		{
			$priority = 'Basse';
			if( $result->priority == 2 )
				$priority = 'Moyenne';
			else if( $result->priority == 3 )
				$priority = 'Haute';

			echo'
			<tr onclick="location.href=\'read?id='.$result->taskid.'\'" style="cursor: pointer;">
				<td><div class="ui ribbon label purple">'.$result->taskid.'</div></td>
				<td>'.$result->tasklabel.'</td>
				<td>'.$priority.'</td>
				<td><a href="/edit?id='.$result->taskid.'">Éditer</a></td>
				<td><a href="/delete?id='.$result->taskid.'">Supprimer</a></td>
			</tr>';
		}
	}
	
	require_once( 'view/view.browse.php' );
}
else header( 'Location: /connect' );
?>