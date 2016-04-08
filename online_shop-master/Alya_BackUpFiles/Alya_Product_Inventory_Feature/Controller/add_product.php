<?php
// Get the product data
$error = "";
$category = $_POST['category'];
$descripton = $_POST['description'];
$quantity = $_POST['quantity'];
$name = $_POST['name'];
$price = $_POST['price'];

// Validate inputs
if (empty($name)){
    $error.="<br/> Name Field Missing <br/>";
}
if(empty($quantity)){
    $error.="<br/> Quantity Missing <br/>";
}elseif(!is_numeric($quantity)) {
    $error.="<br/> Quantity Must be a Digit <br/>";
}
if(empty($price)){
    $error.= "<br/> Price Missing <br/>";
} elseif (!is_numeric($price)){
    $error.="<br/> Price Must be a Numerical Value<br/>";
}
if (!isset($category)){
    $error.="<br/> Category Must be chosen <br/>";
}

    // If valid, upload image
    $file_name = $_FILES['fileToUpload']['name'];
    $file_tmp_name = $_FILES['fileToUpload']['tmp_name'];
    if ((exif_imagetype($file_tmp_name) != IMAGETYPE_JPEG)) {
        $error.="<br/> File is not a JPEG Image Type <br/>";
    }
    elseif (move_uploaded_file($file_tmp_name, "../../Images/Uploads/$file_name")) {
        $image = 'Images/Uploads/' . $file_name;
    } else {
        $error .= "<br/> Select an Image to Upload <br/>";
    }

if(empty($error)){
    require_once('database.php');
    $query = "INSERT INTO products
                 ( Product_Title, Price, Quantity, Category, Product_Description, Image )
              VALUES
                 ('$name', '$price', '$quantity', '$category', '$descripton','$image')";

    $db->exec($query);
    // Display the Product List page
    header('location: ../Views/display_product.php');
} else {
    header("location: ../Views/add_product_form.php?error=$error&name=$name&price=$price&quantity=$quantity&category=$category&description=$description&image=$image");
}
?>
