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
	<link rel="stylesheet" href="./assets/css/style.css">
	<link rel="stylesheet" href="./assets/css/responsive.css">
</head>

<body>
	<?php include('includes/land-side.php') ?>
	<section class="home-section">
		<div class="home-content">
			<i class='bx bx-menu'></i>
			<span class="text">Order and Fulfillment Management System</span>
		</div>
		<div class="main">
			<div class="box-container">
				<?php
				include('config.php');
				//fetch orders
				$totalOrdersQuery = "SELECT COUNT(*) AS total_orders FROM orders";
				$totalOrdersResult = $conn->query($totalOrdersQuery);

				if ($totalOrdersResult->num_rows > 0) {
					$row = $totalOrdersResult->fetch_assoc();
					$totalOrders = $row["total_orders"];

					echo '<div class="box box1">';
					echo '<div class="text">';
					echo '<h2 class="topic-heading">' . $totalOrders . '</h2>';
					echo '<h2 class="topic">Total Orders</h2>';
					echo '</div>';
					echo '<img src="https://media.geeksforgeeks.org/wp-content/uploads/20221210184645/Untitled-design-(31).png" alt="Views">';
					echo '</div>';
				}

				// Fetch the total stock quantity
				$totalStockQuery = "SELECT SUM(stock) AS total_stock FROM stock";
				$totalStockResult = $conn->query($totalStockQuery);

				if ($totalStockResult->num_rows > 0) {
					$row = $totalStockResult->fetch_assoc();
					$totalStock = $row["total_stock"];

					echo '<div class="box box2">';
					echo '<div class="text">';
					echo '<h2 class="topic-heading">' . $totalStock . '</h2>';
					echo '<h2 class="topic">Total Stock</h2>';
					echo '</div>';
					echo '<img src="https://media.geeksforgeeks.org/wp-content/uploads/20221210185030/14.png" alt="likes">';
					echo '</div>';
				}

				// Fetch the total message
				$totalMessagesQuery = "SELECT COUNT(*) AS total_messages FROM messages";
				$totalMessagesResult = $conn->query($totalMessagesQuery);

				if ($totalMessagesResult->num_rows > 0) {
					$row = $totalMessagesResult->fetch_assoc();
					$totalMessages = $row["total_messages"];

					echo '<div class="box box3">';
					echo '<div class="text">';
					echo '<h2 class="topic-heading">' . $totalMessages . '</h2>';
					echo '<h2 class="topic">Messages</h2>';
					echo '</div>';
					echo '<img src="https://media.geeksforgeeks.org/wp-content/uploads/20221210184645/Untitled-design-(32).png" alt="comments">';
					echo '</div>';
				}

				// Fetch the total sales of stock 
				$totalSalesQuery = "SELECT SUM(sales) AS total_sales FROM stock";
				$totalSalesResult = $conn->query($totalSalesQuery);

				if ($totalSalesResult->num_rows > 0) {
					$row = $totalSalesResult->fetch_assoc();
					$totalSales = $row["total_sales"];

					echo '<div class="box box4">';
					echo '<div class="text">';
					echo '<h2 class="topic-heading">' . $totalSales . '</h2>';
					echo '<h2 class="topic">Total Sales</h2>';
					echo '</div>';
					echo '<img src="https://media.geeksforgeeks.org/wp-content/uploads/20221210185029/13.png" alt="published">';
					echo '</div>';
				}
				?>
			</div>
			<div class="report-container">
				<div class="report-header">
					<h1 class="recent-Articles">Recent Orders</h1>
					<a href="orders/orders.php"><button class="view">View All</button></a>
				</div>

				<div class="report-body">
					<div class="report-topic-heading">
						<h3 class="t-op">Fullname</h3>
						<h3 class="t-op">status</h3>
						<h3 class="t-op">total</h3>
						<h3 class="t-op">ord_date</h3>
					</div>

					<div class="items">
						<?php
						// Fetch order details
						$orderQuery = "SELECT * FROM orders";
						$orderResult = $conn->query($orderQuery);

						if ($orderResult->num_rows > 0) {
							while ($row = $orderResult->fetch_assoc()) {
								$fullname = $row["full_name"]; //join usernam
								$status = $row["status"];
								$total = $row["total"];
								$ord_date = $row["ord_date"];

								echo '<div class="item1">';
								echo '<h3 class="t-op-nextlvl">' . $fullname . '</h3>';
								echo '<h3 class="t-op-nextlvl">' . $status . '</h3>';
								echo '<h3 class="t-op-nextlvl">' . $total . '</h3>';
								echo '<h3 class="t-op-nextlvl">' . $ord_date . '</h3>';
								echo '</div>';
							}
						}
						?>
					</div>
				</div>
			</div>
		</div>
		</div>
		<script src="assets/js/index.js"></script>
	</section>
	<script src="assets/js/nav.js"></script>
</body>
</html>