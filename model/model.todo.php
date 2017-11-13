<?php
class Todo
{
    private $db_info;

    public function __construct( $db ) {
        $this->db_info = $db;
    }

    public function addTodo( $name ) {
        return $this->db_info->execute( 'INSERT INTO todo_group ( name ) VALUES ( ? )', [$name] );
    }

    public function getTodosByUserId( $userId ) {
        return $this->db_info->query( 'SELECT * FROM todo_group_user WHERE user_id = ?', [$userId] );
    }

    public function getTodoById( $id ) {
        return $this->db_info->query( 'SELECT * FROM todo_group WHERE id = ?', [$id], true );
    }

    public function getTodoByIdAndUserId( $todoId, $userId ) {
        return $this->db_info->query( 'SELECT * FROM todo_group_user WHERE todo_id = ? AND user_id = ?', [$todoId, $userId], true );
    }
}
?>