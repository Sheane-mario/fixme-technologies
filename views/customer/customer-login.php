<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Log In</title>
    <link rel="stylesheet" href="/css/customer/customer-sign-up.css">
    <link rel="stylesheet" href="/css/base/_reset.css">
    <link rel="stylesheet" href="/css/base/_global.css">
</head>

<body>
    <div class="container">
        <div class="box-1">
            <div class="branding">
                <div>
                    <a href="/" class="brand-name">
                        <span class="brand-button">FixMe</span>
                    </a>
                </div>
                <p class="tagline">Expert Car Care, Anytime, Anywhere.</p>
            </div>
        </div>
        <div class="box-2">
            <div class="wrapper">
                <div class="title-1">
                    <h2>Login to your Account</h2>
                    <h5>Don't have an account? <a href="/customer-sign-up">Sign Up</a></h5>
                </div>
<<<<<<<< HEAD:views/technician/technician-sign-up.php
                <form action="/technician-sign-up" method="POST" class="technician-signup-form">
                    <div class="input-element">
                        <label for="fname">First name: </label>
                        <input type="text" name="fname" value="<?php echo $model->fname ?>"
                                placeholder="Enter your first name..." id="fname" >
                        <span class="form-invalid"><?php echo $data['fname_err']; ?></span>
                    </div>
                    <div class="input-element">
                        <label for="lname">Last name: </label>
                        <input type="text" name="lname" placeholder="Enter your last name..." id="lname" >
                    </div>
                    <div class="input-element">
                        <label for="nic">NIC No: </label>
                        <input type="text" name="nic" placeholder="NIC No..." id="nic" >
                    </div>
                    <div class="input-element">
                        <label for="phone_no">Phone Nunmber: </label>
                        <input type="text" name="phone_no" placeholder="Phone Number..." id="phone_no" >
                    </div>
                    <div class="input-element">
                        <label for="address">Address: </label>
                        <input type="text" name="address" placeholder="Address..." id="address" >
                    </div>
                    <div class="input-element">
                        <label for="email">Email address: </label>
                        <input type="email" name="email" id="email" placeholder="example@email.com..." >
                    </div>
                    <div class="input-element">
                        <label for="password">Password: </label>
                        <input type="password" name="password" id="password" placeholder="Password..." >
                    </div>
                    <div class="input-element">
                        <label for="confirmPassword">Confirm Password: </label>
                        <input type="password" name="confirmPassword" id="confirmPassword" placeholder="Re-enter Password..." >
                    </div>
                    <h6>Use 8 or more characters with a mix of letters, numbers & symbols</h6>

                    <div class="terms-cond">
                        <input type="checkbox" name="terms-cond" id="terms-cond" >
                        <label for="terms-cond">I agree to the terms and conditions</label>
========
                <form action="" method="post" class="cust-signup-form">
                    <div class="input-element">
                        <label for="email">Email address</label>
                        <input type="email" name="email" id="email">
                    </div>
                    <div class="input-element">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password">
>>>>>>>> 1034f82c7cfba5c440737491c901b787fe08ae9f:views/customer/customer-login.php
                    </div>
                    <div class="not-robot">
                        <input type="checkbox" name="not-robot" id="not-robot" >
                        <label for="not-robot">I'm not a robot</label>
                    </div>
                    <div>
                        <button type="submit" class="btn">Log In</button>
                    </div>
                    <div class="log-in">
                        <h6>Dont't have an account? <a href="/customer-sign-up">Sign Up</a></h6>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>