<?php 

if (!isset($_GET['page'])) {
  header("Location: ../index.php?page=cv");
}

// head variables
$title = 'Mon CV';
$css = 'web/styles/style_CV.css';
$metakeywords = 'lauric, cv, recrutement, développeur';    
$metadescription = 'Le parcours de Lauric';    

require 'templates/header.php'; ?>

  <div class="container title__main">
    <!-- Logo -->
    <h1 class="title__text">Lauric Helfferich</h1>
  </div>

  <!-- Présentation -->
  <section class="container presentation">
    <img class="block__img" src="web/img/lauric_cv.jpg" alt="Lauric avec un lac et une montagne en arrière-plan">
    <h2 class="container__subtitle presentation__title">Hello World,</br> je m’appelle Lauric</h2>
    <p class="block__text presentation__text">Issu d’une formation en tourisme, je suis désormais en reconversion professionnelle au Campus Numérique in the Alps, en tant que Technicien Développeur.</p>
  </section>
    
  <!-- Compétences -->
  <section class="container competences">
    <img class="block__img competences__img"src="web/img/competences.jpg" alt="Un plateau avec plein de fruits et légumes">
    <h2 class="container__subtitle competences__title">Compétences</h2>
    <ul class="block__text competences__list" id="competences__list">
      <li>Savoir anticiper les besoins</li>
      <li>Être à l'écoute</li>
      <li>Avoir le client au coeur des préoccupations</li>
      <li>Savoir gérer les priorités</li>
      <li>Être capable de coordonner</li>
      <li>Avoir un esprit d'initiative</li>
    </ul>
  </section>

  <!-- Expériences -->
  <section class="container experience">
    <img class="block__img" src="web/img/Experiences.jpg" alt="Cuisinier en train de verser de dresser une assiette">
    <h2 class="container__subtitle experience__title">Expériences</h2>
    <table class="block__text experience__table">
      <caption class="experience__table__caption">Tableau de mes expériences pro</caption>
      <tr class="experience__table__row">
        <th class="experience__table__cell">2018 - 2019</th>
        <td class="experience__table__cell">Voyageurs du Monde</td>
      </tr>    
        <th class="experience__table__cell">Paris</th>
        <td class="experience__table__cell">Assistant de production</td>
      </tr>
      <tr class="experience__table__row">
        <th class="experience__table__cell">2016 - 2017</th>
        <td class="experience__table__cell">JPdL</td>
      </tr>
      <tr>
        <th class="experience__table__cell">Québec</th>
        <td class="experience__table__cell">Coordonnateur événementiel</td>
      </tr>
      <tr class="experience__table__row">
        <th class="experience__table__cell">2013 - 2016</th>
        <td class="experience__table__cell">Decathlon</td>
      </tr>
      <tr>
        <th class="experience__table__cell">Paris</th>
        <td class="experience__table__cell">Hôte de caisse / accueil</td>
      </tr>
    </table>
  </section>

<?php require 'templates/footer.php'; ?>