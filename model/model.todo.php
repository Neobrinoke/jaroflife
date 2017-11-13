<?php
class Todo
{
	private $db_info;

	public function __construct( $db ) {
		$this->db_info = $db;
	}
	
	public function findById( $id ) {
		return $this->db_info->query( 'SELECT * FROM todo_group WHERE id = ?', [$id], true );
	}

	public function findByUserId( $userId ) {
		return $this->db_info->query( 'SELECT * FROM todo_group_user WHERE user_id = ?', [$userId] );
	}

	public function findLastByUser( $userId ) {
		return $this->db_info->query( 'SELECT * FROM todo_group WHERE author_id = ? ORDER BY id DESC', [$userId], true );
	}

	public function findByIdAndUserId( $todoId, $userId ) {
		return $this->db_info->query( 'SELECT * FROM todo_group_user WHERE todo_id = ? AND user_id = ?', [$todoId, $userId], true );
	}

	public function create( $name, $userId )
	{
		if( !$this->db_info->execute( 'INSERT INTO todo_group ( name, author_id ) VALUES ( ?, ? )', [$name, $userId] ) ) {
			return false;
		}

		$todo = $this->findLastByUser( $userId );
		if( $todo ) {
			return $this->db_info->execute( 'INSERT INTO todo_group_user ( user_id, todo_id, authority_id ) VALUES ( ?, ?, ? )', [$userId, $todo->id, 0] );
		} else {
			return false;
		}
	}
}
?>