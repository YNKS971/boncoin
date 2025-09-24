<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css"
    rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
  <link rel="stylesheet" href="/assets/css/register.css">
 
  <title>Création d'un compte </title>
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
          <a class="nav-link text-white" href="index.php?url=login">
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

        <li class="nav-item">
          <a class="nav-link disabled text-white" aria-disabled="true">
            <i class="bi bi-heart-fill"></i>
            Favoris
          </a>
        </li>
      </ul>

      <form class="d-flex" role="search" method="get" action="/recherche">
        <label for="navbar-search" class="visually-hidden">Recherche</label>
        <input id="navbar-search" name="search" class="form-control me-2" type="search"
          placeholder="Rechercher" aria-label="Search" autocomplete="on"
          inputmode="search" enterkeyhint="search" required>
        <button class="btn btn-dark" type="submit">Rechercher</button>
      </form>
    </div>
  </div>
</nav>

  <main>
    <div class="inscriptionUser">
      <div class="infosUser">
        <h5>Création d'un compte</h5>

        <form class="row g-3" action="/index.php?url=register" method="post" novalidate>
          <div class="mb-3">
            <label for="email" class="form-label">E-mail*</label> <span class="ms-2 text-danger fst-italic fw-light"><?= $errors["email"] ?? '' ?></span>
            <input
              type="email" class="form-control" id="email"
              name="email" placeholder="exemple.exemple@gmail.com" value="<?= $_POST["email"] ?? "" ?>">

          </div>

          <div class="col-12">
            <label for="pseudo" class="form-label">Pseudo</label> <span class="ms-2 text-danger fst-italic fw-light"><?= $errors["username"] ?? '' ?></span>
            <input
              type="text" class="form-control" id="pseudo"
              name="username" placeholder="jsp" value="<?= $_POST["username"] ?? "" ?>">

          </div>

          <div class="col-12">
            <label for="password" class="form-label">Mot de passe</label> <span class="ms-2 text-danger fst-italic fw-light"><?= $errors["password"] ?? '' ?></span>
            <input type="password" class="form-control" id="password" name="password" value="<?= $_POST["password"] ?? "" ?>">



          </div>

          <div class="col-12">
            <label for="passwordConfirm" class="form-label">Confirmation de mot de passe</label> <span class="ms-2 text-danger fst-italic fw-light"><?= $errors["passwordConfirm"] ?? '' ?></span>
            <input type="password" class="form-control" id="passwordConfirm" name="passwordConfirm" value="<?= $_POST["passwordConfirm"] ?? "" ?>">


          </div>

          <div class="d-grid gap-2">
            <button class="btn btn-primary" type="submit">S'inscrire</button>
            <a class="d-block mt-2" href="index.php?url=login">Déjà inscrit ? Je me connecte !</a>
            <span class="ms-2 text-danger fst-italic fw-light"><?= $errors["server"] ?? '' ?></span>

          </div>

        </form>
      </div>
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
          <li><a href="index.php?url=mentions-legales" class="text-white text-decoration-none">Mentions légales</a></li>
          <li><a href="index.php?url=politique-confidentialite" class="text-white text-decoration-none">Politique de confidentialité</a></li>
          <li><a href="index.php?url=cgu" class="text-white text-decoration-none">Conditions générales d’utilisation</a></li>
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


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>