<?php 
    $filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/inc/header.php');
	include_once ($filepath.'/../classes/User.php');

	$usr = new User();
?>
<?php 
	if(isset($_GET['dis']))
	{
		$dblid =(int)$_GET['dis'];
		$dblUser = $usr->disableUser($dblid);
	}

	if(isset($_GET['enb']))
	{
		$dblid =(int)$_GET['enb'];
		$enblUser = $usr->enableUser($dblid);
	}

		if(isset($_GET['rem']))
	{
		$dblid =(int)$_GET['rem'];
		$remUser = $usr->removeUser($dblid);
	}
?>
<style type="text/css">
	.adminPanel{width: 500px; border: 1px solid #ddd; margin: 30px auto 0; padding:20px; line-height: 40px;}

</style>

<div class="main">
<h1>Admin Panel-User Mange</h1>
<?php 
	if(isset($dblUser))
	{
		echo $dblUser;
	}

	if(isset($enblUser))
	{
		echo $enblUser;
	}
	if(isset($remUser))
	{
		echo $remUser;
	}

?>

	<div class="manageuser">
		<table class="tblone">
			<tr>
				<th>No</th>
				<th>Name</th>
				<th>Username</th>
				<th>Email</th>
				<th>Action</th>
			</tr>
<?php 
	$getUser = $usr->getAllUser();
	if($getUser != FALSE)
	{
		$i = 0;
		while($value = $getUser->fetch_assoc())
		{
?>			
			<tr>
			<?php 
				if($value['status'] == 1)
				{
			?>
					<td><?php echo "<span class='error'> ".++$i." </span>"; ?></td>
			<?php	

				}else{
			?>		
					<td><?php echo "<span class=''> ".++$i." </span>"; ?></td>
			<?php		
				}
			?>

				
				<td><?php echo $value['name'];  ?></td>
				<td><?php echo $value['username'];  ?></td>
				<td><?php echo $value['email'];  ?></td>
				<td>
				<?php 
					if($value['status'] == 0)
					{
				?>
					<a onclick="return confirm('Are You sure to Disable');" href="?dis=<?php  echo $value['userId'];  ?>">Disable</a>
				<?php	

					}else{
				?>
				<a onclick="return confirm('Are You sure to Disable');" href="?enb=<?php  echo $value['userId'];  ?>">Enable</a>
				<?php		
					}
				?>	
					
					
					|| <a onclick="return confirm('Are You sure to Disable');"  href="?rem=<?php echo $value['userId'];  ?>">Remove</a>
				</td>
			</tr>
<?php } } ?>			
		</table>
	</div>


	
</div>
<?php include 'inc/footer.php'; ?>