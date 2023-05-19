<!DOCTYPE html>
<html lang="en">
<!-- condition session when logged in -->

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AXGG | Size</title>
    <link rel="shortcut icon" href="https://i.ibb.co/dfD3s4M/278104398-126694786613134-4231769107383237629-n-removebg-preview.png" />
    <style>
        .container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }

        .card {
            --font-color: #323232;
            --bg-color: #e0e0e0;
            width: 250px;
            height: 350px;
            border-radius: 20px;
            background: var(--bg-color);
            display: flex;
            flex-direction: column;
            transition: .4s;
            position: relative;
        }

        .card:hover {
            transform: scale(1.02);
        }



        .card__descr-wrapper {
            padding: 15px;
            display: grid;
        }

        .card__title {
            color: var(--font-color);
            text-align: center;
            margin-bottom: 15px;
            font-weight: 900;
            font-size: 16px;
        }

        .card__descr {
            color: var(--font-color);
        }

        .svg {
            width: 25px;
            height: 25px;
            transform: translateY(25%);
            fill: var(--font-color);
        }

        .card__links {
            margin-top: 10px;
            display: flex;
            justify-content: space-between;
            align-self: flex-end;
        }

        .card__links .link {
            color: var(--font-color);
            font-weight: 600;
            font-size: 15px;
            text-decoration: none;
        }

        .card__links .link:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <?php include('../includes/sidenav.php') ?>
    <section class="home-section">
        <div class="home-content">
            <i class='bx bx-menu'></i>
            <span class="text">Products</span>
        </div>



        <div class="container">
        <?php
if (isset($_GET['size'])) {
    $size = $_GET['size'];

    // Validate and sanitize the size input
    $size = filter_var($size, FILTER_SANITIZE_STRING);

    // Prepare the SQL statement with parameterized query
    $sql = "SELECT p.prod_name, p.prod_img, c.category, s.size, co.color, st.stock
            FROM products p
            JOIN stock st ON p.prod_id = st.prod_id
            JOIN category c ON st.category_id = c.category_id
            LEFT JOIN size s ON st.size_id = s.size_id
            LEFT JOIN color co ON st.color_id = co.color_id
            WHERE s.size = ?
            ORDER BY p.prod_id DESC";

    // Prepare the statement
    $stmt = mysqli_prepare($conn, $sql);

    // Bind the parameter
    mysqli_stmt_bind_param($stmt, "s", $size);

    // Execute the statement
    mysqli_stmt_execute($stmt);

    // Get the result
    $result = mysqli_stmt_get_result($stmt);

    $displayedProducts = array(); // Track displayed products

    if ($result && mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $productName = $row['prod_name'];
            $productImage = $row['prod_img'];
            $category = $row['category'];
            $size = $row['size'];
            $color = $row['color'];
            $stock = $row['stock'];

            // Check if the product has already been displayed
            if (in_array($productName, $displayedProducts)) {
                continue; // Skip displaying the repeated product
            }

            // Add the product to the displayed products array
            $displayedProducts[] = $productName;

            // Use the variables in the HTML code to display the product details
            echo '<div class="card" style="margin-bottom:30px">';
            echo '<div class="card__descr-wrapper">';
            echo '<img src="../../product_images/' . $productImage . '" style="width: 100%;">';
            echo '<p class="card__title">' . $productName . '</p>';
            echo '<p class="card__descr">';
            echo 'Category: ' . $category . '<br>';
            echo 'Size: ' . $size . '<br>';
            echo 'Color: ' . $color . '<br>';
            echo 'Quantity: ' . $stock;
            echo '</p>';
            echo '</div>';
            echo '</div>';
        }
    } else {
        // Product not found
        echo "No products found for the specified size";
    }

    // Close the statement
    mysqli_stmt_close($stmt);
} else {
    // Size parameter is missing
    echo "Size parameter is missing";
}
?>



    </section>
    <script src="../assets/js/nav.js"></script>
</body>

</html>