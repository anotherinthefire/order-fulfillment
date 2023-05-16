<!DOCTYPE html>
<html lang="en">

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
    width: 20vw;
    height: 254px;
    border-radius: 20px;
    background: #f5f5f5;
    position: relative;
    padding: 1.8rem;
    border: 2px solid #c3c6ce;
    transition: 0.5s ease-out;
    overflow: visible;
    margin-bottom: 20px;
  }

    .card-details {
      color: black;
      height: 100%;
      gap: .5em;
      display: grid;
      place-content: center;
    }

    .card-button {
      transform: translate(-50%, 125%);
      width: 60%;
      border-radius: 1rem;
      border: none;
      background-color: #008bf8;
      color: #fff;
      font-size: 1rem;
      padding: .5rem 1rem;
      position: absolute;
      left: 50%;
      bottom: 0;
      opacity: 0;
      transition: 0.3s ease-out;
    }

    .text-body {
      color: rgb(134, 134, 134);
    }

    .text-title {
      font-size: 1.5em;
      font-weight: bold;
    }

    .card:hover {
      border-color: #008bf8;
      box-shadow: 0 4px 18px 0 rgba(0, 0, 0, 0.25);
    }

    .card:hover .card-button {
      transform: translate(-50%, 50%);
      opacity: 1;
    }
  </style>
</head>

<body>
  <?php include('../includes/sidenav.php') ?>
  <section class="home-section">
    <div class="home-content">
      <i class='bx bx-menu'></i>
      <span class="text">Size</span>
    </div>




    <div class="container">
    <?php
function displaySizes() {
    include('../config.php');
    $sql = "SELECT size.size, COUNT(stock.size_id) AS stock_count
            FROM size
            LEFT JOIN stock ON size.size_id = stock.size_id
            GROUP BY size.size_id";
    $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($result)) {
        $sizeName = $row['size'];
        $stockCount = $row['stock_count'];
        if ($sizeName == 'n/a') {
            continue;
        }
        $sizeDisplayName = '';
        switch ($sizeName) {
            case 'S':
                $sizeDisplayName = 'Small';
                break;
            case 'M':
                $sizeDisplayName = 'Medium';
                break;
            case 'L':
                $sizeDisplayName = 'Large';
                break;
            case 'XL':
                $sizeDisplayName = 'Extra Large';
                break;
            case 'XXL':
                $sizeDisplayName = 'Double Extra Large';
                break;
            case 'XXXL':
                $sizeDisplayName = 'Triple Extra Large';
                break;
            default:
                $sizeDisplayName = $sizeName;
        }
        echo '
        <div class="card">
            <div class="card-details">
                <p class="text-title">'.$sizeDisplayName.'</p>
                <p class="text-body">There are '.$stockCount.' '.$sizeDisplayName.' products</p>
            </div>
            <button class="card-button">View</button>
        </div>';
    }
    mysqli_close($conn);
}
displaySizes();
?>

<div class="card">
            <div class="card-details">
                <p class="text-title">+ Add Size</p>
                <p class="text-body">Effortlessly enhance our store with new size options</p>
            </div>
        </div>

</div>

  </section>
  <script src="../assets/js/nav.js"></script>
</body>

</html>