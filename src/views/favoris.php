<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css"
        rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <title>Document</title>
</head>
<body>
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
          <a class="nav-link text-white" href="index.php?url=create">
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
          <a class="nav-link disabled text-white" aria-disabled="true">
            <i class="bi bi-heart-fill"></i>
            Favoris
          </a>
        </li>

        <?php if (isset($_SESSION['user'])) { ?>
          
          <li class="nav-item">
            <a class="nav-link text-white" href="#">
              <i class="bi bi-person-fill"></i>
              <?= htmlspecialchars($_SESSION['user']['username']); ?>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white" href="index.php?url=logout">
              <i class="bi bi-box-arrow-right"></i>
              Déconnexion
            </a>
          </li>
        <?php } else { ?>
        
          <li class="nav-item">
            <a class="nav-link text-white" href="index.php?url=login">
              <i class="bi bi-person-fill"></i>
              Se connecter
            </a>
          </li>
        <?php } ?>

        </nav>

        <h4> Mes favoris </h4>
         
        <main>

        <div class="row justify-content-center d-flex flex-wrap">
        <?php foreach ($annonces as $test) { ?>
          <div class="col-lg-4 m-5">
            <div class="card text-center">
              <img src="/uploads/<?= $test['a_picture'] ?>"  
                class="card-img-top"
                alt="Image de <?= $test['a_picture'] ?>">
              <div class="card-body">
                <h5 class="card-title"><?= $test['a_title'] ?></h5>
                <p>Prix: <?= $test['a_price'] ?> €</p>
                <a href="index.php?url=details/<?= $test['a_id'] ?>"
                  class="btn btn-dark">Voir les détails</a>
                 <a href="index.php?url=favoris/<?= $test['a_id'] ?>"
                  class="btn btn-danger">Supprimer des favoris </a> 
              </div>
            </div>
          </div>
        <?php } ?>
      </div>
            
        </main>












<footer class="text-white mt-5" style="background-color:#ec5a13;">
  <div class="container py-4">
    <div class="row">
      
      <div class="col-md-4 mb-3">
        <h5 class="fw-bold">lebondeal</h5>
        <p class="mb-0">Votre site de petites annonces en ligne.</p>
      </div>
      
      <div class="col-md-4 mb-3">
        <h5 class="fw-bold">Informations</h5>
        <ul class="list-unstyled">
          <li><a href="index.php?url=rav" class="text-white text-decoration-none">Mentions légales</a></li>
          <li><a href="index.php?url=rav" class="text-white text-decoration-none">Politique de confidentialité</a></li>
          <li><a href="index.php?url=rav" class="text-white text-decoration-none">Conditions générales d’utilisation</a></li>
        </ul>
      </div>
      
      <div class="col-md-4 mb-3">
        <h5 class="fw-bold">Contact</h5>
        <ul class="list-unstyled">
          <li><i class="bi bi-envelope-fill"></i> contact@lebondeal.fr</li>
          <li><i class="bi bi-telephone-fill"></i> 07 06 75 02 01 </li>
          <li><i class="bi bi-geo-alt-fill"></i> Le Havre,France</li>
        </ul>
      </div>
    </div>
    
    <hr class="border-light">
    
    <div class="text-center">
      2025 lebondeal — Tous droits réservés.
    </div>
  </div>
</footer>

    
</body>
</html>