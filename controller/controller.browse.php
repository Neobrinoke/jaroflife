<?php
$task = new Task( $db );

function getTasks()
{
	global $task;

	$results = $task->getTasks();
	foreach( $results as $result )
	{
		$priority = 'Basse';
		if( $result->priority == 2 )
			$priority = 'Moyenne';
		else if( $result->priority == 3 )
			$priority = 'Haute';

		echo'<tr onclick="location.href=\'read?id='.$result->taskid.'\'" style="cursor: pointer;">';
			echo'<td><div class="ui ribbon label purple">'.$result->taskid.'</div></td>';
			echo'<td>'.$result->tasklabel.'</td>';
			echo'<td>'.$priority.'</td>';
			echo'<td><a href="/edit?id='.$result->taskid.'">Éditer</a></td>';
			echo'<td><a href="/delete?id='.$result->taskid.'">Supprimer</a></td>';
		echo'</tr>';
	}
}

require_once( 'view/view.browse.php' );
?>