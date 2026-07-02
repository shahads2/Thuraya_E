<?php 
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Diriyah-Thuraya</title>
    <meta http-equiv="refresh" content="43200">
    <link rel="stylesheet" href="stylesheet.css">
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


 <!--الحين تبدا صفحة الدرعيه-->

     <div>
  <video src="dirvid.mp4" width="100%"  autoplay muted loop playsinline></video>

</div>


<!--الفهرس-->
   <div class="tag"><a href="#About">About Diriyah</a>
     <a href="#hotels">Diriyah hotels</a>
     <a href="#keep">Keep Exploring Saudi</a></div>

<div class="city">


    <h1 id="About">About Diriyah</h1>
    <p style="font-size: 18px; line-height: 1.8; max-width: 1000px; margin:auto; color: #eee;">
        Diriyah is the birthplace of the Saudi state and the ancestral home of the House of Saud. At its heart lies At-Turaif, a historic district made of sun-dried mud bricks that echoes the glory of the past. Today, Diriyah is being transformed into a global cultural and lifestyle destination, featuring the luxurious Bujairi Terrace dining district and authentic Najdi hospitality, all while preserving its soul as the "City of Earth."
    </p>
    <hr>
    <br><br>

  <h1 id="hotels">Diriyah hotels</h1>

<div class="hotle-images">

    <div>
        <img src="Dhotle1.png">
        <h3>Bab Samhan Hotel, Diriyah</h3>
        <p>A luxurious hotel located near At-Turaif, combining
             modern elegance with the charm of Saudi heritage.</p>
     <a href="https://www.marriott.com/en-us/hotels/ruhlc-bab-samhan-a-luxury-collection-hotel-diriyah/overview/?scid=f2ae0541-1279-4f24-b197-a979c79310b0"
     target="_blank">Book Hotel</a>    
    </div>

    <div>
        <img src="Dhotle2.png">
        <h3>The Ritz-Carlton, Diriyah</h3>
        <p>A five-star hotel offering premium services, fine dining,
             and a unique atmosphere inspired by Diriyah’s heritage.</p>
     <a href="https://www.diriyahcompany.sa/en/diriyah-living/ritz-carlton" target="_blank">Book Hotel</a>    
    </div>

    <div>
    <img src="https://assets-diriyahco.diriyah.me/1adf7d3261024639a8bec028cfc9b73d?width=1280&quality=80&transform=true&format=webp" alt="Bab Samhan">
    <h3>Manazel AlHadawi</h3>
    <p>tradition and modernity meet in perfect balance. Inspired by Najdi architecture and rooted in Diriyah’s legacy reimagine heritage for the future.</p>
    <a href="https://www.marriott.com" target="_blank">Book Hotel</a>
</div>

<div>
    <img src="https://assets-diriyahco.diriyah.me/67188c08ac4d4050a6871efb66c0be0a?width=1280&quality=80&transform=true&format=webp" alt="Aman Diriyah">
    <h3>Aman Diriyah</h3>
    <p>An ultra-luxury retreat focused on wellness and heritage, set within the lush palm groves of Wadi Hanifah.</p>
    <a href="https://www.aman.com" target="_blank">Book Hotel</a>
</div>

<div>
    <img src="https://assets-diriyahco.diriyah.me/962e507c4f0843f2bfa6a7ca08f28bdc?width=1280&quality=80&transform=true&format=webp" alt="Four Seasons Diriyah">
    <h3>Four Seasons Hotel Diriyah</h3>
    <p>Blending contemporary luxury with the historical charm of the Kingdom's birthplace for a unique stay.</p>
    <a href="https://www.fourseasons.com" target="_blank">Book Hotel</a>
</div>

<div>
    <img src="https://assets-diriyahco.diriyah.me/2a0983e50b1d46aab06323906e562b05?width=1280&quality=80&transform=true&format=webp" alt="Address Diriyah">
    <h3>Address Diriyah</h3>
    <p>Offering world-class hospitality and premium amenities that celebrate the authentic Saudi heritage.</p>
    <a href="https://www.addresshotels.com" target="_blank">Book Hotel</a>
</div>

    </div>

<br>
<hr>
<br><br>


  <div class="explore-header" >
      <h2 id="keep">Keep Exploring Saudi</h2>
      <a href="destinations.php">View All</a>
 </div>


  <div class="small-images">

          <div><br>
        <a href="jeddah.php">
        <h3>Jeddah</h3>
          <img src="jeddah.png" alt="Jeddah">
        </a>
      </div>
  
      <div><br>
        <a href="Abha.php">
        <h3>Abha</h3>
          <img src="Abha.png" alt="Abha">
        </a>
      </div>
  
      <div><br>
        <a href="AlUla.php">
        <h3>AlUla</h3>
          <img src="AlUla.png" alt="AlUla" >
        </a>
      </div>

    </div>
    </div>



<!-- الفوتر يويل الي تضيف شي عليه ثابت بكل الصفحات -->
 <footer>
  <p>&copy; 2025-26 / IMSIU / CCIS &trade;</p>
 </footer>

<script src="main.js"></script>
</body>
</html>