<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Attendance management system</title>

    <link rel="stylesheet" type="text/css" href="assets/css/swiper-bundle.min.css" />

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- custom css file link  -->
    <link href="assets/img/fiv.png" rel="icon"/>
    <link href="assets/css/style.css" type="text/css" rel="stylesheet"/>

</head>
<body>
    
<!-- header section starts  -->
<?php include "include/header.php";?>
<!-- header section ends -->


    <div class="signup-form-container">

        <div id="close-signup-btn" class="fas fa-times"></div>
        
        <form action="login.php" method="post">
            <h3>sign in</h3>
            <?php
        if(isset($_GET['msg'])){
            echo '<p style="color: #ff0101;text-align: center;font-size: 2rem;">Invalid Details</p>';
        }
        ?>
            <span>username</span>
            <input type="email" name="user_email" class="box" placeholder="enter your email" id="">
            <div>
                <span>Password</span>
                <input type="password" class="box" name="user_password" id="myInput" placeholder="Enter new Password" required>
            </div>
            <div>
            <span>User type</span>
            <select name="user_type" style="width: 100%;padding: 1rem;margin-top: .7rem;margin-bottom: 1.7rem;background: transparent;border: 1px solid #a4a4a4;border-radius: 5px;">
            <option value="student">Student</option>
            <option value="teacher">Teacher</option>
            <option value="admin">Admin</option>
            </select>
            </div>
            <input type="checkbox" onclick="myFunction()"><span style="display: inline;margin-left: .5rem;">Show Password</span>
            <input type="submit" name="login" value="sign in" class="btn">
            <p>forget password ? <a href="#">click here</a></p>
        </form>
    </div>

 

<!-- footer section ends -->
<!-- deal section starts  -->

<section class="deal" id="home">

<div class="content">
    <h3>Control whole Porcess in Just one App</h3>
    <h1>upto 100% Accurate</h1>
    <p>Thanks to the pandemic, QR Code usage has seen a further rise from 2020 to 2021. In fact, reports suggest 
        that one billion smartphones will have access to QR Codes by the end of 2022.</p>
        <!--
    <a href="#" class="btn">Refer Your Friend</a>
    <a href="#" class="btn">Download At only ₹10</a> -->
</div>

<div class="image">
    <img src="assets/img/hioshr.jpg" alt="">
</div>

</section>


<!-- deal section ends -->
<!-- icons section starts  -->

<section class="icons-container" >

<div class="icons">
    <i class="fas fa-shipping-fast"></i>
    <div class="content">
        <h3>free Maintance</h3>
        <p>order over ₹10000</p>
    </div>
</div>

<div class="icons">
    <i class="fas fa-lock"></i>
    <div class="content">
        <h3>secure App</h3>
        <p>100% Accurate Attandace</p>
    </div>
</div>

<div class="icons">
    <i class="fas fa-redo-alt"></i>
    <div class="content">
        <h3>easy handling</h3>
        <p>365 days record</p>
    </div>
</div>

<div class="icons">
    <i class="fas fa-headset"></i>
    <div class="content">
        <h3>24/7 support</h3>
        <p>call us anytime</p>
    </div>
</div>

</section>

<!-- icons section ends -->
<!-- newsletter section starts -->

    <section class="newsletter">
        
        <form action="/osqr/include/subs.php">
            <h3>subscribe for latest updates</h3>
            <input type="email" name="email" placeholder="enter your email" id="dsd" class="box">
            <input type="submit" name="subscribe" value="subscribe" class="btn">
        </form>

    </section>

    <!-- newsletter section ends -->
    </section>



<!-- reviews section starts  -->

<?php include "include/review.php";?>

<!-- reviews section ends -->

<!-- starting about page  -->

<?php include "include/about.php";?>

<!-- ending about page  -->

<!-- footer section starts  -->

<?php include "include/footer.php";?>
 
<!-- footer section end  --> 

<!-- loader  -->


</div>















<script src="assets/js/swiper-bundle.min.js"></script>

    <!-- custom js file link  -->
    <script src="assets/js/script.js"></script>
    <!-- FOr password hide-->

</body>
</html>