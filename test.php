<?php include 'inc/header.php'; ?>
<?php 
 	// login check.....................
 Session::checkUserSession();
 ?>
<?php 
	if(isset($_GET['p']))
	{
		$qustNo = (int)$_GET['p'];
	}
	else{
		header("Location: exam.php");
	}
?>
<?php 
	$total = $exm->getAllQuestion();
	$question = $exm->getQuestionByNo($qustNo);
?>
<?php 
	if($_SERVER['REQUEST_METHOD'] == 'POST' AND isset($_POST['submit']))
	{
		$dataProcess = $pro->processDate($_POST);
	}
?>
<div class="main">
<h1> Question <?php echo $question['qustNo'] ?> of <?php echo $total->num_rows; ?></h1>
	<div class="test">
		<form method="post" action="">
		<table> 
			<tr>
				<td colspan="2">
				 <h3>Que <?php echo $question['qustNo'] ?>: <?php echo $question['qust'] ?></h3>
				</td>
			</tr>
		<?php 
			$ans = $exm->getAnsById($qustNo);
			if($ans != FALSE)
			{
				while($value = $ans->fetch_assoc())
				{
		?>
			<tr>
				<td>
				 <input type="radio" name="ansId" value="<?php echo $value['id'];  ?>" /><?php echo $value['ans'] ?>
				 <input type="hidden" name="qustNo" value="<?php echo $value['qustNo'] ?>">
				</td>
			</tr>
		<?php }	} ?>

			<tr>
			  <td>
				<input type="submit" name="submit" value="Next Question"/>
				<!-- <input type="hidden" name="number"/> -->
			</td>
			</tr>
			
		</table>
</div>
 </div>
<?php include 'inc/footer.php'; ?>