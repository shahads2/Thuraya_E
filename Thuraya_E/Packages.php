<?php 
session_start();

$conn = mysqli_connect("localhost", "root", "", "thurayadb_e");
//$conn = mysqli_connect("sql305.infinityfree.com", "if0_41462376", "ShYMWEuWOm", "if0_41462376_thurayadb_e");

$query = "SELECT * FROM packages";
$result = mysqli_query($conn, $query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thuraya | Tourism Packages</title>
    <link rel="stylesheet" href="stylesheet.css">
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,600;1,300&family=Tajawal:wght@300;400;700&display=swap" rel="stylesheet">
    <style>
:root {
  --gold: #c9a96e;
  --gold-light: #e8d5a3;
  --glass-border: rgba(201,169,110,0.2);
  --teal: #2E887F;
}

.packages-hero {
    position: relative;
    text-align: center;
    padding: 80px 20px 50px;
}

.packages-hero h1 {
    margin-top: -29px;
    font-size: 40px;
    font-weight: 300;
    color: #fff;
    line-height: 1;
    margin-bottom: 15px;
}
.packages-hero p {
    font-size: 16px;
    color: rgba(255,255,255,0.5);
    max-width: 500px;
    margin: 0 auto;
    line-height: 1.7;
}

/* صندوق الفلتره */
.filter-box {
    max-width: 1000px;
    margin: 0 auto 30px;
    padding: 0 10px;
}
.filter-card {
    background: rgba(255,255,255,0.04);
    border: 1px solid var(--glass-border);
    border-radius: 16px;
    padding: 26px 30px;
    backdrop-filter: blur(10px);
}
.filter-title {
    font-size: 11px;
    letter-spacing: 4px;
    text-transform: uppercase;
    color: white;
    margin-bottom: 28px;
    text-align: center;
}
.filter-row {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 20px;
    margin-bottom: 20px;
}
.filter-group { display: flex; flex-direction: column; gap: 8px; }
.filter-group label {
    font-size: 11px;
    letter-spacing: 3px;
    text-transform: uppercase;
    color: rgba(255,255,255,0.4);
}
.filter-select, .filter-search {
    width: 100%;
    padding: 14px 18px;
    background: rgba(255,255,255,0.06);
    border: 1px solid rgba(255,255,255,0.12);
    border-radius: 10px;
    color: #fff;
    font-size: 15px;
    outline: none;
    transition: border-color 0.3s;
    box-sizing: border-box;
}
.filter-select {
    appearance: none;
    background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='8' viewBox='0 0 12 8'%3E%3Cpath fill='%23c9a96e' d='M1 1l5 5 5-5'/%3E%3C/svg%3E");
    background-repeat: no-repeat;
    background-position: right 16px center;
    padding-right: 40px;
    cursor: pointer;
}
.filter-select option { background-color: #1a0f45; color: white; }
.filter-search::placeholder { color: rgba(255,255,255,0.25); }

.filter-actions {
    display: flex;
    gap: 12px;
    align-items: center;
}
.filter-search-wrap { flex: 1; }

.btn-filter {
    padding: 14px 22px;
    background:  #6a1b9a;
    color: white;
    font-size: 13px;
    font-weight: bold;
    border: none;
    border-radius: 10px;
    cursor: pointer;
    transition: all 0.3s;
    white-space: nowrap;
    flex-shrink: 0;
}
.btn-filter:hover {
    background: #2E887F;
    transform: scale(1.03);
}
.btn-reset {
    padding: 14px 20px;
    background: transparent;
    color: rgba(255,255,255,0.4);
    font-size: 13px;
    border: 1px solid rgba(255,255,255,0.12);
    border-radius: 10px;
    cursor: pointer;
    transition: all 0.3s;
    white-space: nowrap;
    flex-shrink: 0;
}
.btn-reset:hover { color: #fff; border-color: rgba(255,255,255,0.3); }

.active-filters {
    display: flex;
    gap: 10px;
    flex-wrap: wrap;
    margin-top: 18px;
    min-height: 28px;
}
.filter-tag {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    padding: 5px 14px;
    background: rgba(201,169,110,0.1);
    border: 1px solid rgba(201,169,110,0.3);
    border-radius: 50px;
    font-size: 12px;
    color: #c9a96e;
}

/* الريسولت الصغيره الي تحت */
.results-bar {
    max-width: 1200px;
    margin: 0 auto 24px;
    padding: 0 40px;
}
.results-count {
    font-size: 13px;
    color: rgba(255,255,255,0.35);
    letter-spacing: 1px;
}
.results-count span { color: var(--gold); font-weight: 700; }

/* اذا مافي نتايج */
.no-results {
    display: none;
    text-align: center;
    padding: 80px 20px;
    color: rgba(255,255,255,0.3);
    font-size: 32px;
    font-style: italic;
}

/* الترتيب حق الكاردز للبكجات */
.packages-container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 40px 80px;
}
.packages-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(360px, 1fr));
    gap: 28px;
}

