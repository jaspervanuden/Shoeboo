<?php include_once "connection.php";

//dit stuk haalt de data op
$sql = "SELECT * FROM `shoes` WHERE `gen` = 'populair'";
$stmt = $conn->prepare($sql);
$stmt->execute();
//haal alle data op en knal die in een variabele genaam results
$results = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Shoeboo</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Bootstrap icons-->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css"
      rel="stylesheet"
    />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
      crossorigin="anonymous"/>
      <link rel="stylesheet" href="style/style.css">
  </head>
  <body>
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container px-4 px-lg-5">
        <a class="navbar-brand" href="#!">Shoeboo</a>
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
          <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
            <li class="nav-item">
              <a class="nav-link fw-bolder aria-current="page" href="index.php">Home</a>
            </li>
            <li class="nav-item"><a class="nav-link" href="men.php">men</a></li>
            <li class="nav-item"><a class="nav-link" href="women.php">women</a></li>
            <li class="nav-item"><a class="nav-link" href="about.php">About</a></li>
          </ul>
          <form class="d-flex">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
              <li class="nav-item"><a class="nav-link" href="login.php">
                <?php echo  isset($_SESSION["username"]) ? 'welkom ' .$_SESSION["username"] : 'login' ?>
              </a></li>
              <li class="nav-item"><a class="nav-link" href="logout.php">logout</a></li>
          </ul>        
            <button>
            <a class="link-item text-dark" href="cart.php">
              <i class="bi-cart-fill me-1 nav-item"></i>
             Cart 
              <span class="badge bg-dark text-white ms-1 rounded-pill">4</span>
              </a>
            </button>
          </form>
        </div>
      </div>
    </nav>
    <!-- Header-->
    <header class="bg-dark py-5">
      <div class="container px-4 px-lg-5 my-5">
        <div class="text-center text-white">
          <div class="af1">
            <img src="img/af1.png" alt="" />
            <div class="centered">
              <h1 class="display-4 fw-bolder text-light">Shoeboo</h1>
            </div>
          </div>
          <p class="lead fw-normal text-white-50 mb-0">The king of shoes</p>
        </div>
      </div>
    </header>
    <!-- Section-->
    <section class="py-5">
      <div class="container px-4 px-lg-5 mt-5">
      <h1 class="text-center">most populair</h1>
      <br>
        <div
          class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center"
        >
        <?php foreach($results as $res){   ?>

          <div class="col mb-5">
            <div class="card h-100">
              <!-- Product image-->
              <img
                class="card-img-top"
                src="img/<?php echo $res['img']?>"
                alt="..."
              />
              <!-- Product details-->
              <div class="card-body p-4">
                <div class="text-center">
                  <!-- Product name-->
                  <h5 class="fw-bolder"><?php echo $res['name'];?></h5>
                  <!-- Product price-->
                  <p class="card-text">prijs: €<?php echo $res['price'];?></p>          
                </div>
              </div>
              <!-- Product actions-->
              <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                <div class="text-center">
                  <a class="btn btn-outline-dark mt-auto" href="#"
                    >add to card</a
                  >
                </div>
              </div>
            </div>
          </div>

    <?php  }   ?>
        </div>
        <img class="rounded mx-auto d-block" src="img/sneaker.jpg" alt="">
      </div>
    </section>
    <!-- Footer-->
    <footer class="py-5 bg-dark">
      <div class="container">
        <p class="m-0 text-center text-white">
          Copyright &copy; Your Website 2022
        </p>
      </div>
    </footer>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
  </body>
</html>