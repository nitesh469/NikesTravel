 <!-- ***** Header Aria Calling ***** -->
 <?php require 'include/header.php'; ?>
 <!-- ***** DB config Calling ***** -->
 <?php require 'config/config.php'; ?>

 <?php

 if(!isset($_SERVER['HTTP_REFERER'])){
    //REDIRECT then to your desire location
    header('location:http://localhost:8080/nikestravel/index.php');
    exit;
 }
 ?>
    <div class="container">  
                    <!-- Replace "test" with your own sandbox Business account app client ID -->
                    <script src="https://www.paypal.com/sdk/js?client-id=AWQs-5AXRBAM9G57I6q3O0MCm6-Pi7SS2EO0Sj0GhBJh7X-tkNjFfVVepg2tD9t2N9b5l0K3Vkss4Rat&currency=USD"></script>
                    <!-- Set up a container element for the button -->
                    <div style="margin-top:200px;"id="paypal-button-container"></div>
                    <script>
                        paypal.Buttons({
                        // Sets up the transaction when a payment button is clicked
                        createOrder: (data, actions) => {
                            return actions.order.create({
                            purchase_units: [{
                                amount: {
                                value: "<?php  if(isset($_SESSION['payment'])){ echo $_SESSION['payment']; } ?>" 
                                // Can also reference a variable or function
                                }
                            }]
                            });
                        },
                        // Finalize the transaction after payer approval
                        onApprove: (data, actions) => {
                            return actions.order.capture().then(function(orderData) {
                          
                             window.location.href='index.php';
                            });
                        }
                        }).render('#paypal-button-container');
                    </script>
                  
                </div>
            </div>
        </div>


<!-- ***** Footer Area Calling ***** -->
<?php require 'include/footer.php'; ?>