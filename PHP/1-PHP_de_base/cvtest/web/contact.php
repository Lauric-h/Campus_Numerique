<?php 
include "functions.php";
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
  if (!isset($_GET['page'])) {
    header("Location: ../index.php?page=contact");
  } 
} else if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  
  // writes form infos to file
  writeData(); 

  // error variables
  $nameErr = $emailErr = $messageErr = $reasonErr = $fileErr = '';  

  // set session variables
  $_SESSION['status'] = $_POST["status"];
  $_SESSION['name'] = testInput($_POST["name"]);
  $_SESSION['email'] = testInput($_POST["email"]);
  $_SESSION['message'] = testInput($_POST["message"]);
  $_SESSION['reason'] = testInput($_POST["reason"]);

  // check for valid inputs  
  if (isEmpty($_POST["name"], "nom") || validateName($_POST["name"]) == false) {
    $nameIsValid = false;
    $nameErr = 'Nom invalide';
  } else {
    $nameIsValid = true;
  }

  if (isEmpty($_POST["email"], "email") || validateEmail() == false) {
    $emailIsValid = false;
    $emailErr = 'Email non valide';
  } else {
    $emailIsValid = true;
  }

  if (isEmpty($_POST["message"], "message") || validateMessage($_POST["message"]) == false) {
    $messageIsValid = false;
    $messageErr = 'Message invalide (5 caractères minimum)';
  } else {
    $messageIsValid = true;
  }

  if (isEmpty($_POST["reason"], "motif")) {
    $reasonIsValid = false;
    $reasonErr = 'Ajoutez un motif';
  } else {
    $reasonIsValid = true;
  }

  // empty fields if form is valid
  if (validateForm($nameIsValid, $emailIsValid, $messageIsValid, $reasonIsValid)) {
    $_SESSION['name'] = "";
    $_SESSION['email'] = "";
    $_SESSION['reason'] = "";
    $_SESSION['message'] = "";
  }

  // uploaded file
  $directory = "storage/";
  $filePath = $directory . basename($_FILES['userfile']['name']);
  $uploadOk = 1;
  $fileType = strtolower(pathinfo($filePath, PATHINFO_EXTENSION));

  //check if file exists
  if (file_exists($filePath)) {
    $fileErr = "le fichier existe déjà";
    $uploadOk = 0;
  }

  // check for file size
  if ($_FILES['userfile']['error'] == 1) {
    $fileErr = "fichier trop lourd";
    $uploadOk = 0;
  }

  // check for file format
  if ($fileType != "jpg" && $fileType != "png" && $fileType != "jpeg" && $fileType != "pdf" && $fileType != "gif") {
    $fileErr = "Format de fichier invalide";
    $uploadOk = 0;
  }

  if ($uploadOk == 0) {
    $fileErr = "Votre fichier n'a pas pu être envoyé";
  } else {
    move_uploaded_file($_FILES['userfile']['tmp_name'], $filePath);
  }

}

// Head variables
$title = 'Me contacter';
$css = 'web/styles/style_contact.css';
$metakeywords = 'lauric, cv, recrutement, contact';    
$metadescription = 'Contactez Lauric';   

include 'templates/header.php';

?>

<main class="container container--main">

    <div class="title">
      <h1 class="title__title">Contact</h1>
      <p class="title__body">Une question, suggestion, avis ? Utilisez le formulaire de contact ci-dessous et nous répondrons aussi vite qu'on vous livre vos plats !</p>
    </div>

    <form enctype="multipart/form-data" action="" method="POST" class="form">
      <fieldset class="form__fieldset">
        <legend class="form__fieldset__legend">Coordonnées</legend>

        <label for="nom">Civilité</label>
        <select name="status">
          <option value="married">Marié</option>
          <option value="single">Célibataire</option>
          <option value="widowed">Veuf</option>
        </select>
        
        <label for="name"><br>Prénom</label>
        <p class="error"><?= $nameErr ?></p>
        <input type="text" name="name" autocomplete="off" value="<?php echo $_SESSION['name']; ?>">

        <label for="email">Votre email</label>
        <p class="error"><?= $emailErr ?></p>
        <input type="email" name="email" placeholder="nom@email.com" autocomplete="off" value="<?php echo $_SESSION['email']; ?>">
      </fieldset>

      <fieldset>
        <legend>Raison du contact</legend>
          <p class="error"><?= $reasonErr ?></p>
          <label for="complaint">Réclamation</label>
          <input type="radio" name="reason" id="complaint" value="complaint">

          <label for="compliment">Compliment</label>
          <input type="radio" name="reason" id="compliment" value="compliment">

          <label for="idea">Idée</label>
          <input type="radio" name="reason" id="idea" value="idea">
      </fieldset>
      
      <label for="message">Message</label>
      <p class="error"><?= $messageErr ?></p>
      <textarea name="message" placeholder="Votre message..."  autocomplete="off"><?php echo $_SESSION['message']; ?></textarea>

      <!-- Upload files -->
      <label for="userfile">Joindre un fichier</label>

      <input type="file" name="userfile">
      <p class="error"><?= $fileErr ?></p>
      <button class="button button--form">Envoyer →</button>

    </form>

    <section class="social">
      <h2 class="social__title">Retrouvez-nous sur nos réseaux</h2>
      <div class="social__list">
        <a href="http://www.facebook.fr" target="_blank"><i class="fab fa-facebook"></i></a>
        <a href="http://www.twitter.com" target="_blank"><i class="fab fa-twitter-square"></i></a>
        <a href="http://www.instagram.com" target="_blank"><i class="fab fa-instagram"></i></a>
      </div>
    </section>
  
<?php include 'templates/footer.php'; ?>
