<?php
class Task
{
	private $db_info;

	public function __construct( $db ) {
		$this->db_info = $db;
	}

	public function addTask( $name, $priority, $description, $userId ) {
		return $this->db_info->execute( "INSERT INTO task ( tasklabel, priority, description, authorId ) VALUES ( ?, ?, ?, ? )", [$name, $priority, $description, $userId] );
	}

	public function getTasks( $userId ) {
		return $this->db_info->query( "SELECT * FROM task WHERE authorId = ? ORDER BY priority DESC", [$userId] );
	}

	public function getTaskById( $userId, $id ) {
		return $this->db_info->query( "SELECT * FROM task WHERE authorId = ? AND taskid = ?", [$userId, $id], true );
	}

	public function updateTaskById( $userId, $name, $priority, $description, $id ) {
		return $this->db_info->execute( "UPDATE task SET tasklabel = ?, priority = ?, description = ? WHERE authorId = ? AND taskid = ?", [$name, $priority, $description, $userId, $id] );		
	}

	public function removeTaskById( $userId, $id ) {
		return $this->db_info->execute( "DELETE FROM task WHERE authorId = ? AND taskid = ?", [$userId, $id] );
	}
}
?>