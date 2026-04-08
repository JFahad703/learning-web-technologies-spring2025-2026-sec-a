<?php
$data = array(
    array(1, 2, 3, 'A'),
    array(1, 2, 'B', 'C'),
    array(1, 'D', 'E', 'F')
);

echo "<h3>Shape 1 (Numbers)</h3>";
for ($i = 0; $i < 3; $i++) {
    for ($j = 0; $j < 4; $j++) {
 
        if (is_numeric($data[$i][$j])) {
            echo $data[$i][$j] . " ";
        } else {
       
            break; 
        }
    }
    echo "<br>";
}

echo "<h3>Shape 2 (Letters)</h3>";
for ($i = 0; $i < 3; $i++) {
    for ($j = 0; $j < 4; $j++) {
        if (is_string($data[$i][$j])) {
            echo $data[$i][$j] . " ";
        }
    }
    echo "<br>";
}
?>