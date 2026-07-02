<?php 
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AlUla-Thuraya</title>
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


 <!--الحين تبدا صفحة العلا-->

     <div>
  <video src="Ulavid.mp4" width="100%"  autoplay muted loop playsinline></video>

</div>


<!--الفهرس-->
   <div class="tag"><a href="#About">About AlUla</a>
     <a href="#hotels">AlUla hotels</a>
     <a href="#keep">Keep Exploring Saudi</a></div>

<div class="city">


    <h1 id="About">About AlUla</h1>
    <p style="font-size: 18px; line-height: 1.8; max-width: 1000px; margin:auto; color: #eee;">
        Deep in the desert of northwestern Saudi Arabia lies AlUla, a place of extraordinary natural beauty and cultural 
        heritage. Home to Hegra, the Kingdom’s first UNESCO World Heritage site, AlUla tells the story of 200,000 years of
         human history. With its dramatic sandstone mountains, lush palm groves, and the shimmering Maraya concert hall, 
         AlUla offers a journey through time like no other place on earth.
    </p>
    <hr>
    <br><br>

    <h1 id="hotels">AlUla hotels</h1>

    <div class="hotle-images">

    <div>
        <img src="Uhotle1.png">
        <h3>Our Habitas, AlUla</h3>
        <p>A luxurious eco-resort blending modern comfort with the beauty of
        AlUla’s desert landscape. Perfect for those seeking peace and nature.</p>
     <a href="https://www.ourhabitas.com/alula/?utm_source=google&utm_medium=organic&utm_campaign=google_local"
      target="_blank">Book Hotel</a>    
    </div>

    <div>
        <img src="Uhotle2.png">
        <h3>Shaden Resort, AlUla</h3>
        <p>A beautiful resort surrounded by mountains, offering luxury villas, pools, 
        and stunning sunset views of the desert landscape.</p>
     <a href="https://all.accor.com/hotel/B6T0/index.en.shtml"
      target="_blank">Book Hotel</a>    
    </div>

    <div>
    <img src="https://s7g10.scene7.com/is/image/rcu/banyan-tree-752x936?$Responsive$&fit=stretch&fmt=webp&wid=600" alt="Banyan Tree AlUla">
    <h3>Banyan Tree AlUla</h3>
    <p>An all-villa resort inspired by Nabataean architecture, offering an immersive experience in the Ashar Valley.</p>
    <a href="https://www.banyantree.com/saudi-arabia/alula" target="_blank">Book Hotel</a>
</div>

<div>
    <img src="https://s7g10.scene7.com/is/image/rcu/cloud7-card-600x900?$Responsive$&fit=stretch&fmt=webp&wid=600" alt="Cloud7 Residences">
    <h3>Cloud7 Residences</h3>
    <p>Trendy and comfortable bungalow-style accommodation, perfect for long stays and exploring the local farm life.</p>
    <a href="https://cloud7hotels.com/alula/" target="_blank">Book Hotel</a>
</div>

<div>
    <img src="https://www.ourhabitas.com/wp-content/uploads/2023/11/Habitas_Caravan-Alula_Low-Res_0011.jpg" alt="Caravan AlUla">
    <h3>Caravan by Habitas</h3>
    <p>A unique glamping experience in high-end Airstream trailers, designed for adventure and social connection.</p>
    <a href="https://www.ourhabitas.com/alula/caravan/" target="_blank">Book Hotel</a>
</div>

<div>
    <img src="https://s7g10.scene7.com/is/image/rcu/the-chedi-hero-2880x1620?$Responsive$&fit=stretch&fmt=webp&wid=1920" alt="Canyon RV Park">
    <h3>The Chedi Hegra</h3>
    <p>World first luxury hotel fusing contemporary design with ancient structures including an old railway station.</p>
    <a href="https://www.ghmhotels.com/en/the-chedi-hegra/" target="_blank">Book Hotel</a>
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
        <a href="Diriyah.php">
        <h3>Diriyah</h3>
          <img src="Diriyah.png" alt="Diriyah" >
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