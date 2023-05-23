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
    <title>AXGG | Size</title>
    <link rel="shortcut icon" href="https://i.ibb.co/dfD3s4M/278104398-126694786613134-4231769107383237629-n-removebg-preview.png" />
    <link rel="stylesheet" href="./css/size-view.css?">
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
                $sql = "SELECT p.prod_name, p.prod_img, c.category, s.size, co.color, st.stock
                        FROM products p
                        JOIN stock st ON p.prod_id = st.prod_id
                        JOIN category c ON st.category_id = c.category_id
                        LEFT JOIN size s ON st.size_id = s.size_id
                        LEFT JOIN color co ON st.color_id = co.color_id
                        WHERE s.size = ?
                        ORDER BY p.prod_id DESC";
                $stmt = mysqli_prepare($conn, $sql);
                mysqli_stmt_bind_param($stmt, "s", $size);
                mysqli_stmt_execute($stmt);
                $result = mysqli_stmt_get_result($stmt);
                $displayedProducts = array(); 

                if ($result && mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $productName = $row['prod_name'];
                        $productImage = $row['prod_img'];
                        $category = $row['category'];
                        $size = $row['size'];
                        $color = $row['color'];
                        $stock = $row['stock'];

                        if (in_array($productName, $displayedProducts)) {
                            continue; 
                        }
                        $displayedProducts[] = $productName;

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
                    echo "No products found for the specified size";
                }
                mysqli_stmt_close($stmt);
            } else {
                echo "Size parameter is missing";
            }
            ?>
    </section>
    <script src="../assets/js/nav.js"></script>
</body>

</html>