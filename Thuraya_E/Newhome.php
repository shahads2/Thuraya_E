<?php 
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOME-Thuraya</title>
    <meta http-equiv="refresh" content="43200">
    <link rel="stylesheet" href="stylesheet.css">
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,600;1,300;1,400&family=Tajawal:wght@300;400;700&display=swap" rel="stylesheet">

    <style>

/*  VARIABLES  */
:root {
  --gold: #c9a96e;
  --gold-light: #e8d5a3;
  --main-pink: #C29696;
  --deep: #0a0618;
  --purple: #160e3f;
  --purple-mid: #271a68;
  --glass: rgba(255,255,255,0.05);
  --glass-border: rgba(201,169,110,0.2);
  --deep-purple: #370386;
  --glass-bg: rgba(39, 39, 39, 0.36);
  --text-gray: #717171;
}

body {
  background-image: url(BAckGG.jpg), linear-gradient(to bottom, #0a0618, #160e3f, #271a68, #413389, #8477c4);
  background-position: 0px 80px;
  background-repeat: no-repeat;
  background-size: 100%;
  overflow-x: hidden;
}

/*  HERO SECTION */
.hero-banner {
  position: relative;
  min-height: 92vh;
  display: flex;
  align-items: center;
  justify-content: center;
  overflow: hidden;
  margin-bottom: 0;
}

.hero-bg-slider {
  position: absolute;
  inset: 0;
  z-index: 0;
}

.hero-slide {
  position: absolute;
  inset: 0;
  background-size: cover;
  background-position: center;
  opacity: 0;
  transition: opacity 1.8s ease-in-out;
}

.hero-slide.active { opacity: 1; }

.hero-slide:nth-child(1) { background-image: url('https://www.visitsaudi.com/content/dam/wvs/stories/AlUla-Al-Gharameel-resized.jpg'); }
.hero-slide:nth-child(2) { background-image: url('https://www.visitsaudi.com/content/dam/wvs/stories/AlUla-Balloon-resized.jpg'); }
.hero-slide:nth-child(3) { background-image: url('https://www.visitsaudi.com/content/dam/wvs/stories/cave-diving-first-card-desktop.jpg'); }

.hero-overlay {
  position: absolute;
  inset: 0;
  background: linear-gradient(
    to bottom,
    rgba(10,6,24,0.3) 0%,
    rgba(10,6,24,0.15) 40%,
    rgba(10,6,24,0.7) 80%,
    rgba(10,6,24,0.97) 100%
  );
  z-index: 1;
}

.hero-content {
  position: relative;
  z-index: 2;
  text-align: center;
  padding: 0 20px;
  animation: heroFadeUp 1.4s ease both;
}

@keyframes heroFadeUp {
  from { opacity: 0; transform: translateY(40px); }
  to   { opacity: 1; transform: translateY(0); }
}

.hero-label {
  font-size: 12px;
  font-weight: 700;
  letter-spacing: 6px;
  text-transform: uppercase;
  color: #ffffff;;
  margin-bottom: 24px;
  display: block;
}

.hero-title {
  font-size: clamp(33px, 12vw, 100px);
  font-weight: 300;
  line-height: 0.9;
  color: #fff;
  letter-spacing: -2px;
  margin-bottom: 30px;
  text-shadow: -4px 4px 6px rgb(96, 92, 92);}


.hero-subtitle {
  font-size: clamp(15px, 2vw, 19px);
  font-weight: 300;
  color: rgba(255,255,255,0.75);
  max-width: 560px;
  margin: 0 auto 50px;
  line-height: 1.8;
}

.hero-cta-group {
  display: flex;
  gap: 16px;
  justify-content: center;
  flex-wrap: wrap;
}

.btn-primary {
  display: inline-block;
  padding: 16px 44px;
  background:  #370386;
  color: #ffffff;
  font-size: 15px;
  font-weight: 700;
  letter-spacing: 2px;
  text-transform: uppercase;
  border: none;
  border-radius: 2px;
  cursor: pointer;
  transition: all 0.3s ease;
  text-decoration: none;
}

.btn-primary:hover {
  transform: translateY(-3px);
}

.btn-outline {
  display: inline-block;
  padding: 15px 44px;
  background: transparent;
  color: #fff;
  font-size: 15px;
  font-weight: 400;
  letter-spacing: 2px;
  text-transform: uppercase;
  border: 1px solid rgba(255,255,255,0.35);
  border-radius: 2px;
  cursor: pointer;
  transition: all 0.3s ease;
  text-decoration: none;
}

.btn-outline:hover {
transform: translateY(-3px);
}

/* الكابشن للصور الي بالخلفيه  */
.hero-slide-info {
  position: absolute;
  bottom: 40px;
  left: 50%;
  transform: translateX(-50%);
  z-index: 3;
  display: flex;
  align-items: center;
  gap: 20px;
}

.slide-caption {
  font-size: 12px;
  letter-spacing: 4px;
  color: rgba(255,255,255,0.5);
  text-transform: uppercase;
  transition: opacity 0.5s;
}

.slide-dots {
  display: flex;
  gap: 8px;
}

.slide-dot {
  width: 24px;
  height: 2px;
  background: rgba(255,255,255,0.3);
  cursor: pointer;
  transition: all 0.3s;
}
.slide-dot.active {
  background: #370386;
  width: 40px;
}

.quick-nav {
  margin-top: 15px;
padding: 0px 0;    
text-align: center;
    border-bottom: 1px solid rgba(180, 180, 180, 0.3); 
    margin-bottom: 15px;
    white-space: nowrap;
}

.quick-nav a {
    text-decoration: none;
    font-size: 16px; 
    font-weight: 500;
    color: #717171; 
    margin: 0 50px; 
    transition: color 0.3s ease; /* تنعيم تغيير اللون */
}

.quick-nav a:hover {
    color: #C29696; 
    border-bottom: 1px solid #C29696; 
}

.section-wrap {
  max-width: 1200px;
  margin: 0 auto;
  padding: 0 10px;
}

/* الارقام */
.section-title { font-size: 30px; font-style: italic; color: var(--main-pink); text-align: center; margin-bottom: 30px; }
.grid-container {
  display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
  gap: 15px; max-width: 1200px; margin: 0 auto; padding: 10px;
}
.card-item {
  background: var(--glass-bg); border-radius: 12px; text-align: center; 
  padding-bottom: 10px; transition: 0.3s; overflow: hidden;
  width:170px;
}
.card-item:hover { transform: scale(1.05); }
.card-item img { width: 100%; height: 200px; object-fit: cover; }

/* رؤية 2030 */
.vision-section {
  padding: 50px 0;
}

.vision-grid {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(285px, 1fr)); /* Responsive Grid */
  gap: 20px;
  justify-items: center;
  margin-top: 20px;
  max-width: 1200px;
  margin-left: auto;
  margin-right: auto;
}

