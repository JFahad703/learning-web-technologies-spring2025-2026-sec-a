<html>
<head>
    <title>Name</title>
</head>
<body>

<?php
$name = "";
if(isset($_POST["username"])) {
    $name = $_POST["username"];
}
?>
    <form method="post">
        <fieldset>
            <legend>NAME</legend>
            <input type="text" name="username" value="<?php echo $name; ?>"/>
            <hr>
            <input type="submit" name="submit" value="submit"/>
        </fieldset>
    </form>

<?php 
if($name != "") {
    echo "Your name is: " . $name;
}
?>
</body>
</html>