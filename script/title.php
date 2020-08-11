

	<?php 

	if(isset($_GET['p']))
	{
		$qustNo = (int)$_GET['p'];
		$query = "SELECT * FROM tbl_qus WHERE qustNo = '$qustNo'  ";
		$result = $db->select($query)->fetch_assoc();
		if($result != FALSE)
		{
	?>
		<title><?php echo "Q-".$result['qustNo']; ?>--<?php echo TITLE; ?></title>
	<?php		
		}
	}
	else{
	?>
	<title><?php echo title(); ?>--<?php echo TITLE; ?></title>
	<?php		
	}

	?>

	<?php 
		function title()
		{
			$path = $_SERVER['SCRIPT_FILENAME'];
			$title = basename($path,'.php');
			if($title == 'final')
			{
				$title = "Final Score";
			}
			else if($title == 'starttest')
			{
				$title = "Start Test";
			}
			else if($title == 'profile')
			{
				$title = "Profile Page";
			}
			else if($title == 'exam')
			{
				$title = "Exam Page";
			}


			$title = trim($title);
			return $title;
		}
	?>
	