.vision-card {
  background-color:#2727275c;
  border-radius: 10px;
  max-width: 310px;
  text-align: center;
  padding-bottom: 20px;
  transition: transform 0.3s;
}

.vision-card img {
  width: 100%;
  border-radius: 10px 10px 0 0;
  display: block;
}

.vision-card:hover {
  transform: scale(1.06); 
}

.vision-card-title {
  margin-top: 10px;
  font-size: 25px;
  color:white;
  font-weight: bold;
  text-shadow: -4px 4px 6px rgb(96, 92, 92);}

.vision-card-desc {
  font-size: 17px;
  padding: 0 10px;
  margin-top: 5px;
  line-height: 1.4;
  color: #c2bbbb;
}

.vision-card:hover .vision-card-desc { max-height: 80px; }

/* الخريطه */
.map-section {
  padding: 50px 0;
}

.map-frame-wrap {
  position: relative;
  border-radius: 6px;
  overflow: hidden;
  border: 1px solid var(--glass-border);
}

.map-frame-wrap::before {
  content: '';
  position: absolute;
  inset: 0;
  border: 1px solid var(--glass-border);
  border-radius: 6px;
  z-index: 2;
  pointer-events: none;
}

.map-frame-wrap iframe {
  width: 100%;
  height: 480px;
  display: block;
  border: none;
  filter: saturate(0.7) hue-rotate(220deg) brightness(0.75);
  transition: filter 0.5s;
}

