<?php 
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AlBaha-Thuraya</title>
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


 <!--الحين تبدا صفحة الباحه-->

      <div>
  <img src="bahapic.png" width="100%" height="300">
  
</div>

<!--الفهرس-->
   <div class="tag"><a href="#About">About AlBaha</a>
     <a href="#hotels">AlBaha hotels</a>
     <a href="#keep">Keep Exploring Saudi</a></div>

<div class="city">




    <h1 id="About">About AlBaha</h1>
    <p style="font-size: 18px; line-height: 1.8; max-width: 1000px; margin:auto; color: #eee;">
        Al Baha is a hidden gem in the southwestern part of the Kingdom, where emerald forests meet ancient history. Known for its pleasant weather and over 40 diverse forests, it is a paradise for hikers and nature lovers. The region is home to the legendary "Marble Village" of Dhee Ayn, which stands as a testament to the ingenious architecture of the past. In Al Baha, every turn reveals a new scenic view, from foggy mountain roads to lush valleys filled with the scent of wild herbs.
    </p>
    <hr>
    <br><br>

  <h1 id="hotels">AlBaha hotels</h1>

<div class="hotle-images">

    <div>
        <img src="Bhotle1.png">
        <h3>Cloud city Hotel, Al Baha</h3>
        <p>A cozy resort nestled in the mountains, offering beautiful views,
        comfortable rooms, and traditional Saudi hospitality.</p>
       <a href="https://www.cloudcityhotels.com/" target="_blank">Book Hotel</a>    
    </div>

    <div>
        <img src="Bhotle2.png">
        <h3>National Park Hotel, Al Baha</h3>
        <p>Located near the forests, this hotel provides calm surroundings, 
            great amenities, and an authentic Al Baha experience.</p>
     <a href="https://swiss-international.hotels-saudi-arabia.com/en/" target="_blank">Book Hotel</a>    
    </div>
    <div>
    <img src="https://resortswissinternationalqassimunaizah.sa-hotels.com/data/Photos/OriginalPhoto/11877/1187770/1187770414/photo-swiss-luxury-villas-unaizah-5.JPEG" alt="Swiss International">
    <h3>Swiss International Resort</h3>
    <p>Offering premium mountain villas and a serene atmosphere, perfect for families looking to enjoy the foggy heights.</p>
    <a href="https://www.swissinternationalhotels.com" target="_blank">Book Hotel</a>
</div>

<div>
    <img src="https://images.unsplash.com/photo-1496417263034-38ec4f0b665a?q=80&w=400&h=250&fit=crop" alt="InterContinental Al Baha">
    <h3>InterContinental Al Baha</h3>
    <p>Luxury meets tradition at this iconic hotel, providing world-class amenities and breathtaking views of the forests.</p>
    <a href="https://www.ihg.com" target="_blank">Book Hotel</a>
</div>

<div>
    <img src="https://images.unsplash.com/photo-1549294413-26f195200c16?q=80&w=400&h=250&fit=crop" alt="Golden Tulip">
    <h3>Golden Tulip Al Baha</h3>
    <p>A reliable and comfortable choice for travelers, featuring modern design and a welcoming atmosphere in the city center.</p>
    <a href="https://al-baha.goldentulip.com" target="_blank">Book Hotel</a>
</div>

<div>
    <img src="https://asfar.com/wp-content/uploads/2025/08/428568ee5f5ebc2eb915d394e8b53b88ce9780e0.jpg" alt="Hill Resort">
    <h3>Al Baha Hill Resort</h3>
    <p>Experience local hospitality at its best with cozy accommodations nestled right within the mountain landscape.</p>
    <a href="https://asfar.com/al-baha/" target="_blank">Book Hotel</a>
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