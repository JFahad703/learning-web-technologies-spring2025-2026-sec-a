<html lang="en">

<head>
    <title>Login</title>
</head>
<body>


    <form method = 'get' action="upload.php" enctype="">
        Username: <input type="text" name="username" value="<?php if(isset($username)) echo $username; ?>"/><br>
        Password: <input type="password" name="password" value="<?php if(isset($password)) echo $password; ?>"/><br>
                <input type="submit" value="Submit"/>
    
    </form>            

    <form method = 'post' action="upload.php" enctype="">
        Username: <input type="text" name="username" value=""/><br>
        Password: <input type="password" name="password" value=""/><br>
                <input type="submit" value="Submit"/>
    
    </form>    


</body>
</html>



<?php


       //echo "Test!";

       //get method
/*       print_r($_GET);
       $username = $_GET["username"];
       $password = $_GET["password"];

       if ($username == "" || $password == "") {

                echo "Null username or password";
        } else {

            if($username == $password) {
                echo "valid user " ;
            } else {
                echo "invalid user";
            }
        }
*/
//post method
 /*      $username = $_POST["username"];
       $password = $_POST["password"];

       if ($username == "" || $password == "") {

                echo "Null username or password";
        } else {

            if($username == $password) {
                echo "valid user " ;
            } else {
                echo "invalid user";
            }
        }
*/

//REQUEST METHOD: IF THE DEVELOPER IS NOT SURE ABOUT THE METHOD, HE CAN USE REQUEST METHOD. IT CAN HANDLE BOTH GET AND POST METHOD.
      

/*if(isset($_REQUEST['submit'])){
$username = $_REQUEST["username"];
$password = $_REQUEST["password"];

       if ($username == "" || $password == "") {

                echo "Null username or password";
        } else {

            if($username == $password) {
                echo "valid user " ;
            } else {
                echo "invalid user";
            }
        }
} else {
    echo "Please submit the form";
}*/

//TO stop the bypass from the URL, WE CAN USE REQUEST METHOD. IF THE USER TRY TO BYPASS THE FORM,it will not get bypassed as it is in post method so get request will not work .
if(isset($_POST['submit'])){
$username = $_REQUEST["username"];
$password = $_REQUEST["password"];

       if ($username == "" || $password == "") {

                echo "Null username or password";
        } else {

            if($username == $password) {
                echo "valid user " ;
            } else {
                echo "invalid user";
            }
        }
} else {
    echo "Please submit the form";
}
?>       