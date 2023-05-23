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
  <title>AXGG | Messages</title>
  <link rel="shortcut icon" href="https://i.ibb.co/dfD3s4M/278104398-126694786613134-4231769107383237629-n-removebg-preview.png" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
  <link rel="stylesheet" href="./css/messages.css">
</head>

<body>
  <?php include('../includes/sidenav.php') ?>
  <section class="home-section">
    <div class="home-content">
      <i class='bx bx-menu'></i>
      <span class="text">Messages</span>
    </div>


    <div class="container">
      <?php
      include('../config.php');

      function getMessages()
      {
        global $conn;
        $sql = "SELECT * FROM messages ORDER BY date_sent DESC";
        $result = mysqli_query($conn, $sql);
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
      }

      $messages = getMessages();
      foreach ($messages as $message) {
        $subject = $message['subject'];
        $content = $message['message'];
        $dateSent = $message['date_sent'];
      ?>
        <div class="card">
          <h3 class="card__title"><?php echo $subject; ?></h3>
          <p class="card__content"><?php echo $content; ?></p>
          <div class="card__date">
            <?php echo $dateSent; ?>
          </div>
          <a href="mailto:<?php echo $message['email']; ?>">
            <div class="card__arrow">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" height="15" width="15">
                <path fill="#fff" d="M13.4697 17.9697C13.1768 18.2626 13.1768 18.7374 13.4697 19.0303C13.7626 19.3232 14.2374 19.3232 14.5303 19.0303L20.3232 13.2374C21.0066 12.554 21.0066 11.446 20.3232 10.7626L14.5303 4.96967C14.2374 4.67678 13.7626 4.67678 13.4697 4.96967C13.1768 5.26256 13.1768 5.73744 13.4697 6.03033L18.6893 11.25H4C3.58579 11.25 3.25 11.5858 3.25 12C3.25 12.4142 3.58579 12.75 4 12.75H18.6893L13.4697 17.9697Z"></path>
              </svg>
            </div>
          </a>
        </div>
      <?php
      }
      ?>
    </div>
  </section>
  <script src="../assets/js/nav.js"></script>
</body>

</html>