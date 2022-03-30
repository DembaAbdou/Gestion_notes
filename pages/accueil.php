<?php

  if($_SESSION['role']==null){
    header('location:?page=login');
  }

?>
<div class="mt-5">
<div class="jumbotron jumbotron-fluid">
  <div class="container text-center">
    <h1 class="display-4 font-weight-bold">GESTION NOTES</h1>
    <h3 class="mb-5">Application de gestion de notes pour les étudiants</h3>
    <img src="./static/image/school.jpg" alt="logo_school">
  </div>
</div>
</div>