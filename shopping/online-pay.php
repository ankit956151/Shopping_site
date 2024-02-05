<?php 
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['login'])==0)
    {   
header('location:login.php');
}else{
    $total = $_SESSION['tp'];
    $plan = "Mobile";
    $name = "Vishal";
    $email = "Test@mail.com";
    $mobile = 9026820202;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment</title>
</head>
<body>
<div class="container">
        <div class="parent_main">
            <h2 class="h3 text-center">Click the Pay button for payment!</h2>
            <div>
                <button class="btn btn-success" id="rzp-button1">Pay with Razorpay</button>
            </div>
        </div>
    </div>
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
    <script>
        var options = {
            "key": "rzp_test_nfBJ96MTvUQnEL",
            // "key": "",
            // Enter the Key ID generated from the Dashboard
            "amount": "<?php echo $total * 100; ?>", // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise
            "currency": "INR",
            "name": "Shopping Website",
            "description": "Transaction for <?php echo $plan; ?>",
            "image": "https://example.com/your_logo",
            //"order_id": " //echo(rand(10,100));", //This is a sample Order ID. Pass the `id` obtained in the response of Step 1
            "callback_url": "verify-payment.php",
            "prefill": {
                "name": "<?php echo $name; ?>",
                "email": "<?php echo $email; ?>",
                "contact": "<?php echo $mobile; ?>"
            },
            "theme": {
                "color": "#3399cc"
            }
        };
        var rzp1 = new Razorpay(options);
        document.getElementById('rzp-button1').onclick = function(e) {
            rzp1.open();
            e.preventDefault();
        }
    </script>
    
    
</body>
</html>