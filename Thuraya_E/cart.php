<?php 
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thuraya | Shopping Cart</title>
    <link rel="stylesheet" href="stylesheet.css">
    <style>
        body { background-color: #1a0f2e; color: white;}
        
        .cart-container { padding: 40px 8%; min-height: 80vh; }
        .cart-layout { display: flex; gap: 40px; align-items: flex-start; flex-wrap: wrap; }
        
        .cart-items { flex: 2; min-width: 350px; }
        .item-card {
            display: flex; align-items: center; background: rgba(255, 255, 255, 0.05);
            padding: 20px; border-radius: 15px; margin-bottom: 20px;
            border: 1px solid rgba(255, 255, 255, 0.1); transition: 0.3s;
        }
        .item-card:hover { border-color: #6a1b9a; }
        .item-card img { width: 120px; height: 90px; border-radius: 10px; object-fit: cover; margin-right: 20px; }
        
        .item-details h3 { margin: 0; font-size: 1.2rem; }
        .item-price { font-weight: bold; color: #2E887F; display: block; margin: 5px 0; }
        
        /* التحكم بالكمية */
        .quantity-controls { display: flex; align-items: center; gap: 12px; margin-top: 10px; }
        .quantity-controls button {
            background: #6a1b9a; color: white; border: none;
            width: 28px; height: 28px; border-radius: 50%; cursor: pointer; font-weight: bold;
        }
        .qty-num { font-weight: bold; min-width: 20px; text-align: center; }
        .remove-btn { margin-left: auto; background: none; border: none; color: #ff4d4d; font-size: 1.8rem; cursor: pointer; }

        /* قسم الدفع والملخص */
        .checkout-section {
            flex: 1; min-width: 300px; background: rgba(255, 255, 255, 0.08);
            padding: 30px; border-radius: 20px; border: 1px solid #6a1b9a; position: sticky; top: 20px;
        }
        .summary-line { display: flex; justify-content: space-between; margin-bottom: 15px; }
        .total { font-size: 1.5rem; font-weight: bold; color: #2E887F; border-top: 1px solid #444; padding-top: 15px; }

        /* كود الخصم */
        .promo-section { margin: 20px 0; display: flex; gap: 10px; }
        .promo-section input { flex: 1; padding: 10px; border-radius: 8px; border: 1px solid #444; background: #00000030; color: white; }
        .promo-btn { background: #2E887F; color: white; border: none; padding: 10px 15px; border-radius: 8px; cursor: pointer; }

        /* ===== طرق الدفع ===== */
        .payment-methods { margin: 20px 0 15px; }
        .payment-methods h4 { margin-bottom: 12px; font-size: 0.95rem; color: #ccc; }

        .method-tabs {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
        }

        .method-tab {
            flex: 1;
            min-width: 80px;
            padding: 10px 8px;
            border-radius: 12px;
            border: 2px solid rgba(255,255,255,0.1);
            background: rgba(255,255,255,0.04);
            cursor: pointer;
            text-align: center;
            transition: all 0.25s;
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 6px;
            font-size: 0.75rem;
            color: #bbb;
        }

        .method-tab:hover { border-color: #6a1b9a; color: white; }
        .method-tab.active { border-color: #2E887F; background: rgba(46,136,127,0.15); color: white; }

        .method-tab svg, .method-tab img {
            width: 32px;
            height: 22px;
            object-fit: contain;
        }

        /* فورم البطاقة */
        .payment-panel { display: none; margin-top: 15px; }
        .payment-panel.active { display: block; }

        .payment-form input {
            width: 100%; padding: 12px; margin-bottom: 12px;
            background: rgba(0,0,0,0.3); border: 1px solid #444;
            border-radius: 8px; color: white; box-sizing: border-box;
        }
        .payment-form input:focus { outline: none; border-color: #6a1b9a; }

        .form-row { display: flex; gap: 10px; }

        .apple-pay-panel {
            background: #000;
            border-radius: 12px;
            padding: 25px;
            text-align: center;
        }
        .apple-pay-btn {
            width: 100%;
            background: #fff;
            color: #000;
            border: none;
            border-radius: 10px;
            padding: 14px;
            font-size: 1.1rem;
            font-weight: bold;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            transition: 0.2s;
        }
        .apple-pay-btn:hover { background: #e0e0e0; }
        .apple-pay-btn svg { width: 20px; height: 20px; }
        .apple-pay-note { font-size: 0.75rem; color: #888; margin-top: 10px; }

        /* PayPal  */
        .paypal-panel {
            background: #003087;
            border-radius: 12px;
            padding: 25px;
            text-align: center;
        }
        .paypal-btn {
            width: 100%;
            background: #ffc439;
            color: #003087;
            border: none;
            border-radius: 10px;
            padding: 14px;
            font-size: 1.1rem;
            font-weight: bold;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            transition: 0.2s;
        }
        .paypal-btn:hover { background: #e0aa2e; }
        .paypal-logo { font-size: 1.3rem; font-weight: 900; letter-spacing: -1px; }
        .paypal-logo span:first-child { color: #003087; }
        .paypal-logo span:last-child { color: #009cde; }
        .paypal-note { font-size: 0.75rem; color: #aac4e8; margin-top: 10px; }

        /* زر الدفع العام */
        .pay-btn {
            width: 100%; padding: 15px; background: #6a1b9a;
            color: white; border: none; border-radius: 10px;
            font-weight: bold; font-size: 1.1rem; cursor: pointer;
            transition: 0.3s; margin-top: 10px;
        }
        .pay-btn:hover { background: #2E887F; }

        .security-badges {
            display: flex;
            justify-content: center;
            gap: 15px;
            margin-top: 20px;
            padding-top: 15px;
            border-top: 1px solid rgba(255,255,255,0.08);
        }
        .badge {
            font-size: 0.7rem;
            color: #888;
            display: flex;
            align-items: center;
            gap: 4px;
        }
        .badge svg { width: 14px; height: 14px; }
    </style>
</head>

<body>

    <section class="first">
        <span>
            <img src="total.png" alt="imamu+ccis+thuraya" width="200" height="200">
        </span>
        <span>
            <a href="mailto:Thuraya.officail@outlook.sa">
                <img src="maail.png" width="28px" alt="mail"></a>
            <a href="tel:0509106514">
                <img src="https://uxwing.com/wp-content/themes/uxwing/download/communication-chat-call/phone-call-white-icon.png" width="20px" alt="Telephon"></a>
            <a href="https://www.instagram.com/thurayaofficail?igsh=NTlya3hwczM2eW5i">
                <img src="https://uxwing.com/wp-content/themes/uxwing/download/brands-and-social-media/instagram-white-icon.png" width="20px" alt="instagram"></a>
            <a href="https://x.com/thurayaofficail?s=21&t=6akakfk_BBEri2D4XW96Pg">
                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/0/0a/X_logo_2023_%28white%29.svg/250px-X_logo_2023_%28white%29.svg.png" width="20px" alt="X"></a>
        </span>
    </section>

    <hr class="hrColor">

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

    <main class="cart-container">
        <div class="cart-layout">
            <div class="cart-items" id="cart-list">
                <h2>Your Cart</h2>

                <?php
                if(isset($_SESSION['cart']) && count($_SESSION['cart']) > 0){
                    foreach($_SESSION['cart'] as $index => $item){
                ?>
                <div class="item-card" id="item<?php echo $index; ?>" data-price="<?php echo $item['price']; ?>">
                    <img src="<?php echo $item['image']; ?>">
                    <div class="item-details">
                        <h3><?php echo $item['name']; ?></h3>
                        <span class="item-price"><?php echo $item['price']; ?> SAR</span>
                       <span style="font-size:0.82rem; color:#aaa; display:block; margin-bottom:4px;">
                   <?php echo isset($item['date']) ? $item['date'] : 'No date selected'; ?>
                         </span>
                        <div class="quantity-controls">
                            <button onclick="changeQty('item<?php echo $index; ?>', -1)">-</button>
                            <span class="qty-num"><?php echo $item['qty']; ?></span>
                            <button onclick="changeQty('item<?php echo $index; ?>', 1)">+</button>
                        </div>
                    </div>
                    <button class="remove-btn" onclick="deleteItem(<?php echo $index; ?>,'item<?php echo $index; ?>')">×</button>
                </div>
                <?php
                    }
                } else {
                    echo "<p>Your cart is empty</p>";
                }
                ?>
            </div>

            <div class="checkout-section">
                <h3>Order Summary</h3>
                <div class="summary-line"><span>Subtotal</span><span id="subtotal">0 SAR</span></div>
                <div class="summary-line"><span>Discount</span><span id="discount-val">0 SAR</span></div>
                <div class="summary-line"><span>Tax (15%)</span><span id="tax">0 SAR</span></div>
                <div class="summary-line total"><span>Total</span><span id="grand-total">0 SAR</span></div>

                <div class="promo-section">
                    <input type="text" id="promo-input" placeholder="promo Code: Ask Chatbot">
                    <button class="promo-btn" onclick="applyPromo()">Apply</button>
                </div>

                <!--  طرق الدفع  -->
                <div class="payment-methods">
                    <h4>Select Payment Method</h4>
                    <div class="method-tabs">

                        <!-- بطاقة ائتمان -->
                        <div class="method-tab active" onclick="selectMethod('card', this)">
                            <svg viewBox="0 0 32 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <rect width="32" height="22" rx="3" fill="#2a2a5a"/>
                                <rect y="5" width="32" height="5" fill="#6a1b9a"/>
                                <rect x="3" y="14" width="8" height="3" rx="1" fill="#2E887F"/>
                                <rect x="21" y="14" width="8" height="3" rx="1" fill="#aaa"/>
                            </svg>
                            Credit Card
                        </div>

                        <!-- Apple Pay -->
                        <div class="method-tab" onclick="selectMethod('apple', this)">
                            <svg viewBox="0 0 32 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <rect width="32" height="22" rx="3" fill="#000"/>
                                <text x="16" y="15" font-size="10" text-anchor="middle" fill="white" font-family="Arial"> Pay</text>
                                <text x="9" y="15" font-size="11" text-anchor="middle" fill="white" font-family="Arial"></text>
                            </svg>
                            Apple Pay
                        </div>

                        <!-- PayPal -->
                        <div class="method-tab" onclick="selectMethod('paypal', this)">
                            <svg viewBox="0 0 32 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <rect width="32" height="22" rx="3" fill="#003087"/>
                                <text x="16" y="15" font-size="9" text-anchor="middle" fill="#ffc439" font-family="Arial Bold" font-weight="900">PayPal</text>
                            </svg>
                            PayPal
                        </div>

                    </div>
                </div>

                <!--  البطاقة الائتمانية -->
                <div class="payment-panel active" id="panel-card">
                    <form class="payment-form">
                        <h4>Card Details</h4>
                        <input type="text" placeholder="Cardholder Name" required>
                        <input type="text" placeholder="Card Number (16 digits)" maxlength="19" oninput="formatCard(this)" required>
                        <div class="form-row">
                            <input type="text" placeholder="MM/YY" maxlength="5" oninput="formatExpiry(this)" required>
                            <input type="password" placeholder="CVV" maxlength="3" required>
                        </div>

                        <div style="display:flex; gap:8px; margin-bottom:12px; align-items:center;">
                            <span style="font-size:0.75rem; color:#888;">Accepted:</span>
                            <span style="background:#1a1f71; color:white; font-size:0.7rem; padding:3px 8px; border-radius:4px; font-weight:bold;">VISA</span>
                            <span style="background:#eb001b; color:white; font-size:0.7rem; padding:3px 8px; border-radius:4px; font-weight:bold;">MC</span>
                            <span style="background:#2E887F; color:white; font-size:0.7rem; padding:3px 8px; border-radius:4px; font-weight:bold;">MADA</span>
                        </div>
                        <button type="button" class="pay-btn" onclick="processPayment('card')">
                             Pay Now
                        </button>
                    </form>
                </div>

                <!-- لوحة Apple Pay -->
                <div class="payment-panel" id="panel-apple">
                    <div class="apple-pay-panel">
                        <p style="color:#aaa; font-size:0.85rem; margin-bottom:15px;">Complete your purchase securely with Apple Pay</p>
                        <button class="apple-pay-btn" onclick="processPayment('apple')">
                            <svg viewBox="0 0 24 24" fill="white"><path d="M18.71 19.5c-.83 1.24-1.71 2.45-3.05 2.47-1.34.03-1.77-.79-3.29-.79-1.53 0-2 .77-3.27.82-1.31.05-2.3-1.32-3.14-2.53C4.25 17 2.94 12.45 4.7 9.39c.87-1.52 2.43-2.48 4.12-2.51 1.28-.02 2.5.87 3.29.87.78 0 2.26-1.07 3.8-.91.65.03 2.47.26 3.64 1.98-.09.06-2.17 1.28-2.15 3.81.03 3.02 2.65 4.03 2.68 4.04-.03.07-.42 1.44-1.38 2.83M13 3.5c.73-.83 1.94-1.46 2.94-1.5.13 1.17-.34 2.35-1.04 3.19-.69.85-1.83 1.51-2.95 1.42-.15-1.15.41-2.35 1.05-3.11z"/></svg>
                            Pay with Apple Pay
                        </button>
                        <p class="apple-pay-note"> Secured by Face ID / Touch ID</p>
                    </div>
                </div>

                <!-- لوحة PayPal -->
                <div class="payment-panel" id="panel-paypal">
                    <div class="paypal-panel">
                        <p style="color:#aac4e8; font-size:0.85rem; margin-bottom:15px;">You will be redirected to PayPal to complete your payment</p>
                        <button class="paypal-btn" onclick="processPayment('paypal')">
                            <span class="paypal-logo">
                                <span style="color:#009cde;">Pay</span><span style="color:#ffc439;">Pal</span>
                            </span>
                            &nbsp; Checkout with PayPal
                        </button>
                        <p class="paypal-note"> Protected by PayPal Buyer Protection</p>
                    </div>
                </div>

                <!-- شارات الأمان -->
                <div class="security-badges">
                    <span class="badge">
                        <svg viewBox="0 0 24 24" fill="#888"><path d="M12 1L3 5v6c0 5.55 3.84 10.74 9 12 5.16-1.26 9-6.45 9-12V5l-9-4zm0 4l6 2.67V11c0 3.88-2.57 7.49-6 8.93C8.57 18.49 6 14.88 6 11V7.67L12 5z"/></svg>
                        SSL Secured
                    </span>
                    <span class="badge">
                        <svg viewBox="0 0 24 24" fill="#888"><path d="M20 4H4c-1.11 0-2 .89-2 2v12c0 1.11.89 2 2 2h16c1.11 0 2-.89 2-2V6c0-1.11-.89-2-2-2zm0 14H4v-6h16v6zm0-10H4V6h16v2z"/></svg>
                        PCI Compliant
                    </span>
                    <span class="badge">
                        <svg viewBox="0 0 24 24" fill="#888"><path d="M18 8h-1V6c0-2.76-2.24-5-5-5S7 3.24 7 6v2H6c-1.1 0-2 .9-2 2v10c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2V10c0-1.1-.9-2-2-2zm-6 9c-1.1 0-2-.9-2-2s.9-2 2-2 2 .9 2 2-.9 2-2 2zm3.1-9H8.9V6c0-1.71 1.39-3.1 3.1-3.1 1.71 0 3.1 1.39 3.1 3.1v2z"/></svg>
                        Encrypted
                    </span>
                </div>

            </div>
        </div>
    </main>

    <footer><p>&copy; 2025-26 / IMSIU / CCIS &trade;</p></footer>

    <script>
    let discountRate = 0;

    function calculateAll() {
        let subtotal = 0;
        const items = document.querySelectorAll('.item-card');
        items.forEach(item => {
            const price = parseInt(item.getAttribute('data-price'));
            const qty = parseInt(item.querySelector('.qty-num').innerText);
            subtotal += price * qty;
        });
        const discountAmount = subtotal * discountRate;
        const tax = (subtotal - discountAmount) * 0.15;
        const total = (subtotal - discountAmount) + tax;
        document.getElementById('subtotal').innerText = subtotal.toLocaleString() + " SAR";
        document.getElementById('discount-val').innerText = "-" + discountAmount.toLocaleString() + " SAR";
        document.getElementById('tax').innerText = tax.toLocaleString(undefined, {minimumFractionDigits: 2}) + " SAR";
        document.getElementById('grand-total').innerText = total.toLocaleString(undefined, {minimumFractionDigits: 2}) + " SAR";
    }

    function changeQty(id, delta) {
        const item = document.getElementById(id);
        const qtySpan = item.querySelector('.qty-num');
        let currentQty = parseInt(qtySpan.innerText);
        if (currentQty + delta >= 1) {
            qtySpan.innerText = currentQty + delta;
            calculateAll();
        }
    }

    function deleteItem(index, id) {
        fetch("remove_from_cart.php", {
            method: "POST",
            headers: { "Content-Type": "application/x-www-form-urlencoded" },
            body: "index=" + index
        })
        .then(res => res.text())
        .then(data => {
            const item = document.getElementById(id);
            item.style.opacity = '0';
            setTimeout(() => { item.remove(); calculateAll(); }, 300);
        });
    }

    function applyPromo() {
        const code = document.getElementById('promo-input').value.toUpperCase();
        if (code === "THURAYA10") {
            discountRate = 0.10;
        }else if (code === "THURAYA40") {
            discountRate = 0.40; 
        }else {
            discountRate = 0;
            alert("Invalid code.");
        }
        calculateAll();
    }

    /* منطق طرق الدفع  */
    function selectMethod(method, el) {
        document.querySelectorAll('.method-tab').forEach(t => t.classList.remove('active'));
        document.querySelectorAll('.payment-panel').forEach(p => p.classList.remove('active'));
        // تفعيل التاب والباقة المختارة
        el.classList.add('active');
        document.getElementById('panel-' + method).classList.add('active');
    }

    function formatCard(input) {
        let value = input.value.replace(/\D/g, '').substring(0, 16);
        input.value = value.replace(/(.{4})/g, '$1 ').trim();
    }

    function formatExpiry(input) {
        let value = input.value.replace(/\D/g, '').substring(0, 4);
        if (value.length >= 3) value = value.substring(0,2) + '/' + value.substring(2);
        input.value = value;
    }

function processPayment(method) {
    <?php if (!isset($_SESSION['user_id'])): ?>
        alert("Please login first to complete your payment.");
        window.location.href = "login.php";
        return;
    <?php endif; ?>

    // --- الجزء الجديد: التحقق من بيانات البطاقة ---
    if (method === 'card') {
        // جلب القيم من المدخلات
        const cardName = document.querySelector('input[placeholder="Cardholder Name"]').value.trim();
        const cardNumber = document.querySelector('input[placeholder="Card Number (16 digits)"]').value.trim();
        const expiry = document.querySelector('input[placeholder="MM/YY"]').value.trim();
        const cvv = document.querySelector('input[placeholder="CVV"]').value.trim();

        // 1. التحقق من أن الحقول ليست فارغة
        if (cardName === "" || cardNumber === "" || expiry === "" || cvv === "") {
            alert("الدفع مرفوض: يرجى إدخال جميع معلومات البطاقة.");
            return; // توقف ولا ترسل البيانات للملف الخارجي
        }

        // 2. التحقق من أن رقم البطاقة كامل (16 رقم مع المسافات يكون طوله 19)
        if (cardNumber.length < 19) {
            alert("الدفع مرفوض: رقم البطاقة غير مكتمل.");
            return;
        }
        
        // 3. التحقق من الـ CVV (يجب أن يكون 3 أرقام)
        if (cvv.length < 3) {
            alert("الدفع مرفوض: رمز التحقق CVV غير صحيح.");
            return;
        }
    }
    // --- نهاية التحقق ---

    const items = [];
    document.querySelectorAll('.item-card').forEach(item => {
        items.push({
            name:  item.querySelector('h3').innerText,
            price: parseFloat(item.getAttribute('data-price')),
            qty:   parseInt(item.querySelector('.qty-num').innerText),
            date:  item.querySelector('span[style*="display:block"]').innerText,
            image: item.querySelector('img').src
        });
    });

    if (items.length === 0) {
        alert("Your cart is empty!");
        return;
    }

    // إرسال البيانات لملف process_payment.php فقط إذا اجتازت التحقق أعلاه
    fetch('process_payment.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ method: method, items: items })
    })
    .then(res => res.json())
    .then(data => {
        if(data.success){
            alert(data.message);
            window.location.href = "Newhome.php"; 
        } else {
            alert("Payment failed: " + data.message);
        }
    })
    .catch(err => {
        alert("Error: " + err.message);
    });
}

    window.onload = function() { calculateAll(); };
    </script>
<?php include 'chatbot.php'; ?>
</body>
</html>