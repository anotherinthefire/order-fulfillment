<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>AXGG | Login</title>
  <link rel="shortcut icon" href="https://i.ibb.co/dfD3s4M/278104398-126694786613134-4231769107383237629-n-removebg-preview.png" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
  <link rel="stylesheet" href="./css/login.css?<?php time() ?>">
</head>

<body>
  <div class="container">
    <div class="card">
      <a class="login">Log in</a>

      <div class="inputBox">
        <form method="post" action="actions/verification.php">
          <input type="text" name="username" required="required">
          <span class="user">Username</span>
      </div>

      <div class="inputBox">
        <input type="password" name="password" required="required">
        <span>Password</span>
      </div>

      <div class="container" style="  display: flex;
  justify-content: center;
  align-items: center;
  width:100%; margin-left:auto; margin-right:auto;">
      <button type="submit" class="enter">Enter</button>
      </form>
      <a href="./login-scan.html"><button type="submit" class="enter">SCAN</button></a>
      </div>

    </div>
  </div>
  
</body>

</html>