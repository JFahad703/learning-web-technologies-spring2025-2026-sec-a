<p>
<?php
$degree = $_POST['Degree'] ?? [];

if(!empty($degree)) {
    echo "Degree: " . implode(", ", $degree);
}
?>
</p>
