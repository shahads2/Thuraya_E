<?php 
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup - Thuraya </title>
   <meta http-equiv="refresh" content="43200">
    <link rel="stylesheet" href="stylesheet.css">
        <style> 
    .container {
      display: flex;
      min-height: calc(100vh - 250px); 
      margin: 0;
      padding: 0;
    }

    .left-side {
      flex: 1;
      overflow: hidden;
    }

    .left-side img {
      width: 100%;
      height: 120vh;
      object-fit: cover;
      display: block;
    }

    .right-side {
      flex: 1;
      height: 120vh;
      background-color: white;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      padding: 60px 40px;
      box-sizing: border-box;
    }

    h3 {
      text-align: center;
      color: #311976;
      font-size: 30px;
      font-weight: 600;
      font-family: 'Theo Van Doesburg', sans-serif;
      margin-top: 40px; 
      margin-bottom: 10px;
    }

    .p1{
      text-align: center;
      color: #333;
      font-size: 18px;
      margin-bottom: 25px;
      line-height: 1.6;
      margin-top: 10px;
    }

    form {
      background: white;
      width: 350px;
      padding: 25px;
      border-radius: 10px;
      text-align: center;
      box-shadow: 0 0 10px rgba(0,0,0,0.2);
      margin-top: 20px; 
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

    
    footer {
      
      padding: 15px;
      margin-top: 0;
    }

    .link{
      font-weight: bold;
    }
  
  </style>


</head>
<body>
         
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
 <hr class="hrColor" >
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



     
<div class="container">
    <div class="left-side">
      <img src="signup.jpg" alt="Signup Image">
    </div>

    <div class="right-side">
      <h3>Create your account</h3>
      <p class="p1">Join Thuraya to explore Saudi destinations, book hotels, and apply for visas easily.</p>
    <form id="signupForm" action="SingupPHP.php" method="POST"> <!-- هنا عشان يرسل للملف حق ال php -->

        <input type="text" id="username"  name="first_name" placeholder="First Name" required><br>
        <input type="text" name="last_name" placeholder="Last Name"  required><br>
        <input type="text" name="national_id" placeholder="National ID" required><br>
        <input type="date" id="birthdate"  name="birthdate" required><br>
        <p id="dateMsg" style="color:red; font-size:10px; margin-top:4px;"></p>

<select id="nationality" name="nationality" required style="width: 95%; padding: 10px; margin: 8px 0; border: 1px solid #aaa; border-radius: 5px;">
    <option value="" disabled selected>Select Nationality</option>
    <option>Saudi Arabia</option>
    <option>United Arab Emirates</option>
    <option>Kuwait</option>
    <option>Qatar</option>
    <option>Bahrain</option>
    <option>Oman</option>

    <option>Pakistan</option>
    <option>India</option>
    <option>Philippines</option>
    <option>Indonesia</option>
    <option>Malaysia</option>
    <option>Japan</option>
    <option>South Korea</option>
    <option>China</option>

    <option>Egypt</option>
    <option>Jordan</option>
    <option>Lebanon</option>
    <option>Turkey</option>
    <option>Morocco</option>
    <option>Syria</option>
    <option>Palestine</option>

    <option>United Kingdom</option>
    <option>France</option>
    <option>Germany</option>
    <option>Italy</option>
    <option>Spain</option>
    <option>Netherlands</option>
    <option>Sweden</option>
    <option>United States</option>
    <option>Canada</option>
    <option>Brazil</option>
    <option>Australia</option>

</select>

        <input type="tel" name="mobile" placeholder="Mobile Number" required><br>
        <input type="email" name="email" placeholder="Email" required><br>

        <input type="password" id="password" name="password" placeholder="Password" required><br>
        <p id="passMsg" style="color:red; font-size:10px; margin-top:4px;"></p>

        <input type="password" id="re-password" placeholder="Re-enter the password" required><br>
        <p id="re-passMsg" style="color:red; font-size:10px; margin-top:4px;"></p>

        <div style="display:flex; gap:8px; align-items:center; justify-content:center; margin-top:6px;">
          <span  id="captchaText" style="width:100px; padding:10px; border-radius:5px; border:1px solid #aaa; text-align:center; font-weight:bold; color: #311976; "> </span>
          <button type="button" id="captchaRefresh" style="padding:10px 12px; border-radius:5px; border:none; background:#311976; color:#fff; cursor:pointer;" >Refresh</button>
        </div>

        <input type="text" id="captchaInput" placeholder="Enter CAPTCHA" required style="margin-top:8px;"><br>
        <p id="captchaMsg" style="color:red; font-size:14px; margin-top:4px;"></p>

        <input onclick="saveUser()" type="submit" value="Sign up" name="SignUp" >
      </form>

      <p class="p1">Already have an account? <a  class="link" href="login.php">Login now</a></p>
    </div>
  </div>


      <footer>
  <p>&copy; 2025-26 / IMSIU / CCIS &trade;</p>
 </footer>





<script>
  


  //================= الباسورد =============
var pass = document.getElementById("password");
var msg = document.getElementById("passMsg");

var repass = document.getElementById("re-password");
var msg2 = document.getElementById("re-passMsg");

   pass.addEventListener("input", checkthepass , false );
   repass.addEventListener("input" , checkthepass2 , false);

  function checkthepass(){
    
  var p = pass.value;

      if (p.length < 6) { // فقره a 
          msg.innerHTML = "Password must be at least 6 characters.";
          return;
      }

      if (!/\d/.test(p)) { // فقره b 
          msg.innerHTML = "Password must contain at least 1 number.";
          return;
      }

      if (!/[A-Z]/.test(p)) { // فقره b 
          msg.innerHTML = "Password must contain at least 1 uppercase letter.";
          return;
      }

      msg.innerHTML = ""; // هذا اذا كلش تمام
  }

  function checkthepass2(){ // فقره c 
      var p = pass.value;
      var r = repass.value;

      if (r.length == 0){ msg2.innerHTML = "";  return; }
      if (p === r) { msg2.style.color= "green";  msg2.innerHTML = "Passwords match !!"; } 
      else {  msg2.style.color = "red";  msg2.innerHTML = "Passwords do not match.";  }
  }

//=================  البرثديت فقره d =============
  var birth = document.getElementById("birthdate");
  var dateMsg = document.getElementById("dateMsg");

  var today = new Date();
  var minYear = today.getFullYear() - 18; // اختصار عشان على طول اعرف اقل سنه مسموحه
  var minMonth = today.getMonth() + 1; // عشان يصير ١٢ شهر 
  var minDay = today.getDate();

  var minDate = minYear + "-" + minMonth + "-" + minDay;
  birth.max = minDate;

birth.addEventListener("input", datefunction, false );

function datefunction(){
var d = birth . value
if (d > minDate) {
          dateMsg.innerHTML = "You must be 18 years old Sorry ^-^ ";
      } else {
          dateMsg.innerHTML = "";
      }
}

//================= الكود تحقق فقره e =============
var cText = document.getElementById("captchaText");
var cRefresh = document.getElementById("captchaRefresh");
var cInput = document.getElementById("captchaInput");
var cMsg = document.getElementById("captchaMsg");

window.addEventListener("load", doCaptcha, false);
cRefresh.addEventListener("click", reCaptcha, false);
cInput.addEventListener("input", checkCaptcha, false);

function doCaptcha(){
    var chars = "ABCDEFGHJKLMNPQRSTUVWXYZ23456789";
    var code = "";

    for (var i = 0; i < 5; i++){
        var r = Math.floor(Math.random() * chars.length);
        code += chars.charAt(r);
    }

    cText.textContent = code; 
}

  // حق الزر 
  function reCaptcha(){ 
    doCaptcha();
    cInput.value = "";
    cMsg.innerHTML = "";
    }

// التحقق
function checkCaptcha(){
    var user = cInput.value.toUpperCase();
    var real = cText.textContent;

    
    if (user === real){
        cMsg.innerHTML = "Correct !!";
        cMsg.style.color = "green";
    } else {
        cMsg.innerHTML = "Incorrect -ـ- ";
        cMsg.style.color = "red";
    } }


    // ================فقره f =================

var sem = document.getElementById("semester");
var semMsg = document.getElementById("semesterMsg");

sem.addEventListener("input", checksem, false);

function checksem() {
    if (sem.value < 1 || sem.value > 8) {
        semMsg.innerHTML = "Semester must be between 1 and 8.";
    } else {
        semMsg.innerHTML = "";
    }
} 




</script>

<?php include 'chatbot.php'; ?>
</body>
</html>