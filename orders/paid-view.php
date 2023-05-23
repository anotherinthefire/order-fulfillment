<!DOCTYPE html>
<html lang="en">
<?php
include("../includes/check-pages.php");
checkLoginStatus();
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AXGG | Paid</title>
    <link rel="shortcut icon" href="https://i.ibb.co/dfD3s4M/278104398-126694786613134-4231769107383237629-n-removebg-preview.png" />
    <link rel="stylesheet" href="./css/paid-view.css">
</head>

<body>
    <?php include('../includes/sidenav.php') ?>
    <section class="home-section">
        <div class="home-content">
            <i class='bx bx-menu'></i>
            <span class="text">Paid Order</span>
        </div>

        <?php
        include('../config.php');
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
                                    <td><img src="../../barcodes/<?php echo $product['barcode']; ?>" alt="Barcode" style="height:20px; width:100%"></td>
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

                <form id="cancelForm" action="actions/to-cancelled.php" method="POST">
                    <input type="hidden" name="orderId" value="<?php echo $orderId; ?>">
                </form>

                <form action="actions/to-pickup.php" method="POST" style="display: inline;">
                    <input type="hidden" name="orderId" value="<?php echo $orderId; ?>">
                    <button style="margin-left: 70%; margin-bottom: 50px;" type="submit" name="pickup" class="status">ready for pickup</button>
                </form>

                <a href="actions/print-orders.php?id=<?php echo $orderId ?>" style="color:#000"><button><i class="bx bx-printer" style="font-size: 24px;"></i></button></a>


                <a href="paid.php" style="color:black;">
                    <button>Back</button>
                </a>

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
</body>

</html>