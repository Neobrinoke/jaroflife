<?php
class Task
{
	private $db_info;

	public function __construct( $db ) {
		$this->db_info = $db;
	}
	
	public function findById( $id ) {
		return $this->db_info->query( "SELECT * FROM task WHERE taskid = ? AND deleted_at IS NULL", [$id], true );
	}

	public function findByTodoId( $todo_id ) {
		return $this->db_info->query( "SELECT * FROM task WHERE todo_id = ? AND deleted_at IS NULL ORDER BY priority DESC", [$todo_id] );
	}
	
	public function create( $name, $priority, $description, $userId, $todoId ) {
		return $this->db_info->execute( "INSERT INTO task ( tasklabel, priority, description, authorId, todo_id ) VALUES ( ?, ?, ?, ?, ? )", [$name, $priority, $description, $userId, $todoId] );
	}

	public function update( $name, $priority, $description, $id ) {
		return $this->db_info->execute( "UPDATE task SET tasklabel = ?, priority = ?, description = ? WHERE taskid = ?", [$name, $priority, $description, $id] );		
	}

	public function remove( $id ) {
		return $this->db_info->execute( "UPDATE task SET deleted_at = CURRENT_TIMESTAMP WHERE taskid = ?", [$id] );
	}
}
?>