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
    <title>AXGG | Orders</title>
    <link rel="shortcut icon" href="https://i.ibb.co/dfD3s4M/278104398-126694786613134-4231769107383237629-n-removebg-preview.png" />
    <link rel="stylesheet" href="./css/orders.css">
</head>

<body>
    <?php include('../includes/sidenav.php') ?>
    <section class="home-section">
        <div class="home-content">
            <i class='bx bx-menu'></i>
            <span class="text">Orders</span>
        </div>

        <?php
        include('../config.php');
        $perPage = 10;
        $page = isset($_GET['page']) ? intval($_GET['page']) : 1;
        $offset = ($page - 1) * $perPage;
        $sql = "SELECT * FROM orders ORDER BY ord_date DESC LIMIT $offset, $perPage";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            echo '<table>
            <thead>
                <tr>
                    <th>Order ID</th>
                    <th>Full Name</th>
                    <th>Contact</th>
                    <th>Total</th>
                    <th>Payment Method</th>
                    <th>Order Date</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>';

            while ($row = mysqli_fetch_assoc($result)) {
                $orderId = $row['ord_id'];
                $fullName = $row['full_name'];
                $contact = $row['contact'];
                $total = $row['total'];
                $paymentMethod = $row['mop'];
                $orderDate = $row['ord_date'];

                echo '<tr>
                <tr>
                    <td>' . $orderId . '</td>
                    <td>' . $fullName . '</td>
                    <td>' . $contact . '</td>
                    <td>' . $total . '</td>
                    <td>' . $paymentMethod . '</td>
                    <td>' . $orderDate . '</td>
                    <td>
                        <button class="action-button">Action</button>
                        <div class="more-options">
                        <!-- Additional options content goes here -->
                        <button class="status">Confirm</button>
                        <button class="view">View</button>
                        </div>
                    </td>
                    </tr>
                    ';
            }

            echo '</tbody>
        </table>';

            $totalOrders = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM orders"));
            $totalPages = ceil($totalOrders / $perPage);

            echo '<div class="pagination">';
            if ($page > 1) {
                echo '<a href="?page=' . ($page - 1) . '">&laquo; Previous</a>';
            }
            for ($i = 1; $i <= $totalPages; $i++) {
                echo '<a href="?page=' . $i . '" ' . ($page == $i ? 'class="active"' : '') . '>' . $i . '</a>';
            }

            if ($page < $totalPages) {
                echo '<a href="?page=' . ($page + 1) . '">Next &raquo;</a>';
            }

            echo '</div>';
        } else {
            echo 'No orders found.';
        }
        mysqli_close($conn);
        ?>
        
    </section>
    <script src="../assets/js/nav.js"></script>
    <script src="./js/orders.js"></script>
</body>

</html>