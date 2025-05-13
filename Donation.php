
<?php
session_start();
include('db_connectt.php');

if (isset($_POST['register'])) {
    // Retrieve and sanitize user inputs
    $email = $_SESSION['user_email'];
    $first_name = $_SESSION['user_id']; // Make sure user_id holds the first name or correct session variable
    $last_name = $_SESSION['user_lname'];
    $fname = mysqli_real_escape_string($con, $_POST['fname']);
    $alter_mobile = mysqli_real_escape_string($con, $_POST['alter_mobile']);
    $mobile = $_SESSION['user_mobile'];
    $qty = mysqli_real_escape_string($con, $_POST['qty']);
    $qty_type = isset($_POST['qty_value']) && $_POST['qty_value'] !== 'NULL' ? mysqli_real_escape_string($con, $_POST['qty_value']) : null;
    $mfg = date('y-m-d', strtotime(mysqli_real_escape_string($con, $_POST['mfg'])));
    $exp = mysqli_real_escape_string($con, $_POST['exp']);
    $city = $_SESSION['user_city'];
    $state = $_SESSION['user_state'];
    $pincode = $_SESSION['user_pincode'];

    // Insert into `alldonations` table
    $insertUser = "INSERT INTO alldonations 
        (email, first_name, last_name, fname, alter_mobile, mobile, qty, qty_value, mfg, exp, city, state, pincode) 
        VALUES ('$email', '$first_name', '$last_name', '$fname', '$alter_mobile', '$mobile', '$qty', '$qty_type', '$mfg', '$exp', '$city', '$state', '$pincode')";

    if (mysqli_query($con, $insertUser)) {
        // If the first insert succeeds, insert into `active_donations` table
        $insertActiveDonation = "INSERT INTO active_donations 
            (email, first_name, last_name, fname, alter_mobile, mobile, qty, qty_value, mfg, exp, city, state, pincode) 
            VALUES ('$email', '$first_name', '$last_name', '$fname', '$alter_mobile', '$mobile', '$qty', '$qty_type', '$mfg', '$exp', '$city', '$state', '$pincode')";

        if (mysqli_query($con, $insertActiveDonation)) {
            // Redirect on success
            header('Location: donor_index.php');
            exit();
        } else {
            // Handle error for active_donations insert
            echo "Error inserting into active_donations table: " . mysqli_error($con);
        }
    } else {
        // Handle error for alldonations insert
        echo "Error inserting into alldonations table: " . mysqli_error($con);
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="Donation.css?v=<?php echo time();?>">
    <title>Donation</title>
</head>

<body>

<?php include 'donor_navbar.html'; ?>
    <div class="box1">
        <div class="box2">
            <h1 style="text-align: center; margin-top: 20x; position: relative; bottom: 40px; font-size: 40px;">Make a Donation</h1>
            
           
           

            <form method="POST" class="row g-3 needs-validation" novalidate>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Food Name</label>
                    <input type="text" name="fname" class="form-control" id="exampleFormControlInput1"
                        placeholder="Enter Name of food (eg. 'Rice')">
                </div>
                
                <div class="col-md-4">
                    <label for="validationCustom01" class="form-label">Quantity</label>
                    <input type="text" name="qty" class="form-control" id="validationCustom01"  required
                        placeholder="Enter Quantity of the food">
                    <!-- <div class="valid-feedback">
                        Looks good!
                    </div> -->
                </div>
                <div class="col-md-4">
                    <label for="validationCustom02" class="form-label">Quantity In</label>
                    <select class="form-select" name="qty_value" id="validationCustom04" required>
                        <option selected disabled value="">Select Quantity</option>
                        <option value="Kg">in Kg</option>
                        <option value="Container">Nuber of Container</option>
                       
                    </select>
                    <!-- <div class="valid-feedback">
                        Looks good!
                    </div> -->
                </div>
                <div class="col-md-4">
                    <label for="validationCustomUsername" class="form-label">Alternate Mobile No</label>
                    <div class="input-group has-validation">
                        <!-- <span class="input-group-text" id="inputGroupPrepend">UN</span> -->
                        <input type="text" name="alter_mobile"class="form-control" id="validationCustomUsername"
                            aria-describedby="inputGroupPrepend" placeholder="Enter Alternate Mobile no"required>
                        <!-- <div class="invalid-feedback">
                            Please choose a username.
                        </div> -->
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
                <!-- <div class="col-md-6">
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
                    <input style=" background-color: #CE7C02;border-style: none;" type="submit" name="register" value="Submit Donation"class="btn btn-primary">
                </div>
            </form>
            <!-- <div style=" margin-top: -30px;"><a href="Registration.php" style="text-decoration: none; margin-left: 160px;">Click here for Receiver Registration</a>
            </div> -->
        </div>
    </div>


    
    <?php include 'footer.html'; ?>
      <!-- <script>
        function myfunction(){
          alert("You Register on Donation Page")
        }
      </script> -->
</body>
</html>