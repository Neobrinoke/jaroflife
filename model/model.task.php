<?php
class Task
{
	private $db_info;

	public function __construct( $db ) {
		$this->db_info = $db;
	}

	public function addTask( $name, $priority, $description, $userId, $todoId ) {
		return $this->db_info->execute( "INSERT INTO task ( tasklabel, priority, description, authorId, todo_id ) VALUES ( ?, ?, ?, ?, ? )", [$name, $priority, $description, $userId, $todoId] );
	}

	public function getTasksByTodoId( $todo_id ) {
		return $this->db_info->query( "SELECT * FROM task WHERE todo_id = ? ORDER BY priority DESC", [$todo_id] );
	}

	public function getTaskById( $id ) {
		return $this->db_info->query( "SELECT * FROM task WHERE taskid = ?", [$id], true );
	}

	public function updateTaskById( $name, $priority, $description, $id ) {
		return $this->db_info->execute( "UPDATE task SET tasklabel = ?, priority = ?, description = ? WHERE taskid = ?", [$name, $priority, $description, $id] );		
	}

	public function removeTaskById( $id ) {
		return $this->db_info->execute( "DELETE FROM task WHERE taskid = ?", [$id] );
	}
}
?>