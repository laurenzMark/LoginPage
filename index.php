<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="includes/styles.css">
</head>
<body>
  <header>
    <nav>
      <div>
        <h3>PRACTICE</h3>
        <ul>
          <li><a href="#">HOME</a></li>
          <li><a href="#">PRODUCT</a></li>
          <li><a href="#">CURRENT SALES</a></li>
          <li><a href="#">MEMBER</a></li>
        </ul>
      </div>
      <ul>
        <?php if(isset($_SESSION["user_id"])) { ?>
          <li><a href="#"><?php echo $_SESSION["user_id"]; ?></a></li>
          <li><a href="includes/logout.inc.php">LOGOUT</a></li>
        <?php } else { ?>
          <li><a href="#signup">SIGN UP</a></li>
          <li><a href="#login">LOGIN</a></li>
        <?php } ?>
      </ul>
    </nav>
  </header>
  
  <section id="forms">
    <div class="form-container">
      <!-- Signup Form -->
      <div id="signup">
        <h4>SIGN UP</h4>
        <form action="includes/signup.inc.php" method="post">
          <input type="text" name="uid" placeholder="Username">
          <input type="password" name="pwd" placeholder="Password">
          <input type="password" name="pwdrepeat" placeholder="Repeat Password">
          <input type="email" name="email" placeholder="Email">
          <br>
          <button type="submit" name="submit">SIGN UP</button>
        </form>
      </div>
      
      <!-- Login Form -->
      <div id="login">
        <h4>LOGIN</h4>
        <form action="includes/login.inc.php" method="post">
          <input type="text" name="uid" placeholder="Username">
          <input type="password" name="pwd" placeholder="Password">
          <br>
          <button type="submit" name="submit">LOGIN</button>
        </form>
      </div>
    </div>
  </section>

</body>
</html>
