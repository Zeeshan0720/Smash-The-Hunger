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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="partnershipForm.css    ">
    <title>Partner With US</title>
</head>

<body>

    <nav>
        <!-- <h1>Zero Hunger</h1> -->
        <a href="index.html" style="text-decoration: none; color: black; margin-left: 485px;"><h1>Smash The Hunger</h1></a>
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
            </a>
        </ul>
        <a href="login.html">
            <button type="button">log in</button>
        </a> -->
    </nav>


    <div class="box1">
        <div class="box2">
            <h1 style="margin-bottom: 40px; text-align: center;">Partner With Us</h1>
            <div class="row g-3">
                <div class="col">
                    <label for="CompanyName" class="form-label">Company Name <span style="color: red;">*</span></label>
                    <input type="text" class="form-control" id="CompanyName" placeholder="" aria-label="First name">
                </div>
                <div class="col">
                    <label for="CompanyWepage" class="form-label">Company Name </label>
                    <input type="text" class="form-control" id="CompanyWepage" placeholder="" aria-label="Last name">
                </div>
            </div>
            <div class="row g-3">
                <div class="col">
                    <label for="NoOfEmpl" class="form-label">Number of Employee</label>
                    <input type="text" class="form-control" id="NoOfEmpl" placeholder="" aria-label="First name">
                </div>
                <div class="col">
                    <label for="NoOfCust" class="form-label">Number of Employee</label>
                    <input type="text" class="form-control" id="NoOfCust" placeholder="" aria-label="Last name">
                </div>
            </div>

            <form class="row g-3">
                <div class="col-md-6">
                    <label for="inputEmail4" class="form-label">Email</label>
                    <input type="email" class="form-control" id="inputEmail4">
                </div>
                <div class="col-md-6">
                    <label for="inputPassword4" class="form-label">Password</label>
                    <input type="password" class="form-control" id="inputPassword4">
                </div>
                <div class="col-12">
                    <label for="inputAddress" class="form-label">Address</label>
                    <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St">
                </div>
                <div class="col-12">
                    <label for="inputAddress2" class="form-label">Address 2</label>
                    <input type="text" class="form-control" id="inputAddress2"
                        placeholder="Apartment, studio, or floor">
                </div>
                <div class="col-md-6">
                    <label for="inputCity" class="form-label">City</label>
                    <input type="text" class="form-control" id="inputCity">
                </div>
                <div class="col-md-4">
                    <label for="inputState" class="form-label">State</label>
                    <select id="inputState" class="form-select">
                        <option selected>Choose...</option>
                        <option>...</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <label for="inputZip" class="form-label">Zip</label>
                    <input type="text" class="form-control" id="inputZip">
                </div>

                <div class="form-check">
                    <p>Current Demand Generation Activities (you can select more than one) <span style="color: red;">*</span></p>
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                    <label class="form-check-label" for="flexCheckDefault">
                        Email Marketing Campaigns
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
                    <label class="form-check-label" for="flexCheckChecked">
                        Social Media Engagement
                    </label>
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                    <label class="form-check-label" for="flexCheckDefault">
                        Email Marketing Campaigns
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
                    <label class="form-check-label" for="flexCheckChecked">
                        Social Media Engagement
                    </label>
                   
            
                  </div>

                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Additional Information</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                  </div>

                <!-- <div class="col-12">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="gridCheck">
                        <label class="form-check-label" for="gridCheck">
                            Check me out
                        </label>
                    </div>
                </div> -->
                <!-- <div class="col-12">
                    <button type="submit" class="btn btn-primary">Sign in</button>
                </div> -->
            </form>

        </div>
    </div>

</body>

</html>