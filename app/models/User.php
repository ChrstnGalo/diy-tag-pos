<?php


/**
 * users class
 */
class User extends Model
{

	protected $table = "users";
	protected $allowed_columns = [

		'username',
		'email',
		'rfid',
		'unique_num',
		'qr_image',
		'password',
		'role',
		'gender',
		'image',
		'balance',
		'pin_number',
		'date',
	];


	public function validate($data, $id = null)
	{
		$errors = [];

		// Check username
		if (empty($data['username'])) {
			$errors['username'] = "Username is required";
		} elseif (!preg_match('/^[a-zA-Z ]+$/', $data['username'])) {
			$errors['username'] = "Only letters allowed in username";
		}

		// Check email
		if (empty($data['email'])) {
			$errors['email'] = "Email is required";
		} elseif (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
			$errors['email'] = "Email is not valid";
		}

		// Check RFID
		if (empty($data['rfid'])) {
			$errors['rfid'] = "RFID is required";
		} elseif (!filter_var($data['rfid'])) {
			$errors['rfid'] = "RFID is not valid";
		} else {
			// Check if RFID already exists in the database
			$existingUser = $this->query("SELECT * FROM users WHERE rfid = ?", [$data['rfid']]);
			if ($existingUser) {
				if ($id && $existingUser[0]['id'] == $id) {
					// Skip the check if updating the same user
					return $errors;
				}
				$errors['rfid'] = "RFID already exists";
			}
		}

		// Check unique_num
		if (empty($data['unique_num'])) {
			$errors['unique_num'] = "Unique Number is required";
		} else {
			// Check if unique_num already exists in the database
			$existingUser = $this->query("SELECT * FROM users WHERE unique_num = ?", [$data['unique_num']]);
			if ($existingUser) {
				if ($id && $existingUser[0]['id'] == $id) {
					// Skip the check if updating the same user
					return $errors;
				}
				$errors['unique_num'] = "Unique Number already exists";
			}
		}

		// Check balance
		if (!isset($data['balance'])) {
			$errors['balance'] = "Balance is required";
		} elseif (!is_numeric($data['balance'])) {
			$errors['balance'] = "Balance must be a numeric value";
		} elseif ($data['balance'] < 0) {
			$errors['balance'] = "Balance cannot be negative";
		}

		// Check password
		if (!$id) {
			if (empty($data['password'])) {
				$errors['password'] = "Password is required";
			} elseif ($data['password'] !== $data['password_retype']) {
				$errors['password_retype'] = "Passwords do not match";
			} elseif (strlen($data['password']) < 8) {
				$errors['password'] = "Password must be at least 8 characters long";
			}
		} else {
			if (!empty($data['password'])) {
				if ($data['password'] !== $data['password_retype']) {
					$errors['password_retype'] = "Passwords do not match";
				} elseif (strlen($data['password']) < 8) {
					$errors['password'] = "Password must be at least 8 characters long";
				}
			}
		}

		// Check PIN number format
		if (!empty($data['pin_number']) && (!is_numeric($data['pin_number']) || strlen($data['pin_number']) !== 6)) {
			$errors['pin_number'] = "PIN number must be a numeric value with exactly 6 digits";
		}

		return $errors;
	}
	public function getQrImagePath($uniqueNum)
	{
		$query = "SELECT qr_image FROM users WHERE unique_num = ?";
		$result = $this->query($query, [$uniqueNum]);

		if ($result && isset($result[0]['qr_image'])) {
			return $result[0]['qr_image'];
		}

		return null;
	}
}
