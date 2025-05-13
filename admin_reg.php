<?php
session_start();
include('db_connectt.php');
$msg=false;

if (isset($_POST['register'])) {
    // Sanitize user input
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $repassword=mysqli_real_escape_string($con,$_POST['repassword'] );
    $first_name=mysqli_real_escape_string($con, $_POST['first_name']);
    $last_name=mysqli_real_escape_string($con, $_POST['last_name']);
    $user_name=mysqli_real_escape_string($con, $_POST['user_name']);
    $mobile=mysqli_real_escape_string($con, $_POST['mobile']);
    $city=mysqli_real_escape_string($con, $_POST['city']);
    $state=isset($_POST['state']) && $_POST['state'] !== 'NULL' ? mysqli_real_escape_string($con, $_POST['state']) : null;
    $pincode=mysqli_real_escape_string($con, $_POST['pincode']);

    // Check if the email already 
    // $verify_email="INSERT INTO email_otp (email) VALUES ('$email;)";
    $checkEmail = "SELECT * FROM admin_reg WHERE email = '$email'";
    $result = mysqli_query($con, $checkEmail);

    if (mysqli_num_rows($result) > 0) {
        echo "Email is already registered.";
    } else {
        if($password==$repassword){
        // Hash the password
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Insert user into the database
        $insertUser = "INSERT INTO admin_reg (email, password, first_name, last_name, user_name, mobile, city, state, pincode) VALUES ('$email', '$hashedPassword','$first_name','$last_name','$user_name','$mobile','$city','$state','$pincode')";
        if (mysqli_query($con, $insertUser)) {
            header('Location: login.php');
        } else {
            echo "Error: ";
        }
    }
        else{
                        echo ('Password Not Match');
                    }
                
    }
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
    <title>Registration Form</title>
</head>

<body>

    <nav>
        <!-- <h1>Zero Hunger</h1> -->
        <a href="admin_index.php" style="text-decoration: none; color: black; margin-left: 495px;"><h1>Smash The Hunger</h1></a>
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
        <form action="logout.php" method="POST"><button name="logout"type="submit">log out</button></form>
    </nav>

    <div class="box1">
        <div class="box2">
            <h1 style="text-align: center; margin-top: 20x; position: relative; bottom: 40px; font-size: 40px;">Admin Registration</h1>
           
           
           

            <form method="POST" class="row g-3 needs-validation" novalidate>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Email address</label>
                    <input type="email" name="email" class="form-control" id="exampleFormControlInput1"
                        placeholder="Enter Your Email Here">
                </div>
                
                <div class="col-md-4">
                    <label for="validationCustom01" class="form-label">First name</label>
                    <input type="text" name="first_name" class="form-control" id="validationCustom01" value="" required
                        placeholder="Enter First Name">
                    <div class="valid-feedback">
                        Looks good!
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="validationCustom02" class="form-label">Last name</label>
                    <input type="text" name="last_name" class="form-control" id="validationCustom02" value="" required placeholder="Enter Last Name">
                    <div class="valid-feedback">
                        Looks good!
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="validationCustomUsername" class="form-label">Username</label>
                    <div class="input-group has-validation">
                        <!-- <span class="input-group-text" id="inputGroupPrepend">UN</span> -->
                        <input type="text" name="user_name"class="form-control" id="validationCustomUsername"
                            aria-describedby="inputGroupPrepend" placeholder="Enter Username"required>
                        <div class="invalid-feedback">
                            Please choose a username.
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Mobile No.</label>
                <input type="text" name="mobile" class="form-control" id="exampleFormControlTextarea1" placeholder="Enter Mobile No" rows="3">
            </div>
                <div class="col-md-6">
                    <label for="validationCustom03" class="form-label">City</label>
                    <input type="text" name="city" class="form-control" id="validationCustom03" placeholder="Enter City Name" required>
                    <div class="invalid-feedback">
                        Please provide a valid city.
                    </div>
                </div>
                <div class="col-md-3">
                    <label for="validationCustom04" class="form-label">State</label>
                    <select class="form-select" name="state" id="validationCustom04" required>
                        <option selected disabled value="">Select Your State</option>
                        <option value="Andhra Pradesh">Andhra Pradesh</option>
                        <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                        <option value="Assam">Assam</option>
                        <option value="Bihar">Bihar</option>
                        <option value="Chhattisgarh">Chhattisgarh</option>
                        <option value="Goa">Goa</option>
                        <option value="Gujarat">Gujarat</option>
                        <option value="Haryana">Haryana</option>
                        <option value="Himachal Pradesh">Himachal Pradesh</option>
                        <option value="Jharkhand">Jharkhand</option>
                        <option value="Karnataka">Karnataka</option>
                        <option value="Kerala">Kerala</option>
                        <option value="Madhya Pradesh">Madhya Pradesh</option>
                        <option value="Maharashtra">Maharashtra</option>
                        <option value="Manipur">Manipur</option>
                        <option value="Meghalaya">Meghalaya</option>
                        <option value="Mizoram">Mizoram</option>
                        <option value="Nagaland">Nagaland</option>
                        <option value="Odisha">Odisha</option>
                        <option value="Punjab">Punjab</option>
                        <option value="Rajasthan">Rajasthan</option>
                        <option value="Sikkim">Sikkim</option>
                        <option value="Tamil Nadu">Tamil Nadu</option>
                        <option value="Telangana">Telangana</option>
                        <option value="Tripura">Tripura</option>
                        <option value="Uttar Pradesh">Uttar Pradesh</option>
                        <option value="Uttarakhand">Uttarakhand</option>
                        <option value="West Bengal">West Bengal</option>
                    </select>
                    <div class="invalid-feedback">
                        Please select a valid state.
                    </div>
                </div>
                <div class="col-md-3">
                    <label for="validationCustom05" class="form-label">Pincode</label>
                    <input type="text"name="pincode" class="form-control" placeholder="Enter Area Pincode" id="validationCustom05" required>
                    <div class="invalid-feedback">
                        Please provide a valid pincode.
                    </div>
                </div>
              
                <div class="col-md-6">
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
               
                <div class="col-12">
                    <input style=" background-color: #CE7C02;border-style: none;" type="submit" name="register" value="Submit form"class="btn btn-primary">
                </div>
            </form>
            <div style=" margin-top: -30px;"><a href="donor_reg.php" style="text-decoration: none; margin-left: 160px;">Donor Registration</a>
            <a href="Registration.php" style="text-decoration: none;">/Receiver Registration</a>
            </div>
        </div>
    </div>

   

</body>
</html>