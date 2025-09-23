

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css"
        rel="stylesheet" />
    <link rel="stylesheet" href="/assets/css/profil.css">
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

        <!-- ICI le bloc connexion / utilisateur -->
        <?php if (isset($_SESSION['user'])): ?>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle text-white" href="#" id="navbarUser" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              <i class="bi bi-person-fill"></i>
              <?php echo htmlspecialchars($_SESSION['user']['username']); ?>
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarUser">
              <li>
                <a class="dropdown-item" href="index.php?url=home">
                  <i class="bi bi-box-arrow-right"></i> Se déconnecter
                </a>
              </li>
            </ul>
          </li>
        <?php else: ?>
          <li class="nav-item">
            <a class="nav-link text-white" href="index.php?url=login">
              <i class="bi bi-person-fill"></i>
              Se connecter
            </a>
          </li>
        <?php endif; ?>
        <!-- FIN bloc connexion / utilisateur -->

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
          placeholder="Rechercher " aria-label="Search" autocomplete="on"
          inputmode="search" enterkeyhint="search" required>
        <button class="btn btn-dark" type="submit">Rechercher</button>
      </form>
    </div>
  </div>
</nav>


    <?php
   
    ?>

    <h1> Votre PROFIL </h1>
     <?php

// var_dump($_SESSION);
// var_dump($annonces);
//  var_dump($user);

?>


    <h5> Mes annonces </h5>
    <main>





        <div class="myAnnonces">



            <div class="row justify-content-center d-flex flex-wrap">
                <?php foreach ($annonces as $test) { ?>
                    <div class="col-lg-3 m-2">
                        <div class="card text-center">

                  

                      <img src="/uploads/<?= $test['a_picture'] ?>"

                                class="card-img-top"

                                alt="Image de <?= $test['a_picture'] ?>">

                            <div class="card-body">
                                <h5 class="card-title"><?= $test['a_title'] ?></h5>

                                <p>Prix: <?= $test['a_price'] ?> €</p>
                                <a href="index.php?url=details/<?= $test['a_id'] ?>"
                                    class="btn btn-dark">Voir les détails</a>

                                <a href="index.php?url=delete/<?= $test['u_id'] ?>"
                                    class="btn btn-danger">Supprimer</a>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>

    </main>

    <div class="vide">



    <footer>


    </footer>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-2R1bQq6d5x5r7kM4a0mQ1yC1qv2nG1rQ9TQn8i2Q0H8dS7t0yJp3F0qIY8zWg5aS" crossorigin="anonymous"></script>

</body>

</html>