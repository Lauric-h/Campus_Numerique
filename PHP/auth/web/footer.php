
<footer>

<div>

<?php 
require_once 'class/Compteur.php';
$compteur = new Compteur($compteur);
$compteur->increment();
$vues = $compteur->get();
?>

</div>



</footer>