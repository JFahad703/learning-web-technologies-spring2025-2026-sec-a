<html lang="en">
<head>
    <title>Blood Group Retain</title>
</head>
<body>

<?php
$blood = "";
if(isset($_POST["blood"])) {
    $blood = $_POST["blood"];
}
?>

<form method="post">
    <fieldset>
        <legend>Blood Group</legend>

        <select name="blood">
            <option value=""></option>
            <option value="A+" <?php if($blood=="A+") echo "selected"; ?>>A+</option>
            <option value="B+" <?php if($blood=="B+") echo "selected"; ?>>B+</option>
            <option value="O+" <?php if($blood=="O+") echo "selected"; ?>>O+</option>
            <option value="AB+" <?php if($blood=="AB+") echo "selected"; ?>>AB+</option>
        </select>

    </fieldset>
    <br>
    <input type="submit" value="Submit">
</form>

<?php
if($blood != "") {
    echo "Your blood group is: " . $blood;
}
?>

</body>
</html>