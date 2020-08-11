<?php include 'inc/header.php'; ?>
<?php
	// login check.....................
Session::checkUserSession();

$question = $exm->getQuestion();
$total = $exm->getAllQuestion();
?>
<div class="main">
	<h1>Your are done !!</h1>
	<div class="starttest">
		<h2>Test your knowlage</h2>
		<p>Congratulation ! You have just complete your test</p>
		<ul>
			<li><strong>Final Score :</strong><?php if(isset($_SESSION['score'])){ echo $_SESSION['score'] ; unset($_SESSION['score']);} ?></li>
			<!-- <li><strong>Question Type:</strong>Multiple choice</li> -->
		</ul>
		<a href="viewans.php">View Answer</a>
		<a href="starttest.php">Start Test</a>

	</div>
	
</div>
<?php include 'inc/footer.php'; ?>