<html lang="en">
<head>
    <title>Date of Birth</title>
</head>
<body>

<?php
$dd = "";
$mm = "";
$yyyy = "";

if (isset($_POST["dd"], $_POST["mm"], $_POST["yyyy"])) {
    $dd = $_POST["dd"];
    $mm = $_POST["mm"];
    $yyyy = $_POST["yyyy"];
}
?>
    <form method="post">
        <fieldset>
            <legend><h3>Date of Birth</h3></legend>
            <table>
                <tr>
                    <td style="text-align: center;">dd</td>
                    <td></td>
                    <td style="text-align: center;">mm</td>
                    <td></td>
                    <td style="text-align: center;">yyyy</td>
                </tr>
                <tr>
                    <td><input type="text" name="dd" value="<?php echo $dd; ?>" size="2" maxlength="2"></td>
                    <td>/</td>
                    <td><input type="text" name="mm" value="<?php echo $mm; ?>" size="2" maxlength="2"></td>
                    <td>/</td>
                    <td><input type="text" name="yyyy" value="<?php echo $yyyy; ?>" size="4" maxlength="4"></td>
                </tr>
                <tr>
                    <td colspan="6"><hr></td>
                </tr>
          
            <tr>
                <td colspan="3"> <input type="submit" name="submit" value="Submit"/></td>

            </tr>
           

            </table>
        </fieldset>
    </form>
    <?php
if ($dd != "" && $mm != "" && $yyyy != "") {
    echo "Date is: " . $dd . "/" . $mm . "/" . $yyyy;
}
?>
</body>
</html>