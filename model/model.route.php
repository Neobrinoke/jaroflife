<?php
class Route
{
	public $params = [];

	public function __construct( $uri )
	{
		var_dump( $uri );
		if( $uri === '/' )
		{
			$this->params[0] = 'list';
			$this->params[1] = 'browse';
		}
		else
		{
			$uri = substr( $uri, 1, -1 );
			$this->params = explode( '/', $uri );
		}
		var_dump( $this->params );
	}

	public function getRoute()
	{
		$page = "controller/".$this->params[0]."/".$this->params[1].".php";
		var_dump( $page );
		if( !file_exists( $page ) )
			$page = "view/view.error.php";
	
		return $page;
	}
}
?>