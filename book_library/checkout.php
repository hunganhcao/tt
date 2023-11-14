
<?php
		include(__DIR__ . "/header.php");

?>

<div class="container">
   <?php
   
   
   
   ?>





    <?php

if(isset($_SESSION['cart'])&& (is_array($_SESSION['cart']))){
    $tong = 0;
    for($i = 0; $i< sizeof($_SESSION['cart']); $i++){
        $tt = (int)$_SESSION['cart'][$i][2] * (int)$_SESSION['cart'][$i][3];
        $tong += $tt; 
        echo '<tr>
        
        <td class="product-col">
           

                 <img src="images/books/' . $_SESSION['cart'][$i][0] . '"  style="width:100px; height: 110px;" alt="Product image">
               

                <h9 class="product-title">
                    <a href="#">'. $_SESSION['cart'][$i][1].'</a>
                </h9><!-- End .product-title -->
            
            <p>'.$tt.'</p>
            </td>
            </tr>
       ';
       
    }
  
}
    ?>




        <div class="col-md-8 order-md-1">
            
            <form class="needs-validation" novalidate="">
                <div class="row">
                   
                    <div class="col-md-6 mb-3">
                        <label for="lastName">Name</label>
                        <input type="text" class="form-control" id="lastName" placeholder="" value="" required="">
                        <div class="invalid-feedback"> Valid last name is required. </div>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="username">Username</label>
                    <div class="input-group">
                        
                        <input type="text" class="form-control" id="username" placeholder="Username" required="">
                        <div class="invalid-feedback" style="width: 100%;"> Your username is required. </div>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="email">Email <span class="text-muted">(Optional)</span></label>
                    <input type="email" class="form-control" id="email" placeholder="you@example.com">
                    <div class="invalid-feedback"> Please enter a valid email address for shipping updates. </div>
                </div>
                <div class="mb-3">
                    <label for="address">Address</label>
                    <input type="text" class="form-control" id="address" placeholder="1234 Main St" required="">
                    <div class="invalid-feedback"> Please enter your shipping address. </div>
                
                
                <h4 class="mb-3">Payment</h4>
                <div class="d-block my-3">
                    <div class="custom-control custom-radio">
                        <input id="credit" name="paymentMethod" type="radio" class="custom-control-input" checked="" required="">
                        <label class="custom-control-label" for="credit">Credit card</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input id="debit" name="paymentMethod" type="radio" class="custom-control-input" required="">
                        <label class="custom-control-label" for="debit">Debit card</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input id="paypal" name="paymentMethod" type="radio" class="custom-control-input" required="">
                        <label class="custom-control-label" for="paypal">PayPal</label>
                    </div>
                </div>
               
                <hr class="mb-4">

                
                <button class="tg-btn tg-active" type="submit" name="button" value="OK" type="button" onclick="hello()">Continue to checkout</button>
                <script>  
                    function hello(){  
                        alert("Payment Succeeded!");  
                        }  
            </script>
            </form>
        </div>
    </div>
    <?php
	include(__DIR__ . "/footer.php");
	?>