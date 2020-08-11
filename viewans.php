<?php include 'inc/header.php'; ?>
<?php 
 	// login check.....................
 Session::checkUserSession();
 ?>

<?php 
	$viewQust = $exm->getViewQuestion();
?>

<div class="main">
<h1>All Question & ANS : <?php echo $viewQust->num_rows; ?></h1>
	<div class="test">
	
		<table> 
		<?php 
			if($viewQust != FALSE)
			{
				while ($value = $viewQust->fetch_assoc()) {
				
		?>
			<tr>
				<td colspan="2">
				 <h3>Que <?php echo $value['qustNo'] ?>: <?php echo $value['qust'] ?></h3>
				</td>
			</tr>
		<?php 
			$ans = $exm->getAnsById($value['qustNo']);
			if($ans != FALSE)
			{
				while($value1 = $ans->fetch_assoc())
				{
		?>
			<tr>
				<td>
			<?php 
				 if($value1['rightAns'] == 1)
					{
			?>		
				 <input type="radio"  /><?php echo "<span style='color:blue;'>".$value1['ans']."</span>" ?>
			<?php } else{ ?>	 
				 <input type="radio"  /><?php echo $value1['ans'] ?>
			<?php } ?>	 
				
				</td>
			</tr>
		<?php }	} ?>
	<?php } } ?>		
		</table>
</div>
 </div>
<?php include 'inc/footer.php'; ?>