<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AXGG | Pending</title>
    <link rel="shortcut icon" href="https://i.ibb.co/dfD3s4M/278104398-126694786613134-4231769107383237629-n-removebg-preview.png" />
    <style>
        * {
            border: 0;
            box-sizing: content-box;
            color: inherit;
            font-family: inherit;
            font-size: inherit;
            font-style: inherit;
            font-weight: inherit;
            line-height: inherit;
            list-style: none;
            margin: 0;
            padding: 0;
            text-decoration: none;
            vertical-align: top
        }

        h1 {
            font: bold 100% sans-serif;
            letter-spacing: .5em;
            text-align: center;
            text-transform: uppercase
        }

        table {
            font-size: 75%;
            table-layout: fixed;
            width: 100%
        }

        table {
            border-collapse: separate;
            border-spacing: 2px
        }

        td,
        th {
            border-width: 1px;
            padding: .5em;
            position: relative;
            text-align: left
        }

        td,
        th {
            border-radius: .25em;
            border-style: solid
        }

        th {
            background: #eee;
            border-color: #bbb
        }

        td {
            border-color: #ddd
        }

        header {
            margin: 0 0 3em
        }

        header:after {
            clear: both;
            content: "";
            display: table
        }

        header h1 {
            background: #000;
            border-radius: .25em;
            color: #fff;
            margin: 0 0 1em;
            padding: .5em 0
        }

        header address {
            float: left;
            font-size: 75%;
            font-style: normal;
            line-height: 1.25;
            margin: 0 1em 1em 0
        }

        header address p {
            margin: 0 0 .25em
        }

        header img,
        header span {
            display: block;
            float: right
        }

        header span {
            margin: 0 0 1em 1em;
            max-height: 25%;
            max-width: 60%;
            position: relative
        }

        header img {
            max-height: 100%;
            max-width: 100%
        }

        header input {
            cursor: pointer;
            height: 100%;
            left: 0;
            opacity: 0;
            position: absolute;
            top: 0;
            width: 100%
        }

        article,
        article address,
        table.inventory,
        table.meta {
            margin: 0 0 3em
        }

        article:after {
            clear: both;
            content: "";
            display: table
        }

        article h1 {
            clip: rect(0 0 0 0);
            position: absolute
        }

        article address {
            float: left;
            font-size: 125%;
            font-weight: 700
        }

        table.balance,
        table.meta {
            float: right;
            width: 36%
        }

        table.balance:after,
        table.meta:after {
            clear: both;
            content: "";
            display: table
        }

        table.meta th {
            width: 40%
        }

        table.meta td {
            width: 60%
        }

        table.inventory {
            clear: both;
            width: 100%
        }

        table.inventory th {
            font-weight: 700;
            text-align: center
        }

        table.inventory td:nth-child(1) {
            width: 26%
        }

        table.inventory td:nth-child(2) {
            width: 38%
        }

        table.inventory td:nth-child(3) {
            text-align: right;
            width: 12%
        }

        table.inventory td:nth-child(4) {
            text-align: right;
            width: 12%
        }

        table.inventory td:nth-child(5) {
            text-align: right;
            width: 12%
        }

        table.balance td,
        table.balance th {
            width: 50%
        }

        table.balance td {
            text-align: right
        }

        aside h1 {
            border: none;
            border-width: 0 0 1px;
            margin: 0 0 1em
        }

        aside h1 {
            border-color: #999;
            border-bottom-style: solid
        }

        .add,
        .cut {
            border-width: 1px;
            display: block;
            font-size: .8rem;
            padding: .25em .5em;
            float: left;
            text-align: center;
            width: .6em
        }

        .add,
        .cut {
            background: #9af;
            box-shadow: 0 1px 2px rgba(0, 0, 0, .2);
            background-image: -moz-linear-gradient(#00adee 5%, #0078a5 100%);
            background-image: -webkit-linear-gradient(#00adee 5%, #0078a5 100%);
            border-radius: .5em;
            border-color: #0076a3;
            color: #fff;
            cursor: pointer;
            font-weight: 700;
            text-shadow: 0 -1px 2px rgba(0, 0, 0, .333)
        }

        .add {
            margin: -2.5em 0 0
        }

        .add:hover {
            background: #00adee
        }

        .cut {
            opacity: 0;
            position: absolute;
            top: 0;
            left: -1.5em
        }

        .cut {
            -webkit-transition: opacity .1s ease-in
        }

        tr:hover .cut {
            opacity: 1
        }

        @media print {
            * {
                -webkit-print-color-adjust: exact
            }

            html {
                background: 0 0;
                padding: 0
            }

            body {
                box-shadow: none;
                margin: 0
            }

            span:empty {
                display: none
            }

            .add,
            .cut {
                display: none
            }
        }

        @page {
            margin: 0
        }


        button {
            background: #FBCA1F;
            font-family: inherit;
            padding: 0.6em 1.3em;
            font-weight: 900;
            font-size: 18px;
            border: 3px solid black;
            border-radius: 0.4em;
            box-shadow: 0.1em 0.1em;
        }

        button:hover {
            transform: translate(-0.05em, -0.05em);
            box-shadow: 0.15em 0.15em;
        }

        button:active {
            transform: translate(0.05em, 0.05em);
            box-shadow: 0.05em 0.05em;
        }







        .row {
            display: flex;
        }

        .column {
            flex: 1;
            width: 25%;
            padding: 10px;
        }

        /* Style the images inside the grid */
        .column img {
            opacity: 0.8;
            cursor: pointer;
        }

        .column img:hover {
            opacity: 1;
        }

        /* Clear floats after the columns */
        .row:after {
            content: "";
            display: table;
            clear: both;
        }

        /* The expanding image container */
        .container {
            position: relative;
            display: none;
        }

        /* Expanding image text */
        #imgtext {
            position: absolute;
            bottom: 15px;
            left: 15px;
            color: white;
            font-size: 20px;
        }

        /* Closable button inside the expanded image */
        .closebtn {
            position: absolute;
            top: 10px;
            right: 15px;
            color: white;
            font-size: 35px;
            cursor: pointer;
        }






        .modal {
            display: none;
            position: fixed;
            z-index: 999;
            left: 0;
            top: 0;
            width: 100%;
            height: 100vh;
            background-color: rgba(0, 0, 0, 0.4);
        }

        .modal-content {
            background-color: #fff;
            border: 1px solid rgb(159, 159, 160);
            border-radius: 20px;
            padding: 2rem 0.7rem 0.7rem 0.7rem;
            text-align: center;
            font-size: 1.125rem;
            max-width: 320px;
            margin: 20% auto;
            margin-top: 25vh;
            margin-bottom: auto;
        }


        .form-title {
            color: #000000;
            font-size: 1.8rem;
            font-weight: 500;
        }

        .form-paragraph {
            margin-top: 10px;
            font-size: 0.9375rem;
            color: rgb(105, 105, 105);
        }

        .drop-container {
            background-color: #fff;
            position: relative;
            display: flex;
            gap: 10px;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 10px;
            margin-top: 2.1875rem;
            border-radius: 10px;
            border: 2px dashed rgb(171, 202, 255);
            color: #444;
            cursor: pointer;
            transition: background .2s ease-in-out, border .2s ease-in-out;
        }

        .drop-container:hover {
            background: rgba(0, 140, 255, 0.164);
            border-color: rgba(17, 17, 17, 0.616);
        }

        .drop-container:hover .drop-title {
            color: #222;
        }

        .drop-title {
            color: #444;
            font-size: 20px;
            font-weight: bold;
            text-align: center;
            transition: color .2s ease-in-out;
        }

        #file-input {
            width: 350px;
            max-width: 100%;
            color: #444;
            padding: 2px;
            background: #fff;
            border-radius: 10px;
            border: 1px solid rgba(8, 8, 8, 0.288);
        }

        #file-input::file-selector-button {
            margin-right: 20px;
            border: none;
            background: #084cdf;
            padding: 10px 20px;
            border-radius: 10px;
            color: #fff;
            cursor: pointer;
            transition: background .2s ease-in-out;
        }

        #file-input::file-selector-button:hover {
            background: #0d45a5;
        }
    </style>
