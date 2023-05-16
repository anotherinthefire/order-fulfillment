<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>AXGG | Product</title>
  <link rel="shortcut icon" href="https://i.ibb.co/dfD3s4M/278104398-126694786613134-4231769107383237629-n-removebg-preview.png" />
  <style>
      
button {
  margin: 20px;
}
.custom-btn {
  width: 130px;
  height: 40px;
  color: #fff;
  border-radius: 5px;
  padding: 10px 25px;
  font-family: 'Lato', sans-serif;
  font-weight: 500;
  background: transparent;
  cursor: pointer;
  transition: all 0.3s ease;
  position: relative;
  display: inline-block;
   box-shadow:inset 2px 2px 2px 0px rgba(255,255,255,.5),
   7px 7px 20px 0px rgba(0,0,0,.1),
   4px 4px 5px 0px rgba(0,0,0,.1);
  outline: none;
}

/* 16 */
.btn-16 {
  border: none;
  color: #000;
  width: 100%;
  margin-top: 5vh;
  margin-bottom: 5vh;
  margin-left: auto;
  margin-right: auto;
}
.btn-16:after {
  position: absolute;
  content: "";
  width: 0;
  height: 100%;
  top: 0;
  left: 0;
  direction: rtl;
  z-index: -1;
  box-shadow:
   -7px -7px 20px 0px #fff9,
   -4px -4px 5px 0px #fff9,
   7px 7px 20px 0px #0002,
   4px 4px 5px 0px #0001;
  transition: all 0.3s ease;
}
.btn-16:hover {
  color: #000;
}
.btn-16:hover:after {
  left: auto;
  right: 0;
  width: 100%;
}
.btn-16:active {
  top: 2px;
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
    <button class="custom-btn btn-16"><b>Add New Product</b></button>
      <div class="row">
      <?php
function displayProducts()
{
include('../config.php');

    // Step 2: Retrieve products from the database
    $query = "SELECT p.prod_id, p.prod_name, p.prod_price, p.prod_img 
              FROM products p";
    $result = mysqli_query($conn, $query);

    // Step 3: Generate HTML output
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $prodId = $row['prod_id'];
            $prodName = $row['prod_name'];
            $prodPrice = $row['prod_price'];
            $prodImage = $row['prod_img'];

            // Generate the HTML markup for each product
            echo '
            
            <div class="col-12 col-sm-8 col-md-6 col-lg-4 mb-5">
                <div class="card">
                    <img class="card-img" src="../../product_images/'.$prodImage.'" alt="'.$prodName.'">
                    <div class="card-img-overlay d-flex justify-content-end"></div>
                    <div class="card-body">
                        <h4 class="card-title">'.$prodName.'</h4>
                        <h6 class="card-subtitle mb-2 text-muted">Prod ID: '.$prodId.'</h6>
                        <div class="buy d-flex justify-content-between align-items-center">
                            <div class="price text-success"><h5 class="mt-4">₱'.$prodPrice.'</h5></div>
                            <a href="#" class="btn btn-danger mt-3"><i class="bx bx-detail"></i> View</a>
                        </div>
                    </div>
                </div>
            </div>';
        }
    } else {
        echo 'No products found.';
    }

    // Close the database connection
    mysqli_close($conn);
}

// Call the function to display the products
displayProducts();
?>


      </div>
    </div>

    

  </section>
  <script src="../assets/js/nav.js"></script>
</body>

</html>