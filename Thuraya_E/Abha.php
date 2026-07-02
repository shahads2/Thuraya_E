<?php 
session_start();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Abha-Thuraya</title>
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

        <!--الحين تبدا صفحة ابها-->

     <div>
  <img src="Abhapic.png" width="100%" height="300">

  
</div>



<!--الفهرس-->
   <div class="tag"><a href="#About">About Abha</a>
     <a href="#hotels">Abha hotels</a>
     <a href="#keep">Keep Exploring Saudi</a></div>

     <div class="city">

    <h1 id="About">About Abha</h1>
    <p style="font-size: 18px; line-height: 1.8; max-width: 1000px; margin:auto; color: #eee;">
        Perched high in the Sarawat Mountains, Abha is a breathtaking destination known for its misty peaks and cool breezes. As the capital of the Aseer region, it offers a unique blend of heritage and nature. From the vibrant colors of Al-Muftaha Art Village to the dizzying heights of Al-Soudah, Abha invites you to explore its traditional stone palaces, lush juniper forests, and the warm hospitality of its people. It is truly a sanctuary for those seeking peace and mountain adventure.
    </p>
    <hr>
    <br><br>

  <h1 id="hotels">Abha hotels</h1>

<div class="hotle-images">

    <div>
        <img src="Ahotle1.png">
        <h3>Citadines Abha Hotel</h3>
        <p>a modern hotel. It features stylish rooms, a fitness center,
         outdoor pool, sauna and free wifi. ideal for both short
         and long stays.</p>
     <a href="https://www.discoverasr.com/en/citadines/saudi-arabia/citadines-abha?utm_source=google&utm_medium=maps&utm_campaign=hq-google-maps-alwayson--all-en-meati-sa-citadinesabha--gbp&--&cid=map::gg::hq:ind:::all:en:meati:sa:citadinesabha:0:gbp:0:::"
     target="_blank">Book Hotel</a>    
    </div>

    <div>
        <img src="Ahotle2.png" width="300">
        <h3>Abha Palace Hotel</h3>
        <p>One of Abha’s most iconic hotels, located by the lake, offering
        luxurious rooms, stunning views, and a traditional Arabian design.</p>
     <a href="https://palace.abhahotel.com/en/" target="_blank">Book Hotel</a>    
    </div>

    <div>
    <img src="https://cf.bstatic.com/xdata/images/hotel/max1024x768/287789504.jpg?k=ce13f552e3b9dbfa44b226ba6fed96bf82925b190b3b1b8a2bf58e7835bb9d1c&o=" alt="Blue Inn Abha">
    <h3>Blue Inn Hotel</h3>
    <p>A modern luxury hotel in the heart of Abha, offering elegant rooms and stunning city views for business and leisure.</p>
    <a href="https://www.blueinn.com" target="_blank">Book Hotel</a>
</div>

<div>
    <img src="https://images.unsplash.com/photo-1566665797739-1674de7a421a?q=80&w=400&h=250&fit=crop" alt="Boudl Abha">
    <h3>Boudl Abha</h3>
    <p>Providing spacious and comfortable suites, Boudl is known for its family-friendly atmosphere and prime location.</p>
    <a href="https://www.boudl.com" target="_blank">Book Hotel</a>
</div>

<div>
    <img src="https://images.unsplash.com/photo-1590490360182-c33d57733427?q=80&w=400&h=250&fit=crop" alt="Habitat Abha">
    <h3>Habitat Hotel All Suites</h3>
    <p>Offering a luxurious and private stay with contemporary design and top-tier services in a serene environment.</p>
    <a href="https://www.habitathotel.com.sa" target="_blank">Book Hotel</a>
</div>

<div>
    <img src="https://images.unsplash.com/photo-1444201983204-c43cbd584d93?q=80&w=400&h=250&fit=crop" alt="Mercure Abha">
    <h3>Mercure Hotel Abha</h3>
    <p>Situated near the major attractions, this hotel offers high-quality international hospitality and comfort.</p>
    <a href="https://all.accor.com" target="_blank">Book Hotel</a>
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
        <a href="riyadh.php">
        <h3>Riyadh</h3>
          <img src="riyadh.png" alt="Riyadh">
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