.map-frame-wrap:hover iframe {
  filter: saturate(0.9) hue-rotate(200deg) brightness(0.85);
}

/*map pics/*
/* الصور الي بالخريطة*/
.custom-div-icon {
    background: none;
    border: none;
    text-align: center;
    transition: all 0.3s ease; 
    z-index: 100 !important; 
}

/* تنسيق الدائرة التي تحتوي على الصورة */
.marker-pin {
    width: 50px;
    height: 50px;
    background-color: #491e72; /* اللون الأساسي */
    border: 2px solid white;
    border-radius: 50%;
    display: inline-block;
    box-shadow: 0 4px 8px rgba(0,0,0,0.3);
    overflow: hidden;
    transition: all 0.3s ease; 
}

/* تنسيق الصورة */
.marker-img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    border-radius: 50%;
}

/* تنسيق اسم المدينة */
.marker-label {
    margin-top: 5px;
    font-size: 14px;
    font-weight: bold;
    color: #ffffff;
    text-shadow: 1px 1px 2px rgba(0,0,0,0.8);
    white-space: nowrap;
    transition: all 0.3s ease; }

/* ========== تأثير الهوفر (Hover Effect) ========== */

.custom-div-icon:hover {
    z-index: 9999 !important; /* تطلع فوق كل المدن الثانية */
}

/*  تكبير الدائرة وتغيير لون الخلفية */
.custom-div-icon:hover .marker-pin {
    transform: scale(1.2); 
    background-color: #C29696; 
    border-color: #ffffff;
    box-shadow: 0 8px 15px rgba(0,0,0,0.5);} 

/*  تغيير لون اسم المدينة وحجمه */
.custom-div-icon:hover .marker-label {
    color: #C29696; 
    transform: scale(1.1); }

/* قسم الفيدباك*/
.feedback-section {
    text-align: center;
    padding: 40px 20px;
    margin: 20px auto;
    max-width: 1000px;
}

/* ستايل مربع النص نفسه */
.feedback-textarea {
    width: 100%;
    max-width: 700px;
    background-color:#2727275c;; 
    color: white;
    border-radius: 20px; 
    padding: 20px;
    font-size: 18px;
    resize: none; 
    outline: none;
}

/* زر الإرسال */
.feedback-btn {
    display: block;
    margin: 20px auto 0;
    padding: 12px 35px;
    font-size: 18px;
    font-weight: bold;
    background-color: #370386;
    color: white;
    border: none;
    border-radius: 10px;
    cursor: pointer;
    transition: 0.3s;
}

.feedback-btn:hover {
    background-color: #2E887F;
}

/* السلايدر الثاني*/
.about-slider {
    margin-top: -2px;
    max-width: 1000px;
    position: relative;
    margin: auto;
  background-color: #2727275c;
    border-radius: 15px;
    padding: 20px;
    text-align: center;
    box-shadow: 0 3px 10px rgba(0,0,0,0.15);
}
/*ازرار التنقل بين السلايدز */
.prev, .next {
  cursor: pointer;
  position: absolute;
  top: 50%;
  margin-top: -22px;
  padding: 16px;
  color: white;
  font-weight: bold;
  transition: 0.6s ease;
  border-radius: 10px;
}
.next {
  right: 0px;
}
.prev {
  left: 0px; 
}
.prev:hover, .next:hover {
  background-color: #231257;
}


