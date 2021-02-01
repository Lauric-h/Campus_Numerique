<?php 

if (!isset($_GET['page'])) {
    header("Location: ../index.php?page=home");
  }

//head variable
$title = 'Home';
?>

<div>
    <a href="index.php?page=cv">Voir le cv</a>
    <a href="index.php?page=contact">Contact</a>
</div>


