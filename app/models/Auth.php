<?php


/**
 * authentication class
 */
class Auth
{

	public static function get($column)
	{
		if (!empty($_SESSION['USER'][$column])) {
			return $_SESSION['USER'][$column];
		}

		return "Unknown";
	}

	public static function logged_in()
	{
		if (!empty($_SESSION['USER'])) {
			$db = new Database();
			$userData = $db->query("SELECT * FROM users WHERE email = :email LIMIT 1", ['email' => $_SESSION['USER']['email']]);
			if ($userData) {
				// Update the user's balance in the session
				$_SESSION['USER']['balance'] = $userData[0]['balance'];
				return true;
			}
		}
		return false;
	}

	public static function access($role)
	{

		$access['admin'] 		= ['admin'];
		$access['supervisor'] 	= ['admin', 'supervisor'];
		$access['user'] 		= ['admin', 'supervisor', 'user'];

		$myrole = self::get('role');
		if (in_array($myrole, $access[$role])) {
			return true;
		}

		return false;
	}

	public static function setMessage($message)
	{
		$_SESSION['MESSAGE'] = $message;
	}

	public static function getMessage()
	{
		if (!empty($_SESSION['MESSAGE'])) {

			$message = $_SESSION['MESSAGE'];
			unset($_SESSION['MESSAGE']);
			return $message;
		}
	}
}
