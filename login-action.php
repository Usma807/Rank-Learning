<?php
include("conn.php");
$oquvchi_id = $_POST['oquvchi_id'];
$parol = $_POST['parol'];

$sql = "SELECT * FROM users WHERE oquvchi_id = :oquvchi_id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(":oquvchi_id", $oquvchi_id);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
       if ($user) {
            // Parolni tekshirish
            if ($user['parol']==$parol) {
                // Muvaffaqiyatli kirish
                
                $_SESSION['user_id'] = $user['ID'];
                echo "<h1>Kirish muvaffaqiyatli!</h1>";
                header("Location:index.php");
            } else {
                 $_SESSION["status"] = "Noto'g'ri parol.";
                 header("Location:login.php");
            }
        } else {
          
          $_SESSION["status"] = "Foydalanuvchi topilmadi.";
          header("Location:login.php");
        }
?>