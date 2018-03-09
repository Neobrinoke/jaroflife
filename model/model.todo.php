<?php
class Todo
{
	private $db_info;

	public function __construct( $db ) {
		$this->db_info = $db;
	}
	
	public function findById( int $id ) {
		return $this->db_info->query( 'SELECT * FROM todo_group WHERE id = ? AND deleted_at IS NULL', [$id], true );
	}

	public function findByUserId( int $userId ) {
		return $this->db_info->query( 'SELECT * FROM todo_group_user WHERE user_id = ?', [$userId] );
	}
	
	public function findMembersById( int $todoId ) {
		return $this->db_info->query( 'SELECT * FROM todo_group_user WHERE todo_id = ?', [$todoId] );
	}
	
	public function findMembersByIdWithoutMe( int $todoId, int $userId ) {
		return $this->db_info->query( 'SELECT * FROM todo_group_user WHERE todo_id = ? AND user_id != ?', [$todoId, $userId] );
	}

	public function findLastByUser( int $userId ) {
		return $this->db_info->query( 'SELECT * FROM todo_group WHERE author_id = ? AND deleted_at IS NULL ORDER BY id DESC', [$userId], true );
	}

	public function findByIdAndUserId( int $todoId, int $userId ) {
		return $this->db_info->query( 'SELECT * FROM todo_group_user WHERE todo_id = ? AND user_id = ?', [$todoId, $userId], true );
	}

	public function addUser( int $userId, int $todoId, int $authorityId ) {
		return $this->db_info->execute( 'INSERT INTO todo_group_user ( user_id, todo_id, authority_id ) VALUES ( ?, ?, ? )', [$userId, $todoId, $authorityId] );
	}

	public function create( string $name, string $description, int $userId )
	{
		if( !$this->db_info->execute( 'INSERT INTO todo_group ( name, description, author_id ) VALUES ( ?, ?, ? )', [$name, $description, $userId] ) ) {
			return false;
		}

		$todo = $this->findLastByUser( $userId );
		if( $todo ) {
			return $this->db_info->execute( 'INSERT INTO todo_group_user ( user_id, todo_id, authority_id ) VALUES ( ?, ?, ? )', [$userId, $todo->id, 1] );
		} else {
			return false;
		}
	}
	
	public function update( string $name, string $description, int $todoId ) {
		return $this->db_info->execute( 'UPDATE todo_group SET name = ?, description = ? WHERE id = ?', [$name, $description, $todoId] );
	}
	
	public function expulse( int $todoId, int $userId ) {
		return $this->db_info->execute( 'DELETE FROM todo_group_user WHERE todo_id = ? AND user_id = ?', [$todoId, $userId] );
	}
	
	public function updateUser( int $authorityId, int $todoId, int $userId ) {
		return $this->db_info->execute( 'UPDATE todo_group_user SET authority_id = ? WHERE todo_id = ? AND user_id = ?', [$authorityId, $todoId, $userId] );
	}

	public function remove( int $todoId )
	{
		if( !$this->db_info->execute( 'UPDATE task SET deleted_at = CURRENT_TIMESTAMP WHERE todo_id = ?', [$todoId] ) || !$this->db_info->execute( 'DELETE FROM todo_group_user WHERE todo_id = ?', [$todoId] ) ) {
			return false;
		}
		return $this->db_info->execute( 'UPDATE todo_group SET deleted_at = CURRENT_TIMESTAMP WHERE id = ?', [$todoId] );
	}
}
?>