<?php


?>





<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="/assets/css/register.css">
    

    <title>Create</title>
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
            <a class="nav-link active text-white" aria-current="page">
              <i class="bi bi-search"></i>
              Mes recherches
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link text-white">
              <i class="bi bi-chat-text"></i>
              Mes messages
            </a>
          </li>

             <?php if (isset($_SESSION['user'])) { ?>  
          <li class="nav-item">
          <a class="nav-link text-white" href="index.php?url=favoris">
         <i class="bi bi-heart-fill"></i>
            Favoris
           </a>
          </li>

       <?php } else { ?>
  <li class="nav-item">
    <a class="nav-link text-white" href="index.php?url=login">
      <i class="bi bi-heart-fill"></i>
      Favoris
    </a>
  </li>
<?php } ?>


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

        </ul>
      </div> <!-- /.navbar-collapse -->
    </div> <!-- /.container-fluid -->
  </nav>

  <main>
    <div class="inscriptionUser">
      <div class="infosUser">
        <h5>Création d'une annonce</h5>

        <form class="row g-3" action="/index.php?url=create" method="post" enctype="multipart/form-data" novalidate>

          <div class="mb-3">
            <label for="Titre" class="form-label">Titre</label>
            <span class="ms-2 text-danger fst-italic fw-light"><?= $errors["Titre"] ?? '' ?></span>
            <input type="text" class="form-control" id="Titre" name="Titre" placeholder="Titre"
                   value="<?= $_POST["Titre"] ?? "" ?>">
          </div>

          <div class="mb-3">
            <label for="Desc" class="form-label">Description</label>
            <span class="ms-2 text-danger fst-italic fw-light"><?= $errors["Desc"] ?? '' ?></span>
            <textarea class="form-control" id="Desc" name="Desc" rows="3"><?= $_POST["Desc"] ?? "" ?></textarea>
          </div>

          <div class="mb-3">
            <label for="Prix" class="form-label">Prix temporaire</label>
            <span class="ms-2 text-danger fst-italic fw-light"><?= $errors["Prix"] ?? '' ?></span>
            <input type="text" class="form-control" id="Prix" name="Prix" placeholder="Prix"
                   value="<?= $_POST["Prix"] ?? "" ?>">
          </div>

          <div class="mb-3">
            <label for="Photo" class="form-label">Ajouter une photo</label>
            <span class="ms-2 text-danger fst-italic fw-light"><?= $errors["Photo"] ?? '' ?></span>
            <input class="form-control" type="file" name="Photo" id="Photo">
          </div>

          <div class="d-grid gap-2">
            <button class="btn btn-primary" type="submit">Creez votre annonce</button>
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
            <li><i class="bi bi-telephone-fill"></i> 07 06 75 02 01</li>
            <li><i class="bi bi-geo-alt-fill"></i> Le Havre, France</li>
          </ul>
        </div>
      </div>
      <hr class="border-light">
      <div class="text-center">
        2025 lebondeal — Tous droits réservés.
      </div>
    </div>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"
          integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q"
          crossorigin="anonymous"></script>
</body>


</html>