<html lang="en">
<head>
    <title>Degree Retain</title>
</head>
<body>

<?php
$degree = [];
if(isset($_POST["Degree"])) {
    $degree = $_POST["Degree"];
}
?>

    <form method="post">
        <fieldset width="80%">
            <legend>Degree</legend>
            <input type="checkbox" name="Degree[]" value="SSC"  <?php if(in_array("SSC", $degree)) echo "checked"; ?>>SSC
            <input type="checkbox" name="Degree[]" value="HSC"  <?php if(in_array("HSC", $degree)) echo "checked"; ?>>HSC
            <input type="checkbox" name="Degree[]" value="BSc"  <?php if(in_array("BSc", $degree)) echo "checked"; ?>>BSc
            
        </fieldset>
        <br>
        <input type="submit" name="" value="Submit"/>
    </form>
    <?php
if(!empty($degree)) {
    echo "Your degree(s): " . implode(", ", $degree);
}
?>
</body>
</html>