</head>

<body>
    <?php include('../includes/sidenav.php') ?>
    <section class="home-section">
        <div class="home-content">
            <i class='bx bx-menu'></i>
            <span class="text">Confirmed Order</span>
        </div>


        <?php
        include('../config.php');



        function getAddressById($addressId)
        {
            global $conn;

            // Prepare and execute the query to fetch the address data
            $sql = "SELECT * FROM address WHERE add_id = $addressId";
            $result = mysqli_query($conn, $sql);

            if ($result && mysqli_num_rows($result) > 0) {
                $addressData = mysqli_fetch_assoc($result);
                return $addressData;
            } else {
                return null; // Return null if address is not found
            }
        }


        function getOrderById($orderId)
        {
            global $conn;

            // Prepare and execute the query to fetch the order data
            $sql = "SELECT * FROM orders WHERE ord_id = $orderId";
            $result = mysqli_query($conn, $sql);

            if ($result && mysqli_num_rows($result) > 0) {
                $orderData = mysqli_fetch_assoc($result);
                return $orderData;
            } else {
                return null; // Return null if order is not found
            }
        }


        function getOrderedProducts($orderId)
        {
            global $conn;

            $sql = "SELECT op.*, p.prod_name, p.prod_price, s.barcode
            FROM ordered_products op
            INNER JOIN stock s ON op.stock_id = s.stock_id
            INNER JOIN products p ON s.prod_id = p.prod_id
            WHERE op.ord_id = $orderId";
            $result = mysqli_query($conn, $sql);


            if ($result && mysqli_num_rows($result) > 0) {
                $orderedProducts = array();
                while ($row = mysqli_fetch_assoc($result)) {
                    $orderedProducts[] = $row;
                }
                return $orderedProducts;
            } else {
                return array(); // Return an empty array if no ordered products found
            }
        }

        if (isset($_GET['id'])) {
            $orderId = $_GET['id'];

            // Call the getOrderById function to retrieve the order data
            $orderData = getOrderById($orderId);
            $orderedProducts = getOrderedProducts($orderId);

            if ($orderData) {
                $addressId = $orderData['add_id'];
                // Call the getAddressById function to retrieve the address data
                $addressData = getAddressById($addressId);

        ?>
                <header style="margin-left:5%; margin-right: 5%;">
                    <h1>Order#<?php echo $orderData['ord_id'] ?></h1>
                    <addres>
                        <p><b>Name: </b><?php echo $orderData['full_name'] ?></p>
                        <?php
                        if ($addressData) {
                        ?>
                            <p><b>Address: </b><?php echo $addressData['room'] ?>
                                <?php echo $addressData['company'] ?>
                                <?php echo $addressData['house_no'] ?>
                                <?php echo $addressData['street'] ?>,
                                <?php echo $addressData['barangay'] ?>,
                                <?php echo $addressData['city'] ?>, <br>
                                <?php echo $addressData['province'] ?>,
                                <?php echo $addressData['postal_code'] ?>,
                                <?php echo $addressData['region'] ?></p>
                        <?php } else {
                            echo 'Address not found.';
                        } ?>

                        <p><b>Contact: </b><?php echo $orderData['contact'] ?></p>
                    </addres>

                </header>
                <article style="margin-left:5%; margin-right: 5%;">
                    <h1>Recipient</h1>
                    <address>
                        <p>AXGG<br>Anime X Gaming Guild</p>
                    </address>
                    <table class="meta">
                        <tr>
                            <th><span>Order#</span></th>
                            <td><span><?php echo $orderData['ord_id'] ?></span></td>
                        </tr>
                        <tr>
                            <th><span>Date and Time</span></th>
                            <td><span><?php echo $orderData['ord_date'] ?></span></td>
                        </tr>
                        <tr>
                            <th><span>Amount Due</span></th>
                            <td><span id="prefix">₱</span><span><?php echo $orderData['total'] ?></span></td>
                        </tr>
                    </table>

                    <table class="inventory">
                        <thead>
                            <tr>
                                <th><span>Barcode</span></th>
                                <th><span>Product</span></th>
                                <th><span>Price</span></th>
                                <th><span>Quantity</span></th>
                                <th><span>Total</span></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $totalAmount = 0; // Initialize a variable to store the total amount

                            foreach ($orderedProducts as $product) {
                                $productTotal = $product['prod_price'] * $product['quantity']; // Compute the total for each product
                                $totalAmount += $productTotal; // Add the product total to the overall total

                                // Display the product details
                            ?>
                                <tr>
                                    <td><img src="../../barcodes/<?php echo $product['barcode']; ?>" alt="Barcode" style="height:20px; width:100%"></td>
                                    <td><span><?php echo $product['prod_name']; ?></span></td>

                                    <td><span data-prefix>₱</span><span><?php echo $product['prod_price']; ?></span></td>
                                    <td><span>x<?php echo $product['quantity']; ?></span></td>
                                    <td><span data-prefix>₱</span><span><?php echo $productTotal; ?></span></td>
                                </tr>
                            <?php
                            }
                            ?>

                            <!-- <a class="add">+</a> -->
                            <table class="balance">
                                <tr>
                                    <th><span>Order Total</span></th>
                                    <td><span data-prefix>₱</span><span><?php echo $totalAmount; ?></span></td>
                                </tr>
                                <tr>
                                    <th><span>Shipping Fee</span></th>
                                    <td><span data-prefix>₱</span><span><?php echo $orderData['shipping']; ?></span></td>
                                </tr>
                                <tr>
                                    <th><span>Total</span></th>
                                    <td><span data-prefix>₱</span><span><?php echo $totalAmount + $orderData['shipping']; ?></span></td>
                                </tr>
                            </table>

                </article>
                <aside style="margin-left:5%; margin-right: 5%; padding-bottom:5%; text-align: center; ">
                    <h1><span>Customer Notes</span></h1>
                    <div style="margin-bottom: 50px;">
                        <p><?php echo $orderData['note'] ?></p>
                    </div>

                    <div class="row" style="text-align:center">
                        <h1><span>Proof</span></h1>
                        <?php
                        include('../config.php');

                        $proofQuery = "SELECT * FROM proof WHERE ord_id = $orderId";
                        $proofResult = mysqli_query($conn, $proofQuery);

                        if (mysqli_num_rows($proofResult) > 0) {
                            echo '<div class="row">';

                            while ($proofRow = mysqli_fetch_assoc($proofResult)) {
                                $paymentImg = $proofRow['payment_img'];
                                $pickupImg = $proofRow['pickup_img'];
                                $deliveredImg = $proofRow['delivered_img'];
                                $remarksImg = $proofRow['remarks_img'];

                                echo '
                                <div class="column">
                                <img src="../../proof/' . $paymentImg . '" alt="Payment: ' . $proofRow['payment_date'] . '" style="width:100%" onclick="myFunction(this);">
                                <p>payment</p>
                                </div>
                                <div class="column">
                                <img src="../../proof/' . $pickupImg . '" alt="Pickup: ' . $proofRow['pickup_date'] . '" style="width:100%" onclick="myFunction(this);">
                                <p>pickup</p>
                                </div>
                                <div class="column">
                                <img src="../../proof/' . $deliveredImg . '" alt="Delivered: ' . $proofRow['delivered_date'] . '" style="width:100%" onclick="myFunction(this);">
                                <p>delivered</p>
                                </div>
                                <div class="column">
                                <img src="../../proof/' . $remarksImg . '" alt="Remarks: ' . $proofRow['remarks_date'] . '" style="width:100%" onclick="myFunction(this);">
                                <p>remarks</p>
                                </div>
                                ';
                            }

                            echo '</div>';
                        } else {
                            echo '<p>No proofs yet</p>';
                        }
                        ?>


                    </div>

                    <div class="container">
                        <span onclick="this.parentElement.style.display='none'" class="closebtn" style="color:black;">&times;</span>
                        <img id="expandedImg" style="width:100%">
                        <div id="imgtext" style="color:black;"></div>
                    </div>
                </aside>


                <form id="cancelForm" action="actions/to-cancelled.php" method="POST">
                    <input type="hidden" name="orderId" value="<?php echo $orderId; ?>">
                </form>


                <form action="actions/to-paid.php" method="POST" style="display: inline;">
                    <input type="hidden" name="orderId" value="<?php echo $orderId; ?>">
                    <button style="margin-left: 65%; margin-bottom: 50px;" type="submit" name="paid" class="status">Paid</button>
                </form>

                <button onclick="openModal()">Proof</button>
                <button onclick="submitCancelForm()" type="button" name="cancel" class="status">Cancel</button>

                <a href="confirmed.php" style="color:black;">
                    <button>Back</button>
                </a>

                <?php
                include('../config.php');

                function insertPaymentImage($orderId, $imageFile)
                {
                    global $conn;

                    // Get the current timestamp
                    $timestamp = date('Y-m-d H:i:s');

                    // Generate a unique filename for the image
                    $filename = uniqid();
                    $fileExtension = strtolower(pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION));
                    $filename .= '.' . $fileExtension;

                    // Specify the destination folder to save the image
                    $destination = '../../proof/' . $filename;

                    // Move the uploaded file to the destination folder
                    if (move_uploaded_file($imageFile, $destination)) {
                        // Check if the order ID already exists in the proof table
                        $existingQuery = "SELECT * FROM proof WHERE ord_id = $orderId";
                        $existingResult = mysqli_query($conn, $existingQuery);

                        if (mysqli_num_rows($existingResult) > 0) {
                            // Update the existing row with the new image filename and timestamp
                            $updateSql = "UPDATE proof SET payment_img = '$filename', payment_date = '$timestamp' WHERE ord_id = $orderId";
                            $updateResult = mysqli_query($conn, $updateSql);

                            if ($updateResult) {
                                // Update successful
                                return true;
                            } else {
                                // Update failed
                                return false;
                            }
                        } else {
                            // Insert a new row with the image filename and timestamp
                            $insertSql = "INSERT INTO proof (ord_id, payment_img, payment_date) VALUES ($orderId, '$filename', '$timestamp')";
                            $insertResult = mysqli_query($conn, $insertSql);

                            if ($insertResult) {
                                // Insertion successful
                                return true;
                            } else {
                                // Insertion failed
                                return false;
                            }
                        }
                    } else {
                        // File move failed
                        return false;
                    }
                }

                // Handle the form submission
                if (isset($_FILES['file']) && isset($_POST['orderId'])) {
                    $orderId = $_POST['orderId'];
                    $imageFile = $_FILES['file']['tmp_name'];

                    $allowedExtensions = ['jpg', 'jpeg', 'png'];
                    $fileExtension = strtolower(pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION));
                    $samepage = "http://localhost/overallsia/order-fulfillment/orders/confirmed-view.php?id=" . $orderId;
                    if (in_array($fileExtension, $allowedExtensions)) {
                        if (insertPaymentImage($orderId, $imageFile)) {
                            echo '<script>alert("Payment proof uploaded successfully."); window.location.href = "' . $samepage . '";</script>';
                        } else {
                            echo '<script>alert("Failed to upload payment proof.");</script>';
                        }
                    } else {
                        echo '<script>alert("Only JPG, JPEG, and PNG files are allowed.");</script>';
                    }
                }
                ?>

                <div class="modal" id="myModal">
                    <div class="modal-content">
                        <form class="form" method="POST" enctype="multipart/form-data">
                            <span class="form-title">Upload proof</span>
                            <p class="form-paragraph">
                                File should be an image (JPG, JPEG, PNG)
                            </p>
                            <label for="file-input" class="drop-container">
                                <span class="drop-title">Drop files here</span>
                                or
                                <input type="file" accept=".jpg, .jpeg, .png" required="" id="file-input" name="file">
                            </label>
                            <input type="hidden" name="orderId" value="<?php echo $orderId; ?>">
                            <button type="submit" class="upload-button">Upload</button>
                        </form>
                    </div>
                </div>




        <?php
            } else {
                echo 'Order not found.';
            }
        } else {
            echo 'Order ID not provided in the URL.';
        }

        mysqli_close($conn);
        ?>


    </section>
    <script src="../assets/js/nav.js"></script>
    <script>
        function submitCancelForm() {
            document.getElementById("cancelForm").submit();
        }

        function myFunction(imgs) {
            var expandImg = document.getElementById("expandedImg");
            var imgText = document.getElementById("imgtext");
            expandImg.src = imgs.src;
            imgText.innerHTML = imgs.alt;
            expandImg.parentElement.style.display = "block";
        }

        function openModal() {
            var modal = document.getElementById("myModal");
            modal.style.display = "block";
        }

        window.onclick = function(event) {
            var modal = document.getElementById("myModal");
            if (event.target == modal) {
                modal.style.display = "none";
            }
        };
    </script>
</body>

</html>