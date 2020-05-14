<?php $title="New Password"; require_once "header.php" ?>
    <main>
        <section class="margin-t100 margin-b50">
            <p class="text-center color-white">
                Enter your new password below
            </p>
        </section>

        <section class="margin-t50 margin-b50">
            <form action="handlers/update_password.php" method="post">
                <div class="form-box margin_auto margin-b20">
                    <input type="hidden" name="e" value="<?php echo $_GET['e']; ?>">
                    <input type="hidden" name="p" value="<?php echo $_GET['p']; ?>">
                    <input type="hidden" name="t" value="<?php echo $_GET['t']; ?>">
                    <input type="password" placeholder="New Password" required name="password" value="">
                </div>
                <div class="form-box margin_auto margin-b20">
                    <input type="password" placeholder="Confirm New Password" required name="confirm_password" value="">
                </div>

                <div class="form-box margin_auto margin-b20">
                    <input type="submit" value="Reset Password">
                </div>
            </form>
        </section>
    </main>
<?php require_once "footer.php"; ?>

