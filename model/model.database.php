<?php
class Database
{
	private $db_name;
	private $db_user;
	private $db_pass;
	private $db_host;
	private $db_port;
	private $instance;

	public function __construct( $db_name, $db_user = 'root', $db_pass = 'root', $db_host = 'localhost', $db_port = '3306' )
	{
		$this->db_name = $db_name;
		$this->db_user = $db_user;
		$this->db_pass = $db_pass;
		$this->db_host = $db_host;
		$this->db_port = $db_port;
	}

	private function getInstance()
	{
		if( $this->instance == null )
		{
			$db_dsn = "mysql:dbname=".$this->db_name.";host=".$this->db_host.";port=".$this->db_port;
			$pdo = new PDO( $db_dsn, $this->db_user, $this->db_pass );
			$pdo->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
			$this->instance = $pdo;
		}
		return $this->instance;
	}

	public function query( $statement, $params = [], $one = false, $type = PDO::FETCH_OBJ )
	{
		$req = $this->getInstance()->prepare( $statement );
		$req->execute( $params );
		return $one ? $req->fetch( $type ) : $req->fetchAll( $type );
	}

	public function execute( $statement, $params )
	{
		$req = $this->getInstance()->prepare( $statement );
		return $req->execute( $params );
	}
}
?>