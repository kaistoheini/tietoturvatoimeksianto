<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>Rekisteröityminen</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <div class="header">
  	<h2>Rekisteröidy</h2>
  </div>
	
  <form method="post" action="register.php">
  	<?php include('errors.php'); ?>
  	<div class="input-group">
  	  <label>Käyttäjänimi</label>
  	  <input type="text" name="username" value="<?php echo $username; ?>">
  	</div>
  	<div class="input-group">
  	  <label>Etunimi</label>
  	  <input type="firstname" name="firstname" value="<?php echo $firstname; ?>">
  	</div>
      <div class="input-group">
  	  <label>Sukunimi</label>
  	  <input type="lastname" name="lastname" value="<?php echo $lastname; ?>">
  	</div>
  	<div class="input-group">
  	  <label>Salasana</label>
  	  <input type="password" name="password">
  	</div>
  	<div class="input-group">
  	  <button type="submit" class="btn" name="reg_user">Rekisteröidy!</button>
  	</div>
  	<p>
  		Oletko jo jäsen? <a href="login.php">Kirjaudu täältä!</a>
  	</p>
  </form>
</body>
</html>