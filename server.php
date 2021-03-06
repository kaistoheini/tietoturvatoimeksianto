<?php

session_start();

// MUUTTUJIEN ALUSTAMINEN:
$username = "";
$password = "";
$firstname = "";
$lastname = "";
$errors = array(); 

// MUODOSTETAAN TIETOKANTAYHTEYS:
$dbcon = mysqli_connect('localhost', 'root', '', 'v0kahe03');

// REKISTERÖIDÄÄN KÄYTTÄJÄ:
if (isset($_POST['reg_user'])) {
  // Input-arvot lomakkeelta:
  $username = mysqli_real_escape_string($dbcon, $_POST['username']);
  $firstname = mysqli_real_escape_string($dbcon, $_POST['firstname']);
  $lastname = mysqli_real_escape_string($dbcon, $_POST['lastname']);
  $password = mysqli_real_escape_string($dbcon, $_POST['password']);

  // VARMISTETAAN, ETTÄ LOMAKE ON OIKEIN TÄYTETTY:
  if (empty($username)) { array_push($errors, "Käyttäjänimi vaaditaan!"); }
  if (empty($firstname)) { array_push($errors, "Etunimi vaaditaan!"); }
  if (empty($lastname)) { array_push($errors, "Sukunimi vaaditaan!"); }
  if (empty($password)) { array_push($errors, "Salasana vaaditaan!"); }

  // TARKISTETAAN TIETOKANNASTA, ETTEI KÄYTTÄJÄNIMI OLE VARATTU:
  $user_check_query = "SELECT * FROM user WHERE username='$username' LIMIT 1";
  $result = mysqli_query($dbcon, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
   // ILMOITUS, JOS KÄYTTÄJÄNIMI ON VARATTU:
    if ($user['username'] === $username) {
      array_push($errors, "Käyttäjänimi on varattu.");
    }
  
  // REKISTERÖIDÄÄN KÄYTTÄJÄ, JOS LOMAKKEELLA EI OLE VIRHEITÄ:
  if (count($errors) == 0) {
    $password = md5($password); // Salataan salasana

    $query = $dbcon->prepare("INSERT INTO user (username, password) VALUES (?,?)");
    $query->bind_param("ss", $username, $password); // Bindataan parametrit
    $query->execute();

    $query2 = $dbcon->prepare("INSERT INTO info (username, firstname, lastname) VALUES (?, ?, ?)");
    $query2->bind_param("sss", $username, $firstname, $lastname);
    $query2->execute();

    $_SESSION['username'] = $_POST["username"];
    $_SESSION['firstname'] = $firstname;
    $_SESSION['lastname'] = $lastname;
    $_SESSION['success'] = "Olet kirjautunut sisään!";
    header('location: index.php');
  }
}

  // KÄYTTÄJÄN KIRJAUTUMINEN:
if (isset($_POST['login_user'])) {
    $_SESSION['username'] = $username;
    $_SESSION['firstname'] = $firstname;
    $_SESSION['lastname'] = $lastname;
    $_SESSION['password'] = $password;

    $username = mysqli_real_escape_string($dbcon, $_POST['username']);
    $password = mysqli_real_escape_string($dbcon, $_POST['password']);
  
    // ILMOITUKSET, JOS KÄYTTÄJÄNIMEÄ/SALASANAA EI OLE SYÖTETTY:
    if (empty($username)) {
        array_push($errors, "Käyttäjänimi vaaditaan!");
    }
    if (empty($password)) {
        array_push($errors, "Salasana vaaditaan!");
    }
  
    if (count($errors) == 0) {
        $password = md5($password);

        $query = "SELECT * FROM user WHERE username='$username' AND password='$password'";
        $results = mysqli_query($dbcon, $query);

        if (mysqli_num_rows($results) == 1) {
          $query2 = "SELECT * FROM info WHERE username='$username'";
          $results = mysqli_query($dbcon, $query2);

          $_SESSION['username'] = $_POST["username"];
          $_SESSION['firstname'] = $firstname;
          $_SESSION['lastname'] = $lastname;
          $_SESSION['success'] = "Olet nyt kirjautunut sisään!";
          header('location: index.php');
        }else {
            array_push($errors, "Väärä käyttäjänimi tai salasana!");
        }
    }
}
    if (isset($_POST['update_user'])) {
        $username = $_SESSION['username'];
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
    
        // PÄIVITETÄÄN KÄYTTÄJÄN TIEDOT:
        if (count($errors) == 0) { 
            $password = md5($password); 
    
            $query = "UPDATE info SET firstname='$firstname', lastname='$lastname' WHERE username='$username'";
            $result = mysqli_query($dbcon, $query);
    
            $_SESSION['username'] = $username;
            $_SESSION['firstname'] = $firstname;
            $_SESSION['lastname'] = $lastname;
            $_SESSION['success'] = "Tietosi on päivitetty!";
            header('location: index.php');
        }
    }
?>
