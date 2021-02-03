<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="keywords" content=<?= $metakeywords ?>>
  <meta name="description" content= <?php echo $metadescription ?>>
  <meta name="robots" content="index, follow">
  <script src="https://kit.fontawesome.com/264c9e1633.js" crossorigin="anonymous"></script>
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Prompt:wght@300;400;500;600&display=swap" rel="stylesheet"> 
  <link rel="stylesheet" href=<?php echo $css ?>>
  <title><?php echo $title ?></title>
</head>
<body>
  <header class="header">
    <div class="container container--header">
      <nav class="header__nav nav__mobile">
        <i class="fas fa-bars"></i>
      </nav>

      <!-- nav for desktop -->
      <nav>
        <ul class="header__nav nav__desktop">
          <li class="nav__desktop__item"><a class="nav__desktop__item__link"  href="index.php">Accueil</a></li>
          <li class="nav__desktop__item"><a class="nav__desktop__item__link"  href="index.php?page=cv">Mon CV</a></li>
          <li class="nav__desktop__item"><a class="nav__desktop__item__link"  href="index.php?page=contact">Me contacter</a></li>
        </ul>
      </nav>
      <!-- -->

    </div>
  </header>