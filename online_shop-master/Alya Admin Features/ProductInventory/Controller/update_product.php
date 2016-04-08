
<?php
// Get the product data
$error = "";
$id = $_POST['id'];
$category = $_POST['category'];
$descripton = $_POST['description'];
$quantity = $_POST['quantity'];
$name = $_POST['name'];
$price = $_POST['price'];
$image = $_POST['image'];


//echo $error. " " . $category . " " . $descripton . " " . $quantity . " " . $name . " " . $price . " " . $image;

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
$file_type = $_FILES['fileToUpload']['type']; //returns the mimetype
$allowed = array("image/jpeg", "image/jpg", "image/png");
var_dump($file_type);
var_dump(!in_array($file_type, $allowed));
if ($file_type != ""){
    if(!in_array($file_type, $allowed)) {
        $error .= '<br/>Only jpg and png files are allowed.<br/>';
    } elseif (move_uploaded_file($file_tmp_name, "../../Images/Uploads/$file_name")) {
        $image = 'Images/Uploads/' . $file_name;
    } else {
        $error .= "<br/> Select an Image to Upload <br/>";
    }
}


if(empty($error)){
    require_once('database.php');
    $query = "UPDATE products
                    SET Category = '$category',
                    Product_Title = '$name',
                    Price = '$price',
                    Quantity = '$quantity',
                    Product_Description = '$descripton',
                    Image = '$image'
              WHERE Product_Id = $id ";


    $db->exec($query);

    // Display the Product List page
    header('location: ../Views/admin_index.php');
} else {
    header("location: ../Views/update_product_form.php?error=$error&name=$name&price=$price&quantity=$quantity&category=$category&description=$description&image=$image&id=$id");
}
?>

