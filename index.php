<!DOCTYPE html>
<html lang="en">
<?php
include("includes/check.php");
checkLoginStatus();
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AXGG | Dashboard </title>
    <link rel="shortcut icon" href="https://i.ibb.co/dfD3s4M/278104398-126694786613134-4231769107383237629-n-removebg-preview.png" />
    <style>
        /* =========== Google Fonts ============ */
        @import url("https://fonts.googleapis.com/css2?family=Ubuntu:wght@300;400;500;700&display=swap");

        /* =============== Globals ============== */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            --blue: #1d1b31;
            --white: #fff;
            --gray: #f5f5f5;
            --black1: #222;
            --black2: #999;
        }

        body {
            min-height: 100vh;
            overflow-x: hidden;
        }

        .container {
            position: relative;
            width: 100%;
        }

        /* ===================== Main ===================== */
        .main {
            position: absolute;
            width: 100%;
            min-height: 100vh;
            background: var(--white);
            transition: 0.5s;
        }

        .main.active {
            width: calc(100% - 80px);
            left: 80px;
        }

        .topbar {
            width: 100%;
            height: 60px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 10px;
        }

        .toggle {
            position: relative;
            width: 60px;
            height: 60px;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 2.5rem;
            cursor: pointer;
        }

        .search {
            position: relative;
            width: 400px;
            margin: 0 10px;
        }

        .search label {
            position: relative;
            width: 100%;
        }

        .search label input {
            width: 100%;
            height: 40px;
            border-radius: 40px;
            padding: 5px 20px;
            padding-left: 35px;
            font-size: 18px;
            outline: none;
            border: 1px solid var(--black2);
        }

        .search label ion-icon {
            position: absolute;
            top: 0;
            left: 10px;
            font-size: 1.2rem;
        }

        .user {
            position: relative;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            overflow: hidden;
            cursor: pointer;
        }

        .user img {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        /* ======================= Cards ====================== */
        .cardBox {
            position: relative;
            width: 100%;
            padding: 20px;
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            grid-gap: 30px;
        }

        .cardBox .card {
            position: relative;
            background: var(--white);
            padding: 30px;
            border-radius: 20px;
            display: flex;
            justify-content: space-between;
            cursor: pointer;
            box-shadow: 0 7px 25px rgba(0, 0, 0, 0.08);
        }

        .cardBox .card .numbers {
            position: relative;
            font-weight: 500;
            font-size: 2.5rem;
            color: var(--blue);
        }

        .cardBox .card .cardName {
            color: var(--black2);
            font-size: 1.1rem;
            margin-top: 5px;
        }

        .cardBox .card .iconBx {
            font-size: 3.5rem;
            color: var(--black2);
        }

        .cardBox .card:hover {
            background: var(--blue);
        }

        .cardBox .card:hover .numbers,
        .cardBox .card:hover .cardName,
        .cardBox .card:hover .iconBx {
            color: var(--white);
        }

        /* ================== Order Details List ============== */
        .details {
            position: relative;
            width: 100%;
            padding: 20px;
            display: grid;
            grid-template-columns: 2fr 1fr;
            grid-gap: 30px;
            /* margin-top: 10px; */
        }

        .details .recentOrders {
            position: relative;
            display: grid;
            min-height: 500px;
            background: var(--white);
            padding: 20px;
            box-shadow: 0 7px 25px rgba(0, 0, 0, 0.08);
            border-radius: 20px;
        }

        .details .cardHeader {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
        }

        .cardHeader h2 {
            font-weight: 600;
            color: var(--blue);
        }

        .cardHeader .btn {
            position: relative;
            padding: 5px 10px;
            background: var(--blue);
            text-decoration: none;
            color: var(--white);
            border-radius: 6px;
        }

        .details table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        .details table thead td {
            font-weight: 600;
        }

        .details .recentOrders table tr {
            color: var(--black1);
            border-bottom: 1px solid rgba(0, 0, 0, 0.1);
        }

        .details .recentOrders table tr:last-child {
            border-bottom: none;
        }

        .details .recentOrders table tbody tr:hover {
            background: var(--blue);
            color: var(--white);
        }

        .details .recentOrders table tr td {
            padding: 10px;
        }

        .details .recentOrders table tr td:last-child {
            text-align: center;
        }

        .details .recentOrders table tr td:nth-child(2) {
            text-align: center;
        }

        .details .recentOrders table tr td:nth-child(3) {
            text-align: center;
        }

        .recentCustomers {
            position: relative;
            display: grid;
            min-height: 500px;
            padding: 20px;
            background: var(--white);
            box-shadow: 0 7px 25px rgba(0, 0, 0, 0.08);
            border-radius: 20px;
        }

        .recentCustomers .imgBx {
            position: relative;
            width: 40px;
            height: 40px;
            border-radius: 50px;
            overflow: hidden;
        }

        .recentCustomers .imgBx img {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .recentCustomers table tr td {
            padding: 12px 10px;
        }

        .recentCustomers table tr td h4 {
            font-size: 16px;
            font-weight: 500;
            line-height: 1.2rem;
        }

        .recentCustomers table tr td h4 span {
            font-size: 14px;
            color: var(--black2);
        }

        .recentCustomers table tr:hover {
            background: var(--blue);
            color: var(--white);
        }

        .recentCustomers table tr:hover td h4 span {
            color: var(--white);
        }

        /* ====================== Responsive Design ========================== */
        @media (max-width: 991px) {
            .navigation {
                left: -300px;
            }

            .navigation.active {
                width: 300px;
                left: 0;
            }

            .main {
                width: 100%;
                left: 0;
            }

            .main.active {
                left: 300px;
            }

            .cardBox {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 768px) {
            .details {
                grid-template-columns: 1fr;
            }

            .recentOrders {
                overflow-x: auto;
            }

            .status.inProgress {
                white-space: nowrap;
            }
        }

        @media (max-width: 480px) {
            .cardBox {
                grid-template-columns: repeat(1, 1fr);
            }

            .cardHeader h2 {
                font-size: 20px;
            }

            .user {
                min-width: 40px;
            }

            .navigation {
                width: 100%;
                left: -100%;
                z-index: 1000;
            }

            .navigation.active {
                width: 100%;
                left: 0;
            }

            .toggle {
                z-index: 10001;
            }

            .main.active .toggle {
                color: #fff;
                position: fixed;
                right: 0;
                left: initial;
            }
        }
    </style>
</head>

<body>
    <?php include('includes/land-side.php') ?>
    <section class="home-section">
        <div class="home-content">
            <i class='bx bx-menu'></i>
            <span class="text">Order and Fulfillment Management System</span>
        </div>
        <div class="main">


            <!-- ======================= Cards ================== -->
            <?php include('config.php'); ?>

            <div class="cardBox">

                <div class="card">
                    <div>
                        <div class="numbers">1,504</div>
                        <div class="cardName">Daily Views</div>
                    </div>

                    <div class="iconBx">
                        <ion-icon name="eye-outline"></ion-icon>
                    </div>
                </div>


                <?php
                $totalOrdersQuery = "SELECT COUNT(*) AS total_orders FROM orders";
                $totalOrdersResult = $conn->query($totalOrdersQuery);

                if ($totalOrdersResult->num_rows > 0) {
                    $row = $totalOrdersResult->fetch_assoc();
                    $totalOrders = $row["total_orders"];

                    echo '<div class="card">
                        <div>
                        <div class="numbers">' . $totalOrders . '</div>
                        <div class="cardName">Sales</div>
                    </div>

                    <div class="iconBx">
                        <ion-icon name="cart-outline"></ion-icon>
                    </div>
                </div>';
                }

                // Fetch the total message
                $totalMessagesQuery = "SELECT COUNT(*) AS total_messages FROM messages";
                $totalMessagesResult = $conn->query($totalMessagesQuery);

                if ($totalMessagesResult->num_rows > 0) {
                    $row = $totalMessagesResult->fetch_assoc();
                    $totalMessages = $row["total_messages"];

                    echo '<div class="card">
                    <div>
                        <div class="numbers">' . $totalMessages . '</div>
                        <div class="cardName">Messages</div>
                    </div>

                    <div class="iconBx">
                        <ion-icon name="chatbubbles-outline"></ion-icon>
                    </div>
                </div>';
                }

                // Fetch the total sales of stock 
                $totalSalesQuery = "SELECT SUM(sales) AS total_sales FROM stock";
                $totalSalesResult = $conn->query($totalSalesQuery);

                if ($totalSalesResult->num_rows > 0) {
                    $row = $totalSalesResult->fetch_assoc();
                    $totalSales = $row["total_sales"];

                    echo '<div class="card">
                    <div>
                        <div class="numbers">₱ ' . $totalSales . '</div>
                        <div class="cardName">Earning</div>
                    </div>

                    <div class="iconBx">
                        <ion-icon name="cash-outline"></ion-icon>
                    </div>
                </div>
            </div>';
                }
                ?>
                <!-- ================ Order Details List ================= -->
                <div class="details">
                    <div class="recentOrders">
                        <div class="cardHeader">
                            <h2>Recent Orders</h2>
                            <a href="./orders/orders.php" class="btn">View All</a>
                        </div>

                        <table>
                            <thead>
                                <tr>
                                    <td>Order #</td>
                                    <td>Name</td>
                                    <td>Price</td>
                                    <td>Status</td>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                function displayAllOrders($conn)
                                {
                                    $query = "SELECT ord_id, full_name, total, status FROM orders";
                                    $result = mysqli_query($conn, $query);
                                    
                                    if (mysqli_num_rows($result) == 0) {
                                        return 'No orders found.';
                                    }

                                    $html = '';
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $orderId = $row['ord_id'];
                                        $fullName = $row['full_name'];
                                        $total = $row['total'];
                                        $status = $row['status'];

                                        $statusText = getStatusText($status);

                                        $html .= '<tr>';
                                        $html .= '<td>' . $orderId . '</td>';
                                        $html .= '<td>' . $fullName . '</td>';
                                        $html .= '<td>₱' . $total . '</td>';
                                        $html .= '<td><span class="status ' . strtolower($statusText) . '">' . $statusText . '</span></td>';
                                        $html .= '</tr>';
                                    }
                                    echo $html;
                                }

                                function getStatusText($status)
                                {
                                    switch ($status) {
                                        case 0:
                                            return 'pending';
                                        case 1:
                                            return 'Follow Up';
                                        case 2:
                                            return 'Confirmed';
                                        case 3:
                                            return 'Paid';
                                        case 4:
                                            return 'Pickup';
                                        case 5:
                                            return 'Shipped';
                                        case 6:
                                            return 'Completed';
                                        case 7:
                                            return 'Refund';
                                        case 8:
                                            return 'Cancelled';
                                        default:
                                            return 'Unknown';
                                    }
                                }

                                displayAllOrders($conn);
                                ?>
                            </tbody>
                        </table>
                    </div>

                    <!-- ================= New Customers ================ -->
                    <div class="recentCustomers">
                        <div class="cardHeader">
                            <h2>Recent Customers</h2>
                        </div>

                        <table>

                            <?php
                            function displayAllUsers($conn)
                            {
                                $query = "SELECT fullname, status FROM user";
                                $result = mysqli_query($conn, $query);

                                if (mysqli_num_rows($result) == 0) {
                                    return 'No users found.';
                                }

                                $html = '';
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $fullName = $row['fullname'];
                                    $status = $row['status'];

                                    $statusText = ($status == 0) ? 'Unverified' : (($status == 1) ? 'Verified' : (($status == 2) ? 'Banned' : 'Unknown'));

                                    $html .= '<tr>';
                                    $html .= '<td>';
                                    $html .= '<h4>' . $fullName . '</h4>';
                                    $html .= '<span>' . $statusText . '</span>';
                                    $html .= '</td>';
                                    $html .= '</tr>';
                                }

                                echo $html;
                            }

                            displayAllUsers($conn);
                            ?>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="assets/js/nav.js"></script>
    <!-- ====== ionicons ======= -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script>
        let list = document.querySelectorAll(".navigation li");

        function activeLink() {
            list.forEach((item) => {
                item.classList.remove("hovered");
            });
            this.classList.add("hovered");
        }

        list.forEach((item) => item.addEventListener("mouseover", activeLink));

        // Menu Toggle
        let toggle = document.querySelector(".toggle");
        let navigation = document.querySelector(".navigation");
        let main = document.querySelector(".main");

        toggle.onclick = function() {
            navigation.classList.toggle("active");
            main.classList.toggle("active");
        };
    </script>
</body>

</html>