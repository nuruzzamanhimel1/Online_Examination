<?php 
	$filepath = realpath(dirname(__FILE__));
	// echo $filepath;
	// exit();
	include_once($filepath."/../lib/Session.php");
	include_once($filepath."/../lib/Database.php");
	include_once($filepath."/../helpers/Format.php");

	
	class ThemeChange
	{
		private $db;
		private $fm;
		
		public function __construct()
		{
			$this->db = new Database();
			$this->fm = new Format();
		}

		public function checkedTheme()
		{
			$query = "SELECT * FROM tbl_theme WHERE id = '1' ";
			$result = $this->db->select($query)->fetch_assoc();
			return $result;
		}

		public function themeUpdate($data)
		{
			$theme = $data['theme'];
			$query = "SELECT * FROM tbl_theme ";
			$result = $this->db->select($query);

			if($result != FALSE)
			{
				// update
				$query = "UPDATE tbl_theme
					SET theme_name = '$theme'
					WHERE id = '1'
				";
				$udt = $this->db->update($query);
				if($udt)
				{
						$msg = "<span class='success'> Theme Update Successfully</span> ";
				return $msg;
				}
			}
			else{
				//insert.......
				$query = " INSERT INTO tbl_theme(id,theme_name) VALUES('1','$theme') ";
					$insert_row = $this->db->insert($query);
					if($insert_row)
				{
						$msg = "<span class='success'> Theme Insert Successfully</span> ";
				return $msg;
				}


			}
			
		}

	
	

	}
?>