<?php
include '../classes/dbh.class.php'; 
include '../classes/addProduct.class.php'; 
include '../classes/addProductContr.class.php';

// Ensure the user is logged in (if needed)
// session_start();
// if (!isset($_SESSION["useruid"])) {
//     header("Location: index.php");
//     exit();
// }

if (isset($_POST['submit'])) {
    $productName = $_POST['productName'];
    $productPrice = $_POST['productPrice'];

    if($FILES["productImage"]["error"] === 4) {
        echo "<script> alert('Image does not exist');</script>";
    } else {
        $fileName = $FILES["productImage"]["name"];
        $fileSize = $FILES["productImage"]["size"];
        $tmpName = $FILES["productImage"]["tmp_name"];

        $validImageExtension = ['jpg', 'jpeg', 'png'];
        $imageExtension = explode('.', $fileName);
        $imageExtension = strtolower(end($imageExtension));
        if(!in_array($imageExtension, $validImageExtension)) {

        echo "<script> alert('Invalid image Extension!');</script>";

        } else if($fileSize > 1000000) {

        echo "<script> alert('Image size is Too Large');</script>";

        } else {
            $newImageName = uniqid();
            $newImageName = '.' . $$imageExtension;

            move_uploaded_file($tmpName, 'upload/'. $newImageName);
        }
    }

    // Create an instance of the AddproductContr class
    $addproduct = new AddproductContr($productName, $productPrice, $productImage);
    $addproduct->addProd();

    // Redirect to a success page or display a success message
    header("Location: home.php?signup=success");
    exit();
} else {
    header("Location: home.php");
    exit();
}
?>
