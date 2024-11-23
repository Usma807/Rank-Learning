<?php
include("conn.php");
$oquvchi_id = $_POST['oquvchi_id'];
$parol = $_POST['parol'];

$sql = "SELECT * FROM admins WHERE admin_id = :admin_id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(":admin_id", $oquvchi_id);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
       if ($user) {
            // Parolni tekshirish
            if ($user['parol']==$parol) {
                // Muvaffaqiyatli kirish
                
                $_SESSION['user_id'] = $user['ID'];
                echo "<h1>Kirish muvaffaqiyatli!</h1>";
                header("Location:dashboard.php");
            } else {
                 $_SESSION["status"] = "Noto'g'ri parol.";
                 header("Location:index.php");
            }
        } else {
          
          $_SESSION["status"] = "Admin topilmadi.";
          header("Location:index.php");
        }
?>