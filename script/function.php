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
?>