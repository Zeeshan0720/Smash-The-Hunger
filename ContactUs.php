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
    <link rel="stylesheet" href="ContactUs.css">
    <title>Contact Us</title>
</head>
<body>
     
    <nav> 
      <a href="#" style="text-decoration: none; color: black;"><h1 style="margin-left: 645px;">Smash The Hunger</h1></a>
        <!-- <ul>
         <a href="index.html"><li>Home</li></a>
         <a href="Donation.html"><li>Donation</li></a>
         <a href="ContactUs.html"><li>Contact Us</li></a>
         <a href="Registration.html"><li>Registration</li></a>
        </ul>
        <a href="login.html">
          <button type="button">log in</button>
        </a> -->
        <form action="logout.php" method="POST"><button name="logout"type="submit">log out</button></form>
     </nav>
    <!-- <div id="contact-me" class="container4">
        <div class="container">
          <h1 class="Contactus-heading">Contact Us </h1>
          <h3 class="Contactus-subHeading">Questions, Thoughts,  Or Just Want to say Hello?</h3>
        
        <div class="contactus-form-container">
          <form action="#">
            <div class="formfield-container">
    
            <input class="formfield" type="text" name="name" id="" placeholder="Enter Your Name">
            <input class="formfield" type="email" name="email" id="" placeholder="Enter Your email address">
            <input class="formfield" type="text" name="subject" id="" placeholder="Enter Your Subject">
            <textarea name="message" id="" rows="10" cols="30" class="formfield formfield-textarea" placeholder="Enter Your Message"></textarea>
            </div>

            <div>
              <button type="submit" class="btn-pink" id="submit-btn">
                Send Message  <i class="submit-icon fa-solid fa-paper-plane"></i>
              </button>
            </div>
          </form>
        </div>
        
        </div> -->

        <div class="box1">
           <div class="box2">
            <h1 class="Contactus-heading">Contact Us </h1>
            <h3 class="Contactus-subHeading">Questions, Thoughts,  Or Just Want to say Hello?</h3>
             
            <div class="row">
              <div class="col">
                <input type="text" class="form-control" placeholder="First name" aria-label="First name">
              </div>
              <div class="col">
                <input type="text" class="form-control" placeholder="Last name" aria-label="Last name">
              </div>
            </div>
            <div class="mb-3">
              <!-- <label for="exampleFormControlInput1" class="form-label">Email address</label> -->
              <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="Enter Your Email Address">
            </div>
            <div class="mb-3">
              <!-- <label for="exampleFormControlTextarea1" class="form-label">Example textarea</label> -->
              <textarea class="form-control" id="exampleFormControlTextarea1" rows="8" placeholder="Enter Your Query"></textarea>
            </div>
            <div class="col-12">
              <button type="submit" class="btn btn-primary" style="background-color: #CE7C02; border-style: none;" onclick="myfunction()">Submit Register</button>
            </div>

           </div>
        </div> 

        <?php include 'footer.html'; ?>
  
    
        <!-- <script>
          function myfunction(){
            alert("Thanks for contact Us and Wait We Replay your Query fast")
          } -->
        </script>
</body>
</html>