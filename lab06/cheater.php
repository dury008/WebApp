<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Grade Store</title>
		<link href="https://selab.hanyang.ac.kr/courses/cse326/2019/labs/labResources/gradestore.css" type="text/css" rel="stylesheet" />
	</head>

	<body>

		<?php
		# Ex 4 :
		# Check the existence of each parameter using the PHP function 'isset'.
		# Check the blankness of an element in $_POST by comparing it to the empty string.
		# (can also use the element itself as a Boolean test!)
		if (empty($_POST["name"]) or empty($_POST["id"]) or empty($_POST["course"]) or empty($_POST["card_num"]) or empty($_POST["card"])){
		?>
			<h1>Sorry</h1>
			<p>You didn't fill out the form completely. <a href ="gradestore.html">Try again?</a></p>

		<?php
		# Ex 5 :
		# Check if the name is composed of alphabets, dash(-), ora single white space.
	} elseif (!preg_match('/[a-zA-Z- ]/',$_POST["name"])) {
		?>
			<h1>Sorry</h1>
			<p>You didn't provide a valid name. <a href ="gradestore.html">Try again?</a></p>



		<?php
		# Ex 5 :
		# Check if the credit card number is composed of exactly 16 digits.
		# Check if the Visa card starts with 4 and MasterCard starts with 5.
	} elseif (!preg_match("/[0-9]{16}/",$_POST["card_num"])) {
		?>
			<h1>Sorry</h1>
			<p>You didn't provide a valid credit card number. Try again?</p>
		<?php

	} elseif(($_POST["card"] == "visa" and !preg_match("/^4/",$_POST["card_num"])) or ($_POST["card"] == "mastercard" and !preg_match("/^5/",$_POST["card_num"]))){
		?>
		<h1>Sorry</h1>
		<p>You didn't provide a valid credit card number. Try again?</p>
		<?php

	} else{
		?>

			<h1>Thanks, looser!</h1>
			<p>Your information has been recorded.</p>

			<!-- Ex 2: display submitted data -->
			<ul>
				<li>Name: <?=$_POST["name"]?></li>
				<li>ID: <?=$_POST["id"]?></li>
				<!-- use the 'processCheckbox' function to display selected courses -->
				<li>Course: <?= processCheckbox($_POST["course"])?></li>
				<li>Grade: <?=$_POST["grade"]?></li>
				<li>Credit : <?=$_POST["card_num"]." (".$_POST["card"].")"?></li>
			</ul>

			<!-- Ex 3 :
				<p>Here are all the loosers who have submitted here:</p> -->
			<?php
				$filename = "loosers.txt";
				file_put_contents("loosers.txt",$_POST["name"].";".$_POST["id"].";".$_POST["card_num"].";".$_POST["card"]."\n", FILE_APPEND);
			?>
			<pre>
				<?=file_get_contents("loosers.txt")?>
			</pre>
			<!-- Ex 3: Show the complete contents of "loosers.txt".
				 Place the file contents into an HTML <pre> element to preserve whitespace -->


			<?php
		}
		?>

		<?php
			/* Ex 2:
			 * Assume that the argument to this function is array of names for the checkboxes ("cse326", "cse107", "cse603", "cin870")
			 *
			 * The function checks whether the checkbox is selected or not and
			 * collects all the selected checkboxes into a single string with comma separation.
			 * For example, "cse326, cse603, cin870"
			 */
			function processCheckbox($names){
				for($i = 0 ; $i < count($names) ; $i++){
					print $names[$i];
					if($i != count($names)-1){
						print ", ";
					}
				}
			 }
		?>

	</body>
</html>
