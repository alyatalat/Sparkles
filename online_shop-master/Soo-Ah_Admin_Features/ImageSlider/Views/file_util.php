<?php
function get_file_list($path) {
    $files = array();


    // is_dir — Tells whether the filename is a directory
    if (!is_dir($path)) return $files;


    // scandir — List files and directories inside the specified path
    $items = scandir($path);
    foreach ($items as $item) {
        $item_path = $path . DIRECTORY_SEPARATOR . $item;
        if (is_file($item_path)) {
            $files[] = $item;
        }
    }
    return $files;
}
?>
