<?php
function sendMessage( $message, $type )
{
	if( $type === 'valid' )
	{
		echo '
		<div class="ui success message">
			<div class="header">Succès</div>
			<p>'.$message.'</p>
		</div>';
	}
	else if( $type === 'error' )
	{
		echo '
		<div class="ui error message">
			<div class="header">Erreur</div>
			<p>'.$message.'</p>
		</div>';
	}
}

function getRoute()
{
	$uri = $_SERVER['REQUEST_URI'];
	if( $uri !== "/" )
	{
		$uri = substr( $_SERVER['REQUEST_URI'], 1 );
		if( strpos( $uri, "?" ) !== false )
			$uri = substr( $uri, 0, strpos( $uri, "?" ) );

		$page = "controller/controller.".$uri.".php";
		if( !file_exists( $page ) )
			$page = "view/view.error.php";
	}
	else $page = "controller/controller.browse.php";

	return $page;
}
?>