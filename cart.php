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
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
            <li class="nav-item"><a class="nav-link" href="men.php">men</a></li>
            <li class="nav-item"><a class="nav-link" href="women.php">women</a></li>
            <li class="nav-item"><a class="nav-link" href="about.php">About</a></li>
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
              <span class="badge bg-dark text-white ms-1 rounded-pill"><?php                 if(isset($_SESSION['cart'])) {
                      $count = count($_SESSION['cart']);
                      echo "$count";
                      }else{
                      echo "0";
                      }
                  ?> </span>
              </a>
            </button>
          </form>
        </div>
      </div>
    </nav>
    <!-- Header-->
    <section class="py-5">
    <div class="container mt-5 mb-5">
            <div class="d-flex justify-content-center row">
                <div class="col-md-8">
                    <div class="  fw-bolder p-2">
                        <h4>Shopping cart</h4>
                    </div> <?php
    if (!isset($_SESSION['cart'])){
                                    $_SESSION['cart'] = [];
                                }
                                if(isset($_SESSION['cart']) && empty($_SESSION['cart'])) {
                                    echo 'your cart is empty';
                                }
                                $totalprice = 0;
                                if (isset($_POST['clear'])){
                                    $_SESSION['CART'] = array();
                                }

                                    foreach($_SESSION['cart'] as $productid => $amount) {
                                        



                                        $sql = "SELECT * FROM shoes WHERE id = '$productid'";
                                        $stmt = $conn->prepare($sql);
                                        $stmt->execute();
                                        $results = $stmt->fetch();
    ?><!-- Section-->

                    <div class="d-flex flex-row justify-content-between align-items-center p-2 bg-white mt-4 px-3 rounded">
                        <div class="mr-1"><img class="rounded" src="img/<?= $results['img']?>" width="70"></div>
                        <div class="d-flex flex-column align-items-center product-details"><span class="font-weight-bold"><?=  $results['name'] ?></span>
                            <div class="d-flex flex-row product-desc">
                                <div class="size mr-1"><span class="text-grey">Size:</span><span class="font-weight-bold">&nbsp;<?= $amount ?></span></div>
                            </div>
                        </div>
                        <div class="d-flex flex-row align-items-center qty"><i class="fa fa-minus text-danger"></i>
                            <h5 class="text-grey mt-1 mr-1 ml-1">2</h5><i class="fa fa-plus text-success"></i></div>
                        <div>
                            <h5 class="text-grey"><?=  $results['price'] ?></h5>
                        </div>
                        <div class="d-flex align-items-center"><i class="fa fa-trash mb-1 text-danger"></i></div>
                    </div>
                <?php } ?>
                <div class="d-flex flex-row align-items-center mt-3 p-2 bg-white rounded">
                  <div class="d-flex align-items-center"> <p>bedrag: 00,-</p></div>

                      <button class="btn btn-dark btn-block btn-lg ml-2 pay-button" type="button">Proceed to Pay</button></div>

            </div>
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