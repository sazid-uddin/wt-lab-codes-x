<?php
include_once("../db/db_conn.php");
class UserModel {
	private $conn = null;
	function __construct()
	{
		$dbConnObj = new DBConnection();
		$this->conn = $dbConnObj->connect();
	}

	public function getUsersList() {
		$sql = "SELECT username, email, created_at FROM users;";
		$result = $this->conn->query($sql);
		$usersList = [];
		if ($result->num_rows > 0) {
			$count = 0;
			while ($row = $result->fetch_assoc()) {
				$usersList[$count] = $row;
				$count++;
			}
		}
		return $usersList;
		// $usersList structure
		// [0] => ['username'=>'john', 'email'=>'john@gmail.com'....]
		// [1] => ['username'=>'jane', 'email'=>'jane@gmail.com'....]
	}

	public function checkLogin(string $username, string $password) {
		$sql = "SELECT * FROM users where username = '" . $username . "';";
		$result = $this->conn->query($sql);
		if ($result->num_rows > 0) {
			while ($row = $result->fetch_assoc()) {
				if($row['password'] === $password) {
					$_SESSION["username"] = $username;
					$_SESSION["last_login"] = time();

					// header('Location: ../view/home.view.php');
					return true;
				} else {
					$_SESSION['error']['login'] = 'Username or password is invalid';
					// header('../view/login.view.php');
					return false;
				}
			}
		} else {
			$_SESSION['error']['login'] = 'Username or password is invalid';
			// header('../view/login.view.php');
			return false;
		}
	}
}
?>