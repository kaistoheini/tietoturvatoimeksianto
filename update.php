<!-- KÄYTTÄJÄTIETOJEN PÄIVITYSSIVU -->
<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>Tietojen päivitys</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <div class="header">
  	<h2>Tietojen päivitys</h2>
  </div>
	
  <form method="post" action="update.php">
  	<?php include('errors.php'); ?>
    <div class="input-group">
  	  <label>Etunimi</label>
  	  <input type="firstname" name="firstname">
  	</div>
    <div class="input-group">
  	  <label>Sukunimi</label>
  	  <input type="lastname" name="lastname">
  	</div>
  	<div class="input-group">
  	  <button type="submit" class="btn" name="update_user">Päivitä</button>
  	</div>
  	<p>
      Pääset palaamaan omiin tietoihisi <a href="index.php">tästä</a>!
  	</p>
  </form>

  
</body>
</html>