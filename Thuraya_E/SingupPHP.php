<?php
session_start(); // ضروري جداً عشان نحفظ انه صار سشن 

// اتصال بالداتابيس
$con = new mysqli("localhost", "root", "", "thurayadb_e");

if ($con->connect_error) { // !$con
    die("Connection Failed: " . $con->connect_error); //  طريقه ثانيه mysqli_connect_error()) و die يعني يوقف خلاص ما يسوي ولا شي 
} 



// أخذ البيانات من الفورم 
if ($_SERVER["REQUEST_METHOD"] == "POST") { // we can do also if (isset($_POST['submit'])) بس طريقتي بروفشنال اكثر


    $first = $_POST['first_name'];
    $last = $_POST['last_name'];
    $national_id = $_POST['national_id'];
    $birthdate = $_POST['birthdate'];
    $nationality = $_POST['nationality'];
    $mobile = $_POST['mobile'];
    $email = $_POST['email'];
    $password = $_POST['password']; 
    
    $semester = $_POST['semester'];

    // التحقق من تكرار الايدي او الايميل 
    $check = "SELECT * FROM users 
              WHERE national_id='$national_id' 
              OR email='$email'"; // الي بعد اليساوي القيمه الي نبحث عنها 

    $result = $con->query($check); // mysqli_query($con , $check) بس هذي بطريقه ثانيه 

    if ($result->num_rows > 0) { // mysqli_num_rows($result) طريقه ثانيه  هذي ترجع لنا عدد الروز
        echo "<h3 style='color:red; text-align:center;'>National ID or Email is already registered.</h3>";
        exit();
    }

    // انسرت عادي
    $sql = "INSERT INTO users (first_name, last_name, national_id, birthdate, nationality, mobile, email, password , semester)
            VALUES ('$first', '$last', '$national_id', '$birthdate', '$nationality', '$mobile', '$email', '$password', '$semester')";

    if ($con->query($sql) === TRUE) { // mysqli_query($con , $sql) بس هذي بطريقه ثانيه 

    // نخزن الـ national_id  عشانه هو البرايمري كي عندي 
    $_SESSION['user_id'] = $national_id;
    $_SESSION['first_name'] = $first;
 
    // نوديه لصفحه الرئيسية
    header("Location: Newhome.php");
    exit(); //عشان ما يكمل خلاص يوقف 

} else {
    echo "Error: " . $con->error; //  . mysqli_error($con); طريقه ثانيه 
}

}

$con->close(); // mysqli_close($con) يمدي نسوي كذا بعد ، بس الفرق احنا نسوي حق الاوبجت اورينتد 
?>
