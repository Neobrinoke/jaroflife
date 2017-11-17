<?php
function sendMessage( $message, $type, $multiple = false )
{
	if( $type === 'valid' )
	{
		echo '<div class="ui success message">';
			echo '<div class="header">Succès</div>';
			if( $multiple )
			{
				echo '<ul class="list">';
					foreach( $message as $mes ):
						echo '<li>'.$mes.'</li>';
					endforeach;
				echo '</ul>';
			}
			else echo '<p>'.$message.'</p>';
		echo '</div>';
	}
	else if( $type === 'error' )
	{
		echo '<div class="ui error message">';
			echo '<div class="header">Erreur</div>';
			if( $multiple )
			{
				echo '<ul class="list">';
					foreach( $message as $mes ):
						echo '<li>'.$mes.'</li>';
					endforeach;
				echo '</ul>';
			}
			else echo '<p>'.$message.'</p>';
		echo '</div>';
	}
	else if( $type === 'info' )
	{
		echo '<div class="ui ignored warning message">';
			echo '<div class="header">Information</div>';
			if( $multiple )
			{
				echo '<ul class="list">';
					foreach( $message as $mes ):
						echo '<li>'.$mes.'</li>';
					endforeach;
				echo '</ul>';
			}
			else echo '<p>'.$message.'</p>';
		echo '</div>';
	}
}
?>