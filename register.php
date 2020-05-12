<?php require_once "header.php" ?>
<main>
    <section class="margin-t50 margin-b50">
        <p class="text-center color-white">
            Create your RGUVote Account
        </p>
    </section>

    <section class="margin-t50 margin-b50">
        <div class="inner margin_auto">
            <form action="handlers/register.php" method="post">
                <div class="form-box-inline margin-b20">
                    <input type="text" maxlength="7" placeholder="Student ID" required name="student_id" value="<?php echo isset($_SESSION['form_values']['student_id']) ? $_SESSION['form_values']['student_id'] : '';?>">
                </div>

                <div class="form-box-inline margin-b20">
                    <input type="text" placeholder="First Name" required name="firstname" value="<?php echo isset($_SESSION['form_values']['firstname']) ? $_SESSION['form_values']['firstname'] : '';?>">
                </div>

                <div class="form-box-inline margin-b20">
                    <input type="text" placeholder="Surname" required name="surname" value="<?php echo isset($_SESSION['form_values']['surname']) ? $_SESSION['form_values']['surname'] : '';?>">
                </div>

                <div class="form-box-inline margin-b20">
                    <input type="email" placeholder="Email" required name="email" value="<?php echo isset($_SESSION['form_values']['email']) ? $_SESSION['form_values']['email'] : '';?>">
                </div>

                <div class="form-box-inline margin-b20">
                    <select name="gender" required>
                        <option value="<?php echo isset($_SESSION['form_values']['gender']) ? $_SESSION['form_values']['gender'] : '';?>" selected> <?php echo isset($_SESSION['form_values']['gender']) ? $_SESSION['form_values']['gender'] : 'Gender';?> </option>
                        <option value="female"> Female </option>
                        <option value="male"> Male </option>
                        <option value="others"> Others </option>
                    </select>
                </div>

                <div class="form-box-inline margin-b20">
                    <select name="level" required>
                        <option value="<?php echo isset($_SESSION['form_values']['level']) ? $_SESSION['form_values']['level'] : '';?>" selected> <?php echo isset($_SESSION['form_values']['level']) ? $_SESSION['form_values']['level'] : 'Level';?> </option>
                        <option value="undergraduate"> Undergraduate </option>
                        <option value="postgraduate"> Postgraduate </option>
                    </select>
                </div>

                <div class="form-box-inline margin-b20">
                    <select name="department" required>
                        <option value="<?php echo isset($_SESSION['form_values']['department']) ? $_SESSION['form_values']['department'] : '';?>" selected> <?php echo isset($_SESSION['form_values']['department']) ? $_SESSION['form_values']['department'] : 'Department';?> </option>
                        <option value="computing"> Computing </option>
                        <option value="agriculture"> Agriculture </option>
                    </select>
                </div>

                <div class="form-box-inline margin-b20">
                    <select name="ethnicity" required>
                        <option value="<?php echo isset($_SESSION['form_values']['ethnicity']) ? $_SESSION['form_values']['ethnicity'] : '';?>" selected> <?php echo isset($_SESSION['form_values']['ethnicity']) ? $_SESSION['form_values']['ethnicity'] : 'Ethnicity';?> </option>
                        <option value="asia"> Asia </option>
                        <option value="african"> African </option>
                        <option value="hispanics"> Hispanics </option>
                    </select>
                </div>

                <div class="form-box-inline margin-b20">
                    <input type="password" required placeholder="Password" name="password">
                </div>

                <div class="form-box-inline margin-b20">
                    <input type="password" required placeholder="Confirm Password" name="confirm_password">
                </div>

                <div class="form-box-inline margin-b20">
                    <input type="submit" value="Register">
                </div>

                <section class="margin-t50 margin-b50">
                    <p class="text-center color-white margin-t20">
                        <a href="login.php" class="color-white"> Login here </a> |
                        <a href="forgot.php" class="color-white">Forgot Password?</a>
                    </p>
                </section>
            </form>
        </div>
    </section>
</main>
<?php unset($_SESSION['form_values']); require_once "footer.php"; ?>

