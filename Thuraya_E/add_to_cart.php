<?php
session_start();

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

$name  = $_POST['name'];
$price = $_POST['price'];
$image = $_POST['image'];
$date  = $_POST['date'];

$item = [
    "name"  => $name,
    "price" => $price,
    "image" => $image,
    "date"  => $date,
    "qty"   => 1
];

$_SESSION['cart'][] = $item;

// لو كان edit — نحفظ الـ old_booking_id في السشن عشان process_payment يلغيه بعد الدفع
if (!empty($_POST['old_booking_id'])) {
    $_SESSION['old_booking_id'] = intval($_POST['old_booking_id']);
}

header("Location: cart.php");
exit();
?>