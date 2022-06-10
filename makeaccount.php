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
              <a class="nav-link aria-current-page" href="index.php">Home</a>
            </li>
            <li class="nav-item"><a class="nav-link " href="men.php">men</a></li>
            <li class="nav-item"><a class="nav-link" href="women.php">women</a></li>
            <li class="nav-item"><a class="nav-link" href="about.php">About</a></li>
          </ul>
          <form class="d-flex">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                <li class="nav-item"><a class="nav-link fw-bolder" href="login.php">Login</a></li>
            </ul>
            <button>
            <a class="link-item text-dark" href="cart.php">
              <i class="bi-cart-fill me-1 nav-item"></i>
             Cart 
              <span class="badge bg-dark text-white ms-1 rounded-pill">0</span>
              </a>
            </button>
          </form>
        </div>
      </div>
    </nav>
    <!-- Header-->
    <!-- <header class="bg-dark py-5">
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
    </header> -->
    <!-- Section-->
    <?php 
include_once "connection.php";

if(isset($_POST["submit"])){

  $sql = "INSERT INTO users
            (username, password)
            VALUES
            (:username, :password)
    ";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':username', $_POST['username']);
    $stmt->bindParam(':password', $_POST['password']);
    $stmt->execute();
    header("location: login.php");
}
?>
    <section class="vh-100 gradient-custom">
        <div class="container py-5 h-100">
          <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
              <div class="card bg-dark text-white" style="border-radius: 1rem;">
                <div class="card-body p-5 text-center">
      
                  <div class="mb-md-5 mt-md-4 pb-5">
      
                    <h2 class="fw-bold mb-2 text-uppercase">make account</h2>
                    <p class="text-white-50 mb-5">Please enter your new username and password</p>
                    <form action="" method="post">
                    <div class="form-outline form-white mb-4" id="loginForm">
                      <input type="text" id="username" name="username" class="form-control form-control-lg" value=""/>
                      <label class="form-label" for="typeEmailX">username</label>
                    </div>
      
                    <div class="form-outline form-white mb-4">
                      <input type="password" id="password" name="password" class="form-control form-control-lg" value=""/>
                      <label class="form-label" for="typePasswordX">Password</label>
                    </div>      
                    <input class="btn btn-outline-light btn-lg px-5" type="submit" value="make account" name="toevoegen"/>     
                    </form> 
                  </div>      
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <br>
      <br>
      <br>
    <!-- Footer-->
    <!-- <footer class="py-5 bg-dark">
      <div class="container">
        <p class="m-0 text-center text-white">
          Made by Jasper van Uden
        </p>
      </div>
    </footer> -->
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
  </body>
</html>
