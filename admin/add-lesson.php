<?php
    include("conn.php");
    $lesson_name = $_POST['lesson_name'];
    $lesson_link = $_POST['lesson_link'];

    $sql = "INSERT INTO lessons(lesson_name, lesson_link) VALUES(:lesson_name, :lesson_link)";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(":lesson_name", $lesson_name);
            $stmt->bindParam(":lesson_link", $lesson_link);
            $stmt->execute();
            $_SESSION["status"] = "Muvaffaqiyatli qo'shildi!";
            header("Location: lessons.php");

?>