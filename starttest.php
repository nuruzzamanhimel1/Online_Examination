<?php include 'inc/header.php'; ?>
<?php
	// login check.....................
Session::checkUserSession();

$question = $exm->getQuestion();
$total = $exm->getAllQuestion();
?>
<div class="main">
	<h1>Welcome to Online Exam </h1>
	<div class="starttest">
		<h2>Test your knowlage</h2>
		<p>This is a multiple choice quize to test your knowlage.</p>
		<ul>
			<li><strong>Nummber of question:</strong><?php echo $total->num_rows; ?></li>
			<li><strong>Question Type:</strong>Multiple choice</li>
		</ul>
		<a href="test.php?p=<?php echo $question['qustNo']; ?>">Start Test</a>
	</div>
	
</div>
<?php include 'inc/footer.php'; ?>