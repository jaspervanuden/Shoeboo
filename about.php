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
      crossorigin="anonymous"
    />
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
              <a class="nav-link aria-current="page" href="index.php">Home</a>
            </li>
            <li class="nav-item"><a class="nav-link " href="men.php">men</a></li>
            <li class="nav-item"><a class="nav-link" href="women.php">women</a></li>
            <li class="nav-item"><a class="nav-link fw-bolder" href="about.php">About</a></li>
          </ul>
          <form class="d-flex">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
            <li class="nav-item"><a class="nav-link" href="login.php">
                <?php echo  isset($_SESSION["username"]) ? 'welkom ' .$_SESSION["username"] : 'Login' ;?>
              </a></li>
              <?php 
                if(isset($_SESSION['username'])){
                  echo '<li class="nav-item"><a class="nav-link" href="logout.php">logout</a></li>';
              }
              else {
                echo '   ';
              }
              ?>
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
            <img src="img/afabout.png" alt="" />
            <div class="centered">
              <h1 class="display-4 fw-bolder text-light">About</h1>
            </div>
      </div>
    </header>
    <!-- Section-->
    <section class="py-5">
        <div class="text-center">
            <h3>over ons ja</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusamus in eveniet aliquam aspernatur deleniti vero quam nesciunt! Quia temporibus, est nostrum at magni, laboriosam maiores, fuga nulla delectus voluptatibus eum.</p>
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
