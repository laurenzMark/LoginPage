<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <style>
    /* Reset some basic styling */
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    /* Body and HTML styling */
    html, body {
      height: 100%;
      display: flex;
      flex-direction: column;
    }

    body {
      font-family: Arial, sans-serif;
      background-color: #f4f4f4;
    }

    /* Header Styling */
    header {
      background-color: gray;
      width: 100%;
      height: 100px;
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 0 20px;
    }

    /* Styling for the logout button */
    .logout-button {
      background-color: #333;
      color: white;
      padding: 10px 20px;
      border: none;
      border-radius: 5px;
      text-decoration: none;
      font-size: 16px;
      cursor: pointer;
      transition: background-color 0.3s;
      position: relative;
      right: 30px;
    }

    .logout-button:hover {
      background-color: #555;
    }

    /* Main content styling */
    main {
      flex: 1;
      padding: 20px;

    }

    /* Footer Styling */
    footer {
      display: flex;
      align-items: center;
      justify-content: center;
      background-color: gray;
      width: 100%;
      height: 80px;
    }
  </style>
</head>
<body>
<?php
    session_start();

    // Ensure user is logged in
    if (!isset($_SESSION["useruid"])) {
      header("Location: index.php");
      exit();
    }
  ?>

  <header>
    <h1>HELLO, <?php echo htmlspecialchars($_SESSION["useruid"]); ?>!</h1>
    <a href="includes/logout.inc.php" class="logout-button">LOGOUT</a>
  </header>

  <main>

        <div class="form-container">
            <h2>Add New Product</h2>
            <form action="uploads" method="post" enctype="multipart/form-data">
                <label for="productName">Product Name:</label>
                <input type="text" id="productName" name="productName" required><br>

                <label for="productPrice">Price:</label>
                <input type="number" id="productPrice" name="productPrice" step="0.01" required><br>

                <label for="productImage">Image:</label>
                <input type="file" id="productImage" name="productImage" accept=".jpg, .jpeg, png" required><br>
                
                <button type="submit" name="submit">Submit</button>
            </form>
        </div>
    
</div>
  </main>

  <footer>
    <h3>@Copyright</h3>
  </footer>
</body>
</html>
