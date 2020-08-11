<?php 
	$filepath = realpath(dirname(__FILE__));
	// echo $filepath;
	// exit();
	include_once($filepath."/../lib/Session.php");
	include_once($filepath."/../lib/Database.php");
	include_once($filepath."/../helpers/Format.php");

	
	class User
	{
		private $db;
		private $fm;
		
		public function __construct()
		{
			$this->db = new Database();
			$this->fm = new Format();
		}

		public function userLoginAJAX($email,$password)
		{
			$email = $this->fm->validation($email);
			$password = $this->fm->validation($password);

			$email = mysqli_real_escape_string($this->db->link,$email);
			$password = mysqli_real_escape_string($this->db->link,$password);

			if(empty($password) OR empty($email))
			{
				echo "empty";
				exit();
			}
			else{

				$password = md5($password);

				$query = "SELECT * FROM tbl_user WHERE email= '$email' AND password = '$password' ";
				$result = $this->db->select($query);

				if($result != FALSE)
				{
					$value = $result->fetch_assoc();
					if($value['status'] == 1)
					{
						echo "disable";
						exit();
					}
					else{
						Session::init();
						Session::set('userLogin',TRUE);
						Session::set('userId',$value['userId']);
						Session::set('username',$value['username']);
						Session::set('name',$value['name']);
						Session::set('email',$value['email']);

					}

				}
				else{
					echo "error";
						exit();
				}

			}
			
			
		}

		public function getProfileById($userId)
		{
			$query = "SELECT * FROM tbl_user WHERE userId= '$userId' ";
				$result = $this->db->select($query);
				if($result != FALSE)
				{
					return $result;
				}
				else{
					return FALSE;
				}
		}

		public function userProfileUdtAJAX($userId,$name,$username,$email)
		{
			$id = $this->fm->validation($userId);
			$name = $this->fm->validation($name);
			$username = $this->fm->validation($username);
			$email = $this->fm->validation($email);

			// echo $userId." ".$name." ".$username." ".$email;
			// exit();

			if(empty($name) OR empty($username) OR empty($email))
			{
				echo "empty";
				exit();
			}
			else{
				$query = "SELECT * FROM tbl_user WHERE email= '$email' ";
				$result = $this->db->select($query);
				if($result != FALSE)
				{
					$value = $result->fetch_assoc();

					if($value['userId'] == $id)
					{
						// profile update
							$query = " UPDATE tbl_user 
							SET name = '$name',
							username = '$username',
							email = '$email'
							WHERE userId = '$userId'
						";
						$udt_row = $this->db->update($query);
						if($udt_row != FALSE)
						{
							echo "success";
							exit();
						}
					}
					else{
						echo "disable";
						exit();
					}
				}
				else{
					// profile update
							$query = " UPDATE tbl_user 
							SET name = '$name',
							username = '$username',
							email = '$email'
							WHERE userId = '$userId'
						";
						$udt_row = $this->db->update($query);
						if($udt_row != FALSE)
						{
							echo "success";
							exit();
						}
				}
			}

		}

		public function userRegistrationAJAX($name,$username,$password,$email)
		{
			

			$name = $this->fm->validation($name);
			$username = $this->fm->validation($username);
			$password = $this->fm->validation($password);
			$email = $this->fm->validation($email);

			$name = mysqli_real_escape_string($this->db->link,$name);
			$username = mysqli_real_escape_string($this->db->link,$username);
			$password = mysqli_real_escape_string($this->db->link,$password);
			$email = mysqli_real_escape_string($this->db->link,$email);



			if(empty($name) OR empty($username) OR empty($password) OR empty($email))
			{
				echo "<span class='error'> Field Can't empty</span> ";
				exit();
			}
			else if(filter_var($email,FILTER_VALIDATE_EMAIL) === FALSE)
			{
				echo "<span class='error'> Invalide Email Address !!</span> ";
				exit();
			}
			else{

				$password = md5($password);

				$query = "SELECT * FROM tbl_user WHERE email= '$email' ";
				$result = $this->db->select($query);

				if($result != FALSE)
				{
					echo "<span class='error'> Email already exist !!</span> ";
					exit();
				}
				else{

					$query = " INSERT INTO tbl_user(name,username,password,email) VALUES('$name','$username','$password','$email') ";
					$insert_row = $this->db->insert($query);

					if($insert_row != FALSE)
					{
						echo "<span class='success'> Registration successfull</span> ";
					exit();
					}
					else{
						echo "<span class='error'>Fail to Registration successfull</span> ";
					exit();
					}

				}


			}


		
		

		}

		public function getAllUser()
		{
			$query = "SELECT * FROM tbl_user ORDER BY userId DESC ";
			$result = $this->db->select($query);
			return $result;
		}
		public function disableUser($dblid)
		{
			$query = " UPDATE tbl_user 
					SET status = '1'
					WHERE userId = '$dblid'
			";
			$result = $this->db->update($query);
			if($result != FALSE)
			{
				$msg = "<span class='success'> User Disabled</span> ";
				return $msg;
			}
			else{
				$msg = "<span class='success'> User Disabled</span> ";
				return $msg;
			}

		}

		public function enableUser($dblid)
		{
			$query = " UPDATE tbl_user 
					SET status = '0'
					WHERE userId = '$dblid'
			";
			$result = $this->db->update($query);
			if($result != FALSE)
			{
				$msg = "<span class='success'> User Enable</span> ";
				return $msg;
			}
			else{
				$msg = "<span class='error'>Sorry... User not Enable</span> ";
				return $msg;
			}

		}

		public function removeUser($dblid)
		{
			$query = " DELETE FROM tbl_user WHERE userId = '$dblid' ";
			$result = $this->db->delete($query);
			if($result != FALSE)
			{
				$msg = "<span class='success'> User Delete</span> ";
				return $msg;
			}
			else{
				$msg = "<span class='error'>Sorry... User not Delete</span> ";
				return $msg;
			}

		}

	}
?>