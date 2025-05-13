<?php session_start(); ?>
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
    <title>Complaint</title>
</head>
<body>

<?php include 'admin_navbar.html'; ?>

    <div class="box1">
      <div class="box2">
        <h1>Complaint Details</h1>
        <div id="displaytble">
            <table class="table" >
                <tbody>
                    <tr><th>Email</th><td id="email">Loading...</td></tr>
                    <tr><th>Donor Name</th><td id="donorName">Loading...</td></tr>
                    <tr><th>Food</th><td id="food">Loading...</td></tr>
                    <tr><th>Quantity</th><td id="quantity">Loading...</td></tr>
                    <tr><th>Date Of Receiving</th><td id="date">Loading...</td></tr>
                    <tr><th>Manufacturing Date</th><td id="mfg">Loading...</td></tr>
                    <tr><th>Expiry Date</th><td id="exp">Loading...</td></tr>
                    <tr><th>Complaint</th><td id="msg">Loading...</td></tr>
                </tbody>
            </table>
        </div>
      </div>
    </div>

<?php include 'footer.html'; ?>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const params = new URLSearchParams(window.location.search);
        const id = params.get('id');

        if (!id) {
            alert('Invalid request. Missing complaint ID.');
            return;
        }

        // Fetch data from the API
        fetch(`getComplaintDetails.php?id=${id}`)
            .then(response => {
                if (!response.ok) {
                    throw new Error(`API Error: ${response.statusText}`);
                }
                return response.json();
            })
            .then(data => {
                if (data.error) {
                    alert(data.error);
                    return;
                }

                // Populate the table with API response
                document.getElementById('email').textContent = data.email || 'N/A';
                document.getElementById('donorName').textContent = data.d_name || 'N/A';
                document.getElementById('food').textContent = data.fname || 'N/A';
                document.getElementById('quantity').textContent = `${data.qty || '0'} ${data.qty_type || ''}`;
                document.getElementById('date').textContent = data.date || 'N/A';
                document.getElementById('mfg').textContent = data.mfg || 'N/A';
                document.getElementById('exp').textContent = data.exp || 'N/A';
                document.getElementById('msg').textContent = data.msg || 'N/A';
            })
            .catch(error => {
                console.error('Error fetching data:', error);
                alert('An error occurred while fetching the details.');
            });
    });
</script>

</body>
</html>
