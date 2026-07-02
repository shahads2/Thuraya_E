<?php
session_start();
header('Content-Type: application/json');

$conn = new mysqli("localhost", "root", "", "thurayadb_e");

//$con = new mysqli("sql305.infinityfree.com", "if0_41462376", "ShYMWEuWOm", "if0_41462376_thurayadb_e");

if ($conn->connect_error) {
    echo json_encode(['success' => false, 'message' => 'DB Connection Failed']);
    exit;
}

$data   = json_decode(file_get_contents('php://input'), true);
$method = $data['method'];
$items  = $data['items'];

if (empty($items)) {
    echo json_encode(['success' => false, 'message' => 'Cart is empty']);
    exit;
}

$national_id = $_SESSION['user_id'];
if (empty($national_id)) {
    echo json_encode(['success' => false, 'message' => 'User not logged in']);
    exit;
}

$conn->begin_transaction();

try {
    // تسجيل الحجوزات الجديدة
    $stmt = $conn->prepare("INSERT INTO bookings (national_id, trip_name, trip_date, price, image_url) VALUES (?, ?, ?, ?, ?)");
    foreach ($items as $item) {
        $totalPrice = floatval($item['price']) * intval($item['qty']);
        $tripDate   = trim(str_replace('📅', '', $item['date']));
        if (empty($tripDate) || $tripDate === 'No date selected') $tripDate = null;
        $stmt->bind_param("sssds", $national_id, $item['name'], $tripDate, $totalPrice, $item['image']);
        $stmt->execute();
    }

    // لو كان edit — نلغي الحجز القديم
    if (!empty($_SESSION['old_booking_id'])) {
        $oldId = intval($_SESSION['old_booking_id']);
        $cancel = $conn->prepare("UPDATE bookings SET status = 'cancelled' WHERE booking_id = ? AND national_id = ?");
        $cancel->bind_param("is", $oldId, $national_id);
        $cancel->execute();
        unset($_SESSION['old_booking_id']);
    }

    $conn->commit();
    unset($_SESSION['cart']);

    echo json_encode(['success' => true, 'message' => 'Payment successful! Your booking is confirmed.']);

} catch (Exception $e) {
    $conn->rollback();
    echo json_encode(['success' => false, 'message' => $e->getMessage()]);
}
?>