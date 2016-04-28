

<?php


require_once '../Controller/database.php';

require_once ('../Models/DBObject.php');

$db = Database::getDB();

$tempo = new DBObject();

$category = filter_input(INPUT_GET, 'category');

$query = "SELECT * FROM image_slider
            WHERE image_category= :category
            ORDER BY image_order";
$statement = $db->prepare($query);
$statement->bindValue(':category', $category, PDO::PARAM_STR);
$statement->execute();
$images = $statement->fetchAll();
$statement->closeCursor();

$imageArray = array();

foreach($images as $image){

    $pos = strpos($image['image_file'], "Images");
    $pos = substr($image['image_file'], $pos+7);
    $pos = "../../Soo-Ah_Admin_Features/ImageSlider/Views/Images/" . $pos;
    $imageArray[] = $pos;
}


echo json_encode($imageArray);
//var_dump($imageArray);
//$_SERVER['DOCUMENT_ROOT'];
?>