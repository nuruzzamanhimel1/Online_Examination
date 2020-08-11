<?php
$filepath = realpath(dirname(__FILE__));
include_once($filepath."/inc/header.php");
 // include 'inc/header.php';
  ?>
 <?php 
 	// login check.....................
 Session::checkUserLogin();
 ?> 
<div class="main">
<h1>Online Exam System - User Login</h1>
	<div class="segment" style="margin-right:30px;">
		<img src="img/test.png"/>
	</div>
	<div class="segment">
		<div class="empty" style="display: none;">Field Can't empty !!</div>
		<div class="disable" style="display: none;">You can't login !!</div>
		<div class="error" style="display: none;">Email and Password not match !!</div>
		<div class="success" style="display: none;">Successfully login</div>
	<form action="" method="post">
		<table class="tbl">    
			 <tr>
			   <td>Email</td>
			   <td><input id="logemail" type="text"></td>
			 </tr>
			 <tr>
			   <td>Password </td>
			   <td><input id="logpassword" type="password"></td>
			 </tr>
			 
			  <tr>
			  <td></td>
			   <td><input type="submit" id="userlogin" value="Login">
			   </td>
			 </tr>
       </table>
	   </form>
	   <p>New User ? <a href="register.php">Signup</a> Free</p>
	</div>


	
</div>
<?php include 'inc/footer.php'; ?>