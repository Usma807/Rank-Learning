<?php
    include("conn.php");
    $ism = $_POST['ism'];
    $familiya = $_POST['familiya'];
    $oquvchi_id = $_POST['oquvchi_id'];
    $e_mail = $_POST['e_mail'];
    $parol = $_POST['parol'];

    $sql = "INSERT INTO users(ism, familiya, oquvchi_id, e_mail, parol) VALUES(:ism, :familiya, :oquvchi_id, :e_mail, :parol)";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(":ism", $ism);
            $stmt->bindParam(":familiya", $familiya);
            $stmt->bindParam(":oquvchi_id", $oquvchi_id);
            $stmt->bindParam(":e_mail", $e_mail);
            $stmt->bindParam(":parol", $parol);
            $stmt->execute();
            $_SESSION["status_register"] = "Muvaffaqiyatli ro'yxatdan o'tdingiz!";
            header("Location: login.php");

?>