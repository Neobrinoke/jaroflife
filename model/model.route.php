<?php
class Route
{
	public $params = [];

	public function __construct( $uri )
	{
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
	}

	public function getRoute()
	{
		$page = "controller/".$this->params[0]."/controller.".$this->params[1].".php";
		if( !file_exists( $page ) )
			$page = "view/view.error.php";
	
		return $page;
	}
}
?>