/* الكارد الوحده */
.package-card {
    display: flex;
    flex-direction: column;
    background: rgba(255, 255, 255, 0.05);
    border-radius: 18px;
    overflow: hidden;
    border: 1px solid rgba(255, 255, 255, 0.1);
    transition: all 0.4s ease;
    backdrop-filter: blur(5px);
}
.package-card:hover {
    border-color: rgba(201,169,110,0.3);
    box-shadow: 0 20px 40px rgba(0,0,0,0.4);
}
.card-img-wrap { position: relative; overflow: hidden; }
.package-card img {
    width: 100%;
    height: 220px;
    object-fit: cover;
    display: block;
    transition: transform 0.6s ease;
}

.package-badge {
    position: absolute;
    top: 12px;
    left: 12px;
    padding: 5px 14px;
    border-radius: 50px;
    font-size: 10px;
    font-weight: 700;
    letter-spacing: 2px;
    text-transform: uppercase;
    z-index: 2;
}
.badge-historical { background: rgba(139,90,43,0.85); color: #f5d9a8; border: 1px solid rgba(201,169,110,0.4); }
.badge-sea        { background: rgba(14,90,110,0.85);  color: #a8e8f5; border: 1px solid rgba(100,200,220,0.4); }
.badge-mountain   { background: rgba(30,90,50,0.85);   color: #a8f5c0; border: 1px solid rgba(100,220,140,0.4); }
.badge-adventure  { background: rgba(110,30,30,0.85);  color: #f5a8a8; border: 1px solid rgba(220,100,100,0.4); }
.badge-luxury     { background: rgba(80,20,110,0.85);  color: #d8a8f5; border: 1px solid rgba(180,100,220,0.4); }
.badge-city       { background: rgba(20,60,110,0.85);  color: #a8c8f5; border: 1px solid rgba(100,160,220,0.4); }

.package-content { padding: 24px; flex: 1; display: flex; flex-direction: column; }
.package-content h3 {
    color: #fff;
    font-size: 22px;
    margin-bottom: 10px;
}
.package-info {
    font-size: 12px;
    margin-bottom: 12px;
    color: #C29696;
}
.package-desc {
    font-size: 14px;
    color: rgba(255,255,255,0.55);
    margin-bottom: 20px;
    flex: 1;
}
.date-selection { margin-bottom: 20px; }
.date-selection label {
    font-size: 11px;
    letter-spacing: 2px;
    text-transform: uppercase;
    color: rgba(255,255,255,0.35);
    display: block;
    margin-bottom: 8px;
}
.date-picker {
    width: 100%;
    padding: 10px 14px;
    background: rgba(255,255,255,0.06);
    border: 1px solid rgba(255,255,255,0.12);
    border-radius: 8px;
    color: white;
    font-size: 14px;
    cursor: pointer;
    color-scheme: dark;
    box-sizing: border-box;
    transition: border-color 0.3s;
}

.package-footer {
    display: flex;
    justify-content: space-between;
    align-items: center;
    border-top: 1px solid rgba(255,255,255,0.08);
    padding-top: 18px;
    margin-top: auto;
}
.price {
    font-size: 1.4rem;
    font-weight: bold;
    color: white;
}
.price-sub {
    font-size: 11px;
    color: rgba(255, 255, 255, 0.43);
    display: block;
    margin-top: -4px;
}
.add-to-cart {
    border-radius: 8px;
    font-size: 13px;
    letter-spacing: 1px;
    transition: all 0.3s;
    background: #6a1b9a;
    color: white;
    border: none;
    padding: 10px 20px;
    cursor: pointer;
    font-weight: bold;
    transition: 0.3s;
}
.add-to-cart:hover {
    background: #2E887F;
    transform: scale(1.05);
}

@keyframes cardShow {
    from { opacity: 0; transform: translateY(16px); }
    to   { opacity: 1; transform: translateY(0); }
}

@media (max-width: 768px) {
    .filter-row { grid-template-columns: 1fr; }
    .filter-actions { flex-direction: column; }
    .packages-container { padding: 0 16px 60px; }
    .filter-card { padding: 24px 20px; }
}
    </style>
</head>
<body>

<!-- البادية-->
<section class="first">
    <span><img src="total.png" alt="imamu+ccis+thuraya" width="200" height="200"></span>
    <span>
        <a href="mailto:Thuraya.officail@outlook.sa"><img src="maail.png" width="28px" alt="mail"></a>
        <a href="tel:0509106514"><img src="https://uxwing.com/wp-content/themes/uxwing/download/communication-chat-call/phone-call-white-icon.png" width="20px" alt="Phone"></a>
        <a href="https://www.instagram.com/thurayaofficail?igsh=NTlya3hwczM2eW5i"><img src="https://uxwing.com/wp-content/themes/uxwing/download/brands-and-social-media/instagram-white-icon.png" width="20px" alt="Instagram"></a>
        <a href="https://x.com/thurayaofficail?s=21&t=6akakfk_BBEri2D4XW96Pg"><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/0/0a/X_logo_2023_%28white%29.svg/250px-X_logo_2023_%28white%29.svg.png" width="20px" alt="X"></a>
    </span>
</section>
<hr class="hrColor">

<!-- النافيقشن -->
<section>
    <nav>
        <ul>
            <li><a href="Newhome.php">Home</a></li>
            <li><a href="destinations.php">Destinations</a>
                <ul style="z-index:1;">
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
                    <ul style="z-index:1;"><li><a href="logout.php">Logout</a></li></ul>
                </li>
            <?php endif; ?>
        </ul>
    </nav>
    <hr class="hrColor">
</section>

<!--  -->
<div class="packages-hero">
    <h1>Explore Saudi Packages</h1>
    <p>Discover the magic of the Kingdom with our exclusive curated trips</p>
</div>

<!-- صندوق الفلتر -->
<div class="filter-box" style="padding-top:0px ; margin-top: -29px;">
    <div class="filter-card" style="padding-top:-20px ;">
        <div class="filter-row">
            <div class="filter-group">
                <label>City / Destination</label>
                <select id="cityFilter" class="filter-select">
                    <option value="all">All Cities</option>
                    <option value="riyadh">Riyadh</option>
                    <option value="jeddah">Jeddah</option>
                    <option value="abha">Abha</option>
                    <option value="albaha">Al Baha</option>
                    <option value="alula">AlUla</option>
                    <option value="diriyah">Diriyah</option>
                </select>
            </div>
            <div class="filter-group">
                <label>Category</label>
                <select id="categoryFilter" class="filter-select">
                    <option value="all">All Categories</option>
                    <option value="historical">Historical</option>
                    <option value="sea">Sea</option>
                    <option value="mountain">Mountains</option>
                    <option value="adventure">Adventure</option>
                    <option value="luxury">Luxury</option>
                </select>
            </div>
        </div>
        <div class="filter-actions">
            <div class="filter-search-wrap">
                <input type="text" id="searchInput" class="filter-search" placeholder=" Search packages by name...">
            </div>
            <button class="btn-filter" onclick="applyFilters()">Search</button>
            <button class="btn-reset" onclick="resetFilters()">Clear</button>
        </div>
        <div class="active-filters" id="activeTags"></div>
    </div>
</div>

<!-- الكلام الي تحت البوكس حق الفلتر -->
<div class="results-bar">
    <span class="results-count">Showing <span id="visibleCount">30</span> of 30 packages</span>
</div>

<!-- اذا مافي نتايج   -->
<div class="no-results" id="noResults">No packages found. Try different filters</div>

<!-- تبدا البكجات هنا -->
<div class="packages-container">
<div class="packages-grid">
    <?php while($row = mysqli_fetch_assoc($result)): ?>
    <div class="package-card" 
         data-name="<?php echo $row['name']; ?>" 
         data-category="<?php echo $row['category']; ?>" 
         data-city="<?php echo $row['city']; ?>">
        
        <div class="card-img-wrap">
            <div class="package-badge <?php echo $row['badge_class']; ?>">
                <?php echo ucfirst($row['category']); ?>
            </div>
            <img src="<?php echo $row['image_url']; ?>" alt="<?php echo $row['name']; ?>">
        </div>

        <div class="package-content">
            <h3><?php echo $row['name']; ?></h3>
            <p class="package-info"><?php echo $row['info']; ?></p>
            <p class="package-desc"><?php echo $row['description']; ?></p>
            
            <div class="date-selection">
                <label>Choose Date</label>
                <input type="date" class="date-picker">
            </div>

            <div class="package-footer">
                <div>
                    <span class="price"><?php echo number_format($row['price']); ?> SAR</span>
                    <span class="price-sub">per person</span>
                </div>
                
                <form action="add_to_cart.php" method="POST">
                    <input type="hidden" name="name" value="<?php echo $row['name']; ?>">
                    <input type="hidden" name="price" value="<?php echo $row['price']; ?>">
                    <input type="hidden" name="image" value="<?php echo $row['image_url']; ?>">
                    <input type="hidden" name="date" class="date-hidden">
                    <button class="add-to-cart">Add to Cart</button>
                </form>
            </div>
        </div>
    </div>
    <?php endwhile; ?>
</div>

</div>

<footer style="margin-top: 15px;"><p>&copy; 2025-26 / IMSIU / CCIS &trade;</p></footer>

<script>
// اقل تاريخ يقدر يختاره
function setMinDates() {
    const today = new Date();
    today.setDate(today.getDate() + 3);
    const yyyy = today.getFullYear();
    const mm   = String(today.getMonth() + 1).padStart(2, '0');
    const dd   = String(today.getDate()).padStart(2, '0');
    const minDate = `${yyyy}-${mm}-${dd}`;
    document.querySelectorAll('.package-card').forEach(card => {
        const picker = card.querySelector('.date-picker');
        const hidden = card.querySelector('.date-hidden');
        picker.min = minDate;
        picker.value = minDate;
        if (hidden) hidden.value = minDate;
        picker.addEventListener('change', function() { if (hidden) hidden.value = this.value; });
    });
}
setMinDates();

// الفلتره
function applyFilters() {
    const city     = document.getElementById('cityFilter').value;
    const category = document.getElementById('categoryFilter').value;
    const search   = document.getElementById('searchInput').value.toLowerCase().trim();
    let visible = 0;

    document.querySelectorAll('.package-card').forEach(card => {
        const cityMatch   = city === 'all'     || card.dataset.city     === city;
        const catMatch    = category === 'all' || card.dataset.category === category;
        const searchMatch = !search || card.dataset.name.toLowerCase().includes(search) || card.querySelector('.package-desc').innerText.toLowerCase().includes(search);

        if (cityMatch && catMatch && searchMatch) {
            card.style.display = 'flex';
            card.style.animation = 'cardShow 0.4s ease both';
            visible++;
        } else {
            card.style.display = 'none';
        }
    });

    document.getElementById('visibleCount').textContent = visible;
    document.getElementById('noResults').style.display = visible === 0 ? 'block' : 'none';

    const tags = document.getElementById('activeTags');
    tags.innerHTML = '';
    const cityNames = {riyadh:'Riyadh', jeddah:'Jeddah', abha:'Abha', albaha:'Al Baha', alula:'AlUla', diriyah:'Diriyah'};
    const catNames  = {historical:'Historical', sea:'Sea', mountain:'Mountains', adventure:'Adventure', luxury:'Luxury'};
    if (city !== 'all')     tags.innerHTML += `<span class="filter-tag">📍 ${cityNames[city]}</span>`;
    if (category !== 'all') tags.innerHTML += `<span class="filter-tag">🏷 ${catNames[category]}</span>`;
    if (search)             tags.innerHTML += `<span class="filter-tag">🔍 "${search}"</span>`;
}

function resetFilters() {
    document.getElementById('cityFilter').value     = 'all';
    document.getElementById('categoryFilter').value = 'all';
    document.getElementById('searchInput').value    = '';
    applyFilters();
}

// يبحث ولسا المستخدم قاعد يكتب
document.getElementById('searchInput').addEventListener('input', applyFilters);
</script>

<?php include 'chatbot.php'; ?>
</body>
</html>