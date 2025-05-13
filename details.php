<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="activedonor.css?v=<?php echo time(); ?>">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" 
            crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" 
          crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Details</title>
</head>
<body>

<?php include 'reciver_navbar.html'; ?>

<div class="box1">
    <div class="box2">
        <h1>Details</h1>
        <div id="displaytble">
            <table class="table" style="margin-left:150px;">
                <tbody>
                    <tr><th>Email</th><td id="email">Loading...</td></tr>
                    <tr><th>Donor Name</th><td id="donorName">Loading...</td></tr>
                    <tr><th>Food</th><td id="food">Loading...</td></tr>
                    <tr><th>Quantity</th><td id="quantity">Loading...</td></tr>
                    <tr><th>Manufacturing Date</th><td id="mfg">Loading...</td></tr>
                    <tr><th>Expiry Date</th><td id="expiry">Loading...</td></tr>
                    <tr><th>Mobile</th><td id="mobile">Loading...</td></tr>
                    <tr><th>Alternative Mobile</th><td id="altMobile">Loading...</td></tr>
                    <tr><th>Address</th><td id="address">Loading...</td></tr>
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
            alert('Invalid request. Missing donation ID.');
            return;
        }

        // Fetch data from the API
        fetch(`getDonationDetails.php?id=${id}`)
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
                document.getElementById('donorName').textContent = `${data.first_name || ''} ${data.last_name || ''}`;
                document.getElementById('food').textContent = data.fname || 'N/A';
                document.getElementById('quantity').textContent = `${data.qty || '0'} ${data.qty_value || ''}`;
                document.getElementById('mfg').textContent = data.mfg || 'N/A';
                document.getElementById('expiry').textContent = data.exp || 'N/A';
                document.getElementById('mobile').textContent = data.mobile || 'N/A';
                document.getElementById('altMobile').textContent = data.alter_mobile || 'N/A';
                document.getElementById('address').textContent = `${data.city || ''} ${data.state || ''} ${data.pincode || ''}`;
            })
            .catch(error => {
                console.error('Error fetching data:', error);
                alert('An error occurred while fetching the details.');
            });
    });
</script>
</body>
</html>