footer {
  margin-top: 60px !important;
}

@media (max-width: 768px) {
  .stats-grid { grid-template-columns: repeat(2, 1fr); }
  .vision-grid { grid-template-columns: 1fr; }
  .feedback-layout { grid-template-columns: 1fr; gap: 40px; }
  .quick-nav a { margin: 0 16px; font-size: 10px; }
  .hero-title { font-size: 60px; }
}

/* الرساله الي باسم المستخدم الي فباية الصفحة */
.Hwelcome {
  font-size: 14px;
  font-weight: bold;
  color: #ffffff;
  text-shadow: 2px 2px 4px #9f96ceff;
}
    </style>
</head>
<body>

<!-- ===== TOP BAR ===== -->
<section class="first">
  <span>
    <img src="total.png" alt="imamu+ccis+thuraya" width="200" height="200">
    
  </span>

  <?php if (isset($_SESSION['first_name'])): ?>
    <span class="Hwelcome">Welcome, <?= htmlspecialchars($_SESSION['first_name']) ?> ✦</span>
  <?php endif; ?>

  <span>
    <a href="mailto:Thuraya.officail@outlook.sa"><img src="maail.png" width="28px" alt="mail"></a>
    <a href="tel:0509106514"><img src="https://uxwing.com/wp-content/themes/uxwing/download/communication-chat-call/phone-call-white-icon.png" width="20px" alt="Phone"></a>
    <a href="https://www.instagram.com/thurayaofficail?igsh=NTlya3hwczM2eW5i"><img src="https://uxwing.com/wp-content/themes/uxwing/download/brands-and-social-media/instagram-white-icon.png" width="20px" alt="Instagram"></a>
    <a href="https://x.com/thurayaofficail?s=21&t=6akakfk_BBEri2D4XW96Pg"><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/0/0a/X_logo_2023_%28white%29.svg/250px-X_logo_2023_%28white%29.svg.png" width="20px" alt="X"></a>
  </span>
</section>
<hr class="hrColor">

<!-- ===== NAV ===== -->
<section>
  <nav>
    <ul>
      <li><a href="Newhome.php">Home</a></li>
      <li><a href="destinations.php">Destinations</a>
        <ul style="z-index:1000;">
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
      <?php if (!isset($_SESSION['user_id'])): ?>
        <li><a href="login.php">Login / Signup</a></li>
      <?php endif; ?>
      <?php if (isset($_SESSION['user_id'])): ?>
        <li><a href="Account.php"><img style="border-radius:10%;" src="https://flaticons.net/icon.php?slug_category=application&slug_icon=user-profile" width="18px"></a>
          <ul style="z-index:1000;">
            <li><a href="logout.php">Logout</a></li>
          </ul>
        </li>
      <?php endif; ?>

    </ul>
  </nav>
  <hr class="hrColor">
</section>

<!-- ===== HERO ===== -->
<div class="hero-banner">
  <div class="hero-bg-slider">
    <div class="hero-slide active"></div>
    <div class="hero-slide"></div>
    <div class="hero-slide"></div>
  </div>
  <div class="hero-overlay"></div>

  <div class="hero-content">
    <span class="hero-label">✦ Discover the Kingdom ✦</span>
    <h1 class="hero-title">Thuraya</h1>
    <p class="hero-subtitle">Where starlight guides your journey through Saudi Arabia's most breathtaking destinations and timeless experiences.</p>
    <div class="hero-cta-group">
      <a href="Packages.php" class="btn-primary">Explore Packages</a>
      <a href="destinations.php" class="btn-outline">View Destinations</a>
    </div>
  </div>

  <div class="hero-slide-info">
    <span class="slide-caption" id="heroCaption">Stars — AlUla</span>
    <div class="slide-dots">
      <div class="slide-dot active" onclick="goToSlide(0)"></div>
      <div class="slide-dot" onclick="goToSlide(1)"></div>
      <div class="slide-dot" onclick="goToSlide(2)"></div>
    </div>
  </div>
