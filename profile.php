<?php
$filepath = realpath(dirname(__FILE__));
include_once($filepath."/inc/header.php");
 // include 'inc/header.php';
  ?>
 <?php 
 	// login check.....................
 Session::checkUserSession();
 ?> 
 <?php 
 	$profile = $usr->getProfileById($userId);
 	if($profile)
 	{
 		$value = $profile->fetch_assoc();
 	}
 ?>
 <style type="text/css">
 	.profile {
	width: 488px;
	border: 1px solid #ddd;
	margin: 0px auto 10px;
	padding-left: 138px;
	padding-top: 30px;
	padding-bottom: 30px;
}
 </style>
<div class="main">
<h1>your Profile</h1>
	
	<div class="profile">
		
		<div id="display"></div>
		<div class="empty" style="display: none;">Field Can't empty !!</div>
		<div class="disable" style="display: none;">Invalid Email Address</div>
		<div class="error" style="display: none;">Profile update Fail!</div>
		<div class="success" style="display: none;">Successfully Profile Update</div>
		
	<form action="" method="post">
		<table class="tbl">  

			<tr>
			 
			   <td><input id="udtuserId" type="hidden" value="<?php echo $value['userId']; ?>"></td>
			 </tr>  

			 <tr>
			   <td>Name</td>
			   <td><input id="udtname" type="text" value="<?php echo $value['name']; ?>"></td>
			 </tr>
			  <tr>
			   <td>Username</td>
			   <td><input id="udtusername" type="text" value="<?php echo $value['username']; ?>"></td>
			 </tr>
			
			  <tr>
			   <td>Email</td>
			   <td><input id="udtemail" type="text" value="<?php echo $value['email']; ?>"></td>
			 </tr>
			
			  <tr>
			  <td></td>
			   <td><input type="submit" id="profileUdt" value="Profile Update">
			   </td>
			 </tr>
       </table>
	   </form>
	  
	</div>
	
</div>
<?php include 'inc/footer.php'; ?>