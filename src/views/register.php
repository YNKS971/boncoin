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
          <a class="nav-link active text-white" aria-current="page" href="#">Accueil</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="#">Se connecter</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            jsp
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><hr class="dropdown-divider" /></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled text-white" aria-disabled="true">S'inscrire</a>
        </li>
      </ul>

      <form class="d-flex" role="search" method="get" action="/recherche">
        <label for="navbar-search" class="visually-hidden">Recherche</label>
        <input
          id="navbar-search"
          name="q"
          class="form-control me-2"
          type="search"
          placeholder="Vasy"
          aria-label="Search"
          autocomplete="on"
          inputmode="search"
          enterkeyhint="search"
          required
        />
        <button class="btn btn-outline-success" type="submit">Rechercher</button>
      </form>
    </div>
  </div>
</nav>

<main>
  <div class="inscriptionUser">
    <div class="infosUser">
      <h5>Création d'un compte</h5>

      <form class="row g-3" action="/inscription" method="POST" novalidate>
        <div class="mb-3">
          <label for="email" class="form-label">E-mail*</label>
          <input
            type="email"
            class="form-control"
            id="email"
            name="email"
            placeholder="exemple.exemple@gmail.com"
            autocomplete="email"
            required
          />
        </div>

        <div class="col-12">
          <label for="pseudo" class="form-label">Pseudo</label>
          <input
            type="text"
            class="form-control"
            id="pseudo"
            name="pseudo"
            placeholder="jsp"
            autocomplete="username"
          />
        </div>

        <div class="col-12">
          <label for="password" class="form-label">Mot de passe</label>
          <input
            type="password"
            class="form-control"
            id="password"
            name="password"
            autocomplete="new-password"
            required
            minlength="8"
            aria-describedby="passwordHelpBlock"
          />
          <div id="passwordHelpBlock" class="form-text">
            8 caractères minimum.
          </div>
        </div>

        <div class="col-12">
          <label for="passwordConfirm" class="form-label">Confirmation de mot de passe</label>
          <input
            type="password"
            class="form-control"
            id="passwordConfirm"
            name="password_confirm"
            autocomplete="new-password"
            required
            minlength="8"
          />
        </div>

        <div class="d-grid gap-2">
          <button class="btn btn-primary" type="submit">S'inscrire</button>
        </div>
      </form>
    </div>
  </div>
</main>
</body>