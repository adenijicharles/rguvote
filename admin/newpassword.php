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
        <h5> ADMINISTRATOR PASSWORD UPDATE </h5>  
        <form action="handlers/update_password.php" method="post">   
            <div class="form-group">
                <label> New Password </label>
                <input type="password" name="password" required>
            </div>           
            <div class="form-group">
                <label> Confirm New Password </label>
                <input type="hidden" name="e" value="<?php echo $_GET['e']; ?>">                    
                <input type="hidden" name="t" value="<?php echo $_GET['t']; ?>">                
                <input type="password" name="confirm_password" required>
            </div>                       
            <div class="form-group" style="margin-top: 0;">                    
                <input type="submit" value="UPDATE PASSWORD">
            </div>                        
        </form>   
    </aside>
<?php require_once "auth_footer.php"; ?>