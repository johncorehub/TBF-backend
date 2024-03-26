<?php
include "db_conn.php";
$id = $_GET["id"];

if (isset($_POST["submit"])) {
    $Username = $_POST['Username'];
    $Password = $_POST['Password']; 
    $Email = $_POST['Email'];  
    $Businesscategory =  $_POST['Businesscategory'];
    $MobileNo = $_POST['MobileNo'];

    $stmt = $conn->prepare("UPDATE `members_list` SET `Username`=?, `Password`=?, `Email`=?, `Businesscategory`=?, `MobileNo`=? WHERE id=?");
    $stmt->bind_param("sssssi", $Username, $Password, $Email, $Businesscategory, $MobileNo, $id);
    $stmt->execute();

    if ($stmt) {
       header("Location: index.php?msg=Data updated successfully");
    } else {
        echo "Failed: " . $conn->error;
    }
    $stmt->close();
}

$sql = "SELECT * FROM `members_list` WHERE id='$id'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

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
    <nav  class="navbar navbar-light justify-content-center fs-3 mb-5" style="background-color: #00ff5573;">
        THENI BUSINESS FORUM Members
</nav>
     
    <div  class="container">
        <div class="text-center mb-4">
            <h3>Edit User Information</h3>
            <p class="text-muted">Click update after changing any Information</p>
        </div>
        
        <div class = "container  d-flex justify-content-center">
            <form action="" method="post" style="width:50vw; min-width:300px;">
            <div class="row">
                <div class="col">
                    <label class="form-label">Username</label>
                    <input type="text" class="form-control" name="Username" value="<?php echo $row['Username'] ?>">
                </div>
            </div>

            <div class="mb-3">
            <label class="form-label">Password</label>
                    <input type="password" class="form-control" name="Password" value="<?php echo $row['Password'] ?>">
            </div>

            <div class="mb-3">
            <label class="form-label">Email</label>
                    <input type="email" class="form-control" name="Email" value="<?php echo $row['Email'] ?>">
            </div>

            <div class="form-group mb-3">
               <label>Businesscategory</label>
               &nbsp;<br><br>
               <input type="radio" class="form-check-input" name="Businesscategory" id="Builder" value="Builder" <?php echo ($row['Businesscategory']=='Builder')? "checked":""; ?>>
               <label for="Builder" class="form-input-label">Builder</label>
               &nbsp;
               <input type="radio" class="form-check-input" name="Businesscategory" id="Manufacture" value="Manufacture" <?php echo ($row['Businesscategory']=='Manufacture')? "checked":""; ?>>
               <label for="Manufacture" class="form-input-label">Manufacture</label>
               &nbsp;
               <input type="radio" class="form-check-input" name="Businesscategory" id="Retailer" value="Retailer" <?php echo ($row['Businesscategory']=='Retailer')? "checked":""; ?>>
               <label for="Retailer" class="form-input-label">Retailer</label>
               &nbsp;
               <input type="radio" class="form-check-input" name="Businesscategory" id="Food Industry" value="Food Industry" <?php echo ($row['Businesscategory']=='Food Industry')? "checked":""; ?>>
               <label for="Food Industry" class="form-input-label">Food Industry</label>
            </div>

            <div class="mb-3">
            <label class="form-label">MobileNo</label>
                    <input type="text" class="form-control" name="MobileNo" value="<?php echo $row['MobileNo'] ?>">
            </div>

            <div>
               <button type="submit" class="btn btn-success" name="submit">Update</button>
               <a href="index.php" class="btn btn-danger">Cancel</a>
            </div>
</form>  
</div>
</div>


    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>