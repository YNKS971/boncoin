<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
 
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
  <link rel="stylesheet" href="style.css">
  <title>lebondeal — Accueil</title>
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


  
        <div class="col-lg-5">
         
          
        </div>
      </div>
    </div>
  </section>


  <section class="py-5">
    <div class="container">
      <h2 class="h3 mb-4">Parcourir par catégories</h2>
      <div class="row g-3 row-cols-2 row-cols-sm-3 row-cols-md-4 row-cols-lg-6">
       
        <div class="col">
          <a class="text-decoration-none" href="/recherche?cat=vehicules">
            <div class="card h-100 text-center border-0 shadow-sm">
              <div class="card-body">
                <i class="bi bi-car-front fs-1"></i>
                <h3 class="h6 mt-2 mb-0 text-dark">Véhicules</h3>
              </div>
            </div>
          </a>
        </div>

        <div class="col">
          <a class="text-decoration-none" href="/recherche?cat=immobilier">
            <div class="card h-100 text-center border-0 shadow-sm">
              <div class="card-body">
                <i class="bi bi-house-door fs-1"></i>
                <h3 class="h6 mt-2 mb-0 text-dark">Immobilier</h3>
              </div>
            </div>
          </a>
        </div>

        <div class="col">
          <a class="text-decoration-none" href="/recherche?cat=multimedia">
            <div class="card h-100 text-center border-0 shadow-sm">
              <div class="card-body">
                <i class="bi bi-laptop fs-1"></i>
                <h3 class="h6 mt-2 mb-0 text-dark">Multimédia</h3>
              </div>
            </div>
          </a>
        </div>

        <div class="col">
          <a class="text-decoration-none" href="/recherche?cat=maison">
            <div class="card h-100 text-center border-0 shadow-sm">
              <div class="card-body">
                <i class="bi bi-sofa fs-1"></i>
                <h3 class="h6 mt-2 mb-0 text-dark">Maison</h3>
              </div>
            </div>
          </a>
        </div>

        <div class="col">
          <a class="text-decoration-none" href="/recherche?cat=loisirs">
            <div class="card h-100 text-center border-0 shadow-sm">
              <div class="card-body">
                <i class="bi bi-bicycle fs-1"></i>
                <h3 class="h6 mt-2 mb-0 text-dark">Loisirs</h3>
              </div>
            </div>
          </a>
        </div>

        <div class="col">
          <a class="text-decoration-none" href="/recherche?cat=emploi">
            <div class="card h-100 text-center border-0 shadow-sm">
              <div class="card-body">
                <i class="bi bi-briefcase fs-1"></i>
                <h3 class="h6 mt-2 mb-0 text-dark">Emploi</h3>
              </div>
            </div>
          </a>
        </div>
      </div>
    </div>
  </section>

  


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-2R1bQq6d5x5r7kM4a0mQ1yC1qv2nG1rQ9TQn8i2Q0H8dS7t0yJp3F0qIY8zWg5aS" crossorigin="anonymous"></script>

 
</body>

</html>
