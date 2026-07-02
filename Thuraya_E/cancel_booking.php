<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$con = new mysqli("localhost", "root", "", "thurayadb_e");
if ($con->connect_error) {
    die("Connection Failed: " . $con->connect_error);
}

$uid        = $_SESSION['user_id'];
$booking_id = intval($_POST['booking_id']);

// جلب الحجز وتأكد إنه يخص هذا المستخدم
$stmt = $con->prepare("SELECT * FROM bookings WHERE booking_id = ? AND national_id = ?");
$stmt->bind_param("is", $booking_id, $uid);
$stmt->execute();
$result  = $stmt->get_result();

if ($result->num_rows === 0) {
    echo "<script>alert('Booking not found.'); window.location.href='Account.php';</script>";
    exit();
}

$booking  = $result->fetch_assoc();
$status   = $booking['status'];
$tripDate = new DateTime($booking['trip_date']);
$now      = new DateTime();

// إذا ملغي مسبقاً
if ($status === 'cancelled') {
    echo "<script>alert('This booking is already cancelled.'); window.location.href='Account.php';</script>";
    exit();
}

// Cancel Policy: لا يقدر يلغي إذا الرحلة بدأت أو فاتت
if ($tripDate <= $now) {
    echo "<script>alert('Cannot cancel. The trip date has already passed or started.'); window.location.href='Account.php';</script>";
    exit();
}

// تحديث الحالة إلى cancelled
$update = $con->prepare("UPDATE bookings SET status = 'cancelled' WHERE booking_id = ? AND national_id = ?");
$update->bind_param("is", $booking_id, $uid);
$update->execute();

echo "<script>alert('Your booking has been successfully cancelled.'); window.location.href='Account.php';</script>";
?>