<?php
session_start();
if(!isset($_SESSION['admin'])) { header("Location: ../controller/LoginController.php"); exit; }
require_once '../model/Employer.php';
$model = new Employer();
$result = $model->getAllEmployers();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
    <style>
        body{ font-family: Arial; margin: 20px; }
        table{ width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td{ border: 1px solid #ddd; padding: 10px; text-align: left; }
        th{ background-color: #4CAF50; color: white; }
        .btn{ padding: 5px 10px; margin: 2px; text-decoration: none; color: white; display: inline-block; }
        .edit{ background-color: #2196F3; } .delete{ background-color: #f44336; }
        .add{ background-color: #4CAF50; padding: 10px 20px; color: white; text-decoration: none; display: inline-block; }
        #searchBox{ padding: 10px; width: 300px; margin: 10px 0; }
        .logout{ float: right; background-color: #ff9800; padding: 10px 20px; color: white; text-decoration: none; }
    </style>
</head>
<body>
    <a href="../controller/logout.php" class="logout">Logout</a>
    <h1>Welcome Admin - <?php echo $_SESSION['admin']; ?></h1>
    
    <a href="../controller/AddController.php" class="add">+ Register New Employer</a>
    
    <br><br>
    <input type="text" id="searchBox" placeholder="Search employer by name..." onkeyup="searchEmployer()" />
    
    <table id="employerTable">
        <tr>
            <th>ID</th><th>Employer Name</th><th>Company Name</th><th>Contact No</th><th>Username</th><th>Actions</th>
        </tr>
        <?php
            if(mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_assoc($result)){
                    echo "<tr>";
                    echo "<td>".$row['id']."</td><td>".$row['employer_name']."</td><td>".$row['company_name']."</td>";
                    echo "<td>".$row['contact_no']."</td><td>".$row['username']."</td>";
                    echo "<td><a href='../controller/UpdateController.php?id=".$row['id']."' class='btn edit'>Update</a> 
                          <a href='../controller/DeleteController.php?id=".$row['id']."' class='btn delete' onclick='return confirm(\"Are you sure?\")'>Delete</a></td>";
                    echo "</tr>";
                }
            }else{ echo "<tr><td colspan='6' style='text-align:center;'>No employers found</td></tr>"; }
        ?>
    </table>

    <script>
        function searchEmployer(){
            let keyword = document.getElementById('searchBox').value;
            let xhttp = new XMLHttpRequest();
            xhttp.open('POST', '../controller/SearchController.php', true);
            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhttp.send('keyword='+keyword);
            
            xhttp.onreadystatechange = function(){
                if(this.readyState == 4 && this.status == 200){
                    let data = JSON.parse(this.responseText);
                    let table = "<tr><th>ID</th><th>Employer Name</th><th>Company Name</th><th>Contact No</th><th>Username</th><th>Actions</th></tr>";
                    if(data.length == 0){ table += "<tr><td colspan='6' style='text-align:center;'>No results found</td></tr>"; }
                    else{
                        data.forEach(function(e){
                            table += "<tr><td>"+e.id+"</td><td>"+e.employer_name+"</td><td>"+e.company_name+"</td><td>"+e.contact_no+"</td><td>"+e.username+"</td><td><a href='../controller/UpdateController.php?id="+e.id+"' class='btn edit'>Update</a> <a href='../controller/DeleteController.php?id="+e.id+"' class='btn delete' onclick='return confirm(\"Are you sure?\")'>Delete</a></td></tr>";
                        });
                    }
                    document.getElementById('employerTable').innerHTML = table;
                }
            }
        }
    </script>
</body>
</html>