<?php
	$error = "";
	$succes = "";
	$header = "Cc:".$_POST['contactEmail']."\r\n";
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
			foreach($_POST as $key =>$value){
				$message.=$key.": ".$value."<br />";
			}
			mail("mtw2935@rit.edu","Contact form",$message, $header);
			
		}
	}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="./css/homePage.css" >
	<link href="./media/images/favicon.ico" rel="icon" type="image/x-icon" />
</head>
<body>
<h1>Welcome to the Casa</h1>
<img id="profilePic" src="./media/images/profilPic.jpg" alt="Silhouette of a man with a beautiful beard" height="300"width="300" >
<p>My name is Mackenzie Willard. I am from Rochester ,NY. I received my Bachelor of Science degree in American Sign Language Interpreting in 2013.
   I am currently in the ISTE MS degree with a concentration in Web Development and Databases and will be graduating May 2015. I have recently started
   growing out my beard to longer lengths, and I am thinking about seeing what kind of competitions are in the area that I would be able to participate in.
   If you wish to contact my please fill out the form <b>below</b> or email me at mtw2935[at]rit[dot]edu.   
 </p>
<div id ="homeWork">
     <h2>Home work</h2>
     <ul>
        <li>Link 1</li>
        <li>Link 2</li>
     </ul>
</div>
<div id="project">
     <h2>Projects</h2>
     <ul>
         <li>Link 1</li>
	     <li>Link 2</li>
     </ul>
</div>
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
		Name: <input type="text" name="contactName" value="<?php echo $_POST['contactName'];?>"/><br/>
		Email: <input type="email" name="contactEmail"placeholder="email@something.com" value="<?php echo $_POST['contactEmail'];?>" /><br/>
		Phone: <input type='tel' pattern='\D?(\d{3})\D?\D?(\d{3})\D?(\d{4})' placeholder="(###)###-####" name="contactPhone" value="<?php echo $_POST['contactPhone'];?>"><br/>
		Comment: <textarea name="contactComment" rows="4" cols="30" placeholder="Please leave a comment!"value="<?php echo $_POST['contactComment'];?>" ></textarea><br/>
		<input type="reset" value="Clear Form">
		<input type="submit" name="submit" value="Send the Info">
	</form>
</section>

</body>
</html>