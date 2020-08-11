<?php 
	$filepath = realpath(dirname(__FILE__));
	// echo $filepath;
	// exit();
	include_once($filepath."/../lib/Session.php");
	include_once($filepath."/../lib/Database.php");
	include_once($filepath."/../helpers/Format.php");

	
	class Process
	{
		private $db;
		private $fm;
		
		public function __construct()
		{
			$this->db = new Database();
			$this->fm = new Format();
		}

		public function processDate($data)
		{
			$ansId = $this->fm->validation($data['ansId']);
			$qustNo = $this->fm->validation($data['qustNo']);

			$ansId = mysqli_real_escape_string($this->db->link,$ansId);
			$qustNo = mysqli_real_escape_string($this->db->link,$qustNo);

			$nextQust = $qustNo+1;

			$totalQust = $this->gatTotalQustion();
			$rightAns = $this->rightAnsByqustNo($qustNo);

			if(!isset($_SESSION['score']))
			{
				$_SESSION['score'] = 0;
			}

			if($rightAns == $ansId)
			{
				$_SESSION['score']++;
			}

			if($nextQust == $totalQust)
			{
				header("Location: final.php");
				exit();
			}else{
				header("Location: test.php?p=".$nextQust);
				exit();
			}

		

		}

		private function rightAnsByqustNo($qustNo)
		{
			$query = "SELECT * FROM tbl_ans  WHERE qustNo = '$qustNo' AND rightAns = '1'  ";
			$result = $this->db->select($query)->fetch_assoc();
			return $result['id'];
		}

		private function gatTotalQustion()
		{
			$query = "SELECT * FROM tbl_user ";
			$result = $this->db->select($query)->num_rows;
			return $result;
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
				$msg = "<span class='error'> User not Disabled</span> ";
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