<!-- KIRJAUTUMISSIVU -->
<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>Kirjautuminen</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <div class="header">
  	<h2>Kirjautuminen</h2>
  </div>
	 
  <form method="post" action="login.php">
  	<?php include('errors.php'); ?>
  	<div class="input-group">
  		<label>Käyttäjänimi</label>
  		<input type="text" name="username" >
  	</div>
  	<div class="input-group">
  		<label>Salasana</label>
  		<input type="password" name="password">
  	</div>
  	<div class="input-group">
  		<button type="submit" class="btn" name="login_user">Kirjaudu</button>
  	</div>
  	<p>
  		Etkö ole vielä jäsen? <a href="register.php">Rekisteröidy tästä!</a>
  	</p>
  </form>
</body>
</html>