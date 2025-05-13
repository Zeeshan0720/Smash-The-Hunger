<?php
session_start();
include('db_connectt.php');
$msg=false;

if (isset($_POST['register']) || isset($_SESSION['user_id'])) {
    // Sanitize user input
    $email =  $_SESSION['user_email'];
    $d_name = mysqli_real_escape_string($con, $_POST['d_name']);
    $fname=mysqli_real_escape_string($con,$_POST['fname'] );
    $qty=mysqli_real_escape_string($con, $_POST['qty']);
    $qty_type=isset($_POST['qty_type']) && $_POST['qty_type'] !== 'NULL' ? mysqli_real_escape_string($con, $_POST['qty_type']) : null;;
    $date=date('y-m-d',strtotime(mysqli_real_escape_string($con, $_POST['date'])));
    $mfg= date('y-m-d',strtotime(mysqli_real_escape_string($con, $_POST['mfg'])));
    $exp=mysqli_real_escape_string($con, $_POST['exp']);
    $msg=date('y-m-d',strtotime(mysqli_real_escape_string($con, $_POST['exp'])));
    // Check if the email already 
    // $verify_email="INSERT INTO email_otp (email) VALUES ('$email;)";
    // $checkEmail = "SELECT * FROM donor_reg WHERE email = '$email'";
    // $result = mysqli_query($con, $checkEmail);

    $checkUser = "SELECT * FROM user WHERE email = '$email' LIMIT 1";
    $receiverResult = mysqli_query($con, $checkUser);
    $checkdonor = "SELECT * FROM donor_reg WHERE email = '$email' LIMIT 1";
    $donorResult = mysqli_query($con, $checkdonor);
        $insertUser = "INSERT INTO complaints (email, d_name, fname,qty, qty_type, date, mfg, exp,msg) VALUES ('$email', '$d_name','$fname','$qty','$qty_type','$date','$mfg','$exp','$msg')";
        if (mysqli_query($con, $insertUser)) {
            if (mysqli_num_rows($donorResult) > 0) {
                
                header('Location: donor_index.php');
                exit();
            } 
            else  if(mysqli_num_rows($receiverResult) > 0){
                header('Location: receiver_index.php');
            }
            
         } else {
             echo "Error: Complaint not registered";
         }
    
                
    
}
else {
    echo "Error: Complaint not registered";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./registration.css?v=<?php echo time();?>">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css?v=<?php echo time();?>" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js?v=<?php echo time();?>"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Complaint</title>
</head>

<body>

    <nav>
        <!-- <h1>Zero Hunger</h1> -->
        <a href="#" style="text-decoration: none; color: black; margin-left: 495px;"><h1>Smash The Hunger</h1></a>
        <ul>
            <!-- <a href="index.html">
                <li>Home</li>
            </a>
            <a href="Donation.html">
                <li>Donation</li>
            </a>
            <a href="ContactUs.html">
                <li>Contact Us</li>
            </a>
            <a href="Registration.html">
                <li>Registration</li>
            </a> -->
        </ul>
        <!-- <a href="donor_login.php">
            <button type="button">log in</button>
        </a> -->
    </nav>

    <div class="box1">
        <div class="box2">
            <h1 style="text-align: center; margin-top: 20x; position: relative; bottom: 40px; font-size: 40px;">Registration A Complaint</h1>
            
           
           

            <form method="POST" class="row g-3 needs-validation" novalidate>
                <!-- <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Email address</label>
                    <input type="email" name="email" class="form-control" id="exampleFormControlInput1"
                        placeholder="Enter Your Email Here">
                </div> -->
                
                <div class="col-md-6">
                    <label for="validationCustom01" class="form-label">Donor name</label>
                    <input type="text" name="d_name" class="form-control" id="validationCustom01" value="" required
                        placeholder="Enter Donor's Name">
                    <div class="valid-feedback">
                        Looks good!
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="validationCustom02" class="form-label">Food name</label>
                    <input type="text" name="fname" class="form-control" id="validationCustom02" value="" required placeholder="Enter Food Name">
                    <div class="valid-feedback">
                        Looks good!
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="validationCustom01" class="form-label">Quantity</label>
                    <input type="text" name="qty" class="form-control" id="validationCustom01" value="" required
                        placeholder="Enter Quantity of the food">
                    <!-- <div class="valid-feedback">
                        Looks good!
                    </div> -->
                </div>
                <div class="col-md-4">
                    <label for="validationCustom02" class="form-label">Quantity In</label>
                    <select class="form-select" name="qty_type" id="validationCustom04" required>
                        <option selected disabled value="">Select Quantity</option>
                        <option value="Kg">in Kg</option>
                        <option value="Container">Nuber of Container</option>
                       
                    </select>
                    <!-- <div class="valid-feedback">
                        Looks good!
                    </div> -->
                </div>
                <div class="col-md-4">
                    <label for="validationCustom03" class="form-label">Date of Receiving</label>
                    <input type="date" name="date" class="form-control" id="validationCustom03"  required>
                    <div class="invalid-feedback">
                        Please provide a valid city.
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="validationCustom03" class="form-label">Date of Manufacturing</label>
                    <input type="date" name="mfg" class="form-control" id="validationCustom03"  required>
                    <div class="invalid-feedback">
                        Please provide a valid city.
                    </div>
                </div>
               
                <div class="col-md-6">
                    <label for="validationCustom06" class="form-label">Date of Expiry</label>
                    <input type="date" name="exp" class="form-control" id="validationCustom03"  required>
                    <div class="valid-feedback">
                        Looks good!
                    </div>
                </div>
                <div class="col-md-12" >
                    <label for="validationCustom07" class="form-label">Please Expalin your issue.</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="8" placeholder="Enter Your Complaint"></textarea>
                    <div class="valid-feedback">
                        Looks good!
                    </div>
                </div>
                <!-- <div class="col-md-6">
                    <label for="validationCustom06" class="form-label">Enter Password</label>
                    <input type="password" name="password" class="form-control" id="validationCustom07" value="" required
                        placeholder="Enter Password">
                    <div class="valid-feedback">
                        Looks good!
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="validationCustom07" class="form-label">Re-enter Password</label>
                    <input type="password" name="repassword" class="form-control" id="validationCustom07" value="" required placeholder="Re-enter Password">
                    <div class="valid-feedback">
                        Looks good!
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="validationCustom08" class="form-label">Aadhar No.</label>
                    <input type="password" name="aadhar" class="form-control" id="validationCustom08" value="" required placeholder="Enter Aadhar No">
                    <div class="valid-feedback">
                        Looks good!
                    </div>
                </div> -->
               
                <div class="col-12">
                    <input style=" background-color: #CE7C02;border-style: none;" type="submit" name="register" value="Submit"class="btn btn-primary">
                </div>
            </form>
           
            </div>
        </div>
    </div>

    <?php include 'footer.html'; ?>


</body>
</html>