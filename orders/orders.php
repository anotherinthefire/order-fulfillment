<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AXGG | Orders</title>
    <link rel="shortcut icon" href="https://i.ibb.co/dfD3s4M/278104398-126694786613134-4231769107383237629-n-removebg-preview.png" />
    <style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
            text-align: center;
        }

        td,
        th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
            text-align: center;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }

        /* Pagination Styles */
        .pagination {
            margin-top: 20px;
            text-align: center;
        }

        .pagination a {
            display: inline-block;
            padding: 8px 16px;
            text-decoration: none;
            color: #000;
            border: 1px solid #ddd;
            margin-right: 5px;
        }

        .pagination a.active {
            background-color: #ddd;
        }

        .pagination a:hover {
            background-color: #f1f1f1;
        }

        /* Action Button Styles */
        .action-button {
            padding: 8px 16px;
            background-color: #4CAF50;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .action-button:hover {
            background-color: #45a049;
        }

        .action-button:focus {
            outline: none;
        }

        /* More Options Button Styles */
        .action-button {
            padding: 8px 16px;
            background-color: #ccc;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .action-button:hover {
            background-color: #999;
        }

        .action-button:focus {
            outline: none;
        }

        /* More Options Content Styles */
        .more-options {
            display: none;
            padding: 10px;
        }

        .more-options button{
            border: transparent;
        }

        .more-options .status{
            background-color: #A5F297;
            padding: 5px;
            border-radius: 5px;
        }

        .more-options .view{
            background-color: #5876CE;
            border-radius: 5px;
            padding: 5px;
        }
        .more-options.show {
            display: block;
        }
    </style>
</head>

<body>
    <?php include('../includes/sidenav.php') ?>
    <section class="home-section">
        <div class="home-content">
            <i class='bx bx-menu'></i>
            <span class="text">Pendng</span>
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
    <script>
        // Get all action buttons in the table
        var actionButtons = document.getElementsByClassName('action-button');

        // Attach click event listeners to the action buttons
        for (var i = 0; i < actionButtons.length; i++) {
            actionButtons[i].addEventListener('click', toggleMoreOptions);
        }

        // Function to toggle the visibility of more options
        function toggleMoreOptions() {
            var moreOptions = this.nextElementSibling;
            moreOptions.classList.toggle('show');
        }
    </script>
</body>

</html>