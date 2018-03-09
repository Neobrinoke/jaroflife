<?php
require_once( 'model/model.todo.php' );
require_once( 'model/model.user.php' );

if( !isset( $_SESSION['userId'] ) ) {
	header( 'Location: /user/connect/' );
}

$todo = new Todo( $db );
$user = new User( $db );

$todoId = $route->params[2];
$userId = $_SESSION['userId'];

if( isset( $todoId ) && is_numeric( $todoId ) )
{
	$todoList = $todo->findById( $todoId );
	if( $todoList )
	{
		$todoMember = $todo->findByIdAndUserId( $todoId, $userId );
		if( $todoMember )
		{
			if( $todoMember->authority_id == 1 || $todoMember->authority_id == 2 )
			{
				if( isset( $_POST['edit'] ) )
				{
					if( isset( $_POST['authority_id'], $_POST['userId'] ) )
					{
						$authority_id = htmlspecialchars( protect( $_POST['authority_id'] ) );
						$targetUserId = htmlspecialchars( protect( $_POST['userId'] ) );

						if( $authority_id && $targetUserId )
						{
							if( $todo->updateUser( $authority_id, $todoId, $targetUserId ) ) {
								header( 'Location: /list/read/'.$todoId.'/' );
							} else {
								sendMessage( 'Une erreur s\'est produite', 'error' );
							}
						}
						else sendMessage( 'Merci de tous completer', 'error' );
					}
					else sendMessage( 'Merci de tous completer', 'error' );
				}
				else if( isset( $_POST['expulse'] ) )
				{
					if( $userId != $_POST['userId'] )
					{
						if( $todo->expulse( $todoId, $_POST['userId'] ) ) {
							header( 'Location: /list/read/'.$todoId.'/' );
						} else {
							sendMessage( 'Une erreur s\'est produite', 'error' );
						}
					}
				}
				$todoMembers = $todo->findMembersByIdWithoutMe( $todoId, $userId );
				require_once( 'view/list/view.read.php' );
			}
			else sendMessage( 'Vous n\'avez pas la permission requise pour accéder au détails de cette liste', 'error' );
		}
		else sendMessage( 'Vous n\'avez pas accès à cette liste', 'error' );
	}
	else sendMessage( 'Aucune liste correspondante', 'error' );
}
else sendMessage( 'Aucune liste correspondante', 'error' );
?>