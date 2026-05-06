<?php
class DBConnection {
	private $host = 'localhost';
	private $db_username = 'root';
	private $db_password = '';
	private $db_name = 'my_db';

	public function connect() {
		return new mysqli($this->host, $this->db_username, $this->db_password, $this->db_name);
	}
}
?>