<?php 
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riyadh-Thuraya</title>
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


    <!--الحين تبدا الصفحه حقت الرياض-->
    <div>
  <video src="vidriy.mp4" width="100%"  autoplay muted loop playsinline></video>

  
</div>

<!--الفهرس-->
   <div class="tag"><a href="#About">About Riyadh</a>
     <a href="#hotels">Riyadh hotels</a>
     <a href="#keep">Keep Exploring Saudi</a></div>

    <div class="city">



    

    <h1 id="About">About Riyadh</h1>
    <p style="font-size: 18px; line-height: 1.8; max-width: 1000px; margin: 0 auto; color: #eee;">
        Welcome to Riyadh, where the pulse of the future meets the roots of history. As the capital of Saudi Arabia, Riyadh is a 
        vibrant metropolis that seamlessly blends soaring skyscrapers with ancient mud-brick architecture. From the luxury of the 
        Kingdom Centre to the historic Diriyah, Riyadh offers an unparalleled journey through culture, commerce, and innovation. Whether 
        you are seeking world-class shopping, fine dining, or a glimpse into the Kingdom's heritage, Riyadh stands as a testament to the ambitious
         vision of a nation.
    </p>
    <hr>
    <br><br>

    <h1 id="hotels">Riyadh hotels</h1>

    <div class="hotle-images">

     <div>
         <img src="Rhotle1.png" >
        <h3> Ritz-Carlton, Riyadh</h3> 
        <p>A luxurious hotel offering world-class hospitality, 
        elegant rooms, fine dining, and exceptional service.</p>

       <a href="https://www.ritzcarlton.com/en/hotels/ruhrz-the-ritz-carlton-riyadh/overview/" target="_blank">Book Hotel</a>
        </div>

     <div>
        <image src="Rhotle2.png">
        <h3> Narcissus Hotel & Spa, Riyadh</h3>

      <p>A boutique hotel featuring elegant interiors,
        gourmet restaurants, and a relaxing spa.
        perfect for business and leisure travelers in Riyadh.</p>

     <a href="https://www.narcissusriyadh.com" target="_blank">Book Hotel</a>    
    </div>

    <div>
        <img src="https://images.unsplash.com/photo-1566073771259-6a8506099945?q=80&w=400&h=250&fit=crop" alt="Four Seasons Riyadh">
        <h3>Four Seasons Hotel Riyadh</h3>
        <p>Located in the iconic Kingdom Centre, this hotel offers breathtaking views of the city skyline and ultra-luxury amenities.</p>
        <a href="https://www.fourseasons.com/riyadh/" target="_blank">Book Hotel</a>
    </div>

    <div>
        <img src="https://images.unsplash.com/photo-1582719478250-c89cae4dc85b?q=80&w=400&h=250&fit=crop" alt="Al Faisaliah Hotel">
        <h3>Al Faisaliah Hotel</h3>
        <p>A landmark of elegance in the heart of the business district, known for its iconic pyramid shape and top-tier butler service.</p>
        <a href="https://www.alfaisaliahhotel.com" target="_blank">Book Hotel</a>
    </div>

    <div>
        <img src="https://images.unsplash.com/photo-1542314831-068cd1dbfeeb?q=80&w=400&h=250&fit=crop" alt="Fairmont Riyadh">
        <h3>Fairmont Riyadh</h3>
        <p>Part of the Business Gate complex, the Fairmont offers a sophisticated blend of contemporary design and warm hospitality.</p>
        <a href="https://www.fairmont.com/riyadh/" target="_blank">Book Hotel</a>
    </div>

    <div>
        <img src="https://images.unsplash.com/photo-1571896349842-33c89424de2d?q=80&w=400&h=250&fit=crop" alt="Mansard Riyadh">
        <h3>Mansard Riyadh</h3>
        <p>Features French-inspired architecture and bespoke European interiors, perfect for those seeking a stylish and boutique stay.</p>
        <a href="https://www.radissonhotels.com/en-us/hotels/radisson-collection-mansard-riyadh" target="_blank">Book Hotel</a>
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