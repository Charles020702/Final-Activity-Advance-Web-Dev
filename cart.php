<?php
    session_start();
    require_once('dataset.php');
    
    // session total amount must be reinitialize to 0 everytime this page loads so that our computations will work
    $_SESSION['totalAmount'] = 0;

    if(isset($_POST['btnUpdate'])) {
        
        // fetch all the input data and store them on variables
        // these variables will become arrays since the input types are declared as arrays
        $cartKeys = $_POST['hdnKey'];
        $cartSize = $_POST['hdnSize'];
        $cartQuantities = $_POST['txtQuantity'];

        // test if all of the array variables are set, this is just a precaution and a good programming practice        
        if(isset($cartKeys) && isset($cartSize) && isset($cartQuantities)) {
            // when we update we should consider that the value of session total quantity will change
            // with that we should reinitialize its value to 0 to prepare it for the computation below

            $_SESSION['totalQuantity'] = 0;

            foreach($cartKeys as $index => $key) {
                // $index is the index of the form array element and has nothing to do with the flow of our program except to extract the values from these arrays
                // $key is the index of the item from the arrProducts
                // we are simply performing a loop and updates the quantity of the session cartItems based on the coordinates that are dynamically produced using this loop
                $_SESSION['cartItems'][$key][$cartSize[$index]] = $cartQuantities[$index];

                // then we re compute the value of the session totalQuantity
                $_SESSION['totalQuantity'] += $cartQuantities[$index];
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css" integrity="sha512-P5MgMn1jBN01asBgU0z60Qk4QxiXo86+wlFahKrsQf37c9cro517WzVSPPV1tDKzhku2iJ2FVgL67wG03SGnNA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/styles.css">
    <title>Learning IT Easy Online Shop|Products</title>
</head>
<body>
<link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/dashboard/">

    

    

<link href="/docs/5.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <!-- Favicons -->
<link rel="apple-touch-icon" href="/docs/5.2/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
<link rel="icon" href="/docs/5.2/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
<link rel="icon" href="/docs/5.2/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
<link rel="manifest" href="/docs/5.2/assets/img/favicons/manifest.json">
<link rel="mask-icon" href="/docs/5.2/assets/img/favicons/safari-pinned-tab.svg" color="#712cf9">
<link rel="icon" href="/docs/5.2/assets/img/favicons/favicon.ico">
<meta name="theme-color" content="#712cf9">


    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }

      .b-example-divider {
        height: 3rem;
        background-color: rgba(0, 0, 0, .1);
        border: solid rgba(0, 0, 0, .15);
        border-width: 1px 0;
        box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
      }

      .b-example-vr {
        flex-shrink: 0;
        width: 1.5rem;
        height: 100vh;
      }

      .bi {
        vertical-align: -.125em;
        fill: currentColor;
      }

      .nav-scroller {
        position: relative;
        z-index: 2;
        height: 2.75rem;
        overflow-y: hidden;
      }

      .nav-scroller .nav {
        display: flex;
        flex-wrap: nowrap;
        padding-bottom: 1rem;
        margin-top: -1px;
        overflow-x: auto;
        text-align: center;
        white-space: nowrap;
        -webkit-overflow-scrolling: touch;
      }
    </style>

    
    <!-- Custom styles for this template -->
    <link href="dashboard.css" rel="stylesheet">
  </head>
  <body>
    
<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6" href="#">Learn IT Easy Shop</a>
  <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  
</header>

<div class="container-fluid">
  <div class="row">
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="position-sticky pt-3 sidebar-sticky">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">
              <span data-feather="home" class="align-text-bottom"></span>
              Dashboard
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="file" class="align-text-bottom"></span>
              Orders
            </a>
          </li>
        </ul>
      </div>
    </nav>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Dashboard</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
        </div>
      </div>
      <form method="post">
        <div class="container">
            <div class="row mt-5">
                <div class="col-10">
                    <h1><i class="fa fa-store"></i> Learn IT Easy Online Shop</h1>
                </div>
                <div class="col-2 text-right">
                    <a href="cart.php" class="btn btn-primary">
                        <i class="fa fa-shopping-cart"></i> Cart
                        <span class="badge badge-light">
                            <?php echo (isset($_SESSION['totalQuantity']) ? $_SESSION['totalQuantity'] : "0"); ?>
                        </span>
                    </a>
                </div>            
            </div>
            <hr>

            <div class="row">
                <div class="col-12">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col-1"> </th>
                                <th scope="col-3">Product</th>
                                <th scope="col-1">Size</th>
                                <th scope="col-2">Quantity</th>
                                <th scope="col-2">Price</th>
                                <th scope="col-2">Total</th>
                                <th scope="col-1"> </th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            <!-- this is the part where we assemble our cart intl_get_error_message
                            we started it by testing out if the cartItems is set, meaning if the user has already purchased something
                            then we perfom a nested foreach in order to extract all the values we need from our session cartItems
                            remember that the structure of our session cartitems goes like this
                            $_SESSION['cartItems'][key][size] = quantity -->

                            <?php if(isset($_SESSION['cartItems'])): ?>
                                <?php foreach($_SESSION['cartItems'] as $key => $value): ?>
                                    <?php foreach($value as $size => $quantity): ?>

                                        <!-- this is where we recompute our session totalamount value based on the price of the selected item multiplied by the number of purchased item -->
                                        <?php $_SESSION['totalAmount'] += $arrProducts[$key]['price'] * $quantity; ?>                                        
                                        
                                        <!-- following are just print outs of values and components that should appear in the cart table -->
                                        <tr>                                        
                                            <td><img src="img/<?php echo $arrProducts[$key]['photo1']; ?>" class="img-thumbnail" style="height: 50px;"></td>
                                            <td><?php echo $arrProducts[$key]['name']; ?></td>
                                            <td><?php echo $size; ?></td>
                                            <td>
                                                <!-- we need to create three input elements so that we can perform updates on the number of purchases
                                                each input elements are responsible to supply the necessary values (key, size and quantity) in order for the update to work -->
                                                <input type="hidden" name="hdnKey[]" value="<?php echo $key; ?>">
                                                <input type="hidden" name="hdnSize[]" value="<?php echo $size; ?>">
                                                <input type="number" name="txtQuantity[]" value="<?php echo $quantity; ?>" class="form-control text-center" min="1" max="100" required style="width: 150px;">
                                            </td>
                                            <td>₱ <?php echo number_format($arrProducts[$key]['price'], 2); ?></td>
                                            <td>₱ <?php echo number_format($arrProducts[$key]['price'] * $quantity, 2); ?></td>
                                            
                                            <!-- the remove link will contain also the same three get variable parameters in order for our product delition to work -->
                                            <td><a href="remove-confirm.php?<?php echo 'k=' . $key . '&s=' . $size . '&q=' . $quantity; ?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a></td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php endforeach; ?>
                                    <tr>
                                        <td colspan="2"> </td>
                                        <td><b>Total</b></td>
                                        <td><?php echo $_SESSION['totalQuantity']; ?></td>
                                        <td>----</td>
                                        <td><b>₱ <?php echo number_format($_SESSION['totalAmount'], 2); ?><b></td>
                                        <td>----</td>
                                    </tr>
                            <?php else: ?>
                                <tr>
                                    <td colspan="7">Cart is still Empty</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>                
                </div>            
            </div>

            <div class="row">
                <div class="col-12 col-sm-12 col-md-4 col-lg-4">
                    <a href="Mainui.php" class="btn btn-danger btn-lg btn-block"><i class="fa fa-shopping-bag"></i> Continue Shopping</a>
                </div>
                <?php if(isset($_SESSION['cartItems'])): ?>
                    <div class="col-12 col-sm-12 col-md-4 col-lg-4">
                        <button type="submit" name="btnUpdate" class="btn btn-success btn-lg btn-block"><i class="fa fa-edit"></i> Update Cart</button>
                    </div>
                    <div class="col-12 col-sm-12 col-md-4 col-lg-4">
                        <a href="clear.php" class="btn btn-primary btn-lg btn-block"><i class="fa fa-sign-out-alt"></i> Checkout</a>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </form>

      <canvas class="my-4 w-100" id="myChart" width="900" height="380"></canvas>

      <h2>Section title</h2>
      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Header</th>
              <th scope="col">Header</th>
              <th scope="col">Header</th>
              <th scope="col">Header</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>1,001</td>
              <td>random</td>
              <td>data</td>
              <td>placeholder</td>
              <td>text</td>
            </tr>
            <tr>
              <td>1,002</td>
              <td>placeholder</td>
              <td>irrelevant</td>
              <td>visual</td>
              <td>layout</td>
            </tr>
            <tr>
              <td>1,003</td>
              <td>data</td>
              <td>rich</td>
              <td>dashboard</td>
              <td>tabular</td>
            </tr>
            <tr>
              <td>1,003</td>
              <td>information</td>
              <td>placeholder</td>
              <td>illustrative</td>
              <td>data</td>
            </tr>
            <tr>
              <td>1,004</td>
              <td>text</td>
              <td>random</td>
              <td>layout</td>
              <td>dashboard</td>
            </tr>
            <tr>
              <td>1,005</td>
              <td>dashboard</td>
              <td>irrelevant</td>
              <td>text</td>
              <td>placeholder</td>
            </tr>
            <tr>
              <td>1,006</td>
              <td>dashboard</td>
              <td>illustrative</td>
              <td>rich</td>
              <td>data</td>
            </tr>
            <tr>
              <td>1,007</td>
              <td>placeholder</td>
              <td>tabular</td>
              <td>information</td>
              <td>irrelevant</td>
            </tr>
            <tr>
              <td>1,008</td>
              <td>random</td>
              <td>data</td>
              <td>placeholder</td>
              <td>text</td>
            </tr>
            <tr>
              <td>1,009</td>
              <td>placeholder</td>
              <td>irrelevant</td>
              <td>visual</td>
              <td>layout</td>
            </tr>
            <tr>
              <td>1,010</td>
              <td>data</td>
              <td>rich</td>
              <td>dashboard</td>
              <td>tabular</td>
            </tr>
            <tr>
              <td>1,011</td>
              <td>information</td>
              <td>placeholder</td>
              <td>illustrative</td>
              <td>data</td>
            </tr>
            <tr>
              <td>1,012</td>
              <td>text</td>
              <td>placeholder</td>
              <td>layout</td>
              <td>dashboard</td>
            </tr>
            <tr>
              <td>1,013</td>
              <td>dashboard</td>
              <td>irrelevant</td>
              <td>text</td>
              <td>visual</td>
            </tr>
            <tr>
              <td>1,014</td>
              <td>dashboard</td>
              <td>illustrative</td>
              <td>rich</td>
              <td>data</td>
            </tr>
            <tr>
              <td>1,015</td>
              <td>random</td>
              <td>tabular</td>
              <td>information</td>
              <td>text</td>
            </tr>
          </tbody>
        </table>
      </div>
    </main>
  </div>
</div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.bundle.min.js" integrity="sha512-wV7Yj1alIZDqZFCUQJy85VN+qvEIly93fIQAN7iqDFCPEucLCeNFz4r35FCo9s6WrpdDQPi80xbljXB8Bjtvcg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>
</html>