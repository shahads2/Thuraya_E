<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$con = new mysqli("localhost", "root", "", "thurayadb_e");

//$con = new mysqli("sql305.infinityfree.com", "if0_41462376", "ShYMWEuWOm", "if0_41462376_thurayadb_e");

if ($con->connect_error) die("Connection Failed: " . $con->connect_error);

$uid = $_SESSION['user_id'];

$result = $con->query("SELECT * FROM users WHERE national_id = '$uid'");
if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
} else { 
    echo "User not found"; 
    exit(); 
}
//نجيب الحجوزات من الداتا بيس
$bookResult = $con->query("SELECT * FROM bookings WHERE national_id = '$uid' ORDER BY booking_date DESC");

$confirmedBookings = [];
$cancelledBookings = [];
$pastBookings = [];

$now = new DateTime();

while ($row = $bookResult->fetch_assoc()) {
    $tripDate = new DateTime($row['trip_date']);
    
    if ($row['status'] === 'cancelled') {
        $cancelledBookings[] = $row;
    } elseif ($tripDate < $now) {
        // إذا كان تاريخ الرحلة قديم تعتبر رحلة سابقة
        $pastBookings[] = $row;
    } else {
        // إذا كانت مؤكدة وتاريخها مستقبلي
        $confirmedBookings[] = $row;
    }
}

// 3. نحسب النقاط بشكل صحيح)
$confirmedCount = count($confirmedBookings) + count($pastBookings);
$points = $confirmedCount * 100;

