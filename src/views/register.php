<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
         <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr"
      crossorigin="anonymous"
    />
    <title>Création d'un compte </title>
</head>
<body>

  <nav
        class="navbar navbar-expand-lg"
        style="background-color: #ec5a13"
        data-bs-theme="light"
      >
        <div class="container-fluid">
          <a class="navbar-brand text-white" href="#">LeBonCoin</a>
          <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent"
            aria-expanded="false"
            aria-label="Toggle navigation"
          >
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a
                  class="nav-link active text-white"
                  aria-current="page"
                  href="#"
                  >Accueil</a
                >
              </li>
              <li class="nav-item">
                <a class="nav-link text-white" href="#">Se connecter</a>
              </li>
              <li class="nav-item dropdown">
                <a
                  class="nav-link dropdown-toggle text-white"
                  href="#"
                  role="button"
                  data-bs-toggle="dropdown"
                  aria-expanded="false"
                >
                  jsp
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="#">Action</a></li>
                  <li><a class="dropdown-item" href="#">Another action</a></li>
                  <li><hr class="dropdown-divider" /></li>
                  <li>
                    <a class="dropdown-item" href="#">Something else here</a>
                  </li>
                </ul>
              </li>
              <li class="nav-item">
                <a class="nav-link disabled text-white" aria-disabled="true"
                  >S'inscrire</a
                >
              </li>
            </ul>
            <form class="d-flex" role="search">
              <input
                class="form-control me-2"
                type="search"
                placeholder="Vasy"
                aria-label="Search"
              />
              <button class="btn btn-outline-success" type="submit">
                Rechercher
              </button>
            </form>
          </div>
        </div>
      </nav>


      <main>


        <div class="inscriptionUser">
      
<div class="infosUser">

    <h5> Création d'un compte </h5>

       <form action="" method="POST"> 
<form class="row g-3">
 <div class="mb-3">
          <label for="exampleFormControlInput1" class="form-label">
            E-mail*</label
          >
          <input
            type="email"  class="form-control" name="email"id="exampleFormControlInput1"  placeholder="exemple.exemple@gmail.com"        />
        </div>

        
  <div class="col-12">
    <label for="inputAddress" class="form-label">Pseudo</label>
    <input type="text" class="form-control" name="pseudo" id="inputAddress" placeholder="jsp">
  </div>
  
<label for="inputPassword5" class="form-label">Mot de passe</label>
<input type="password" name="motDePasse" id="inputPassword5" class="form-control" aria-describedby="passwordHelpBlock">

<label for="inputPassword5" class="form-label"> Confirmation de mot de passe </label>
<input type="password" name="motDePasse" id="inputPassword5" class="form-control" aria-describedby="passwordHelpBlock">



<div class="d-grid gap-2">
  <button class="btn btn-primary" type="submit">S'inscrire</button>
 
</div>















</form>
      </main>




    
</body>
</html>