<?php
    session_start();
    require_once('dataset.php');

    if(isset($_POST['btnProcess'])) {
        // the stucture of our session cartItems goes like this
        // $_SESSION['cartItems'][key][size] = quantity
        // it is a two dimensional array where the first index denotes the key/number/id of the specific record (array/items)
        // followed by the size of that particular item as the second index
        // the value to be stored is nothing other than the quantity which denotes how many pieces did the buyer purchased for that product and for that specific size
        // if it is the first time that the item is placed then we will not find that array signature so we create that array structure then store the quantity in it
        // otherwise we add the new quantity from the previous quantity

        if(isset($_SESSION['cartItems'][$_POST['hdnKey']][$_POST['radSize']]))
            $_SESSION['cartItems'][$_POST['hdnKey']][$_POST['radSize']] += $_POST['txtQuantity']; // if you already purchased this item
        else
            $_SESSION['cartItems'][$_POST['hdnKey']][$_POST['radSize']] = $_POST['txtQuantity']; // if this is the first time you purchased the item

        // then we compute the total quantity based on the new number of quantity being purchased
        // then we force redirect to the confirm file in order to notify the user on a successfull purchase
        $_SESSION['totalQuantity'] += $_POST['txtQuantity'];
        header("location: confirm.php");
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
                <?php if(isset($_GET['k']) && isset($arrProducts[$_GET['k']])): ?>
                    <div class="col-md-4 col-sm-6 mb-4">
                        <div class="product-grid2 card">
                            <div class="product-image2">
                                <a href="">
                                    <img class="pic-1" src="img/<?php echo $arrProducts[$_GET['k']]['photo1']; ?>">
                                    <img class="pic-2" src="img/<?php echo $arrProducts[$_GET['k']]['photo2']; ?>">
                                </a>                            
                            </div>                        
                        </div>
                    </div>                
                    <div class="col-md-8 col-sm-6 mb-4">                
                        <h3 class="title">
                            <?php echo $arrProducts[$_GET['k']]['name']; ?>
                            <span class="badge badge-dark">₱ <?php echo $arrProducts[$_GET['k']]['price']; ?></span>
                        </h3>
                        <p><?php echo $arrProducts[$_GET['k']]['description']; ?></p>                    
                        <hr>
                        <input type="hidden" name="hdnKey" value="<?php echo $_GET['k']; ?>">
                        <h3 class="title">Select Size:</h3>
                        <input type="radio" name="radSize" id="radXS" value="XS" required>
                        <label for="radXS" class="pr-3">XS</label>
                        <input type="radio" name="radSize" id="radSM" value="S" required>
                        <label for="radSM" class="pr-3">S</label>
                        <input type="radio" name="radSize" id="radMD" value="M" required>
                        <label for="radMD" class="pr-3">M</label>
                        <input type="radio" name="radSize" id="radLG" value="L" required>
                        <label for="radLG" class="pr-3">L</label>
                        <input type="radio" name="radSize" id="radXL" value="XL" required>
                        <label for="radXL" class="pr-3">XL</label>        
                        <hr>
                        <h3 class="title">Enter Quantity:</h3>
                        <input type="number" name="txtQuantity" id="txtQuantity" class="form-control" placeholder="0" min="1" max="100" required>
                        <br>
                        
                        <button class="btn btn-dark btn-lg" type="submit" name="btnProcess"><i class="fa fa-check-circle"> </i> Confirm Product Purchase</button>
                        <!-- <button type="submit" name="btnProcess"  class="btn btn-dark btn-lg" onclick="location.href = 'confirm.php';"><i class="fa fa-check-circle"> </i> Confirm Product Purchase</button> -->
                        <!-- <button type="submit" name="btnProcess" class="btn btn-dark btn-lg"><i class="fa fa-check-circle"></i>Confirm Product Purchase</button> -->
                    
                            <!-- <a href="confirm.php" type="submit" name="btnProcess" class="btn btn-secondary btn-lg active"  role="button" aria-pressed="true">Link</a> -->
                        <!-- <button type="button" class="btn btn-outline-success and-all-other-classes"> <a href="confirm.php" style="color:inherit"> Button text with correct colors </a></button> -->

                        <a href="Mainui.php" class="btn btn-danger btn-lg"><i class="fa fa-arrow-left"></i> Cancel / Go Back</a>
                    </div>                                
                <?php else:?>
                    <div class="col-12 card p-5">
                        <h3 class="text-center text-danger">No Product Found!</h3>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </form>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.bundle.min.js" integrity="sha512-wV7Yj1alIZDqZFCUQJy85VN+qvEIly93fIQAN7iqDFCPEucLCeNFz4r35FCo9s6WrpdDQPi80xbljXB8Bjtvcg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>
</html>