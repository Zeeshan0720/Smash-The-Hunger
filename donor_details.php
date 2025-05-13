<?php
session_start();
include('db_connectt.php');
if (isset($_GET['id'])) {
    $id = intval($_GET['id']); // Sanitize input to prevent SQL injection
    $sql = "SELECT * FROM active_donations WHERE d_id = $id"; // Replace 'users' with your table name
    $result = $con->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "No record found.";
        exit;
    }
} else {
    echo "Invalid request.";
    exit;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="activedonor.css?v=<?php echo time();?>">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Details</title>
</head>
<body>

<?php include 'donor_navbar.html'; ?>


    <div class="box1">
      <div class="box2">
        <h1 >Details</h1>
        <div id="displaytble">
   <table >
        <!-- <thead>
            
            </thead> -->
            <tbody>
            <tr>
            <th >Email</th>
            <td><?php echo $row['email']; ?></td>
            </tr>
            <tr>
            <th>Donor Name</th>
            <td><?php echo $row['first_name'] . " " . $row['last_name']; ?></td>
            </tr>
            <tr>
                <th>Food</th>
            <td><?php echo $row['fname']; ?></td>
            </tr>
            <tr>
                <th>Quantity</th>
            <td><?php echo $row['qty'] . " " . $row['qty_value']; ?></td>
            </tr>
            <tr>
                <th>Manufacturing Date</th>
            <td><?php echo $row['mfg']; ?></td>
            </tr>
            <tr>
                <th>ExpiryDate</th>
            <td><?php echo $row['exp']; ?></td>
            </tr>
            <tr>
                <th>Mobile</th>
            <td><?php echo $row['mobile']; ?></td>
            </tr>
            <tr>
                
                <th>Alternative Mobile</th>
            <td><?php echo $row['alter_mobile']; ?></td>
            </tr>
            <tr>
                
                <th>Address</th>
            <td><?php echo $row['city'] . " " . $row['state']. " " . $row['pincode']; ?></td>
            </tr>
            <tr>
           <?php  echo "<td>
                                    <form action='donor_deletedonation.php' method='POST' >
                                        <input type='hidden' name='id' value='" . $row['d_id'] . "'>
                                        <button type='submit' name='delete'style='background-color: #CE7C02;border-style:none;' class='btn btn-primary'>Delete</button>
                                    </form>
                                  </td>";?>
            </tr>

            
           
    
        </tbody>
    </table>
    
   </div>
    <?php
   
    $con->close();
    ?>
       
      </div>
    </div>
    <?php include 'footer.html'; ?>
 

</body>
</html>