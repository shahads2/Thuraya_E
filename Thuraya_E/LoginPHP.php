<?php
session_start(); //نبدا السيشن عشان نخزن بيانات اليوزر بالداتا الي عندنا

//ضروري جدا عشان نتصل بالداتا الي عندنا
$con = new mysqli("localhost", "root", "", "thurayadb_e");
// اذا الاتصال بالداتابيس فشل نوقف الكود كامل
if ($con->connect_error) {
    die("Connection Failed: " . $con->connect_error);
}

// أخذ البيانات من الفورم 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  //نخزن الايميل والباس الي دخلهم عشان نروح ندور عليهم بالداتا بيس
    $email = $_POST['email'];
    $password = $_POST['password'];

    //  نبحث عن الإيميل فقط
    $sql = "SELECT * FROM users WHERE email='$email'";
    $result = $con->query($sql);

    //  الإيميل غير موجود
    if ($result->num_rows == 0) {

        $_SESSION['login_error'] = "You don’t have an account. Please sign up.";
        header("Location: login.php"); // نبقى بنفس صفحه اللوق ان عشان يضغط تحت على الساين اب
        exit();
        //

    } else {

        //  اذا كان الايميل موجود بالداتا بيس بنتاكد من الباس يمكن يكتبه غلط
        // الداله هذي وش تسوي ؟ تجيب الي جنب الايميل وبالداتا بيس عندنا الي جنبه الباسورد 
        $row = $result->fetch_assoc();

        //  نتحقق من الباسورد اذا كتبه غلط نعطيه اشعار ان الايميل بالفعل فيه بس الباس غلط
        if ($password === $row['password']) {
           //مهم بالداتا بيس يكون عندنا يوزر ايدي عشان نعرف مين المستخدم الحالي ونربط بياناته بالفيزا مثلا
            $_SESSION['user_id'] = $row['national_id'];
            //نخزن الفيرست نيم بالسشن عشان الويلكم مسج
            $_SESSION['first_name'] = $row['first_name'];

            header("Location: Newhome.php");
            exit();

        } else {

            //  باسورد غلط
            $_SESSION['login_error'] = "Wrong password. Please try again.";
            header("Location: login.php");
            exit();
        }
    }
}

$con->close();
?>