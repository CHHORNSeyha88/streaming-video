<?php require "../includes/header.php"; ?>
<?php require "../config/config.php"; ?>



<!-- login backed -->
<?php

if(isset($_POST['submit'])){

    if(empty($_POST['email']) OR empty($_POST['password'])){
        echo "<script>alert('One or more inputs are empty!');</script>";
    } else {

        $email = $_POST['email'];
        $password = $_POST['password'];

        // 1. SECURITY FIX: Use prepare() instead of query()
        $login = $conn->prepare("SELECT * FROM users WHERE email = :email");
        
        // 2. Bind the data securely
        $login->execute([':email' => $email]);

        // 3. Fetch the data
        $fetch = $login->fetch(PDO::FETCH_ASSOC);

        // 4. check row count
        if($login->rowCount() > 0){

            // 5. Verify Password
            if(password_verify($password, $fetch['password'])){

                // 6. START SESSION properly
                // (Make sure session_start(); is at the very top of your file or in header.php)
                
                header("location: ".APPURL."");
            } else {
                echo "<script>alert('Email or password is wrong!');</script>";
            }

        } else {
            echo "<script>alert('Email or password is wrong!');</script>";
        }
    }
}
?>


<!-- Normal Breadcrumb Begin -->
<section class="normal-breadcrumb set-bg" data-setbg="<?php echo APPURL; ?>/img/normal-breadcrumb.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="normal__breadcrumb__text">
                    <h2>Login</h2>
                    <p>Welcome to the official Anime blog.</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Normal Breadcrumb End -->

<!-- Login Section Begin -->
<section class="login spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="login__form">
                    <h3>Login</h3>
                    <form action="login.php" method="POST">
                        <div class="input__item">
                            <input name="email" type="text" placeholder="Email address">
                            <span class="icon_mail"></span>
                        </div>
                        <div class="input__item">
                            <input name="password" type="password" placeholder="Password">
                            <span class="icon_lock"></span>
                        </div>
                        <button name="submit" type="submit" class="site-btn">Login Now</button>
                    </form>
                    <a href="#" class="forget_pass">Forgot Your Password?</a>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="login__register">
                    <h3>Dont’t Have An Account?</h3>
                    <a href="signup.php" class="primary-btn">Register Now</a>
                </div>
            </div>
        </div>

    </div>
</section>
<?php require "../includes/footer.php"; ?>
