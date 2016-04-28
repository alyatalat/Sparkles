<?php require_once("../Controller/database.php");


require_once ('../Models/DBObject.php');



$db = Database::getDB();

$tempo = new DBObject();

$category = $_GET['image_category'];
$image_order = $_GET['image_order'];
$image_id = $_GET['image_id'];

$sucess = $tempo->deleteImage($image_id);

$questions = $tempo->getCategories($category);


foreach($questions as $question) {
    if($question['image_order'] > $image_order){
        $query = 'UPDATE image_slider
                            SET image_order = :order
                            WHERE image_order = :oldorder && image_category = :category';
        $statement = $db->prepare($query);
        $statement->bindValue(':order', ($question['image_order']-1));
        $statement->bindValue(':oldorder', $question['image_order']);
        $statement->bindValue(':category', $category);
        $statement->execute();
        $statement->closeCursor();
    }

}

$image_dir = 'Images';

//getcwd — Gets the current working directory
$image_dir_path = getcwd() . DIRECTORY_SEPARATOR . $image_dir;

$filename = $_GET['filename'];
$target = $image_dir_path . DIRECTORY_SEPARATOR . $filename;
if (file_exists($target)) {
    unlink($target);
}

?>
<script>location.href='image_list.php?category=<?php echo $category; ?>';</script>


















