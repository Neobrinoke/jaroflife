<?php
require_once( 'model/model.task.php' );
require_once( 'model/model.todo.php' );

if( !isset( $_SESSION['userId'] ) ) {
	header( 'Location: /user/connect/' );
}

$todo = new Todo( $db );
$task = new Task( $db );

$resTodos = $todo->findByUserId( $_SESSION['userId'] );

require_once( 'view/list/view.browse.php' );
?>