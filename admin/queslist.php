<?php 
    $filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/inc/header.php');
	include_once ($filepath.'/../classes/Exam.php');

	$ex = new Exam();
?>
<?php 
	if(isset($_GET['remNo']))
	{
		$qus_no =(int)$_GET['remNo'];
		// echo $qus_no;
		// exit();
		$rmvQust = $ex->removeQuestion($qus_no);
	}


?>


<div class="main">
<h1>Admin Panel- Question List</h1>
<?php 
	if(isset($rmvQust))
	{
		echo $rmvQust;
	}

?>

	<div class="quelist">
		<table class="tblone">
			<tr>
				<th width="10%">No</th>
				<th width="70%">Question</th>
				<th width="20%">Action</th>
				
			</tr>
<?php 
	$getQust = $ex->getAllQuestion();
	if($getQust != FALSE)
	{
		$i = 0;
		while($value = $getQust->fetch_assoc())
		{
?>			
			<tr>
					
			<td><?php echo ++$i; ?></td>
		

				
				<td><?php echo $value['qust'];  ?></td>
				
				<td>
					 <a onclick="return confirm('Are You sure to Remove??');"  href="?remNo=<?php echo $value['qustNo'];  ?>">Remove</a>
				</td>
			</tr>
<?php } } ?>			
		</table>
	</div>


	
</div>
<?php include 'inc/footer.php'; ?>