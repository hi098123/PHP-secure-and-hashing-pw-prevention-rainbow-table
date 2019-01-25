<!DOCTYPE html>
<html>
<head>
	<meta https-equiv="Content-Type" content="text/html" charset="utf-8"/>
	<meta name="robots" content="index,nofollow">
	<title>login</title>
	<meta https-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="./index.css">
</head>
<body>
<?php
	if(!isset($_SESSION))
		session_start();
	if(!isset($_SESSION['id'])){ ?>
		<div class="login">
			<form action="./login.php" method="post" autocomplete="off">
				<div class="idpw">
					<input type="text" name="id" placeholder=" ID">
					<input type="password" name="pw" placeholder=" Password">
				</div>
				<input type="submit" value="Login" id="lbtn" style="float: right;">
			</form>
		</div>
		<?php
	}else{ echo $_SESSION['id'] ?> <a href="./login.php?logout=logout" class="noselect" id="lbtn" style="text-decoration: none;padding: 0px 10px;">Logout</a>
		<?php 
	}
?>
	<hr>
	<div>
		<p>here is like search or board, just showing enter word</p>
		<div>
			<form action="./" method="post" autocomplete="off">
				<input type="text" name="text" placeholder="">
				<input type="submit" value="submit" id="lbtn">
			</form>
		</div>
		
		<p>here: <?php if(isset($_REQUEST['text'])) echo $_REQUEST['text']; ?></p>
	</div>
</body>
</html>