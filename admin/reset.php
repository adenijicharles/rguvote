<?php
session_start();
require_once "auth_header.php";
?>
    <aside>
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
        <div class="logo">
            <a href="index.php"><img src="../images/logo.png"></a>
        </div>
        <h5> ADMINISTRATOR PASSWORD RESET </h5>  
        <form action="handlers/reset.php" method="post">   
            <div class="form-group">
                <label> Email Address </label>
                <input type="text" name="email" required>
            </div>           
            <div class="form-group" style="margin-top: 0;">                    
                <input type="submit" value="RESET PASSWORD">
            </div>    
            <div class="form-group">
                    <a href="register.php">Register</a> | <a href="reset.php">Forgot Password?</a>
                </div>                        
        </form>   
    </aside>
<?php require_once "auth_footer.php"; ?>