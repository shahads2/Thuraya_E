<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$con = new mysqli("localhost", "root", "", "thurayadb_e");
//$con = new mysqli("sql305.infinityfree.com", "if0_41462376", "ShYMWEuWOm", "if0_41462376_thurayadb_e");

if ($con->connect_error) die("Connection Failed");

$uid        = $_SESSION['user_id'];
$booking_id = intval($_POST['booking_id']);
$new_date   = $_POST['new_date'];

// تأكد إن الحجز يخص هذا المستخدم
$check = $con->prepare("SELECT * FROM bookings WHERE booking_id = ? AND national_id = ?");
$check->bind_param("is", $booking_id, $uid);
$check->execute();
$result = $check->get_result();

if ($result->num_rows === 0) {
    echo "<script>alert('Booking not found.'); window.location.href='Account.php';</script>";
    exit();
}

$booking  = $result->fetch_assoc();
$now      = new DateTime();
$bookDate = new DateTime($booking['booking_date']);
$hoursSince = ($now->diff($bookDate)->days * 24) + $now->diff($bookDate)->h;

// تحقق من 24 ساعة
if ($hoursSince > 24) {
    echo "<script>alert('Edit period has expired. You can only edit within 24 hours of booking.'); window.location.href='Account.php';</script>";
    exit();
}

// تحقق إن التاريخ الجديد مناسب (على الأقل 3 أيام من اليوم)
$newDateObj = new DateTime($new_date);
$minDate    = new DateTime('+3 days');
if ($newDateObj < $minDate) {
    echo "<script>alert('Trip date must be at least 3 days from today.'); window.location.href='Account.php';</script>";
    exit();
}

// تحديث التاريخ فقط
$update = $con->prepare("UPDATE bookings SET trip_date = ? WHERE booking_id = ? AND national_id = ?");
$update->bind_param("sis", $new_date, $booking_id, $uid);
$update->execute();

echo "<script>alert('Trip date updated successfully!'); window.location.href='Account.php';</script>";
?>
