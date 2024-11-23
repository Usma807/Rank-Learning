<?php
    session_start();

    include("conn.php");
    $ex_name = $_POST['ex_name'];
    $ex_turi = $_POST['ex_turi'];
    $ex_termin = $_POST['ex_termin'];
    $ex_tavsif = $_POST['ex_tavsif'];
    

    $sql = "INSERT INTO exercises(ex_name, ex_turi, ex_termin, ex_tavsif) VALUES(:ex_name, :ex_turi, :ex_termin, :ex_tavsif)";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(":ex_name", $ex_name);
            $stmt->bindParam(":ex_turi", $ex_turi);
            $stmt->bindParam(":ex_termin", $ex_termin);
            $stmt->bindParam(":ex_tavsif", $ex_tavsif);
            $stmt->execute();
            $_SESSION["status"] = "Muvaffaqiyatli qo'shildi!";
            header("Location: exercises.php");

?>