</div>

<!-- الفهرس -->
<div class="quick-nav">
  <a href="#stats">The Numbers</a>
  <a href="#goals">Vision 2030</a>
  <a href="#map">Explore Map</a>
  <a href="#feedback">Feedback</a>
</div>

<!-- احصائيات ثريا -->

<section id="stats" style="padding: 40px 0;">
    <h2 class="section-title">Thuraya in Numbers</h2>
    <div class="grid-container">
        <div class="card-item" style="padding: 20px;">
            <div style="font-size: 40px; color:white; font-weight: bold; text-shadow: -4px 4px 6px rgb(96, 92, 92);">30</div>
            <div style="color: #aaa; text-transform: uppercase; font-size: 12px; letter-spacing: 2px;">Curated Packages</div>
        </div>
        <div class="card-item" style="padding: 20px;">
            <div style="font-size: 40px; color:white; font-weight: bold; text-shadow: -4px 4px 6px rgb(96, 92, 92);">6</div>
            <div style="color: #aaa; text-transform: uppercase; font-size: 12px; letter-spacing: 2px;">Major Destinations</div>
        </div>
        <div class="card-item" style="padding: 20px;">
            <div style="font-size: 40px; color:white; font-weight: bold; text-shadow: -4px 4px 6px rgb(96, 92, 92);">24/7</div>
            <div style="color: #aaa; text-transform: uppercase; font-size: 12px; letter-spacing: 2px;">Travel Support</div>
        </div>
        <div class="card-item" style="padding: 20px;">
            <div style="font-size: 40px; color:white; font-weight: bold; text-shadow: -4px 4px 6px rgb(96, 92, 92);">3</div>
            <div style="color: #aaa; text-transform: uppercase; font-size: 12px; letter-spacing: 2px;">Payment Methods</div>
        </div>
    </div>
</section>

<!-- =رؤية 2030 -->
<section class="vision-section" id="goals">
  <div class="section-wrap">
      <h2 class="section-title">Saudi Arabia <em>Vision 2030</em> Goals</h2>

    <div class="vision-grid">
      <div class="vision-card">
        <img src="https://economymiddleeast.com/cdn-cgi/imagedelivery/Xfg_b7GtigYi5mxeAzkt9w/economymiddleeast.com/2023/10/Saudi-tourist-arrivals_5111675_7300687_4993073_2810282_7537209_3806718_5717848.jpg/w=1200,h=800" alt="Tourism Growth">
        <div class="vision-card-overlay">
          <h3 class="vision-card-title">Tourism Growth</h3>
          <p class="vision-card-desc">Supporting Saudi Arabia's vision to increase tourism attractions and enhance visitor experiences across the Kingdom.</p>
        </div>
      </div>

      <div class="vision-card">
        <img src="https://www.visitsaudi.com/content/dam/wvs/stories/AlUla-Jabal-Ikmah-Rock-resized.jpg" alt="Culture & Heritage">
        <div class="vision-card-overlay">
          <h3 class="vision-card-title">Culture & Heritage</h3>
          <p class="vision-card-desc">Preserving Saudi identity through showcasing heritage, arts, and cultural landmarks for the world to discover.</p>
        </div>
      </div>

      <div class="vision-card">
        <img src="https://jcsa.sa/globalassets/jcsa/images/sc-saturday/rs15027_2-25-23_panthalassa_saudi-cup_race-8-mathea-kelley-racing_web.jpg" alt="Quality of Life">
        <div class="vision-card-overlay">
          <h3 class="vision-card-title">Quality of Life</h3>
          <p class="vision-card-desc">Enhancing the well-being of residents and visitors through improved services and world-class facilities.</p>
        </div>
      </div>

      <div class="vision-card">
        <img src="https://spcdn.shortpixel.ai/spio/ret_img,q_cdnize,to_webp,s_webp/soulofsaudi.com/wp-content/uploads/2025/05/AD_4nXdSQbxUjE_IJPUcu7irp9g555nng-kXl9aqxmE8ZAdyWVFIUGuuOnAG_DI9sMcyINKMIPlpplYG5vT79D1Mn5RlYl67hJxgb7bXwrHDvlsQ7mTu-2qiW-PgO8BL-6j23RXbgwq31w.png" alt="Smart Destinations">
        <div class="vision-card-overlay">
          <h3 class="vision-card-title">Smart Destinations</h3>
          <p class="vision-card-desc">Innovative destinations that use modern technologies to offer interactive and efficient visitor experiences.</p>
        </div>
      </div>
    </div>
  </div>
