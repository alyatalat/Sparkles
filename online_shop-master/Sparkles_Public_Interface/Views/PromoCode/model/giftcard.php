<?php
class GiftCard {
    private $id;
    private $title;
    private $description;
    private $image_src;

    public function __construct($id, $title, $description, $image_src) {
        $this->id = $id;
        $this->title=$title;
        $this->description=$description;
        $this->image_src=$image_src;
    }

    public function getID() {
        return $this->id;
    }

    public function setID($value) {
        $this->id = $value;
    }

    public function getTitle() {
        return $this->title;
    }

    public function setTitle($value) {
        $this->title = $value;
    }

    public function getDescription(){
        return $this->description;
    }

    public function setDescription($value){
        $this->description= $value;
    }

    public function getImageSrc(){
        return $this->image_src;
    }

    public function setImageSrc($value){
        $this->image_src= $value;
    }
}
?>