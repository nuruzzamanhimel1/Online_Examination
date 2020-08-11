<?php 
    $filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/inc/header.php');
	include_once ($filepath.'/../classes/Exam.php');

	$ex = new Exam();
?>
<?php 
if($_SERVER['REQUEST_METHOD'] == 'POST' AND isset($_POST['submit']))
	{
		$qustAdd = $ex->addQuestion($_POST);
	}
?>
<?php 
	$total = $ex->totalRow();
	if($total != FALSE)
	{
		$lstNumber = $total+1;
	}
	
?>
<style type="text/css">
	.adminPanel{width: 500px; border: 1px solid #ddd; margin: 30px auto 0; padding:20px; line-height: 40px;}

</style>

<div class="main">
<h1>Admin Panel-Add Question</h1>

<div class="adminPanel">

	<?php 
	if(isset($qustAdd))
	{
		echo $qustAdd;
	}

?>
	
	<form action="" method="post">
		<table>
			<tr>
				<td>Question No</td>
				<td>:</td>
				<td><input type="number" name="qustNo" value="<?php if(isset($lstNumber)){echo $lstNumber;}  ?>"></td>
			</tr>
			<tr>
				<td>Question </td>
				<td>:</td>
				<td><input type="text" name="qust" placeholder="Enter Question"></td>
			</tr>
			<tr>
				<td>Choice One</td>
				<td>:</td>
				<td><input type="text" name="ans1" placeholder="Enter Choice One"></td>
			</tr>
				<tr>
				<td>Choice Two</td>
				<td>:</td>
				<td><input type="text" name="ans2" placeholder="Enter Choice Two"></td>
			</tr>
				<tr>
				<td>Choice Three</td>
				<td>:</td>
				<td><input type="text" name="ans3" placeholder="Enter Choice Three"></td>
			</tr>
				<tr>
				<td>Choice Four</td>
				<td>:</td>
				<td><input type="text" name="ans4" placeholder="Enter Choice Four"></td>
			</tr>
			</tr>
				<tr>
				<td>Correct NO</td>
				<td>:</td>
				<td><input type="number" name="rightAns" ></td>
			</tr>
			<tr>
				<td colspan="3"  align="center">
					<input type="submit" name="submit" value="Add new question">
				</td>
			</tr>
		</table>
	</form>

</div>



	
</div>
<?php include 'inc/footer.php'; ?>