</section>


<!-- الخريطة -->
<section class="map-section" id="map">
  <div class="section-wrap">
    <h2 class="section-title">Explore Saudi Arabia</h2>
    <p style="margin-top:-20px;font-size:15px; color:rgba(255, 255, 255, 0.91); margin-top:0px; letter-spacing:1px; text-align: center;">
      Click and drag the map to explore  our destinations across the Kingdom 
    </p>
    <br/>
    
    <div class="map-frame-wrap">
      <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
      
      <div id="mapContainer" style="width:100%; height:480px; border-radius: 6px;"></div>
    </div>
  </div>
</section>


<!-- الفيدباك -->
 <section class="feedback-section" id="feedback">
  <div class="section-wrap">
    <h2 class="section-title">Share your feedback with Thuraya</h2>
    <p style="font-size:15px; color:rgba(255, 255, 255, 0.91); margin-top:0px; letter-spacing:1px; text-align: center;">We would love to hear about your experience!</p>
    <br/>
    <form action="feedbackPHP.php" method="POST">
        <textarea name="comment_text" class="feedback-textarea" rows="8" placeholder="Share your experience here........." required></textarea>
        <button type="submit" name="submit_feedback" class="feedback-btn">Send Feedback</button>
    </form>
<br/>
    <h2 class="section-title">Users Feedback</h2>
    <br>
    <div class="about-slider">
<?php
$conn = mysqli_connect("localhost", "root", "", "thurayadb_e");
//$conn = mysqli_connect("sql305.infinityfree.com", "if0_41462376", "ShYMWEuWOm", "if0_41462376_thurayadb_e");


// جلب التعليقات من جدول users (الاسم الصحيح  )
$query = "SELECT first_name, feedback FROM users 
          WHERE feedback IS NOT NULL AND feedback != '' ";
$result = mysqli_query($conn, $query);

if ($result && mysqli_num_rows($result) > 0) {
   while ($row = mysqli_fetch_assoc($result)) {
    echo '<div class="mySlideFeedback">';
    
    echo '<p style="color:#ccc; font-size:16px; padding:0 50px; margin-bottom:10px; ">
            — ' . htmlspecialchars($row['first_name']) . '
          </p>';
    
    echo '<p style="color:white; font-size:20px; font-style:italic; padding:0 50px;">
            "' . htmlspecialchars($row['feedback']) . '"
          </p>';
    
    echo '</div>';
}

} else {
    echo '<div class="mySlideFeedback"><p style="color: white;">No feedback yet.</p></div>';
}
?>
        <a class="prev" onclick="plusSlidesFeedback(-1)">❮</a>
        <a class="next" onclick="plusSlidesFeedback(1)">❯</a>
    </div>
    </div>
</section>


<!-- ===== FOOTER ===== -->
<footer style="margin-top:120px;">
  <p>&copy; 2025-26 / IMSIU / CCIS &trade;</p>
</footer>

<!-- ===== SCRIPTS ===== -->
<script>
// Hero slider
const heroSlides = document.querySelectorAll('.hero-slide');
const heroCaptions = ['Stars — AlUla', 'Hot Air Balloons — AlUla', 'Red Sea — Jeddah'];
const heroDots = document.querySelectorAll('.slide-dot');
let heroIndex = 0;
let heroTimer;

