
<html >
<head>
    <title>Email</title>
</head>
<body>

<?php
$email = "";
if(isset($_POST["email"])) {
    $email = $_POST["email"];
}
?>
    <form method="post">
        <fieldset>
            <legend>Email</legend>
            <input type="Email" name="email" value="<?php echo $email; ?>"/> <img src="info.png" title="hint: sample@example.com" width="18"
       height="18">
            <br>
            <hr>
            <input type="submit" name="submit" value="submit"/>
        </fieldset>
    </form>

<?php 
if($email != "") {
    echo "Your email is: " . $email;
}
?>
</body>
</html>