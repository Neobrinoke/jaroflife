<?php
class User
{
	private $db_info;
	
	public function __construct( $db ) {
		$this->db_info = $db;
	}

	public function addUser( $username, $login, $email, $password ) {
		$this->db_info->execute( 'INSERT INTO user ( name, login, email, password ) VALUES ( ?, ?, ?, ? )', [$username, $login, $email, $password] );
	}

	public function getUserById( $id )  {
		return $this->db_info->query( 'SELECT * FROM user WHERE id = ?', [$id], true );
	}
	
	public function getUserByEmail( $email )  {
		return $this->db_info->query( 'SELECT * FROM user WHERE email = ?', [$email], true );
	}
	
	public function getUserByLogin( $login )  {
		return $this->db_info->query( 'SELECT * FROM user WHERE login = ?', [$login], true );
	}

	public function getUserByEmailOrLogin( $login ) {
		return $this->db_info->query( 'SELECT * FROM user WHERE email = ? OR login = ?', [$login, $login], true );
	}
}
?>