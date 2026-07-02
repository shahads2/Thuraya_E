<?php 
session_start();
 
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login- Thuraya</title>
    <link rel="stylesheet" href="stylesheet.css">
 
  <style>
  
     
    .ph3 {
      margin-top: 30px;
      text-align: center;
      color: white;
      font-size: 20px;
      font-weight: 500;
      text-shadow: 2px 2px 4px ;
    }

    form {
      background: white;
      width: 350px;
      margin: 40px auto;
      padding: 25px;
      border-radius: 10px;
      text-align: center;
      text-shadow: 2px 2px 6px rgba(45, 21, 111, 0.8);
    }

    input {
      width: 90%;
      padding: 10px;
      margin: 8px 0;
      border: 1px solid #aaa;
      border-radius: 5px;
    }

    input[type="submit"] {
      background-color: #311976;
      color: white;
      border: none;
      border-radius: 5px;
      padding: 10px;
      cursor: pointer;
      font-weight: bold;
    }

    input[type="submit"]:hover {
      background-color: #2E887F;
    }

    .text1 h1 {
      text-align: center;
      color: white;
      font-family: 'Theo Van Doesburg', sans-serif;
      font-size: 70px;
      margin-top: 100px;
    }

    
    body {
      background-image: url('riyadhtower.jpg');
      background-size: cover;
      background-repeat: no-repeat;
      background-attachment: fixed;
      background-position: center;
    }

    .text-center { text-align: center; }

  .link{
      font-weight: bold;
      color: #bdacf1;
    }

.background1{
    margin: 0 auto;
    margin-top: 10px;
    width: 420px;
    background-color: rgba(48, 25, 118, 0.078);
    border-radius: 15px;
    backdrop-filter: blur(3px);
    z-index: 1;
}

.login-error {
  margin-top: 10px;
  color: #ec0606ff;
  font-size: 14px;
  text-align: center;
  text-shadow: 2px 2px 6px rgba(235, 0, 0, 0.8);
}

  </style>

</head>

<body>
    

  
    <!--  الي فوق  اول سكشن  -->
      
    <section class="first">
        <span >
        <img src="total.png" alt="imamu+ccis+thuraya" width="200" height="200">
        </span>
   

   <span>
  
   <a href="mailto:Thuraya.officail@outlook.sa">
    <img src="maail.png" width="28px" alt="mail"></a> 
    <a href="tel:0509106514">
    <img src="https://uxwing.com/wp-content/themes/uxwing/download/communication-chat-call/phone-call-white-icon.png" width="20px" alt="Telephon"></a> 
    <a href="https://www.instagram.com/thurayaofficail?igsh=NTlya3hwczM2eW5i">
    <img src="https://uxwing.com/wp-content/themes/uxwing/download/brands-and-social-media/instagram-white-icon.png" width="20px" alt="instagram"> </a> 
    <a href="https://x.com/thurayaofficail?s=21&t=6akakfk_BBEri2D4XW96Pg">
    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/0/0a/X_logo_2023_%28white%29.svg/250px-X_logo_2023_%28white%29.svg.png" width="20px" alt="X"></a> 
   
   </span>

  </section>
<hr class="hrColor">
 <!--  الي تحت الي فوق  ثاني سكشن  -->
    <section>
        <nav>
            <ul>
                <li><a href="Newhome.php">Home</a></li>
                <li><a href="destinations.php">Destinations</a>
                    <ul style="z-index: 1;">
                        <li><a href="riyadh.php">Riyadh</a></li>
                        <li><a href="jeddah.php">Jeddah</a></li>
                        <li><a href="Abha.php">Abha</a></li>
                        <li><a href="AlBaha.php">AlBaha</a></li>
                        <li><a href="AlUla.php">AlUla</a></li>
                        <li><a href="Diriyah.php">Diriyah</a></li>
                    </ul>
                </li>
                <li><a href="Packages.php">Tourism Packages</a></li>
                <li><a href="cart.php">Cart</a></li>
                <li><a href="aboutus.php">About Us</a></li>

                <?php if (!isset($_SESSION['user_id'])) { ?>
                    <li><a href="login.php">Login / Signup</a></li>
                <?php } ?>
                
                <?php if (isset($_SESSION['user_id'])) { ?>
                    <li><a href="Account.php"><img style="border-radius: 10%;" src="https://flaticons.net/icon.php?slug_category=application&slug_icon=user-profile" width="18px"></a>
                        <ul style="z-index: 1;">
                            <li><a href="logout.php">Logout</a></li>
                        </ul>
                    </li>
                <?php } ?>
            </ul>
        </nav>
        <hr class="hrColor">
    </section>



 <div class="background1">  

<div class="text1">
<h1>Login</h1>
</div>

<section>
    <h3 class="ph3">Log in to continue</h3>
    <p class="ph3">Unlock more by logging in to your Thuraya account.</p>
    <!--  ناخذ الاسم للرساله -->
<h2 id="welcomeUser" style="color:white; text-align:center; margin-top:20px;"></h2>

    <!-- الفورم بعد التعديل -->
    <form id="loginForm" action="LoginPHP.php" method="POST">
      <input type="email" name="email" placeholder="Email" required><br>

      <input id="password" name="password" type="password" placeholder="Password" required><br>
      <p id="passMsg" style="color:red; font-size:10px; margin-top:4px;"></p>

       
      <input onclick="saveUser()" type="submit" value="Login">

      <?php
  if (isset($_SESSION['login_error'])) {
    //هنا ربطناها بكلاس عشان الستايل فوق ونطبعها
      echo "<p class='login-error'>
              {$_SESSION['login_error']}
            </p>";
            // هذي مهمه وظيفتها اذا سوا اليوزر ريفرش للصفحه تروح رساله الخطا ماتكون لازقه نحذفها من السشن
      unset($_SESSION['login_error']);
     }
      ?>
    </form>
     
    </div>

    <p class="text-center">Don't have an account? <a class="link" href="Signup.php">Sign up now</a></p>
</section>

  
<!-- الفوتر يويل الي تضيف شي عليه ثابت بكل الصفحات -->
<footer>
<p>&copy; 2025-26 / IMSIU / CCIS &trade;</p>
</footer>

<script>

 

var form = document.getElementById("loginForm");
var userField = document.getElementById("username");
var welcome = document.getElementById("welcomeUser");

var pass = document.getElementById("password");
var msg = document.getElementById("passMsg");

pass.addEventListener("input", checkthepass , false);

function checkthepass(){
  var p = pass.value;
if (p.length < 6) {
      msg.innerHTML = "Password must be at least 6 characters.";
      return;
  }

  if (!/\d/.test(p)) {
      msg.innerHTML = "Password must contain at least 1 number.";
      return;
  }

  if (!/[A-Z]/.test(p)) {
      msg.innerHTML = "Password must contain at least 1 uppercase letter.";
      return;
  }

  msg.innerHTML = "";
}




</script>

<?php include 'chatbot.php'; ?>
</body>
</html>