function goToSlide(n) {
  heroSlides[heroIndex].classList.remove('active');
  heroDots[heroIndex].classList.remove('active');
  heroIndex = (n + heroSlides.length) % heroSlides.length;
  heroSlides[heroIndex].classList.add('active');
  heroDots[heroIndex].classList.add('active');
  document.getElementById('heroCaption').textContent = heroCaptions[heroIndex];
  clearInterval(heroTimer);
  heroTimer = setInterval(() => goToSlide(heroIndex + 1), 5000);
}

heroTimer = setInterval(() => goToSlide(heroIndex + 1), 5000);

// Review slider
let slideIndexFeedback = 1;
showSlidesFeedback(slideIndexFeedback);

function plusSlidesFeedback(n) {
    showSlidesFeedback(slideIndexFeedback += n);
}

function showSlidesFeedback(n) {
    let slides = document.getElementsByClassName("mySlideFeedback");
    if (slides.length === 0) return; 
    if (n > slides.length) {slideIndexFeedback = 1}
    if (n < 1) {slideIndexFeedback = slides.length}
    for (let i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
    }
    slides[slideIndexFeedback-1].style.display = "block";
}
</script>

<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>


<script>

    // 2. التأكد من أن الـ ID يطابق الموجود في الـ HTML (استخدمنا هنا mapContainer)
    var map = L.map('mapContainer').setView([24.7136, 46.6753], 5);

    // 3. إضافة شكل الخريطة (الستايل الغامق)


L.tileLayer('https://{s}.basemaps.cartocdn.com/rastertiles/voyager/{z}/{x}/{y}{r}.png', {
    attribution: '© OpenStreetMap'
}).addTo(map);


// 4. قائمة المدن وبياناتها مع إضافة مسارات الصور لكل مدينة
    const cities = [
        { name: "Jeddah", pos: [21.4858, 39.1925], url: "jeddah.php", img: "jeddah.png" },
        { name: "Abha", pos: [18.2164, 42.5053], url: "Abha.php", img: "abha.png" },
        { name: "AlBaha", pos: [20.0129, 41.4677], url: "AlBaha.php", img: "albaha.png" },
        { name: "AlUla", pos: [26.62, 37.92], url: "AlUla.php", img: "alula.png" },
        { name: "Diriyah", pos: [24.7300, 46.5400], url: "Diriyah.php", img: "diriyah.png" },
        { name: "Riyadh", pos: [24.6136, 46.7753], url: "riyadh.php", img: "riyadh.png" }
    ];

    // 5. إضافة النقاط المخصصة (Markers with Images & Names)
    cities.forEach(city => {
        // إنشاء أيقونة مخصصة (DivIcon)
        var customIcon = L.divIcon({
            className: 'custom-div-icon', // اسم الكلاس للتحكم به في الـ CSS
            html: `
                <div class="marker-pin">
                    <img src="${city.img}" alt="${city.name}" class="marker-img">
                </div>
                <div class="marker-label">${city.name}</div>
            `,
            iconSize: [60, 60], // حجم الأيقونة الكلي
            iconAnchor: [30, 60] // نقطة الارتكاز (المنتصف السفلي)
        });

        // إنشاء الـ Marker باستخدام الأيقونة المخصصة
        var marker = L.marker(city.pos, { icon: customIcon }).addTo(map);
        
        // ربط الـ Popup (اختياري، لأن الاسم أصبح ظاهراً)
        marker.bindPopup(`<b>${city.name}</b><br><a href="${city.url}" style="color:#C29696; text-decoration:none;">Visit Destination</a>`);
        
        // الانتقال لصفحة المدينة عند الضغط
        marker.on('click', function() {
            window.location.href = city.url;
        });
    });
</script>

<?php include 'chatbot.php'; ?>
</body>
</html>
