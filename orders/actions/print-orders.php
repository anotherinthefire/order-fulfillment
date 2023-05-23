<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AXGG | Paid</title>
    <link rel="shortcut icon" href="https://i.ibb.co/dfD3s4M/278104398-126694786613134-4231769107383237629-n-removebg-preview.png" />
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- latest bootstrap cdn -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

    <!-- font-awesome cdn -->
    <script src="https://kit.fontawesome.com/3481525a72.js" crossorigin="anonymous"></script>

    <!-- jquery datatable css cdn -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.css">
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

        @media print {
            .no-print {
                display: none;
            }
        }
    </style>
</head>

<body>
    <section class="home-section">
        <div class="home-content">
        </div>


        <?php
        include('../../config.php');
        function getAddressById($addressId)
        {
            global $conn;
            $sql = "SELECT * FROM address WHERE add_id = $addressId";
            $result = mysqli_query($conn, $sql);

            if ($result && mysqli_num_rows($result) > 0) {
                $addressData = mysqli_fetch_assoc($result);
                return $addressData;
            } else {
                return null; 
            }
        }


        function getOrderById($orderId)
        {
            global $conn;
            $sql = "SELECT * FROM orders WHERE ord_id = $orderId";
            $result = mysqli_query($conn, $sql);

            if ($result && mysqli_num_rows($result) > 0) {
                $orderData = mysqli_fetch_assoc($result);
                return $orderData;
            } else {
                return null;
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
                return array();
            }
        }

        if (isset($_GET['id'])) {
            $orderId = $_GET['id'];
            $orderData = getOrderById($orderId);
            $orderedProducts = getOrderedProducts($orderId);

            if ($orderData) {
                $addressId = $orderData['add_id'];
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
                            $totalAmount = 0; 
                            
                            foreach ($orderedProducts as $product) {
                                $productTotal = $product['prod_price'] * $product['quantity']; 
                                $totalAmount += $productTotal;
                            ?>
                                <tr>
                                    <td><img src="../../../barcodes/<?php echo $product['barcode']; ?>" alt="Barcode" style="height:20px; width:100%"></td>
                                    <td><span><?php echo $product['prod_name']; ?></span></td>

                                    <td><span data-prefix>₱</span><span><?php echo $product['prod_price']; ?></span></td>
                                    <td><span>x<?php echo $product['quantity']; ?></span></td>
                                    <td><span data-prefix>₱</span><span><?php echo $productTotal; ?></span></td>
                                </tr>
                            <?php
                            }
                            ?>

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
                <aside style="margin-left:5%; margin-right: 5%; padding-bottom:5%; text-align: center;">
                    <h1><span>Customer Notes</span></h1>
                    <div>
                        <p><?php echo $orderData['note'] ?></p>
                    </div>
                </aside>


                <button onclick="window.print()" class="no-print" style="margin-left:70vw; margin-bottom: 5vw;">Print</button>


                <button onclick="window.history.back()" class="no-print">Back</button>


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
        function printPage() {
            window.print();
        }
    </script>
</body>

</html>