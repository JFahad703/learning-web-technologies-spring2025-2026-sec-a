<p>
    <?php
$blood = $_POST["blood"] ?? "";

if($blood != "") {
    echo "Your blood group is: " . $blood;
}
?>
</p>