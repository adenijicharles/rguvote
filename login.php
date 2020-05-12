<?php require_once "header.php" ?>
<main>
    <section class="margin-t100 margin-b50">
        <p class="text-center color-white">
            Login here
        </p>
    </section>

    <section class="margin-t50 margin-b50">
        <form action="handlers/login.php" method="post">
            <div class="form-box margin_auto margin-b20">
                <input type="text" placeholder="Student ID" required name="student_id">
            </div>

            <div class="form-box margin_auto margin-b20">
                <input type="password" placeholder="Password" required name="password">
            </div>

            <div class="form-box margin_auto margin-b20">
                <input type="submit" value="Login" name="submit">
            </div>

            <section class="margin-t50 margin-b50">
                <p class="text-center color-white margin-t20">
                    <a href="register.php" class="color-white"> Register here </a> |
                    <a href="forgot.php" class="color-white">Forgot Password?</a>
                </p>
            </section>
        </form>
    </section>
</main>
<?php require_once "footer.php"; ?>

