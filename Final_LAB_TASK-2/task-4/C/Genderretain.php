<html>
<head>
    <title>Gender Retain</title>
</head>
<body>

<?php
$gender = "";
if(isset($_POST["Gender"])) {
    $gender = $_POST["Gender"];
}
?>

    <form method="post">
        <fieldset>
            <legend>Gender</legend>
            <input type="radio" name="Gender" value="Male" <?php if($gender == "Male") echo "checked"; ?>/>Male
            <input type="radio" name="Gender" value="Female" <?php if($gender == "Female") echo "checked"; ?>/>Female
            <input type="radio" name="Gender" value="Others" <?php if($gender == "Others") echo "checked"; ?>/>Others
            
        </fieldset>
        <br>
        <input type="submit" name="" value="Submit"/>
    </form>

    <?php
if($gender != "") {
    echo "Your gender is: " . $gender;
}
?>
</body>
</html>