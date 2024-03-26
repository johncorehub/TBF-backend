<?php
include "db_conn.php";

if(isset($_POST["submit"])) {
    $Username = $_POST['Username'];
    $Password = $_POST['Password']; 
    $Email = $_POST['Email'];  
    $Businesscategory =  $_POST['Businesscategory'];
    $MobileNo = $_POST['MobileNo'];

   $sql = "INSERT INTO `members_list`(`id`, `Username`, `Password`, `Email`, `Businesscategory`, `MobileNo`) VALUES (Null,'$Username','$Password','$Email','$Businesscategory','$MobileNo')";
    
   $result = mysqli_query($conn, $sql);

     if($result) {
        header("Location: index.php?msg=New record created successfully");
        }
        else{
            echo "Failed: " . mysqli_error($conn);
        }
    }
    
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title>TBF Members</title>
</head>
<body>
    <nav  class="navbar navbar-light justify-content-center fs-3 mb-5" style="background-color: #00ff5573">
        THENI BUSINESS FORUM Members
</nav>
     
    <div  class="container" style="width: 600px; height: 650px; border: 3px solid black; padding: 20px; background-color: lightgrey; border-radius: 20px;">
        <div class="text-center mb-4">
            <h3>Add New User</h3>
        </div>
        
        <div class = "container  d-flex justify-content-center">
            <form action="" method="post" style="width:30vw; min-width:300px;">
            <div class="row">
                <div class="col">
                    <label class="form-label">Username</label>
                    <input type="text" class="form-control" name="Username" placeholder="Enter your name" required>
                </div>
            </div>
            
            <div class="mb-3">
            <label class="form-label">Password</label>
                    <input type="password" class="form-control" name="Password" placeholder="Enter your password" required>
            </div>

            <div class="mb-3">
            <label class="form-label">Email</label>
                    <input type="email" class="form-control" name="Email" placeholder="Enter your mail" required>
            </div>

            <div class="form-group mb-3">
               <label>Businesscategory</label>
               &nbsp;<br><br>
               <input type="radio" class="form-check-input" name="Businesscategory" id="Builder" value="Builder">
               <label for="Builder" class="form-input-label">Builder</label>
               &nbsp;
               <input type="radio" class="form-check-input" name="Businesscategory" id="Manufacture" value="Manufacture">
               <label for="Manufacture" class="form-input-label">Manufacture</label>
               &nbsp;
               <input type="radio" class="form-check-input" name="Businesscategory" id="Retailer" value="Retailer">
               <label for="Retailer" class="form-input-label">Retailer</label>
               &nbsp;
               <input type="radio" class="form-check-input" name="Businesscategory" id="Food Industry" value="Food Industry">
               <label for="Food Industry" class="form-input-label">Food Industry</label>
            </div>

            <div class="mb-3">
            <label class="form-label">MobileNo</label>
                    <input type="text" class="form-control" name="MobileNo" placeholder="+91 9563287412" required>
            </div>

            <div class="mb-3" action="upload.php" method="post" enctype="multipart/form-data">
                <label class="form-label">Upload Profile Picture:</label><br>
             <input type="file" name="file" id="file">
              <button type="submit" name="submit">UPLOAD FILE</button>
            </div><br>

            <div>
               <button type="submit" class="btn btn-success" name="submit">Save</button>
               <a href="index.php" class="btn btn-danger">Cancel</a>
            </div>
</form>  
</div>
</div>


    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>