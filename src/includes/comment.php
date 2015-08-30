<?php 

class Comment extends DatabaseObject{
	protected static $table_name = "tbl_comments";
	protected static $db_fields = array('id', 'photograph_id', 'author', 'body', 'created' );

	public $id;
	public $photograph_id;
	public $author;
	public $body;
	public $created;

	public static function find_comments_by_photo_id($photo_id = 0){
		global $database;
		$sql = "SELECT * FROM ".self::$table_name;
		$sql .= " WHERE photograph_id = ".$database->scape_value($photo_id);
		$sql .= " ORDER BY created ASC" ;
		return self::find_by_sql($sql);
	}	
}