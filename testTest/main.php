<?php
function vv ($data){
    echo "<pre>";
    print_r($data);
    echo "</pre>";
}


require "Trees.php";

$tree = new Trees();

vv($tree->getAll("Apples"));
