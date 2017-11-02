<?php
class Task
{
	private $db_info;

	public function __construct( $db ) {
		$this->db_info = $db;
	}

	public function addTask( $name, $priority, $description ) {
		$this->db_info->execute( "INSERT INTO task (tasklabel, priority, description)VALUE(?, ?, ?)", [$name, $priority, $description] );
	}

	public function getTasks() {
		return $this->db_info->query( "SELECT * FROM task ORDER BY priority DESC" );
	}

	public function getTaskById( $id ) {
		return $this->db_info->query( "SELECT * FROM task WHERE taskid = ?", [$id], true );
	}

	public function updateTaskById( $name, $priority, $description, $id ) {
		$this->db_info->execute( "UPDATE task SET tasklabel = ?, priority = ?, description = ? WHERE taskid = ?", [$name, $priority, $description, $id] );		
	}
}
?>