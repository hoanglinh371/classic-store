<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Document</title>
    </head>
    <body>
        <?php
            require_once './header.php';
        ?>

        <div class="login-container">
            <div class="sign-in-form">
                <h2>Already have an account?</h2>
                <span>Sign in with your email and password</span>
                <form method="post" action="./sign_in_process.php">
                    <div class="group">
                        <input type="email" id="email" class="form-input" name="email">
                        <label for="email">Email</label>
                    </div>

                    <div class="group">
                        <input type="password" id="sign_in_password" class="form-input" name="password">
                        <label for="sign_in_password">Password</label>
                    </div>

                    <button type="submit">SIGN IN</button>
                </form>
            </div>

            <div class="sign-up-form">
                <h2>Don't have an account?</h2>
                <span>Sign up with your email and password</span>
                <form method="post" action="./sign_up_process.php">
                    <div class="group">
                        <input type="text" id="display_name" class="form-input" name="display_name">
                        <label for="display_name">Display Name</label>
                    </div>

                    <div class="group">
                        <input type="email" id="email" class="form-input" name="email">
                        <label for="email">Email</label>
                    </div>

                    <div class="group">
                        <input type="password" id="sign_up_password" class="form-input" name="password">
                        <label for="sign_up_password">Password</label>
                    </div>

                    <div class="group">
                        <input type="password" id="confirm_password" class="form-input" name="confirm_password">
                        <label for="confirm_password">Confirm Password</label>
                    </div>

                    <button type="submit">SIGN UP</button>
                </form>
            </div>
        </div>
    </body>
</html>
