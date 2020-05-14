<?php $title="Forgot Password"; require_once "header.php" ?>
<main>
    <section class="margin-t100 margin-b50">
        <p class="text-center color-white">
            Enter your email address in the box below <br> to reset your password
        </p>
    </section>

    <section class="margin-t50 margin-b50">
        <form action="handlers/reset_link.php" method="post">
            <div class="form-box margin_auto margin-b20">
                <input type="email" name="email" placeholder="Email Address" required>
            </div>

            <div class="form-box margin_auto margin-b20">
                <input type="submit" value="Reset Password">
            </div>
        </form>
    </section>
</main>
<?php require_once "footer.php"; ?>

