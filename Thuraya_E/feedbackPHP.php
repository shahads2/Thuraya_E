<?php
session_start();
//connect to database
$con = new mysqli("localhost", "root", "", "thurayadb_e");

if ($con->connect_error) {
    die("Connection Failed: " . $con->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit_feedback'])) {
    
    // cheack if user has account
    if (isset($_SESSION['user_id'])) {
        $u_id = $_SESSION['user_id']; 
        $comment = $con->real_escape_string($_POST['comment_text']);

       
        // update from null to the new comment
        $sql = "UPDATE users SET feedback = '$comment' WHERE national_id = '$u_id'";

        if ($con->query($sql) === TRUE) {
            header("Location: Newhome.php#feedback-anchor");
            exit();
        } else {
            echo "Error updating feedback: " . $con->error;
        }
    } else {
        // إذا حاول يرسل فيدباك وهو مو مسجل دخول
        echo "<script>alert('Please login first!'); window.location.href='login.php';</script>";//نقوله يسجل ونوديه لصفحة التسجيل
    }
}

$con->close();
?>

