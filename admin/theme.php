<?php 
    $filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/inc/header.php');
	include_once ($filepath.'/../classes/ThemeChange.php');

	$thm = new ThemeChange();
?>
<?php 


if($_SERVER['REQUEST_METHOD'] == 'POST' AND isset($_POST['submit']))
	{
		$udttheme = $thm->themeUpdate($_POST);
		// echo $_POST['theme'];
	}
	$check = $thm->checkedTheme();
?>
<style type="text/css">
	.adminPanel{width: 500px; border: 1px solid #ddd; margin: 30px auto 0; padding:20px; line-height: 40px;}

</style>

<div class="main">
<h1>Admin Panel-Theme</h1>

<div class="adminPanel">

	<?php 
	if(isset($udttheme))
	{
		echo $udttheme;
	}

?>
	
	<form action="" method="post">
		<table>
			<tr>
				<td><input type="radio" name="theme"  value="default" <?php if($check['theme_name'] == 'default'){echo 'checked';} ?>></td>
				<td>Default</td>
			</tr>
			<tr>
				<td><input type="radio" name="theme"  value="red" <?php if($check['theme_name'] == 'red'){echo 'checked';} ?> ></td>
				<td>Red</td>
			</tr>
			<tr>
				<td><input type="radio" name="theme" id="green" value="green" <?php if($check['theme_name'] == 'green'){echo 'checked';} ?> ></td>
				<td>Green</td>
			</tr>
			<tr>
				<td><input type="radio" name="theme" id="blue" value="blue" <?php if($check['theme_name'] == 'blue'){echo 'checked';} ?> ></td>
				<td>Blue</td>
			</tr>
			
			<tr>
				<td colspan="3"  align="center">
					<input type="submit" name="submit" value="Add Theme">
				</td>
			</tr>
		</table>
	</form>

</div>



	
</div>
<?php include 'inc/footer.php'; ?>