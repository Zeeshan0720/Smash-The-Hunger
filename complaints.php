<?php
session_start();
include('db_connectt.php');
$sql = "SELECT * FROM complaints";
$result = $con->query($sql);

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
    <title>Complaints</title>
</head>
<body>

<?php include 'admin_navbar.html'; ?>


    <div class="box1">
      <div class="box2">
        <h1 >Complaints</h1>

       
   <div id="displaytble" style="margin-left: -260px;" >
   <table >
        <thead>
            <tr>
                <th >Receiver'sEmail</th>
                <th>Donor Name</th>
                <th>Food</th>
                <th>Quantity</th>
                <th>Date of Receving</th>
                <!-- <th>ExpiryDate</th>
                <th>Mobile</th>
                <th>Alternative Mobile</th>
                <th>Address</th> -->
            </tr>
        </thead>
        <tbody>

            
           
    <?php
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['email'] . "</td>";
            echo "<td>" . $row['d_name'] . "</td>";
            echo "<td>" . $row['fname'] . "</td>";
            echo "<td>" . $row['qty'] . " " . $row['qty_type'] . "</td>";
            echo "<td>" . $row['date'] . "</td>";
            // echo "<td>" . $row['exp'] . "</td>";
            // echo "<td>" . $row['mobile'] . "</td>";
            // echo "<td>" . $row['alter_mobile'] . "</td>";
            // echo "<td>" . $row['address'] . "</td>";
            echo "<td><a style='background-color: #CE7C02;border-style:none;' href='complaintsdetails.php?id=" . $row['c_id'] . "' class='btn btn-primary'>Details</a></td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='7'>No data found</td></tr>";
    }
    ?>
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