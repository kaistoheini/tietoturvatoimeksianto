<?php 
  session_start(); 

  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "Sinun täytyy kirjautua sisään ensin!";
  	header('location: login.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: login.php");
  }
?>
<!DOCTYPE html>
<html>
<head>
	<title>Etusivu</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<div class="header">
	<h2>Etusivu</h2>
</div>
<div class="content">
  	<!-- VIRHEILMOITUKSET -->
  	<?php if (isset($_SESSION['success'])) : ?>
      <div class="error success" >
      	<h3>
          <?php 
          	echo $_SESSION['success']; 
          	unset($_SESSION['success']);
          ?>
      	</h3>
      </div>
  	<?php endif ?>

    <!-- KÄYTTÄJÄN KIRJAUTUMISSIVU -->
    <?php  if (isset($_SESSION['username'])) : ?>
    	<p>Tervetuloa <strong><?php echo $_SESSION['username']; ?></strong></p>
    	<p> <a href="index.php?logout='1'" style="color: red;">Kirjaudu ulos</a> </p>
    <?php endif ?>
</div>
	
</body>
</html>