// نجيب كل البكجات من قاعدة البيانات
$packagesQuery = $con->query("SELECT name, price, image_url as image FROM packages ORDER BY name ASC");
$packages = [];
while($p = $packagesQuery->fetch_assoc()) {
    $packages[] = $p;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Account | Thuraya</title>
    <link rel="stylesheet" href="stylesheet.css"/>
    <style>
        :root { --accent-green:#2E887F; --glass-border:rgba(255,255,255,0.15); }
        h1 { text-align:center; font-size:2.5rem; margin-top:40px; text-shadow:2px 2px 10px rgba(0,0,0,0.3); }
        .account-wrapper { display:flex; max-width:1300px; margin:40px auto; gap:40px; padding:0 20px; }

        .user-card { flex:0 0 280px; background:rgba(39,39,39,0.4); backdrop-filter:blur(10px); border:1px solid var(--glass-border); border-radius:20px; padding:20px 10px; text-align:center; height:fit-content; }
        .user-card img { width:110px; height:110px; border-radius:30px; margin-bottom:15px; }
        .user-card h2 { margin:8px 0 4px; font-size:1.4rem; }
        .booking-stats { background:#413389; color:white; padding:8px 18px; border-radius:12px; margin-top:20px; font-weight:bold; display:inline-block; }
        .btn-signout { display:inline-block; background:transparent; color:#ff4d4d; border:1px solid #ff4d4d; padding:8px 15px; border-radius:8px; text-decoration:none; font-weight:bold; margin-top:12px; }

        .settings-panel { flex:1; display:flex; flex-direction:column; gap:30px; }
        .info-section, .bookings-section { background:rgba(255,255,255,0.05); backdrop-filter:blur(15px); border:1px solid var(--glass-border); border-radius:20px; padding:30px; }
        .info-section h2, .bookings-section h2 { color:white; margin-bottom:25px; font-size:1.4rem; border-left:5px solid var(--accent-green); padding-left:15px; }
        .info-grid { display:grid; grid-template-columns:1fr 1fr; gap:20px; }
        .info-item label { display:block; font-size:0.85rem; color:#ccc; margin-bottom:6px; text-transform:uppercase; }
        .data-box { background:rgba(255,255,255,0.1); padding:9px 12px; border-radius:10px; border:1px solid rgba(255,255,255,0.1); font-size:1rem; color:#fff; }

        .bookings-grid { display:grid; grid-template-columns:repeat(auto-fill,minmax(270px,1fr)); gap:20px; }
        .booking-card { background:rgba(255,255,255,0.05); border:1px solid var(--glass-border); border-radius:15px; overflow:hidden; transition:0.3s; }
        .booking-card:hover { transform:translateY(-6px); }
        .booking-card.cancelled { opacity:0.5; filter:grayscale(70%); }
        .booking-card.cancelled:hover { transform:none; }
        .booking-card img { width:100%; height:155px; object-fit:cover; }
        .booking-content { padding:18px; }

        .confirmed-badge { background:rgba(46,136,127,0.2); color:#4eddc4; padding:3px 10px; border-radius:20px; font-size:0.72rem; font-weight:bold; display:inline-block; margin-bottom:8px; border:1px solid rgba(46,136,127,0.4); }
        .cancelled-badge  { background:rgba(255,77,77,0.15); color:#ff6b6b; padding:3px 10px; border-radius:20px; font-size:0.72rem; font-weight:bold; display:inline-block; margin-bottom:8px; border:1px solid rgba(255,77,77,0.4); }

        .trip-detail { font-size:0.82rem; color:#ccc; margin-top:5px; }
        .price-row { display:flex; justify-content:space-between; align-items:center; margin-top:12px; padding-top:10px; border-top:1px solid rgba(255,255,255,0.1); font-size:0.85rem; }
        .price-row .amount { color:#2E887F; font-weight:bold; font-size:0.95rem; }

        .card-actions { display:flex; gap:8px; margin-top:12px; }
        .btn-edit   { flex:1; padding:8px; background:rgba(46,136,127,0.15); color:#4eddc4; border:1px solid rgba(46,136,127,0.4); border-radius:8px; font-size:0.82rem; font-weight:bold; cursor:pointer; transition:0.3s; }
        .btn-edit:hover { background:rgba(46,136,127,0.3); }
        .btn-cancel { flex:1; padding:8px; background:rgba(255,77,77,0.1); color:#ff6b6b; border:1px solid rgba(255,77,77,0.35); border-radius:8px; font-size:0.82rem; font-weight:bold; cursor:pointer; transition:0.3s; }
        .btn-cancel:hover { background:rgba(255,77,77,0.2); }

        .popup-overlay { display:none; position:fixed; inset:0; background:rgba(0,0,0,0.75); z-index:1000; justify-content:center; align-items:center; }
        .popup-overlay.active { display:flex; }
        .popup-box { background:linear-gradient(135deg,#1e1456,#2d1f7a); border:1px solid var(--glass-border); border-radius:20px; padding:35px; width:90%; max-width:500px; box-shadow:0 20px 60px rgba(0,0,0,0.5); }
        .popup-box h3 { margin:0 0 25px; font-size:1.3rem; color:white; border-left:4px solid var(--accent-green); padding-left:12px; }
        .popup-box label { display:block; font-size:0.85rem; color:#ccc; margin-bottom:6px; text-transform:uppercase; }
        .popup-box select, .popup-box input[type="date"] { width:100%; padding:11px 14px; border-radius:10px; background:rgba(255,255,255,0.1); border:1px solid rgba(255,255,255,0.2); color:white; font-size:0.95rem; margin-bottom:20px; box-sizing:border-box; }
        .popup-box select option { background:#1e1456; color:white; }

        .edit-indicator { border-radius:10px; padding:12px 16px; margin-bottom:18px; font-size:0.85rem; transition:0.3s; }
        .edit-date-only { background:rgba(46,136,127,0.15); border:1px solid rgba(46,136,127,0.3); color:#4eddc4; }
        .edit-new-package { background:rgba(255,200,50,0.1); border:1px solid rgba(255,200,50,0.3); color:#ffd966; }

        .popup-price { background:rgba(46,136,127,0.15); border:1px solid rgba(46,136,127,0.3); border-radius:10px; padding:12px 16px; margin-bottom:18px; font-size:0.9rem; color:#ccc; }
        .popup-price strong { color:#4eddc4; font-size:1.1rem; }
        .refund-note { background:rgba(255,200,50,0.1); border:1px solid rgba(255,200,50,0.3); border-radius:10px; padding:10px 14px; margin-bottom:18px; font-size:0.8rem; color:#ffd966; }

        .popup-actions { display:flex; gap:10px; }
        .btn-confirm { flex:1; padding:11px; background:var(--accent-green); color:white; border:none; border-radius:10px; font-size:0.95rem; font-weight:bold; cursor:pointer; transition:0.3s; }
        .btn-confirm:hover { background:#236b64; }
        .btn-close-popup { flex:1; padding:11px; background:transparent; color:#ccc; border:1px solid rgba(255,255,255,0.2); border-radius:10px; font-size:0.95rem; cursor:pointer; transition:0.3s; }
        .btn-close-popup:hover { background:rgba(255,255,255,0.05); }

.booking-tabs { display: flex; gap: 10px; margin-bottom: 25px; border-bottom: 1px solid var(--glass-border); padding-bottom: 10px; }
.tab-btn { background: transparent; border: none; color: #aaa; padding: 10px 20px; cursor: pointer; font-weight: bold; font-size: 0.9rem; transition: 0.3s; border-radius: 8px; }
.tab-btn.active { background: var(--accent-green); color: white; }
.tab-btn:hover:not(.active) { background: rgba(255,255,255,0.05); color: white; }

.tab-content { display: none; animate: fadeIn 0.4s; }
.tab-content.active { display: block; }

@keyframes fadeIn { from { opacity: 0; transform: translateY(10px); } to { opacity: 1; transform: translateY(0); } }

/* زر التقييم */
.btn-rate { display: block; width: 100%; text-align: center; margin-top: 10px; padding:5px; background: #413389; color:white; border: none; border-radius: 8px; font-size: 0.82rem; font-weight: bold; text-decoration: none; transition: 0.3s; }
.btn-rate:hover { background: #2E887F; transform: scale(1.02); }
    </style>
</head>
<body>

<section class="first">
    <span><img src="total.png" alt="logo" width="180"></span>
    <span>
        <a href="mailto:Thuraya.officail@outlook.sa"><img src="maail.png" width="28px"></a>
        <a href="tel:0509106514"><img src="https://uxwing.com/wp-content/themes/uxwing/download/communication-chat-call/phone-call-white-icon.png" width="20px"></a>
        <a href="https://www.instagram.com/thurayaofficail"><img src="https://uxwing.com/wp-content/themes/uxwing/download/brands-and-social-media/instagram-white-icon.png" width="20px"></a>
        <a href="https://x.com/thurayaofficail"><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/0/0a/X_logo_2023_%28white%29.svg/250px-X_logo_2023_%28white%29.svg.png" width="20px"></a>
    </span>
</section>
<hr class="hrColor">

<nav>
    <ul>
        <li><a href="Newhome.php">Home</a></li>
        <li><a href="destinations.php">Destinations</a>
            <ul style="z-index:10;">
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
        <?php if (isset($_SESSION['user_id'])): ?>
        <li><a href="Account.php"><img src="https://flaticons.net/icon.php?slug_category=application&slug_icon=user-profile" width="18px"></a>
            <ul><li><a href="logout.php">Logout</a></li></ul>
        </li>
        <?php endif; ?>
    </ul>
</nav>
<hr class="hrColor">

<h1>My Account</h1>

<div class="account-wrapper">

    <aside class="user-card">
        <img src="https://flaticons.net/icon.php?slug_category=application&slug_icon=user-profile" alt="User">
        <h2><?php echo htmlspecialchars($user['first_name']." ".$user['last_name']); ?></h2>
        <p style="color:#bbb; font-size:0.9rem;">ID: <?php echo $user['national_id']; ?></p>
<div class="booking-stats">
    <?php echo $points; ?> Points (<?php echo $confirmedCount; ?> Bookings)
</div>        <div style="margin-top:15px;">
            <a href="logout.php" class="btn-signout">Sign Out</a>
        </div>
    </aside>

    <main class="settings-panel">

        <section class="info-section">
            <h2>Personal Details</h2>
            <div class="info-grid">
                <div class="info-item"><label>First Name</label><div class="data-box"><?php echo $user['first_name']; ?></div></div>
                <div class="info-item"><label>Last Name</label><div class="data-box"><?php echo $user['last_name']; ?></div></div>
                <div class="info-item"><label>National ID</label><div class="data-box"><?php echo $user['national_id']; ?></div></div>
                <div class="info-item"><label>Birthdate</label><div class="data-box"><?php echo $user['birthdate']; ?></div></div>
                <div class="info-item"><label>Nationality</label><div class="data-box"><?php echo $user['nationality']; ?></div></div>
                <div class="info-item"><label>Mobile</label><div class="data-box"><?php echo $user['mobile']; ?></div></div>
                <div class="info-item" style="grid-column:span 2;"><label>Email</label><div class="data-box"><?php echo $user['email']; ?></div></div>
            </div>
        </section>

<section class="bookings-section">
    <h2>My Bookings</h2>

    <div class="booking-tabs">
        <button class="tab-btn active" onclick="showTab('confirmed')">Confirmed</button>
        <button class="tab-btn" onclick="showTab('past')">Past Trips</button>
        <button class="tab-btn" onclick="showTab('cancelled')">Cancelled</button>
    </div>

    <div id="confirmed" class="tab-content active">
        <div class="bookings-grid">
            <?php if (empty($confirmedBookings)): echo "<p style='color:#888; padding:20px;'>No upcoming trips.</p>"; endif; ?>
            <?php foreach ($confirmedBookings as $b): renderBookingCard($b, true, false); endforeach; ?>
        </div>
    </div>

    <div id="past" class="tab-content">
        <div class="bookings-grid">
            <?php if (empty($pastBookings)): echo "<p style='color:#888; padding:20px;'>No past trips yet.</p>"; endif; ?>
            <?php foreach ($pastBookings as $b): renderBookingCard($b, false, true); endforeach; ?>
        </div>
    </div>

    <div id="cancelled" class="tab-content">
        <div class="bookings-grid">
            <?php if (empty($cancelledBookings)): echo "<p style='color:#888; padding:20px;'>No cancelled bookings.</p>"; endif; ?>
            <?php foreach ($cancelledBookings as $b): renderBookingCard($b, false, false, true); endforeach; ?>
        </div>
    </div>
</section>

<?php
// دالة مساعدة لعرض الكارت (عشان ما نكرر الكود)
function renderBookingCard($b, $canManage, $isPast, $isCancelled = false) {
    $now = new DateTime();
    $bookDate = new DateTime($b['booking_date']);
    $tripDate = new DateTime($b['trip_date']);
    $hoursSince = ($now->diff($bookDate)->days * 24) + $now->diff($bookDate)->h;
    
    // شروط التعديل والإلغاء
    $canEdit = ($canManage && $hoursSince <= 24);
    $canCancel = $canManage;
    ?>
    <div class="booking-card <?php echo $isCancelled ? 'cancelled' : ''; ?>">
        <img src="<?php echo htmlspecialchars($b['image_url']); ?>" alt="trip">
        <div class="booking-content">
            <?php if ($isCancelled): ?>
                <span class="cancelled-badge">✕ Cancelled</span>
            <?php elseif ($isPast): ?>
                <span class="confirmed-badge" style="background:rgba(255,255,255,0.1); color:#fff; border-color:#888;">✓ Completed</span>
            <?php else: ?>
                <span class="confirmed-badge">✓ Confirmed</span>
            <?php endif; ?>

            <h4 style="margin:0 0 6px; font-size:0.95rem;"><?php echo htmlspecialchars($b['trip_name']); ?></h4>
            <div class="trip-detail">📅 Trip: <strong style="color:white;"><?php echo $b['trip_date']; ?></strong></div>
            <div class="price-row">
                <span class="amount"><?php echo number_format($b['price'], 2); ?> SAR</span>
            </div>

            <?php if ($canEdit || $canCancel): ?>
                <div class="card-actions">
                    <?php if ($canEdit): ?>
                        <button class="btn-edit" onclick="openEditPopup(<?php echo $b['booking_id']; ?>, '<?php echo addslashes($b['trip_name']); ?>', '<?php echo $b['trip_date']; ?>')">✎ Edit</button>
                    <?php endif; ?>
                    <button class="btn-cancel" onclick="cancelBooking(<?php echo $b['booking_id']; ?>)">✕ Cancel</button>
                </div>
            <?php endif; ?>

            <?php if ($isPast): ?>
                <a href="Newhome.php#feedback" class="btn-rate">⭐ Rate Trip</a>
            <?php endif; ?>
        </div>
    </div>
    <?php
}
?>
    </main>
</div>

<div class="popup-overlay" id="editPopup">
    <div class="popup-box">
        <h3>✎ Edit Booking</h3>

        <label>Package</label>
<select id="packageSelect" onchange="checkEditType()">
    <?php foreach ($packages as $p): ?>
    <option value="<?php echo htmlspecialchars($p['name']); ?>" 
            data-price="<?php echo $p['price']; ?>" 
            data-name="<?php echo htmlspecialchars($p['name']); ?>" 
            data-image="<?php echo $p['image']; ?>">
        <?php echo htmlspecialchars($p['name']); ?> — (<?php echo number_format($p['price']); ?> SAR)
    </option>
    <?php endforeach; ?>
</select>

        <label>Trip Date</label>
        <input type="date" id="newDate" onchange="checkEditType()">

        <div class="edit-indicator edit-date-only" id="editIndicator">
             Date change only — <strong>no additional payment required</strong>
        </div>

        <!-- السعر الجديد يظهر فقط لو غيّر الباقة -->
        <div class="popup-price" id="priceBox" style="display:none;">
            New Total: <strong id="newPrice">— SAR</strong>
        </div>

        <div class="refund-note" id="refundNote" style="display:none;">
             Your previous booking amount will be refunded within 3–5 business days.
        </div>

        <div class="popup-actions">
            <button class="btn-confirm" id="confirmBtn" onclick="confirmEdit()">✔ Update Date</button>
            <button class="btn-close-popup" onclick="closePopup()">Cancel</button>
        </div>
    </div>
</div>

<!-- فورم مخفي → تغيير باقة (يروح cart.php) -->
<form id="editForm" action="add_to_cart.php" method="POST" style="display:none;">
    <input type="hidden" name="name"           id="form_name">
    <input type="hidden" name="price"          id="form_price">
    <input type="hidden" name="image"          id="form_image">
    <input type="hidden" name="date"           id="form_date">
    <input type="hidden" name="old_booking_id" id="form_old_id">
</form>

<!--  تغيير تاريخ فقط (بدون دفع) -->
<form id="dateOnlyForm" action="update_booking_date.php" method="POST" style="display:none;">
    <input type="hidden" name="booking_id" id="dateform_booking_id">
    <input type="hidden" name="new_date"   id="dateform_new_date">
</form>

<!-- إلغاء -->
<form id="cancelForm" action="cancel_booking.php" method="POST" style="display:none;">
    <input type="hidden" name="booking_id" id="cancel_booking_id">
</form>

<footer>
    <p>&copy; 2025-26 / IMSIU / CCIS &trade;</p>
</footer>

<?php include 'chatbot.php'; ?>

<script>
let currentOldBookingId  = null;
let originalPackageName  = null;

const minDate = new Date();
minDate.setDate(minDate.getDate() + 3);
const minDateStr = minDate.toISOString().split('T')[0];
document.getElementById('newDate').min   = minDateStr;
document.getElementById('newDate').value = minDateStr;

function openEditPopup(bookingId, tripName, tripDate) {
    currentOldBookingId = bookingId;
    originalPackageName = tripName;

    // نحاول نختار الباقة الحالية
    const select = document.getElementById('packageSelect');
    let found = false;
    for (let i = 0; i < select.options.length; i++) {
        if (select.options[i].dataset.name === tripName) {
            select.selectedIndex = i;
            found = true;
            break;
        }
    }
    if (!found) select.selectedIndex = 0;

    // نحط التاريخ الحالي )
    const currentTrip = new Date(tripDate);
    document.getElementById('newDate').value = (currentTrip >= minDate)
        ? tripDate : minDateStr;

    checkEditType();
    document.getElementById('editPopup').classList.add('active');
}

function checkEditType() {
    const select = document.getElementById('packageSelect');
    // نجيب بيانات البكج المختار من القائمة
    const selectedOption = select.options[select.selectedIndex];
    const selectedName = selectedOption.dataset.name.trim();
    const selectedPrice = parseFloat(selectedOption.dataset.price);

    const isSamePackage = (selectedName === originalPackageName.trim());

    const indicator = document.getElementById('editIndicator');
    const priceBox = document.getElementById('priceBox');
    const refundNote = document.getElementById('refundNote');
    const confirmBtn = document.getElementById('confirmBtn');

    if (isSamePackage) {
        // حالة: تعديل التاريخ فقط لنفس البكج
        indicator.className = 'edit-indicator edit-date-only';
        indicator.innerHTML = '📅 Same Package — <strong>Update date only (Free)</strong>';
        priceBox.style.display = 'none';
        refundNote.style.display = 'none';
        confirmBtn.textContent = 'Update Date';
    } else {
        // حالة: تغيير البكج بالكامل
        indicator.className = 'edit-indicator edit-new-package';
        indicator.innerHTML = '🔄 New Package — <strong>Replacement & Payment Required</strong>';
        document.getElementById('newPrice').textContent = selectedPrice.toLocaleString() + ' SAR';
        priceBox.style.display = 'block';
        refundNote.style.display = 'block'; 
        confirmBtn.textContent = 'Confirm & Go to Cart';
    }
}

function confirmEdit() {
    const select       = document.getElementById('packageSelect');
    const selectedName = select.options[select.selectedIndex].dataset.name;
    const newDate      = document.getElementById('newDate').value;

    if (!newDate) { alert('Please select a date.'); return; }

    const isDateOnly = (selectedName.trim() === originalPackageName.trim());

    if (isDateOnly) {
        // الحالة الأولى: تحديث التاريخ فقط (بدون دفع)
        // سيتم إرسال البيانات إلى ملف update_booking_date.php اللي أرسلتيه
        document.getElementById('dateform_booking_id').value = currentOldBookingId;
        document.getElementById('dateform_new_date').value   = newDate;
        
        closePopup();
        document.getElementById('dateOnlyForm').submit(); // هذا يذهب لملف الأبديت
    } else {
        // الحالة الثانية: باقة جديدة (تحتاج دفع)
        const selected = select.options[select.selectedIndex];
        document.getElementById('form_name').value   = selected.dataset.name;
        document.getElementById('form_price').value  = selected.dataset.price;
        document.getElementById('form_image').value  = selected.dataset.image;
        document.getElementById('form_date').value   = newDate;
        document.getElementById('form_old_id').value = currentOldBookingId;
        
        closePopup();
        document.getElementById('editForm').submit(); // هذا يذهب للسلة والدفع
    }
}

function cancelBooking(bookingId) {
    if (confirm('Are you sure you want to cancel this booking?\nThis action cannot be undone.')) {
        document.getElementById('cancel_booking_id').value = bookingId;
        document.getElementById('cancelForm').submit();
    }
}

function closePopup() {
    document.getElementById('editPopup').classList.remove('active');
    currentOldBookingId = null;
    originalPackageName = null;
}

document.getElementById('editPopup').addEventListener('click', function(e) {
    if (e.target === this) closePopup();
});

function showTab(tabId) {
    document.querySelectorAll('.tab-content').forEach(content => {
        content.classList.remove('active');
    });
    document.querySelectorAll('.tab-btn').forEach(btn => {
        btn.classList.remove('active');
    });
    
    document.getElementById(tabId).classList.add('active');
    event.currentTarget.classList.add('active');
}
</script>
</body>
</html>