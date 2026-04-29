<?php
require_once('db.php');


function login($user){
    $con = getConnection();
    $sql = "select * from registration where username='{$user['username']}' and password='{$user['password']}'";
    $result = mysqli_query($con, $sql);

    if(mysqli_num_rows($result) == 1){
        return true;
    }else{
        return false;
    }
}

function addUser($user){
    
}

function getUserById($id){

}

function updateUser($user){

}

function deleteUser($id){

}




?>