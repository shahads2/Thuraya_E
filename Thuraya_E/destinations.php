<?php 
session_start();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Destinations-Thuraya</title>
    <meta http-equiv="refresh" content="43200">
    <link rel="stylesheet" href="stylesheet.css"/>
     <style>


:root {
  --gold: #c9a96e;
  --gold-light: #e8d5a3;
  --glass-border: rgba(201,169,110,0.2);
  --deep: #0a0618;
}

/* ===== HERO ===== */
.dest-hero {
  position: relative;
  height: 100%;
  min-height: 500px;
  overflow: hidden;
  display: flex;
  align-items: flex-end;
}

.dest-hero-bg {
  position: absolute;
  inset: 0;
  background-image: url('destinations1.png');
  background-size: cover;
  background-position: center;
  transform: scale(1.04);
  transition: transform 8s ease;
}

.dest-hero-bg.zoomed { transform: scale(1); }

.dest-hero-overlay {
  position: absolute;
  inset: 0;
  background: linear-gradient(
    to bottom,
    rgba(10,6,24,0.2) 0%,
    rgba(10,6,24,0.15) 40%,
    rgba(10,6,24,0.75) 80%,
    rgba(10,6,24,1) 100%
  );
}

.dest-hero-content {
  position: relative;
  z-index: 2;
  padding: 0 60px 70px;
  width: 100%;
}



.dest-hero-title {
  font-size: 52px;
  font-weight: 300;
  color: #fff;
  line-height: 1;
  margin: 0 0 40px;
  text-shadow: -4px 4px 6px rgb(96,92,92);
  animation: fadeUp 1s ease both 0.4s;
  text-align: left;
}

  .city-images {
  display: grid;
  grid-template-columns: repeat(3, 1fr); /* 3 صور في كل صف */
  gap: 25px; /* مسافة بين الصور */
  justify-items: center; 
  margin-top: 40px;
}

.city-images img {
  width: 400px;
  height: 230px;
  border-radius: 10px;
  display: block;
}

.city-images div:hover {
  transform: scale(1.05);
  transition: transform 0.3s;
}

.city-images h3 {
  margin-top: 10px; 
  font-size: 20px;
  color: white;
  text-align: left;
}

.city-images a {
  text-decoration: none; 
  color:inherit ;
}


@media (max-width: 900px) {
  .city-images {
    grid-template-columns: repeat(2, 1fr);
  }
  .city-images.featured { grid-row: span 1; }
  .dest-hero-content { padding: 0 24px 50px; }
  .scroll-indicator { display: none; }
}

@media (max-width: 600px) {
  .city-images { grid-template-columns: 1fr; }
  .dest-section { padding: 50px 20px 70px; }
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

    <!-- الحين تبدا الصفحه-->
<!-- HERO -->
<div class="dest-hero">
    <div class="dest-hero-bg" id="heroBg"></div>
    <div class="dest-hero-overlay"></div>

    <div class="dest-hero-content">
        <h1 class="dest-hero-title">Destinations</h1>
    </div>


</div>

<h2 style="text-align:center; margin-top:25px;  text-shadow:-4px 4px 6px rgb(96, 92, 92);
">Saudi Destinations</h1>


<br>

      
    <!--صور المدن -->
  
 <div class="city-images">

    <div>
        <a href="riyadh.php">
          <img src="riyadh.png" alt="Riyadh">
          <h3>Riyadh</h3>
        </a>
      </div>
  
      <div>
        <a href="jeddah.php">
          <img src="jeddah.png" alt="Jeddah">
          <h3>Jeddah</h3>
        </a>
      </div>
  
      <div>
        <a href="Abha.php">
          <img src="Abha.png" alt="Abha">
          <h3>Abha</h3>
        </a>
      </div>
  
      <div>
        <a href="AlUla.php">
          <img src="AlUla.png" alt="AlUla" >
          <h3>AlUla</h3>
        </a>
      </div>
  
      <div>
        <a href="Diriyah.php">
          <img src="Diriyah.png" alt="Diriyah" >
          <h3>Diriyah</h3>
        </a>
      </div>
  
      <div>
        <a href="AlBaha.php">
          <img src="AlBaha.png" alt="AlBaha">
          <h3>AlBaha</h3>
        </a>
      </div>
      
</div>
</div>
  
  



<!-- الفوتر يويل الي تضيف شي عليه ثابت بكل الصفحات -->
 <footer>
  <p>&copy; 2025-26 / IMSIU / CCIS &trade;</p>
 </footer>

 <script>
// Hero zoom animation on load
window.addEventListener('load', () => {
    setTimeout(() => {
        document.getElementById('heroBg').classList.add('zoomed');
    }, 100);
});
</script>

<?php include 'chatbot.php'; ?>
</body>
</html>