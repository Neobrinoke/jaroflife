<?php
class User
{
	private $db_info;
	
	public function __construct( $db ) {
		$this->db_info = $db;
	}

	public function findById( $id )  {
		return $this->db_info->query( 'SELECT * FROM user WHERE userid = ?', [$id], true );
	}
	
	public function findByEmail( $email )  {
		return $this->db_info->query( 'SELECT * FROM user WHERE email = ?', [$email], true );
	}
	
	public function findByLogin( $login )  {
		return $this->db_info->query( 'SELECT * FROM user WHERE login = ?', [$login], true );
	}
	
	public function findByName( $name )  {
		return $this->db_info->query( 'SELECT * FROM user WHERE name = ?', [$name], true );
	}
	
	public function findByNameOrEmail( $name )  {
		return $this->db_info->query( 'SELECT * FROM user WHERE email = ? OR name = ?', [$name, $name], true );
	}

	public function findByEmailOrLogin( $login ) {
		return $this->db_info->query( 'SELECT * FROM user WHERE email = ? OR login = ?', [$login, $login], true );
	}
	
	public function create( $username, $login, $email, $password ) {
		return $this->db_info->execute( 'INSERT INTO user ( name, login, email, password ) VALUES ( ?, ?, ?, ? )', [$username, $login, $email, $password] );
	}
}
?>