<?php
// header("Refresh:5; url=index.php?url=home");
?>


<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>lebondeal</title>

    <!-- cdn bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

    <!-- cdn icones bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">

</head>

<body class="d-flex flex-column vh-100">

<nav class="navbar navbar-expand-lg" style="background-color:#ec5a13" data-bs-theme="light">
    <div class="container-fluid">
      <a class="navbar-brand text-white fw-bold" href="index.php?url=home">lebondeal</a>

      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">

          <li class="nav-item">
          
          <a class="nav-link text-white" href="index.php?url=register">
    <i class="bi bi-plus-square-dotted"></i>
    Déposer une annonce
</a>

          </li>

          <li class="nav-item">
            <a class="nav-link active text-white" aria-current="page" href="#">
              <i class="bi bi-search"></i>
              Mes recherches
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link text-white" href="#">
              <i class="bi bi-chat-text"></i>
              Mes messages
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link text-white" href="index.php?url=login">
             <i class="bi bi-person-fill"></i>
              Se connecter 
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link disabled text-white"  aria-disabled="true"> 
                 <i class="bi bi-heart-fill"></i>
              
              Favoris 
            </a>
          </li>
        </ul>

        <form class="d-flex" role="search" method="get" action="/recherche">
          <label for="navbar-search" class="visually-hidden">Recherche</label>
          <input id="navbar-search" name="search" class="form-control me-2" type="search"
            placeholder="Rechercher " aria-label="Search" autocomplete="on"
            inputmode="search" enterkeyhint="search" required>
          <button class="btn btn-dark" type="submit">Rechercher</button>
        </form>
      </div>
    </div>
  </nav>




    <main class="container py-4">

        <h1 class="text-center">C'est BON</h1>

        <div class="row justify-content-center">

            <div class="col-6">

                <p>Vous avez bien été deconnecté.</p>

                <p> Vous allez etre redirigés. </p>                

            </div>

        </div>

    </main>

    <img src="/public/assets/create sucess.jpg" alt="">





  
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>

</html>