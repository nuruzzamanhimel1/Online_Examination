<link rel="stylesheet" href="css/main.css">

 <?php 
        $query = "SELECT * FROM tbl_theme WHERE id = '1' ";
        $result = $db->select($query);
        //query validation...
        if($result)
        {
            while ($value = mysqli_fetch_assoc($result)) 
            {
            	if($value['theme_name'] == "default")
            	{
 ?>
				<link href="theme/default.css" type="text/css" rel="stylesheet">`
 		<?php	}elseif($value['theme_name'] == "green"){?>

				<link href="theme/green.css" type="text/css" rel="stylesheet">`
 		<?php	}elseif($value['theme_name'] == "red"){?>
				<link href="theme/red.css" type="text/css" rel="stylesheet">`
 		<?php	}elseif($value['theme_name'] == "blue"){?> 
<link href="theme/blue.css" type="text/css" rel="stylesheet">`
 		<?php }   }}?>
