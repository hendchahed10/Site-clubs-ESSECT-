<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>ESSECT FM</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
        <link href="style.css" rel="stylesheet">
    </head>
<body>
    <nav>
    <ul>
    <li><a href="../pages/Accueil.php"><img src="logo.jpg" height="70" style="float: right; position: relative;  top: -20px;"></a></li>
    <li><a href="../pages/Accueil.php">Accueil</a></li>
    <li><a href="../pages/Enactus.php">Enactus</a></li>
    <li><a href="../pages/Fahmoulougia.php">Fahmoulougia</a></li>
    <li><a href="../pages/Infolab.php">InfoLab</a></li>
    <li><a href="../pages/Radio.php">ESSECT FM</a></li>
    <?php if (isset($_SESSION['login'])):?>
    <li><a href="../views/Postulation.html">Postuler pour un club</a></li>
    <?php else: ?>
      <li><a href="../views/connexion.html">Postuler pour un club</a></li>
      <?php endif;?>
    <?php if (isset($_SESSION['login'])):?>
      <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            <img src="login.png" height="55" style="float: right; position: relative;  top: -7px; margin-right:40px">
          </button>
          <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel" style="background-color:aliceblue;">
            <div class="offcanvas-header">
              <h5 class="offcanvas-title" id="offcanvasNavbarLabel" style="color: rgb(117, 27, 150)">Gestion du compte</h5>
              <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
              <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                <li class="nav-item">
                  <a class="nav-link active" href="../deconnexion.php" style="color:rgb(161, 127, 193)">Déconnexion</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="../suppression.php" style="color:rgb(161, 127, 193)" onclick="return confirm('Etes-vous sûr(e) ?');">Supprimer le compte</a>
                </li>
           </div>
    <?php else: ?>
        <li><a href="../views/connexion.html"><img src="login.png" height="55" style="float: right; position: relative;  top: -5px;"></a></li>
    <?php endif;?>
  </ul>
      </nav>
    <header style="background-color: rgb(122, 187, 122);">
        <h1 style="color: rgb(206, 255, 206);">ESSECT FM</h1>
        <a href="https://www.facebook.com/share/169g9yhcAc/?mibextid=qi2Omg"><i class="bi bi-facebook" style= "color: rgb(15, 66, 31);"></i></a>
        <a href="https://www.instagram.com/club_radio_essect_fm?igsh=MXE2Ym9tNDR6cGFidA=="><i class="bi bi-instagram" style= "color: rgb(15, 66, 31);"></i></a>
        <a href="https://www.tiktok.com/@essect_fm?_t=ZM-8uOhEW2cgQX&_r=1"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-tiktok" viewBox="0 0 16 16" style="color:rgb(15, 66, 31);">
            <path d="M9 0h1.98c.144.715.54 1.617 1.235 2.512C12.895 3.389 13.797 4 15 4v2c-1.753 0-3.07-.814-4-1.829V11a5 5 0 1 1-5-5v2a3 3 0 1 0 3 3z"/>
          </svg></a>
    </header>
    <div id="carouselExampleIndicators" class="carousel slide">
        <div class="carousel-indicators">
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="../images/pageradio/Radio2.jpg" height="600" class="d-block w-100" alt="...">
          </div>
          <div class="carousel-item">
            <img src="../images/pageradio/Radio3.jpg" height="600" class="d-block w-100" alt="...">
          </div>
          <div class="carousel-item">
            <img src="../images/pageradio/Radio4.jpg" height="600" class="d-block w-100" alt="...">
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
    <section>
        <p>╰─➤Tout fraîchement créé en janvier 2025, ESSECT FM (ou encore club radio ESSECT), comme son nom l'indique, est un club qui s'occupe essentiellement de la diffusion de musique au sein de l'école.</p>
        <p>C'est un club événementiel dont la mission principale est d'animer et de pimenter l'ambiance à la fac, et ce par la diffusion de la musique dans ses espaces, que ce soit pendant les pauses, les événements ou les journées spéciales, afin de créer une ambiance dynamique et agréable pour les étudiants et le personnel.</p>
        <p>Ils organisent également des évènements, que ce soit à l'intérieur de l'école ou dans des lieux externes.</p>
    </section>
    <img src="../images/pageradio/radiobureau.jpg" width="1600" height="1200">
    <img src="../images/pageradio/radiobureau2.jpg" width="1600" height="1200">
    <section>
        <h2>Activités organisées durant le courant mandat</h2>
        <h3>Activités internes du club :</h3>
        <ul>
            <li>Journée d'intégration</li>
        </ul>
        <h3>Événements organisés :</h3>
        <ul>
            <li>Événement Saint-Valentin</li>
        </ul>
    </section>
    
    <section>
        <h2>Départements</h2>
        <ul>
            <li>Événementiel</li>
            <li>Diffusion</li>
            <li>Marketing</li>
            <li>Finance</li>
        </ul>
    </section>
    <?php if (isset($_SESSION['login'])):?>
    <a href="Postulation.html">
    <button type="button" class="btn btn-primary btn-lg" style="margin-left: 650px; 
    background: linear-gradient(90deg,rgb(180, 71, 216),rgb(250, 97, 179));
    height: 60px;">Postuler pour un club</button></a>
    <?php else: ?>
      <a href="connexion.html">
    <button type="button" class="btn btn-primary btn-lg" style="margin-left: 650px; 
    background: linear-gradient(90deg,rgb(180, 71, 216),rgb(250, 97, 179));
    height: 60px;">Postuler pour un club</button></a>
    <?php endif;?>
    <br><br><br>
    <footer>
        <div> &copy; 2025 ESSECT - Tous droits réservés </div>
    </footer>
</body>
</html>
