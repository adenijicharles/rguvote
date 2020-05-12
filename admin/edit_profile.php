<?php
session_start();
require_once "../include/connection.php";
if(!$_SESSION['staff_id']){
    $_SESSION['error'] = "Please login to access the voting app";
    header("location: index.php");
}
?>
<!DOCTYPE html>
<html>
<head>
    <title> RGU Vote - Welcome Page </title>
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/main.css">
    <link href="../css/modifiers.css" rel="stylesheet">
    <link href="../css/forms.css" rel="stylesheet">
    <script src="../sweetalert/jquery.min.js"></script>
    <script src="../sweetalert/jquery-2.1.3.min.js"></script>
</head>
<body style="background-color: transparent;">
    <header>
        <div id="logo">
            <a href="welcome.php" style="text-decoration: none; ">
                <img src="../images/logo.png"></a>      
            </a>
        </div>
        <div id="nav">
            Welcome <?php echo $_SESSION['fullname']?> (<?php echo $_SESSION["staff_id"]; ?>) -- <a href="profile.php"> Manage Profile </a> -- <a href="logout.php"> Logout </a>
        </div>
    </header>

    <?php if(isset($_SESSION['success'])){?>
        <div class="status_message">
            <div class="success">
                <?php echo $_SESSION['success']; unset($_SESSION['success']); ?>
            </div>
        </div>
    <?php } ?>

    <?php if(isset($_SESSION['error'])){?>
        <div class="status_message">
            <div class="error">
                <?php echo $_SESSION['error']; unset($_SESSION['error']); ?>
            </div>
        </div>
    <?php } ?>

    <main>
        <section>
            <h1 class="margin-t20 text-center fs-30">Edit Profile</h1>
        </section>
        <section class="margin-t20 margin-b50">
            <?php
                $staff_id = $_SESSION["staff_id"];
                $sql = "SELECT * FROM administrators where staff_id = '$staff_id'";
                $query = mysqli_query($connect, $sql);
                $row = mysqli_fetch_array($query);
            ?>
        
            <div class="inner margin_auto">
                <form action="handlers/update_profile.php" method="post">                  
                    <div class="form-group">
                        <label> Staff ID </label>
                        <input class="border-purple border-round bg-grey" type="number" readonly value="<?php echo $row['staff_id'] ;?>">
                    </div>
                    <div class="form-group margin-t20">
                        <label> Full Name </label>
                        <input class="border-purple border-round" type="text" required name="fullname" value="<?php echo isset($_SESSION['form_values']['fullname']) ? $_SESSION['form_values']['fullname'] : $row['fullname'];?>">
                    </div>
                    <div class="form-group margin-t20">
                        <label> Email </label>
                        <input class="border-purple border-round bg-grey" type="email" readonly value="<?php echo $row['email'] ;?>">
                    </div>
                    <button type="submit" value="" class="border-purple border-round bg-purple margin-t20">Update Profile</button>
                </form>   
            </div>
        </section>
    </main>


    <footer>
        <p>All rights reserved.2020</p>
    </footer>


    <script type="text/javascript" src="js/app.js"> </script>
</body>
</html>

<?php unset($_SESSION['form_values']) ?>