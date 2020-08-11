<?php 
	$filepath = realpath(dirname(__FILE__));
	// echo $filepath;
	// exit();
	include_once($filepath."/../lib/Session.php");
	include_once($filepath."/../lib/Database.php");
	include_once($filepath."/../helpers/Format.php");

	
	class Exam
	{
		private $db;
		private $fm;
		
		public function __construct()
		{
			$this->db = new Database();
			$this->fm = new Format();
		}

		public function getAllQuestion()
		{
			$query = "SELECT * FROM tbl_qus ORDER BY qustNo DESC ";
			$result = $this->db->select($query);
			return $result;
		}


		public function getQuestionByNo($qustNo)
		{
			$query = "SELECT * FROM tbl_qus WHERE qustNo ='$qustNo' ";
			$result = $this->db->select($query);
			$value = $result->fetch_assoc();
			return $value;
		}
		public function getAnsById($qustNo)
		{
			$query = "SELECT * FROM tbl_ans WHERE qustNo ='$qustNo' ";
			$result = $this->db->select($query);
			return $result;
		}

		public function getQuestion()
		{
			$query = "SELECT * FROM tbl_qus ";
			$result = $this->db->select($query);
			$value = $result->fetch_assoc();
			return $value;
		}

		public function getViewQuestion()
		{
			$query = "SELECT * FROM tbl_qus";
			$result = $this->db->select($query);
			return $result;
		}



		public function totalRow()
		{
			$query = "SELECT qustNo FROM tbl_qus ORDER BY qustNo DESC LIMIT 1   ";
			$result = $this->db->select($query);
			if($result != FALSE)
			{
				$lstNum = $result->fetch_assoc();
			return $lstNum['qustNo'];
			}
			else
			{
				return FALSE;
			}
			
		
		}

		public function removeQuestion($data)
		{
			$tables = array("tbl_qus","tbl_ans");

			foreach ($tables as $table) 
			{
				$query = " DELETE FROM $table WHERE qustNo ='$data'  ";
				// echo $query."<br>";
				// exit();
				$dlt = $this->db->delete($query);
			}
				if($dlt != FALSE)
				{
						$msg = "<span class='success'> Question Delete Successfully.</span> ";
					return $msg;
				}
				else{
					$msg = "<span class='error'> Sorry... Fail to question remove!!</span> ";
					return $msg;
				}

			

			
		}

		public function addQuestion($data)
		{
			$qustNo = mysqli_real_escape_string($this->db->link,$data['qustNo']);
			$qust = mysqli_real_escape_string($this->db->link,$data['qust']);

			$ans = array();

			$ans['1'] = $data['ans1'];
			$ans['2'] = $data['ans2'];
			$ans['3'] = $data['ans3'];
			$ans['4'] = $data['ans4'];

			$rightAns = mysqli_real_escape_string($this->db->link,$data['rightAns']);

			if(empty($qustNo) OR empty($qust) OR empty($ans['1']) OR empty($ans['2']) OR empty($ans['3']) OR empty($ans['4']) OR empty($rightAns)  )
			{
				$msg = "<span class='error'> Field Can't empty</span> ";
					return $msg;
			}
			else{

				$query = " INSERT INTO tbl_qus(qustNo,qust) VALUES('$qustNo','$qust') ";
			$insert_row = $this->db->insert($query);
			if($insert_row != FALSE)
			{

				foreach ($ans as $key => $ansName)
				 {
					if($rightAns == $key)
					{
						$query = " INSERT INTO tbl_ans(qustNo,rightAns,ans) VALUES('$qustNo','1','$ansName') ";
						$insert_ans = $this->db->insert($query);
					}
					else{
						$query = " INSERT INTO tbl_ans(qustNo,rightAns,ans) VALUES('$qustNo','0','$ansName') ";
						$insert_ans = $this->db->insert($query);
					}
					
				}

				if($insert_ans  != FALSE)
				{
					$msg = "<span class='success'> Question Add Successfilly</span> ";
					return $msg;
				}
				else{
					$msg = "<span class='error'>Fail to  Question Add Successfilly</span> ";
					return $msg;
				}

			}
			}

			




		}

	

	}
?>