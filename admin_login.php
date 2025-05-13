<?php
session_start();
include('db_connectt.php');
if (isset($_POST['login'])) {
    // Sanitize user input
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);

    // Fetch user from the database
    $checkUser = "SELECT * FROM admin_reg WHERE email = '$email' LIMIT 1";
    $result = mysqli_query($con, $checkUser);

    if ($result && mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);

        // Verify the password
        if (password_verify($password, $user['password'])) {
            // Set session variables
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_email'] = $user['email'];

            // Redirect to home page
            header('Location: admin_index.php');
            exit();
        } else {
            echo "Invalid password.";
        }
    } else {
        echo "User does not exist.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login.css?v=<?php echo time();?>">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Log in</title>
</head>
<body>

    <nav> 
      <a href="index.php" style="text-decoration: none; color: black;"><h1>Smash The Hunger</h1></a>
        <ul>
         <!-- <a href="index.html"><li>Home</li></a> -->
         <!-- <a href="Donation.html"><li>Donation</li></a> -->
         <!-- <a href="ContactUs.html"><li>Contact Us</li></a> -->
         <!-- <a href="Registration.html"><li>Registration</li></a> -->
        </ul>
        <!-- <a href="login.html">
          <button type="button">log in</button>
        </a> -->
     </nav>


    <div class="box1">
      <div class="box2">
        <h1 style="margin-left: 70px;">Admin Login</h1>
           <form method="POST">
           <div class="form-floating mb-3">
              <input type="email" name="email" class="form-control" id="floatingInput" placeholder="name@example.com" style="width: 50%;">
              <label for="floatingInput">Email address</label>
              </div>
             <div class="form-floating">
              <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password" style="width: 50%;">
              <label for="floatingPassword">Password</label>
             </div>
             <div class="col-12">
              <button type="submit" class="btn btn-primary" style="margin-top: 10px; width: 187px; background-color: #CE7C02; border-style: none;" name="login">Log In</button>
              <button type="submit" class="btn btn-primary" style="margin-top: 10px; width: 187px; background-color: #CE7C02; border-style: none;"><a style="color: white;text-decoration: none;" href="Registration.php">Sign Up</a></button><br>
              <a href="donor_login.php" style="color: black;text-decoration: none; margin-left: 100px;">Donor Login</a>
              <a href="login.php" style="color: black;text-decoration: none; ">/Receiver Login</a>
            </div>
           </form>
      </div>
    </div>

 
    <?php include 'footer.html'; ?>
</body>
</html>