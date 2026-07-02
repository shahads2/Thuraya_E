<?php 
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jeddah-Thuraya</title>
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

    <!--الحين تبدا صفحة جده-->

  <div>
  <video src="jedvid.MP4" width="100%"  autoplay muted loop playsinline></video>
  </div>


<!--الفهرس-->
   <div class="tag"><a href="#About">About Jeddah</a>
     <a href="#hotels">Jeddah hotels</a>
     <a href="#keep">Keep Exploring Saudi</a></div>
     
<div class="city">
    <h1 id="About">About Jeddah</h1>
    <p style="font-size: 18px; line-height: 1.8; max-width: 1000px; margin:auto; color: #eee;">
        Jeddah is a mesmerizing blend of ancient traditions and modern coastal living. Known as the gateway to Makkah,
         it boasts the historic Al-Balad district, a UNESCO World Heritage site filled with coral-stone houses. Beyond 
         its history, Jeddah’s vibrant Corniche, world-class diving spots, and the iconic King Fahd’s Fountain make it a 
         top destination for those seeking relaxation and adventure by the Red Sea.
    </p>
    <hr>
    <br><br>

    <h1 id="hotels">Jeddah hotels</h1>

    <div class="hotle-images">

    <div>
        <img src="Jhotle1.png">
        <h3>Jeddah Hilton</h3>

        <p>A world-class beachfront hotel offering elegant rooms, 
        worldwide dining, and beautiful views of the Red Sea.</p>

       <a href="https://www.hilton.com/ar/hotels/jedhihi-jeddah-hilton-hotel/?WT.mc_id=zINDA0EMEA1MB2PSH3Paid_ggl4ACBI_Brand_Destination5dkt6MULTIBR8i81487397_426111303_23253905232&&&&&gclsrc=aw.ds&gad_source=1&gad_campaignid=23253905232&gbraid=0AAAAADnjLGNKiM1E8EfarmFOBS3Grn8wQ&gclid=Cj0KCQiA8KTNBhD_ARIsAOvp6DLhPUYBhS_95j_8ua7CUAh3OFCbLIHhWy_ytmC5hgAgJEo1-DGz7w4aAux5EALw_wcB" 
       target="_blank">Book Hotel</a>
        
    </div>

    <div>
        <img src="Jhotle2.png">
        <h3>Rosewood Jeddah</h3>

        <p>A luxury hotel located on the Corniche, featuring modern rooms,
         fine dining, and a rooftop pool with breathtaking sea views.</p>

       <a href="https://www.rosewoodhotels.com/en/jeddah" target="_blank">Book Hotel</a>
    </div>

    <div>
    <img src="https://images.unsplash.com/photo-1582719508461-905c673771fd?q=80&w=400&h=250&fit=crop" alt="Shangri-La Jeddah">
    <h3>Shangri-La Jeddah</h3>
    <p>A luxury waterfront stay with panoramic sea views, exceptional dining, and world-class service on the Corniche.</p>
    <a href="https://www.shangri-la.com/en/jeddah/shangrila/" target="_blank">Book Hotel</a>
</div>

<div>
    <img src="https://images.unsplash.com/photo-1542314831-068cd1dbfeeb?q=80&w=400&h=250&fit=crop" alt="Park Hyatt Jeddah">
    <h3>Park Hyatt Jeddah</h3>
    <p>A sanctuary of Andalusian architecture and tranquil gardens, offering a peaceful retreat right on the Red Sea.</p>
    <a href="https://www.hyatt.com/en-US/hotel/saudi-arabia/park-hyatt-jeddah-marina-club-and-spa/jedph" target="_blank">Book Hotel</a>
</div>

<div>
    <img src="https://images.unsplash.com/photo-1566073771259-6a8506099945?q=80&w=400&h=250&fit=crop" alt="The Ritz-Carlton Jeddah">
    <h3>The Ritz-Carlton, Jeddah</h3>
    <p>A palatial hotel overlooking the Red Sea, offering royal hospitality and exquisite classical design.</p>
    <a href="https://www.ritzcarlton.com/en/hotels/jedrz-the-ritz-carlton-jeddah/overview/" target="_blank">Book Hotel</a>
</div>

<div>
    <img src="https://images.unsplash.com/photo-1520250497591-112f2f40a3f4?q=80&w=400&h=250&fit=crop" alt="InterContinental Jeddah">
    <h3>InterContinental Jeddah</h3>
    <p>Perfectly located near the world's tallest fountain, this hotel blends traditional luxury with modern comfort.</p>
    <a href="https://www.ihg.com/intercontinental/hotels/gb/en/jeddah/jedha/hoteldetail" target="_blank">Book Hotel</a>
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
        <a href="AlBaha.php">
        <h3>AlBaha</h3>
          <img src="AlBaha.png" alt="AlBaha">
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