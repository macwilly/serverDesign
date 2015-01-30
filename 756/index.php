<?php
	$feedback = "";
	if(isset($_POST["submit"])){
		if(empty($_POST["contactName"]) || strlen($_POST["contactName"])<2){
			$feedback = "Please enter your name.<br/>";
		}
		if(empty($_POST["contactEmail"])){
			$feedback .="Please enter an email.<br />";
		}
		if(!preg_match("/^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/",
		 $_POST["contactEmail"])){
			$feedback .="Please enter a valid email.<br />";
		}
		if(empty($_POST["contactPhone"])){
			$feedback.="Please enter a phone number.<br />";
		}
		if(empty($_POST["contactComment"])){
			$feedback.="Please enter a comment I would love to hear from you.";
		}
	}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="">
</head>
<body>
<h1>Welcome to the Casa</h1>
<h2>Links to come here!</h2>
<ul>
    <li>Link 1</li>
    <li>Link 2</li>
</ul>
<hr />
<?php 
	echo $feedback;
?>
<section>
	<p>If you are interested in contacting me please submit information below</p>
	<form name="contactMe" id="contactMe" method="post" action="index.php">
		Name: <input type="text" name="contactName" /><br/>
		Email: <input type="email" name="contactEmail"placeholder="email@something.com" /><br/>
		Phone: <input type='tel' pattern='[\(]\d{3}[\)]\d{3}[\-]\d{4}' placeholder="(###)###-####" name="contactPhone" ><br/>
		Comment: <textarea name="contactComment" readonly="4" cols="30" ></textarea><br/>
		<input type="reset" value="Clear Form">
		<input type="submit" name="submit" value="Send the Info">
	</form>
</section>

</body>
</html>