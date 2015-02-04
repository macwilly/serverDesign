<?php
	$error = "";
	$succes = "";
	if(isset($_POST["submit"])){
		if(empty($_POST["contactName"]) || strlen($_POST["contactName"])<2){
			$error = "Please enter your name.<br/>";
		}
		if(empty($_POST["contactEmail"])){
			$error .="Please enter an email.<br />";
		}
		if(!preg_match("/^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/",
		 $_POST["contactEmail"])){
			$error .="Please enter a valid email.<br />";
		}
		if(empty($_POST["contactPhone"])){
			$error.="Please enter a phone number.<br />";
		}
		if (!preg_match("/^\D?(\d{3})\D?\D?(\d{3})\D?(\d{4})$/", $_POST["contactPhone"])){
			$error.="Please match the phone number properly. <br />";
		}
		if(empty($_POST["contactComment"])){
			$error.="Please enter a comment I would love to hear from you.";
		}
		
		if($error ==""){
			$succes = '<div id="succes">'."Your information has successfully sent you will receive an email shortly.";
			$succes .= "</div><hr />";
			//mail('mtw2935@rit.edu',)
		}
	}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="./css/homePage.css">
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
	if($error !=""){
		echo '<div id="error">';
		echo $error;
		echo "</div><hr />";
	}
	echo $succes;
?>
<section>
	<p>If you are interested in contacting me please submit information below</p>
	<form name="contactMe" id="contactMe" method="post" action="index.php">
		Name: <input type="text" name="contactName" /><br/>
		Email: <input type="email" name="contactEmail"placeholder="email@something.com" /><br/>
		Phone: <input type='tel' pattern='\D?(\d{3})\D?\D?(\d{3})\D?(\d{4})' placeholder="(###)###-####" name="contactPhone" ><br/>
		Comment: <textarea name="contactComment" rows="4" cols="30" placeholder="Please leave a comment!" ></textarea><br/>
		<input type="reset" value="Clear Form">
		<input type="submit" name="submit" value="Send the Info">
	</form>
</section>

</body>
</html>