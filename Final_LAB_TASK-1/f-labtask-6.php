<?php
$numbers = array(5, 12, 8, 130, 44);
$search_element = 8;
$found = false;


foreach ($numbers as $number) {
    if ($number == $search_element) {
        echo "Element found!";
        $found = true;
        break; 
    }
}

if (!$found) {
    echo "Element not found.";
}
?>