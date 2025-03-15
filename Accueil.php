<?php 
session_start();
?>
<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
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
  <main>
    <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="../images/pageaccueil/essect1.jpg" height="600" class="d-block w-100" alt="ESSECT">
        </div>
        <div class="carousel-item">
          <img src="../images/pageaccueil/enactus1.jpg" height="600" class="d-block w-100" alt="Enactus">
        </div>
        <div class="carousel-item">
          <img src="../images/pageaccueil/fahmoulougia1.jpg" height="600" class="d-block w-100" alt="Fahmoulougia">
        </div>
        <div class="carousel-item">
          <img src="../images/pageaccueil/infolab1.jpg" height="600" class="d-block w-100" alt="Infolab">
        </div>
        <div class="carousel-item">
          <img src="../images/pageaccueil/radio1.jpg" height="600" class="d-block w-100" alt="ESSECT FM">
        </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
      <br><br>
    </div>
      <div class="card text-bg-info mb-3" style="width: 60rem; margin-left: 100px;">
        <div class="card-header" style=" background-color: rgb(176, 227, 244); font-weight: bold; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; color: rgb(116, 93, 145);">Vie estudiantine à l'ESSECT</div>
        <div class="card-body" style=" background-color: rgb(176, 227, 244); color: rgb(91, 7, 129);">
          <div class="card-text" style="font-size: 18px;">L'Ecole Supérieure des Sciences Economiques et Commerciales de Tunis est une faculté publique tunisienne affiliée à l'Université de Tunis. <br> Elle connaît une vie estudiantine animée et bien chargée, qui se reflète à travers 4 clubs : Enactus, Fahmoulougia, Infolab, et ESSECT FM.<br> Ce site est dédié exclusivement à la présentation complète et détaillée de chacun d'eux. Il vous offre aussi la possibilité d'y postuler.</div>
        </div>
    </div><br>
    <div class="row row-cols-1 row-cols-md-3 g-4">
      <div class="col">
        <div class="card" style="width: 300px; margin-left: 50px;">
          <img src="../images/pageaccueil/enactuslogo.jpg" height="200" class="card-img-top" alt="Enactus">
          <div class="card-body">
            <h5 class="card-title" style="color: rgb(205, 205, 3);">Enactus</h5>
            <a href="../pages/Enactus.php">
            <button type="button" class="btn btn-outline-warning">Cliquez pour plus de détails...</button></a>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="card" style="width: 300px; margin-left: -100px;">
          <img src="../images/pageaccueil/fahmoulougialogo.png" height="200" class="card-img-top" alt="Fahmoulougia">
          <div class="card-body">
            <h5 class="card-title" style="color:rgb(56, 113, 189)">Fahmoulougia</h5>
            <a href="../pages/Fahmoulougia.php" >
            <button type="button" class="btn btn-outline-primary">Cliquez pour plus de détails...</button></a>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="card" style="width: 300px; margin-left: -250px;">
          <img src="../images/pageaccueil/infolablogo.jpg" height="200" class="card-img-top" alt="Infolab">
          <div class="card-body">
            <h5 class="card-title" style="color:rgb(112, 16, 203)">InfoLab</h5>
            <a href="../pages/Infolab.php">
              <button type="button" class="btn btn-outline-secondary">Cliquez pour plus de détails...</button>
            </a>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="card" style="width: 300px; margin-left: 1150px; margin-top: -330px;">
          <img src="../images/pageaccueil/radiologo.jpg" height="200" class="card-img-top" alt="ESSECT FM">
          <div class="card-body">
            <h5 class="card-title" style="color: rgb(53, 178, 53);">ESSECT FM</h5>
            <a href="../pages/Radio.php">
              <button type="button" class="btn btn-outline-success">Cliquez pour plus de détails...</button>
            </a>
          </div>
        </div>
      </div>
    </div><br><br>
    <div class="alert alert-danger" role="alert" id="postulation">
      Vous voulez postuler pour un club ? Cliquez ici-bas &#128071
    </div><br>
    <?php if (isset($_SESSION['login'])):?>
    <a href="../views/Postulation.html">
    <button type="button" class="btn btn-primary btn-lg" style="margin-left: 650px; 
    background: linear-gradient(90deg,rgb(180, 71, 216),rgb(250, 97, 179));
    height: 60px;">Postuler pour un club</button></a>
    <?php else: ?>
      <a href="../views/connexion.html">
    <button type="button" class="btn btn-primary btn-lg" style="margin-left: 650px; 
    background: linear-gradient(90deg,rgb(180, 71, 216),rgb(250, 97, 179));
    height: 60px;">Postuler pour un club</button></a>
    <?php endif;?>
    <br><br><br>
  </main>
  <footer >
    <div> &copy; 2025 ESSECT - Tous droits réservés </div>
</footer>
</body>
</html>